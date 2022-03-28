<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\section;
use App\Models\teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id)
    {
        //
        $branches = branch::with('teacher')->where('school_id', $school_id)->get();
        // $teachers = teacher::where('school_id', $school_id)->get(['id', 'name']); , 'teachers' => $teachers]
        $branches->sortBy('section_id')->values();
        return view('teacher.sections.index', ['branches' => $branches, 'school_id' => $school_id]);
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
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id)
    {
        //
        $branches = branch::with('teacher')->where('school_id', $school_id)->get();
        $teachers = teacher::where('school_id', $school_id)->where('position_id', '!=', 1)->get(['id', 'name']);

        $branches->sortBy('section_id')->values();
        return view(
            'teacher.sections.edit',
            ['branches' => $branches, 'school_id' => $school_id, 'teachers' => $teachers]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update($school_id)
    {
        //
        $branches = branch::with('teacher')->where('school_id', $school_id)->get();
        $branches->sortBy('section_id')->values();
        request()->validate([
            "teacher.*"  => "required",
        ]);
        $ids = request('teacher');

        $i = 0;
        foreach ($branches as $b) {
            $b->update([
                'teacher_id' => $ids[$i++]
            ]);
        }
        return back()->with('success', 'teacher assinged!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(section $section)
    {
        //
    }
}
