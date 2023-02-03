<?php

namespace Database\Seeders;

use App\Models\religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class religionSeeder extends Seeder
{

    public function run()
    {

        religion::truncate();

        $religions = [

            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],

        ];


        foreach ($religions as $religion) {

            religion::create([

                'name_ar' => $religion['ar'],
                'name_en' => $religion['en'],

            ]);


        }




    }
}
