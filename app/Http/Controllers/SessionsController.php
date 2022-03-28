<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Http\Controllers\Controller;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('teacher.auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'idnum' => 'required'
        ]);

        $model = teacher::query()->where('name', $attributes['name'])->first();


        // $teacher = teacher::where('tele', $attributes['tele'])->get();
        if ($model) {
            if ($attributes['idnum'] ===  $model->idnum) {
                auth('teacher')->login($model);
            }
            throw ValidationException::withMessages([
                'name' => 'Your provided credentials could not be verified.'
            ]);
        } else {

            throw ValidationException::withMessages([
                'name' => 'هذا المستخدم غير موجود '
            ]);
        }

        // if (!auth('teacher')->attempt($attributes)) {
        //     ddd('false');
        //
        // }


        return redirect('teacher/index');
    }

    public function destroy()
    {
        auth()->guard('teacher')->logout();

        return redirect('/teacher/login')->with('success', 'Goodbye!');
    }
}
