<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Degree;
use App\Models\school;
use App\Models\Student;
use App\Models\test;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $school = auth('teacher')->user()->school;
        session()->put('sc', $school);


        return view('teacher.school.index', ['school' => $school]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     *
     */
    public function edit(school $school)
    {

        return view('teacher.school.edit')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function update(school $school)
    {
        //

        $attributes
            = request()->validate([
                'name' => 'required',
                'rigion' => 'required',
                'guide_name' => 'required',
                'guide_tele' =>
                ['required', Rule::unique('schools', 'guide_tele')->ignore($school)],
                'mod_name' => 'required',
                'mod_tele' =>
                ['required', Rule::unique('schools', 'mod_tele')->ignore($school)],
                'num_11' => 'required',
                'num_12' => 'required',
                'num_teacher' => 'required',
                'address' => 'required',


            ]);
        request()->validate(
            [
                'admin_name' => 'required',
                'admin_tele' =>
                ['required', Rule::unique('teachers', 'tele')->ignore($school->admin)],
            ],

        );

        $attributes_admin = [
            'name' => request('admin_name'),
            'tele' => request('admin_tele'),

        ];
        $sections = $school->section;
        #########################SECTION 11###########

        $num_11 = (int)$attributes['num_11'];
        // dd($num_11);
        $section_11 = $sections[0];
        // dd($section_11->branch->count());
        $num_11_bra = $section_11->branch->count();
        if ($num_11_bra != $num_11) {
            if ($num_11_bra < $num_11) {

                $new_bra = $num_11 - $num_11_bra;

                for ($n = 0; $n < $new_bra; $n++) {

                    $b = branch::factory()->create([
                        "section_id" => $section_11->id,
                        "school_id" => $school->id,
                        "teacher_id" =>  $school->admin->id,
                        'name' => $num_11_bra + $n . 'حادي عشر'
                    ]);

                    Work::factory()->create([
                        'branch_id' => $b->id,
                        'school_id' => $school->id,
                        'section_id' => $section_11->id,

                    ]);

                    test::factory()->create([
                        'branch_id' => $b->id,
                        'school_id' => $school->id,
                        'section_id' => $section_11->id,

                    ]);

                    $students_11 =  Student::factory(20)->create([
                        'branch_id' => $b->id,
                    ]);

                    foreach ($students_11 as $s) {
                        foreach ($school->question as $q) {
                            Degree::factory(1)->create([
                                'student_id' => $s->id,
                                'question_id' => $q->id
                            ]);
                        }
                    }
                }
            } else {
                // $deleted_bra=$num_11_bra -$num_11;
                foreach ($section_11->branch->skip($num_11) as $db) {
                    $db->delete();
                }
            }
        }


        #########################SECTION 12###########
        $num_12 = (int) $attributes['num_12'];

        $section_12 = $sections[1];
        $num_12_bra = $section_12->branch->count();
        if (!$num_12_bra != $num_12) {
            if ($num_12_bra < $num_12) {

                $new_bra = $num_12 - $num_12_bra;

                for ($n = 1; $n == $new_bra; $n++) {

                    $b = branch::factory()->create([
                        "section_id" => $section_12->id,
                        "school_id" => $school->id,
                        "teacher_id" =>  $school->admin->id,
                        'name' => $num_12_bra + $n . 'حادي عشر'
                    ]);

                    Work::factory()->create([
                        'branch_id' => $b->id,
                        'school_id' => $school->id,
                        'section_id' => $section_12->id,

                    ]);

                    test::factory()->create([
                        'branch_id' => $b->id,
                        'school_id' => $school->id,
                        'section_id' => $section_12->id,

                    ]);

                    $students_12 =  Student::factory(20)->create([
                        'branch_id' => $b->id,
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
            } else {
                // $deleted_bra=$num_12_bra -$num_11;
                foreach ($section_12->branch->skip($num_12) as $db) {
                    $db->delete();
                }
            }
        }



        $school->update($attributes);
        $school->admin->update($attributes_admin);
        session()->put('sc', $school);
        return redirect('/teacher/index')->with('success', 'shcool Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
}
