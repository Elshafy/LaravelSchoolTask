<?php

namespace Database\Seeders;

use App\Models\branch;
use App\Models\Degree;
use App\Models\position;
use App\Models\Question;
use App\Models\school;
use App\Models\section;
use App\Models\Student;
use App\Models\teacher;
use App\Models\Work;
use App\Models\test;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $school = school::factory()->create();


        //! this need to seed on  time only to avoid error  from here
        $position_admin = position::factory()->create(['id' => 1, 'status' => 1, 'name' => 'رئيس قسم']);
        $position_teacher = [];
        for ($i = 1; $i < 4; $i++) {
            $position_teacher[$i]
                = position::factory()->create(['status' => 0, 'name' => $i . 'مدرس']);
        } //! ############### TO Here###########################

        $admin = teacher::factory()->create([
            'position_id' => $position_admin->id,
            'school_id' => $school->id,
            'idnum' => '123123',
            'name' => 'admin1' //! to change when seed another time to avoid error
        ]);
        $teachers = [];
        for ($i = 1; $i < 4; $i++) {
            $teachers[$i]
                = teacher::factory()->create([
                    'position_id' => $position_teacher[1]->id,
                    'school_id' => $school->id,
                ]);
        }
        $section_11 = section::factory()->create(['school_id' => $school->id]);
        $section_12 = section::factory()->create(['name' => 'ثاني عشر', 'school_id' => $school->id]);
        $branches_11 = [];
        $branches_12 = [];


        Question::factory(3)->create([
            'parent_id' => 1,
            'school_id' => $school->id,
        ]);
        Question::factory(3)->create([
            'parent_id' => 2,
            'school_id' => $school->id,
        ]);
        Question::factory(3)->create([
            'parent_id' => 3,
            'school_id' => $school->id,
        ]);
        Question::factory(4)->create([
            'parent_id' => 4,
            'school_id' => $school->id,
        ]);


        for ($j = 0; $j < 5; $j++) {
            $students_11 = null;
            $students_12 = null;

            $branches_11[$j]

                = branch::factory()->create([
                    "section_id" => $section_11->id,
                    "school_id" => $school->id,
                    "teacher_id" => $admin->id,
                    'name' => $j + 1 . 'حادي عشر'
                ]);

            Work::factory()->create([
                'branch_id' => $branches_11[$j]->id,
                'school_id' => $school->id,
                'section_id' => $section_11->id,

            ]);

            test::factory()->create([
                'branch_id' => $branches_11[$j]->id,
                'school_id' => $school->id,
                'section_id' => $section_11->id,

            ]);
            $students_11 =  Student::factory(20)->create([
                'branch_id' => $branches_11[$j]->id,
            ]);
            foreach ($students_11 as $s) {
                foreach ($school->question as $q) {
                    Degree::factory(1)->create([
                        'student_id' => $s->id,
                        'question_id' => $q->id
                    ]);
                }
            }




            $branches_12[$j]
                = branch::factory()->create([
                    "section_id" => $section_12->id,
                    "school_id" => $school->id,
                    "teacher_id" => $admin->id,
                    'name' => $j + 1 . 'ثاني عشر'
                ]);
            Work::factory()->create([
                'branch_id' => $branches_12[$j]->id,
                'school_id' => $school->id,
                'section_id' => $section_12->id,

            ]);
            test::factory()->create([
                'branch_id' => $branches_12[$j]->id,
                'school_id' => $school->id,
                'section_id' => $section_12->id,

            ]);
            $students_12 = student::factory(20)->create([
                'branch_id' => $branches_12[$j]->id,


            ]);
            foreach ($students_12 as $s) {
                foreach ($school->question as $q) {
                    Degree::factory(1)->create([
                        'student_id' => $s->id,
                        'question_id' => $q->id
                    ]);
                }
            }
        }

        // \App\Models\User::factory(10)->create();




    }
}
