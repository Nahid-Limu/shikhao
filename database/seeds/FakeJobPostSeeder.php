<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class FakeJobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            DB::table('job_post')->insert([
                'shikhao_id'=>$unique=hexdec(uniqid()),
                'student_id' => $faker->numberBetween(1,10),
                'medium_id' => $faker->numberBetween(1,10),
                'curriculum_id' => $faker->numberBetween(1,10),
                'class_id' => $faker->numberBetween(1,10),
                'salary' => $faker->numberBetween(1,2000),
                'can_travel' => $faker->numberBetween(0,1),
                'location_id' => $faker->numberBetween(1,10),
                'location_details' => $faker->realText(),
                'preferred_school_id' => $faker->numberBetween(1,10),
                'preferred_university_id' => $faker->numberBetween(1,10),
                'joining_date' => \Carbon\Carbon::parse($faker->year)->toDateString(),
                'preferred_gender' => $faker->numberBetween(0,2),
                'special_requirement' => $faker->realText(),
                'days_per_week' => $faker->numberBetween(1,7),
                'job_status' => $faker->numberBetween(0,1),
                'created_by'=>$faker->numberBetween(0,10),
                
            ]);
        }
    }
}
