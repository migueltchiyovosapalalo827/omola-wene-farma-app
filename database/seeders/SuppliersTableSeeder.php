<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert(
            // $table->string('name');
            // $table->string('email');
            // $table->string('phone');
            // $table->string('address');
            // $table->string('city');
            // $table->string('country');
            // $table->string('postalCode');
            [
                [
                    'name' => 'Myrwen Dingal',
                    'email' => 'suppliers@gmail.com',
                    'phone' => '0985155',
                    'address' => 'CDO, Bukidnon',
                    'city' => 'Cagayan de Oro',
                    'country' => 'Philippines',
                    'postalCode' => '9000'
                ],
            ]
        );
    }
}
