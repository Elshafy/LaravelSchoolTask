<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Http\Request;

class AnalyiseController extends Controller
{
    //
    public function index($school_id, $branche_id, $period_id)
    {

        $branche = branch::where('id', $branche_id)->get(['name', 'id'])->first();


        $students = Student::with([
            'degree' => function ($q) use ($period_id) {
                $q->where('period_id', $period_id);
            }
        ])->where('branch_id', $branche_id)->get();
        // dd($students);
        $questions = Question::where('school_id', $school_id)->get(['degree', 'id']);


        return view(
            'teacher.analyse.index',
            [
                'school_id' => $school_id,
                'students' => $students,
                'questions' => $questions,
                'period_id' => $period_id,
                'branche' => $branche,
            ]
        );
    }
    public function edit($school_id, $branche_id, $period_id)
    {
        $branche = branch::where('id', $branche_id)->get(['name', 'id'])->first();


        $students = Student::with([
            'degree' => function ($q) use ($period_id) {
                $q->where('period_id', $period_id);
            }
        ])->where('branch_id', $branche_id)->get();

        $questions = Question::where('school_id', $school_id)->get(['degree', 'id']);
        // dd($students);

        return view(
            'teacher.analyse.edit',
            [
                'school_id' => $school_id,
                'students' => $students,
                'questions' => $questions,
                'period_id' => $period_id,
                'branche' => $branche,
            ]
        );
    }
    public function update($school_id, $branche_id, $period_id)
    {
        // dd(request()->all());
        // // $branche = branch::where('id', $branche_id)->get(['name', 'id'])->first();
        // $questions = Question::where('school_id', $school_id)->get(['degree', 'id']);
        $data = request()->validate([
            "1.*"  => "required",
            "2.*"  => "required",
            "3.*"  => "required",
            "4.*"  => "required",
            "5.*"  => "required",
            "6.*"  => "required",
            "7.*"  => "required",
            "8.*"  => "required",
            "9.*"  => "required",
            "10.*"  => "required",
            "11.*"  => "required",
            "12.*"  => "required",
            "13.*"  => "required",

        ]);
        // dd($data);
        $students = Student::with([
            'degree' => function ($q) use ($period_id) {
                $q->where('period_id', $period_id);
            }
        ])->where('branch_id', $branche_id)->get();
        // dd($students);

        // foreach ($students as $st) {
        //     // dd($st);
        //     $i = 1;
        //     $s = 0;
        //     $de = $st->degree;
        //     // dd($de);
        //     foreach ($de as $d) {
        //         $d->degree = $data[$i][$s];
        //         $d->save();
        //         $i++;
        //     }
        //     $s = $s + 1;
        // }
        // dd($students[0]);
        $s = 0;
        foreach ($students as $st) {

            $de = $st->degree;
            $i = 1;
            foreach ($de as $d) {
                $d->degree = $data[$i][$s];
                $d->save();
                $i++;
            }
            $s = $s + 1;
        }
        // $de = $students[1]->degree;
        // $i = 1;
        // foreach ($de as $d) {
        //     $d->degree = $data[$i][1];
        //     $d->save();
        //     $i++;
        // }



        return back()->with('success', 'analyse UPDATED!');
    }
}
