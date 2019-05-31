<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class FakeStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        foreach (range(1,100) as $index) {
            $unique=hexdec(uniqid());
            DB::table('student')->insert([
                'shikhao_id'=>$unique,
                'name' => $faker->name(),
                'guardian_name' => $faker->name(),
                'contact_number' => $faker->creditCardNumber,
                'password' => bcrypt('123456'),
                'school_id' => $faker->numberBetween(1,10),
                'medium_id' => $faker->numberBetween(1,2),
                'class_id' => $faker->numberBetween(1,5),
                'service_area_id' => $faker->numberBetween(1,2),
                'location_id' => $faker->numberBetween(1,10),
                'is_verified' => $faker->boolean,
                'gender' => $faker->numberBetween(0,2),
                'account_status' => 1,
                'created_by' => 2,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),

            ]);
        }
    }
}
