@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">

        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <a class="btn btn-secondary float-end"
                    href="/teacher/assign-num-student/{{ $school_id }}/edit/{{ $section->id }}">تحرير</a>
                <h4>أعداد طلاب الصفر {{ $section->name }}</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <td class="fw-bold">الصف</td>
                                <td class="fw-bold">العدد</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->num_student }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td class="fw-bold">المجموع</td>
                                <td class="fw-bold">{{ $branches->sum('num_student') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
