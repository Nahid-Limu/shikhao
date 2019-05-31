<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class FakeTutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10000) as $index) {
            DB::table('tutor')->insert([
                'name' => $faker->name,
                'fathers_name' => $faker->name,
                'mothers_name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'shikhao_id'=>$unique=hexdec(uniqid()),
                'gender'=>$faker->numberBetween(0,2),
                'contact_number'=>$faker->creditCardNumber,
                'service_area_id'=>$faker->numberBetween(1,10),
                'occupational_status_id'=>$faker->numberBetween(1,10),
                'number_days_week'=>$faker->numberBetween(1,7),
                'university_id'=>$faker->numberBetween(1,10),
                'semester_year_id'=>$faker->numberBetween(1,10),
                'department_id'=>$faker->numberBetween(1,2),
                'medium_id'=>$faker->numberBetween(1,10),
                'location_id'=>$faker->numberBetween(1,10),
                'dob'=>\Carbon\Carbon::parse($faker->year)->toDateString(),
                'university_student_id'=>$faker->randomDigit,
                'nationalId'=>$faker->randomDigit,
                'is_verified'=>$faker->numberBetween(0,1),
                'account_status'=>1,
            ]);
        }
    }
}
