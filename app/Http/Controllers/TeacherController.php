<?php

namespace App\Http\Controllers;

use App\Models\position;
use App\Models\school;
use App\Models\section;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $teachers = teacher::with('position')->where('school_id', $id)->get();
        $teachers = $teachers->groupBy('position.status');

        $t = $teachers[0];
        $admins = $teachers[1];



        $t->sortBy('name')->values();
        $admins->sortBy('name')->values();



        return view('teacher.teacher.index', ['teachers' => $t, 'school_id' => $id, 'admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($school_id)
    {
        $positions = position::all(['name', 'id']);

        return view('teacher.teacher.create', ['positions' => $positions, 'school_id' => $school_id]);
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  $table->string('tele');
            $table->string('name')->unique();
            $table->string('idnum')->unique()->nullable();
            $table->string('filenum')->nullable();
            $table->string('specialized')->nullable();
            $table->foreignId('position_id')->default('2');
            $table->bigInteger('school_id')->unsigned();
            $table->date('added')->default(now());
            $table->string('address')->nullable();
            $table->timestamps();
     */
    public function store(Request $request)
    {
        //r

        teacher::create(request()->validate([
            'name' => 'required',
            'idnum' => [
                Rule::unique('teachers', 'idnum')
            ],
            'filenum' => 'required',
            'tele' => 'required',
            'specialized' => 'required',
            'position_id' => 'required',
            'school_id' => 'required',
            'added' => 'required',
            'address' => 'required',

        ]));
        return back()->with('success', 'teacher Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, teacher $teacher)
    {
        //
        $positions = position::all(['name', 'id']);

        return view(
            'teacher.teacher.edit',
            ['positions' => $positions, 'school_id' => $school_id, 'teacher' => $teacher]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $school_id, teacher $teacher)
    {
        $exesit = teacher::with('school')->where('idnum', request('idnum'))->first();
        //
        session()->flash('ex', $exesit);
        $teacher->update(
            $request->validate([
                'name' => 'required',
                'idnum' => [
                    Rule::unique('teachers', 'idnum')->ignore($teacher)
                ],
                'filenum' => 'required',
                'tele' => 'required',
                'specialized' => 'required',
                'position_id' => 'required',
                'school_id' => 'required',
                'added' => 'required',
                'address' => 'required',

            ])

        );
        return back()->with('success', 'teacher udated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */

    public function destroy($school_id, teacher $teacher)
    {
        //
        $teacher->delete();

        return back()->with('success', 'teacher Deleted!');
    }
}
