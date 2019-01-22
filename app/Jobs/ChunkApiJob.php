<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Jobs\ApiJob;
use App\Credentialapi;
use GuzzleHttp\Client;
use App\AccountSchedule;

class ChunkApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $now = new \DateTime();
        $date = $now->format('Y-m-d');
        $hour = $now->format('H:m:s');

        $credential = Credentialapi::find($this->id);

        $client = new Client();
        $response = $client->post($credential['auth_post'].'oauth/token', [
            'form_params' => [
                'client_id' => $credential['client_id'],
                // The secret generated when you ran: php artisan passport:install
                'client_secret' => $credential['client_secret'],
                'grant_type' => 'password',
                'username' => $credential['user_name'],
                'password' => $credential['password'],
                'scope' => '*',
            ]
        ]);
        $auth = json_decode((string)$response->getBody());
        $response = $client->get($credential['auth_post'].$credential['url'], [
            'headers' => [
                'Authorization' => 'Bearer '.$auth->access_token,
            ]
        ]);
        $namecarrier = '';
        if($this->id == 1){
            $namecarrier = 'Maersk';
        } else if($this->id == 2) {
            $namecarrier = 'Cosco';
        } else {
            $namecarrier = 'Desconocido';
        }

        $account = AccountSchedule::create([
            'name'      => 'API Automatic '.$namecarrier.' '.$hour,
            'date'      => $date,
            'user_id'   => 2
        ]);

        $account = $account->toArray();

        $dataGen = json_decode($response->getBody()->getContents(),true);
        $dataGens = array_chunk($dataGen['data'],200);
        foreach($dataGens as $dataGenArray){
            ApiJob::dispatch($dataGenArray,$account);
        }
    }
}
