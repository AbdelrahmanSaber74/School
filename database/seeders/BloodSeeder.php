<?php

namespace Database\Seeders;

use App\Models\TybeBlood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{

    public function run()
    {

        TybeBlood::truncate();
        $bgs =  ['O-' , 'O+' , 'A-' , 'A+' , 'B-' , 'B+' ,'AB+' , 'AB-'] ;

        foreach($bgs as $bg) {
            DB::table('tybe_bloods')->insert([
                'name' => $bg,
            ]);

        }



    }


}

