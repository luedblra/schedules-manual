<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

  /**
     * Auto generated seed file
     *
     * @return void
     */
  public function run()
  {


    \DB::table('countries')->delete();

    \DB::table('countries')->insert(array (
      0 => 
      array (
        'id' => 1,
        'code' => 'AD',
        'name' => 'Andorra',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      1 => 
      array (
        'id' => 2,
        'code' => 'AE',
        'name' => 'United Arab Emirates',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      2 => 
      array (
        'id' => 3,
        'code' => 'AF',
        'name' => 'Afghanistan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      3 => 
      array (
        'id' => 4,
        'code' => 'AG',
        'name' => 'Antigua and Barbuda',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      4 => 
      array (
        'id' => 5,
        'code' => 'AI',
        'name' => 'Anguilla',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      5 => 
      array (
        'id' => 6,
        'code' => 'AL',
        'name' => 'Albania',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      6 => 
      array (
        'id' => 7,
        'code' => 'AM',
        'name' => 'Armenia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      7 => 
      array (
        'id' => 8,
        'code' => 'AO',
        'name' => 'Angola',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      8 => 
      array (
        'id' => 9,
        'code' => 'AQ',
        'name' => 'Antarctica',
        'continent' => 'AN',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      9 => 
      array (
        'id' => 10,
        'code' => 'AR',
        'name' => 'Argentina',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      10 => 
      array (
        'id' => 11,
        'code' => 'AS',
        'name' => 'American Samoa',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      11 => 
      array (
        'id' => 12,
        'code' => 'AT',
        'name' => 'Austria',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      12 => 
      array (
        'id' => 13,
        'code' => 'AU',
        'name' => 'Australia',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      13 => 
      array (
        'id' => 14,
        'code' => 'AW',
        'name' => 'Aruba',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      14 => 
      array (
        'id' => 15,
        'code' => 'AZ',
        'name' => 'Azerbaijan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      15 => 
      array (
        'id' => 16,
        'code' => 'BA',
        'name' => 'Bosnia and Herzegovina',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      16 => 
      array (
        'id' => 17,
        'code' => 'BB',
        'name' => 'Barbados',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      17 => 
      array (
        'id' => 18,
        'code' => 'BD',
        'name' => 'Bangladesh',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      18 => 
      array (
        'id' => 19,
        'code' => 'BE',
        'name' => 'Belgium',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      19 => 
      array (
        'id' => 20,
        'code' => 'BF',
        'name' => 'Burkina Faso',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      20 => 
      array (
        'id' => 21,
        'code' => 'BG',
        'name' => 'Bulgaria',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      21 => 
      array (
        'id' => 22,
        'code' => 'BH',
        'name' => 'Bahrain',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      22 => 
      array (
        'id' => 23,
        'code' => 'BI',
        'name' => 'Burundi',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      23 => 
      array (
        'id' => 24,
        'code' => 'BJ',
        'name' => 'Benin',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      24 => 
      array (
        'id' => 25,
        'code' => 'BL',
        'name' => 'Saint Barthélemy',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      25 => 
      array (
        'id' => 26,
        'code' => 'BM',
        'name' => 'Bermuda',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      26 => 
      array (
        'id' => 27,
        'code' => 'BN',
        'name' => 'Brunei',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      27 => 
      array (
        'id' => 28,
        'code' => 'BO',
        'name' => 'Bolivia',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      28 => 
      array (
        'id' => 29,
        'code' => 'BQ',
        'name' => 'Caribbean Netherlands',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      29 => 
      array (
        'id' => 30,
        'code' => 'BR',
        'name' => 'Brazil',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      30 => 
      array (
        'id' => 31,
        'code' => 'BS',
        'name' => 'Bahamas',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      31 => 
      array (
        'id' => 32,
        'code' => 'BT',
        'name' => 'Bhutan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      32 => 
      array (
        'id' => 33,
        'code' => 'BW',
        'name' => 'Botswana',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      33 => 
      array (
        'id' => 34,
        'code' => 'BY',
        'name' => 'Belarus',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      34 => 
      array (
        'id' => 35,
        'code' => 'BZ',
        'name' => 'Belize',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      35 => 
      array (
        'id' => 36,
        'code' => 'CA',
        'name' => 'Canada',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      36 => 
      array (
        'id' => 37,
        'code' => 'CC',
        'name' => 'Cocos (Keeling) Islands',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      37 => 
      array (
        'id' => 38,
        'code' => 'CD',
        'name' => 'Congo (Kinshasa)',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      38 => 
      array (
        'id' => 39,
        'code' => 'CF',
        'name' => 'Central African Republic',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      39 => 
      array (
        'id' => 40,
        'code' => 'CG',
        'name' => 'Congo (Brazzaville)',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      40 => 
      array (
        'id' => 41,
        'code' => 'CH',
        'name' => 'Switzerland',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      41 => 
      array (
        'id' => 42,
        'code' => 'CI',
        'name' => 'Côte d\'Ivoire',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      42 => 
      array (
        'id' => 43,
        'code' => 'CK',
        'name' => 'Cook Islands',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      43 => 
      array (
        'id' => 44,
        'code' => 'CL',
        'name' => 'Chile',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      44 => 
      array (
        'id' => 45,
        'code' => 'CM',
        'name' => 'Cameroon',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      45 => 
      array (
        'id' => 46,
        'code' => 'CN',
        'name' => 'China',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      46 => 
      array (
        'id' => 47,
        'code' => 'CO',
        'name' => 'Colombia',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      47 => 
      array (
        'id' => 48,
        'code' => 'CR',
        'name' => 'Costa Rica',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      48 => 
      array (
        'id' => 49,
        'code' => 'CU',
        'name' => 'Cuba',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      49 => 
      array (
        'id' => 50,
        'code' => 'CV',
        'name' => 'Cape Verde',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      50 => 
      array (
        'id' => 51,
        'code' => 'CW',
        'name' => 'Curaçao',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      51 => 
      array (
        'id' => 52,
        'code' => 'CX',
        'name' => 'Christmas Island',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      52 => 
      array (
        'id' => 53,
        'code' => 'CY',
        'name' => 'Cyprus',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      53 => 
      array (
        'id' => 54,
        'code' => 'CZ',
        'name' => 'Czechia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      54 => 
      array (
        'id' => 55,
        'code' => 'DE',
        'name' => 'Germany',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      55 => 
      array (
        'id' => 56,
        'code' => 'DJ',
        'name' => 'Djibouti',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      56 => 
      array (
        'id' => 57,
        'code' => 'DK',
        'name' => 'Denmark',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      57 => 
      array (
        'id' => 58,
        'code' => 'DM',
        'name' => 'Dominica',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      58 => 
      array (
        'id' => 59,
        'code' => 'DO',
        'name' => 'Dominican Republic',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      59 => 
      array (
        'id' => 60,
        'code' => 'DZ',
        'name' => 'Algeria',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      60 => 
      array (
        'id' => 61,
        'code' => 'EC',
        'name' => 'Ecuador',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      61 => 
      array (
        'id' => 62,
        'code' => 'EE',
        'name' => 'Estonia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      62 => 
      array (
        'id' => 63,
        'code' => 'EG',
        'name' => 'Egypt',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      63 => 
      array (
        'id' => 64,
        'code' => 'EH',
        'name' => 'Western Sahara',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      64 => 
      array (
        'id' => 65,
        'code' => 'ER',
        'name' => 'Eritrea',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      65 => 
      array (
        'id' => 66,
        'code' => 'ES',
        'name' => 'Spain',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      66 => 
      array (
        'id' => 67,
        'code' => 'ET',
        'name' => 'Ethiopia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      67 => 
      array (
        'id' => 68,
        'code' => 'FI',
        'name' => 'Finland',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      68 => 
      array (
        'id' => 69,
        'code' => 'FJ',
        'name' => 'Fiji',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      69 => 
      array (
        'id' => 70,
        'code' => 'FK',
        'name' => 'Falkland Islands',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      70 => 
      array (
        'id' => 71,
        'code' => 'FM',
        'name' => 'Micronesia',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      71 => 
      array (
        'id' => 72,
        'code' => 'FO',
        'name' => 'Faroe Islands',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      72 => 
      array (
        'id' => 73,
        'code' => 'FR',
        'name' => 'France',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      73 => 
      array (
        'id' => 74,
        'code' => 'GA',
        'name' => 'Gabon',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      74 => 
      array (
        'id' => 75,
        'code' => 'GB',
        'name' => 'United Kingdom',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      75 => 
      array (
        'id' => 76,
        'code' => 'GD',
        'name' => 'Grenada',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      76 => 
      array (
        'id' => 77,
        'code' => 'GE',
        'name' => 'Georgia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      77 => 
      array (
        'id' => 78,
        'code' => 'GF',
        'name' => 'French Guiana',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      78 => 
      array (
        'id' => 79,
        'code' => 'GG',
        'name' => 'Guernsey',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      79 => 
      array (
        'id' => 80,
        'code' => 'GH',
        'name' => 'Ghana',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      80 => 
      array (
        'id' => 81,
        'code' => 'GI',
        'name' => 'Gibraltar',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      81 => 
      array (
        'id' => 82,
        'code' => 'GL',
        'name' => 'Greenland',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      82 => 
      array (
        'id' => 83,
        'code' => 'GM',
        'name' => 'Gambia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      83 => 
      array (
        'id' => 84,
        'code' => 'GN',
        'name' => 'Guinea',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      84 => 
      array (
        'id' => 85,
        'code' => 'GP',
        'name' => 'Guadeloupe',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      85 => 
      array (
        'id' => 86,
        'code' => 'GQ',
        'name' => 'Equatorial Guinea',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      86 => 
      array (
        'id' => 87,
        'code' => 'GR',
        'name' => 'Greece',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      87 => 
      array (
        'id' => 88,
        'code' => 'GS',
        'name' => 'South Georgia and the South Sandwich Islands',
        'continent' => 'AN',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      88 => 
      array (
        'id' => 89,
        'code' => 'GT',
        'name' => 'Guatemala',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      89 => 
      array (
        'id' => 90,
        'code' => 'GU',
        'name' => 'Guam',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      90 => 
      array (
        'id' => 91,
        'code' => 'GW',
        'name' => 'Guinea-Bissau',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      91 => 
      array (
        'id' => 92,
        'code' => 'GY',
        'name' => 'Guyana',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      92 => 
      array (
        'id' => 93,
        'code' => 'HK',
        'name' => 'Hong Kong',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      93 => 
      array (
        'id' => 94,
        'code' => 'HN',
        'name' => 'Honduras',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      94 => 
      array (
        'id' => 95,
        'code' => 'HR',
        'name' => 'Croatia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      95 => 
      array (
        'id' => 96,
        'code' => 'HT',
        'name' => 'Haiti',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      96 => 
      array (
        'id' => 97,
        'code' => 'HU',
        'name' => 'Hungary',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      97 => 
      array (
        'id' => 98,
        'code' => 'ID',
        'name' => 'Indonesia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      98 => 
      array (
        'id' => 99,
        'code' => 'IE',
        'name' => 'Ireland',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      99 => 
      array (
        'id' => 100,
        'code' => 'IL',
        'name' => 'Israel',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      100 => 
      array (
        'id' => 101,
        'code' => 'IM',
        'name' => 'Isle of Man',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      101 => 
      array (
        'id' => 102,
        'code' => 'IN',
        'name' => 'India',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      102 => 
      array (
        'id' => 103,
        'code' => 'IO',
        'name' => 'British Indian Ocean Territory',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      103 => 
      array (
        'id' => 104,
        'code' => 'IQ',
        'name' => 'Iraq',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      104 => 
      array (
        'id' => 105,
        'code' => 'IR',
        'name' => 'Iran',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      105 => 
      array (
        'id' => 106,
        'code' => 'IS',
        'name' => 'Iceland',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      106 => 
      array (
        'id' => 107,
        'code' => 'IT',
        'name' => 'Italy',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      107 => 
      array (
        'id' => 108,
        'code' => 'JE',
        'name' => 'Jersey',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      108 => 
      array (
        'id' => 109,
        'code' => 'JM',
        'name' => 'Jamaica',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      109 => 
      array (
        'id' => 110,
        'code' => 'JO',
        'name' => 'Jordan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      110 => 
      array (
        'id' => 111,
        'code' => 'JP',
        'name' => 'Japan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      111 => 
      array (
        'id' => 112,
        'code' => 'KE',
        'name' => 'Kenya',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      112 => 
      array (
        'id' => 113,
        'code' => 'KG',
        'name' => 'Kyrgyzstan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      113 => 
      array (
        'id' => 114,
        'code' => 'KH',
        'name' => 'Cambodia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      114 => 
      array (
        'id' => 115,
        'code' => 'KI',
        'name' => 'Kiribati',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      115 => 
      array (
        'id' => 116,
        'code' => 'KM',
        'name' => 'Comoros',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      116 => 
      array (
        'id' => 117,
        'code' => 'KN',
        'name' => 'Saint Kitts and Nevis',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      117 => 
      array (
        'id' => 118,
        'code' => 'KP',
        'name' => 'North Korea',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      118 => 
      array (
        'id' => 119,
        'code' => 'KR',
        'name' => 'South Korea',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      119 => 
      array (
        'id' => 120,
        'code' => 'KW',
        'name' => 'Kuwait',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      120 => 
      array (
        'id' => 121,
        'code' => 'KY',
        'name' => 'Cayman Islands',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      121 => 
      array (
        'id' => 122,
        'code' => 'KZ',
        'name' => 'Kazakhstan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      122 => 
      array (
        'id' => 123,
        'code' => 'LA',
        'name' => 'Laos',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      123 => 
      array (
        'id' => 124,
        'code' => 'LB',
        'name' => 'Lebanon',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      124 => 
      array (
        'id' => 125,
        'code' => 'LC',
        'name' => 'Saint Lucia',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      125 => 
      array (
        'id' => 126,
        'code' => 'LI',
        'name' => 'Liechtenstein',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      126 => 
      array (
        'id' => 127,
        'code' => 'LK',
        'name' => 'Sri Lanka',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      127 => 
      array (
        'id' => 128,
        'code' => 'LR',
        'name' => 'Liberia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      128 => 
      array (
        'id' => 129,
        'code' => 'LS',
        'name' => 'Lesotho',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      129 => 
      array (
        'id' => 130,
        'code' => 'LT',
        'name' => 'Lithuania',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      130 => 
      array (
        'id' => 131,
        'code' => 'LU',
        'name' => 'Luxembourg',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      131 => 
      array (
        'id' => 132,
        'code' => 'LV',
        'name' => 'Latvia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      132 => 
      array (
        'id' => 133,
        'code' => 'LY',
        'name' => 'Libya',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      133 => 
      array (
        'id' => 134,
        'code' => 'MA',
        'name' => 'Morocco',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      134 => 
      array (
        'id' => 135,
        'code' => 'MC',
        'name' => 'Monaco',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      135 => 
      array (
        'id' => 136,
        'code' => 'MD',
        'name' => 'Moldova',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      136 => 
      array (
        'id' => 137,
        'code' => 'ME',
        'name' => 'Montenegro',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      137 => 
      array (
        'id' => 138,
        'code' => 'MF',
        'name' => 'Saint Martin',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      138 => 
      array (
        'id' => 139,
        'code' => 'MG',
        'name' => 'Madagascar',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      139 => 
      array (
        'id' => 140,
        'code' => 'MH',
        'name' => 'Marshall Islands',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      140 => 
      array (
        'id' => 141,
        'code' => 'MK',
        'name' => 'Macedonia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      141 => 
      array (
        'id' => 142,
        'code' => 'ML',
        'name' => 'Mali',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      142 => 
      array (
        'id' => 143,
        'code' => 'MM',
        'name' => 'Burma',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      143 => 
      array (
        'id' => 144,
        'code' => 'MN',
        'name' => 'Mongolia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      144 => 
      array (
        'id' => 145,
        'code' => 'MO',
        'name' => 'Macau',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      145 => 
      array (
        'id' => 146,
        'code' => 'MP',
        'name' => 'Northern Mariana Islands',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      146 => 
      array (
        'id' => 147,
        'code' => 'MQ',
        'name' => 'Martinique',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      147 => 
      array (
        'id' => 148,
        'code' => 'MR',
        'name' => 'Mauritania',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      148 => 
      array (
        'id' => 149,
        'code' => 'MS',
        'name' => 'Montserrat',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      149 => 
      array (
        'id' => 150,
        'code' => 'MT',
        'name' => 'Malta',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      150 => 
      array (
        'id' => 151,
        'code' => 'MU',
        'name' => 'Mauritius',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      151 => 
      array (
        'id' => 152,
        'code' => 'MV',
        'name' => 'Maldives',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      152 => 
      array (
        'id' => 153,
        'code' => 'MW',
        'name' => 'Malawi',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      153 => 
      array (
        'id' => 154,
        'code' => 'MX',
        'name' => 'Mexico',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      154 => 
      array (
        'id' => 155,
        'code' => 'MY',
        'name' => 'Malaysia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      155 => 
      array (
        'id' => 156,
        'code' => 'MZ',
        'name' => 'Mozambique',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      156 => 
      array (
        'id' => 157,
        'code' => 'NA',
        'name' => 'Namibia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      157 => 
      array (
        'id' => 158,
        'code' => 'NC',
        'name' => 'New Caledonia',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      158 => 
      array (
        'id' => 159,
        'code' => 'NE',
        'name' => 'Niger',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      159 => 
      array (
        'id' => 160,
        'code' => 'NF',
        'name' => 'Norfolk Island',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      160 => 
      array (
        'id' => 161,
        'code' => 'NG',
        'name' => 'Nigeria',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      161 => 
      array (
        'id' => 162,
        'code' => 'NI',
        'name' => 'Nicaragua',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      162 => 
      array (
        'id' => 163,
        'code' => 'NL',
        'name' => 'Netherlands',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      163 => 
      array (
        'id' => 164,
        'code' => 'NO',
        'name' => 'Norway',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      164 => 
      array (
        'id' => 165,
        'code' => 'NP',
        'name' => 'Nepal',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      165 => 
      array (
        'id' => 166,
        'code' => 'NR',
        'name' => 'Nauru',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      166 => 
      array (
        'id' => 167,
        'code' => 'NU',
        'name' => 'Niue',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      167 => 
      array (
        'id' => 168,
        'code' => 'NZ',
        'name' => 'New Zealand',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      168 => 
      array (
        'id' => 169,
        'code' => 'OM',
        'name' => 'Oman',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      169 => 
      array (
        'id' => 170,
        'code' => 'PA',
        'name' => 'Panama',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      170 => 
      array (
        'id' => 171,
        'code' => 'PE',
        'name' => 'Perú',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      171 => 
      array (
        'id' => 172,
        'code' => 'PF',
        'name' => 'French Polynesia',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      172 => 
      array (
        'id' => 173,
        'code' => 'PG',
        'name' => 'Papua New Guinea',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      173 => 
      array (
        'id' => 174,
        'code' => 'PH',
        'name' => 'Philippines',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      174 => 
      array (
        'id' => 175,
        'code' => 'PK',
        'name' => 'Pakistan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      175 => 
      array (
        'id' => 176,
        'code' => 'PL',
        'name' => 'Poland',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      176 => 
      array (
        'id' => 177,
        'code' => 'PM',
        'name' => 'Saint Pierre and Miquelon',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      177 => 
      array (
        'id' => 178,
        'code' => 'PN',
        'name' => 'Pitcairn',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      178 => 
      array (
        'id' => 179,
        'code' => 'PR',
        'name' => 'Puerto Rico',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      179 => 
      array (
        'id' => 180,
        'code' => 'PS',
        'name' => 'Palestinian Territory',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      180 => 
      array (
        'id' => 181,
        'code' => 'PT',
        'name' => 'Portugal',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      181 => 
      array (
        'id' => 182,
        'code' => 'PW',
        'name' => 'Palau',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      182 => 
      array (
        'id' => 183,
        'code' => 'PY',
        'name' => 'Paraguay',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      183 => 
      array (
        'id' => 184,
        'code' => 'QA',
        'name' => 'Qatar',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      184 => 
      array (
        'id' => 185,
        'code' => 'RE',
        'name' => 'Réunion',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      185 => 
      array (
        'id' => 186,
        'code' => 'RO',
        'name' => 'Romania',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      186 => 
      array (
        'id' => 187,
        'code' => 'RS',
        'name' => 'Serbia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      187 => 
      array (
        'id' => 188,
        'code' => 'RU',
        'name' => 'Russia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      188 => 
      array (
        'id' => 189,
        'code' => 'RW',
        'name' => 'Rwanda',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      189 => 
      array (
        'id' => 190,
        'code' => 'SA',
        'name' => 'Saudi Arabia',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      190 => 
      array (
        'id' => 191,
        'code' => 'SB',
        'name' => 'Solomon Islands',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      191 => 
      array (
        'id' => 192,
        'code' => 'SC',
        'name' => 'Seychelles',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      192 => 
      array (
        'id' => 193,
        'code' => 'SD',
        'name' => 'Sudan',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      193 => 
      array (
        'id' => 194,
        'code' => 'SE',
        'name' => 'Sweden',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      194 => 
      array (
        'id' => 195,
        'code' => 'SG',
        'name' => 'Singapore',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      195 => 
      array (
        'id' => 196,
        'code' => 'SH',
        'name' => 'Saint Helena',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      196 => 
      array (
        'id' => 197,
        'code' => 'SI',
        'name' => 'Slovenia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      197 => 
      array (
        'id' => 198,
        'code' => 'SK',
        'name' => 'Slovakia',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      198 => 
      array (
        'id' => 199,
        'code' => 'SL',
        'name' => 'Sierra Leone',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      199 => 
      array (
        'id' => 200,
        'code' => 'SM',
        'name' => 'San Marino',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      200 => 
      array (
        'id' => 201,
        'code' => 'SN',
        'name' => 'Senegal',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      201 => 
      array (
        'id' => 202,
        'code' => 'SO',
        'name' => 'Somalia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      202 => 
      array (
        'id' => 203,
        'code' => 'SR',
        'name' => 'Suriname',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      203 => 
      array (
        'id' => 204,
        'code' => 'SS',
        'name' => 'South Sudan',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      204 => 
      array (
        'id' => 205,
        'code' => 'ST',
        'name' => 'São Tomé and Principe',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      205 => 
      array (
        'id' => 206,
        'code' => 'SV',
        'name' => 'El Salvador',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      206 => 
      array (
        'id' => 207,
        'code' => 'SX',
        'name' => 'Sint Maarten',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      207 => 
      array (
        'id' => 208,
        'code' => 'SY',
        'name' => 'Syria',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      208 => 
      array (
        'id' => 209,
        'code' => 'SZ',
        'name' => 'Swaziland',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      209 => 
      array (
        'id' => 210,
        'code' => 'TC',
        'name' => 'Turks and Caicos Islands',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      210 => 
      array (
        'id' => 211,
        'code' => 'TD',
        'name' => 'Chad',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      211 => 
      array (
        'id' => 212,
        'code' => 'TF',
        'name' => 'French Southern Territories',
        'continent' => 'AN',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      212 => 
      array (
        'id' => 213,
        'code' => 'TG',
        'name' => 'Togo',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      213 => 
      array (
        'id' => 214,
        'code' => 'TH',
        'name' => 'Thailand',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      214 => 
      array (
        'id' => 215,
        'code' => 'TJ',
        'name' => 'Tajikistan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      215 => 
      array (
        'id' => 216,
        'code' => 'TK',
        'name' => 'Tokelau',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      216 => 
      array (
        'id' => 217,
        'code' => 'TL',
        'name' => 'Timor-Leste',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      217 => 
      array (
        'id' => 218,
        'code' => 'TM',
        'name' => 'Turkmenistan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      218 => 
      array (
        'id' => 219,
        'code' => 'TN',
        'name' => 'Tunisia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      219 => 
      array (
        'id' => 220,
        'code' => 'TO',
        'name' => 'Tonga',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      220 => 
      array (
        'id' => 221,
        'code' => 'TR',
        'name' => 'Turkey',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      221 => 
      array (
        'id' => 222,
        'code' => 'TT',
        'name' => 'Trinidad and Tobago',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      222 => 
      array (
        'id' => 223,
        'code' => 'TV',
        'name' => 'Tuvalu',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      223 => 
      array (
        'id' => 224,
        'code' => 'TW',
        'name' => 'Taiwan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      224 => 
      array (
        'id' => 225,
        'code' => 'TZ',
        'name' => 'Tanzania',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      225 => 
      array (
        'id' => 226,
        'code' => 'UA',
        'name' => 'Ukraine',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      226 => 
      array (
        'id' => 227,
        'code' => 'UG',
        'name' => 'Uganda',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      227 => 
      array (
        'id' => 228,
        'code' => 'UM',
        'name' => 'United States Minor Outlying Islands',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      228 => 
      array (
        'id' => 229,
        'code' => 'US',
        'name' => 'United States',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      229 => 
      array (
        'id' => 230,
        'code' => 'UY',
        'name' => 'Uruguay',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      230 => 
      array (
        'id' => 231,
        'code' => 'UZ',
        'name' => 'Uzbekistan',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      231 => 
      array (
        'id' => 232,
        'code' => 'VA',
        'name' => 'Vatican City',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      232 => 
      array (
        'id' => 233,
        'code' => 'VC',
        'name' => 'Saint Vincent and the Grenadines',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      233 => 
      array (
        'id' => 234,
        'code' => 'VE',
        'name' => 'Venezuela',
        'continent' => 'SA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      234 => 
      array (
        'id' => 235,
        'code' => 'VG',
        'name' => 'British Virgin Islands',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      235 => 
      array (
        'id' => 236,
        'code' => 'VI',
        'name' => 'U.S. Virgin Islands',
        'continent' => 'NA',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      236 => 
      array (
        'id' => 237,
        'code' => 'VN',
        'name' => 'Vietnam',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      237 => 
      array (
        'id' => 238,
        'code' => 'VU',
        'name' => 'Vanuatu',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      238 => 
      array (
        'id' => 239,
        'code' => 'WF',
        'name' => 'Wallis and Futuna',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      239 => 
      array (
        'id' => 240,
        'code' => 'WS',
        'name' => 'Samoa',
        'continent' => 'OC',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      240 => 
      array (
        'id' => 241,
        'code' => 'XK',
        'name' => 'Kosovo',
        'continent' => 'EU',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      241 => 
      array (
        'id' => 242,
        'code' => 'YE',
        'name' => 'Yemen',
        'continent' => 'AS',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      242 => 
      array (
        'id' => 243,
        'code' => 'YT',
        'name' => 'Mayotte',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      243 => 
      array (
        'id' => 244,
        'code' => 'ZA',
        'name' => 'South Africa',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      244 => 
      array (
        'id' => 245,
        'code' => 'ZM',
        'name' => 'Zambia',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      245 => 
      array (
        'id' => 246,
        'code' => 'ZW',
        'name' => 'Zimbabwe',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      246 => 
      array (
        'id' => 247,
        'code' => 'ZZ',
        'name' => 'Unknown or unassigned country',
        'continent' => 'AF',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      247 => 
      array (
        'id' => 248,
        'code' => 'PPP',
        'name' => 'No Existe',
        'continent' => 'N/A',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      248 => 
      array (
        'id' => 249,
        'code' => 'MM',
        'name' => 'Myanmar',
        'continent' => 'Asia',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
      249 => 
      array (
        'id' => 250,
        'code' => 'ALL',
        'name' => 'ALL',
        'continent' => 'ALL',
        'created_at' => NULL,
        'updated_at' => NULL,
      ),
    ));


  }
}