@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <a class="btn btn-secondary float-end" href="/teacher/assign-teacher/{{ $school_id }}">تحرير</a>
                <h4>معلمي الصفوف</h4>
            </div>
            @if (count($errors) > 0)
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger mb-2">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row mb-4">
                <div class="col-md">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <td class="fw-bold">الصف</td>
                                <td class="fw-bold">معلم الصف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->teacher->name }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
