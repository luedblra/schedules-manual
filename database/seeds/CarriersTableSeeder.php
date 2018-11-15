<?php

use Illuminate\Database\Seeder;

class CarriersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('carriers')->delete();
        
        \DB::table('carriers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'APL',
                'image' => 'apl.png',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'CCNI',
                'image' => 'ccni.png',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'CMA CGM',
                'image' => 'cma.png',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'COSCO',
                'image' => 'cosco.png',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'CSAV',
                'image' => 'csav.png',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Evergreen',
                'image' => 'evergreen.png',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Hamburg Sud',
                'image' => 'hamburgsud.png',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Hanjin',
                'image' => 'hanjin.png',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Hapag Lloyd',
                'image' => 'hapaglloyd.png',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'HMM',
                'image' => 'hmm.png',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'K Line',
                'image' => 'kline.png',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Maersk',
                'image' => 'maersk.png',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'MOL',
                'image' => 'mol.png',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'MSC',
                'image' => 'msc.png',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'NYK Line',
                'image' => 'nyk.png',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'OOCL',
                'image' => 'oocl.png',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'PIL',
                'image' => 'pil.png',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Safmarine',
                'image' => 'safmarine.png',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'UASC',
                'image' => 'uasc.png',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Wan Hai Lines',
                'image' => 'wanhai.png',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'YML',
                'image' => 'yml.png',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'ZIM',
                'image' => 'zim.png',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Otro',
                'image' => 'noimage.png',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Sealand',
                'image' => 'sealand.png',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'ONE',
                'image' => 'one.png',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'ALL',
                'image' => 'all.png',
            ),
        ));
        
        
    }
}