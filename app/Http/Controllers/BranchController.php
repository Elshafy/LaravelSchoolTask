<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Degree;
use App\Models\Question;
use App\Models\section;
use App\Models\Student;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id, section $section)
    {
        //
        $section->load('branch');
        $branches = $section->branch;


        return view(
            'teacher.branches.index',
            ['branches' => $branches, 'school_id' => $school_id, 'section' => $section]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, section $section)
    {
        //
        $section->load('branch');
        $branches = $section->branch;


        return view(
            'teacher.branches.edit',
            ['branches' => $branches, 'school_id' => $school_id, 'section' => $section]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, section $section)
    {
        ///
        $section->load('branch');
        $branches = $section->branch;





        request()->validate([
            "nums.*"  => "required",
        ]);
        $questions = Question::where('school_id', $school_id)->get();

        $nums_string = request('nums');
        $nums = [];
        foreach ($nums_string as $n) {
            $nums[] = (int)$n;
        }

        $i = 0;
        foreach ($branches as $b) {
            $num_st = $b->num_student;
            if ($num_st != $nums[$i]) {


                if ($num_st < $nums[$i]) {


                    $new_st = $nums[$i] - $num_st;

                    $students = Student::factory($new_st)->create([
                        'branch_id' => $b->id,


                    ]);


                    foreach ($students as $s) {

                        foreach ($questions as $q) {
                            Degree::factory(1)->create([
                                'student_id' => $s->id,
                                'question_id' => $q->id
                            ]);
                        }
                    }
                } else {
                    foreach ($b->student->skip($nums[$i]) as $s) {
                        $s->delete();
                    }
                }
            }
            $i++;
        }




        $i = 0;
        foreach ($branches as $b) {
            $b->update([
                'num_student' => $nums[$i++]
            ]);
        }
        return redirect('/teacher/index')->with('success', 'branches updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(branch $branch)
    {
        //
    }
}
