<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\section;
use App\Models\Work;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id, $section_id, $period_id)
    {
        $section = section::where('id', $section_id)->get('name')->first();

        $branches = branch::where('section_id', $section_id)->get(['name', 'id', 'num_student']);
        $data = Work::where('period_id', $period_id)->where('section_id', $section_id)->get();
        return view(
            'teacher.work.index',
            [
                'school_id' => $school_id,
                'section_id' => $section_id,
                'branches' => $branches,
                'data' => $data,
                'period_id' => $period_id,
                'name' => $section->name
            ]
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
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit($school_id, $section_id, $period_id)
    {
        //
        $section = section::where('id', $section_id)->get('name')->first();
        $branches = branch::where('section_id', $section_id)->get(['name', 'id', 'num_student']);
        $data = Work::where('period_id', $period_id)
            ->where('section_id', $section_id)
            ->get();
        return view(
            'teacher.work.edit',
            [
                'school_id' => $school_id,
                'section_id' => $section_id,
                'branches' => $branches,
                'data' => $data,
                'period_id' => $period_id,
                'name' => $section->name
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update($school_id, $section_id, $period_id)
    {
        //
        // $branches = branch::where('section_id', $section_id)->get(['name', 'id', 'num_student']);
        $data =
            Work::where('period_id', $period_id)
            ->where('section_id', $section_id)
            ->get();
        request()->validate([
            "atteend.*"  => "required",
            "dissapper.*"  => "required",
            "success.*"  => "required",
            "fail.*"  => "required",

        ]);

        $atteend = request('atteend');
        $dissapper = request('dissapper');
        $success = request('success');
        $fail = request('fail');
        // dd($fail, $success, $dissapper, $atteend);

        $i = 0;
        foreach ($data as $b) {
            $b->update([
                'atteend' => $atteend[$i],
                'disapper' => $dissapper[$i],
                'success' => $success[$i],
                'fail' => $fail[$i]

            ]);
            $i++;
        }
        return back()->with('success', 'work UPDATER!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}
