<?php

namespace Database\Seeders;

use App\Models\SupportedCurrency;
use Illuminate\Database\Seeder;

class SupportedCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count=SupportedCurrency::count();
        if ($count==0){
            SupportedCurrency::insert([
                [
                    'name' => 'USD',
                    'symbol' => '$',
                    'default' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'CNY',
                    'symbol' => '¥',
                    'default' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'EUR',
                    'symbol' => '€',
                    'default' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'PKR',
                    'symbol' => 'RS',
                    'default' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
        }
    }
}
