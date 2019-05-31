<?php

use Illuminate\Database\Seeder;

class tb_company_informationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_company_information')->insert([
            'company_name'=>'Lit Health Care',
            'company_phone'=>'0176235327423',
            'company_email'=>'hospital@email.com',
            'company_address'=>'Gajipur, Dhaka-1200',

        ]);
    }
}
