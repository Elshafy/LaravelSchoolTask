@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <a class="btn btn-secondary float-end" href="/teacher/school-teacher/{{ session('sc')->id }}/create">إضافة
                    معلم</a>
                <h4>الهيئة التعليمية</h4>
            </div>
            <x-flash-t />
            <div class="row mb-4">
                <div class="col-md">
                    <table class="table text-center">
                        <thead class="table-light align-middle">

                            <tr>
                                <td class="fw-bold">م</td>
                                <td class="fw-bold col-md-2">الاسم</td>
                                <td class="fw-bold">الرقم المدني</td>
                                <td class="fw-bold">رقم الملف</td>
                                <td class="fw-bold col-md-2">المؤهل العلمي</td>
                                <td class="fw-bold col-md-1">المسمى الوظيفي</td>
                                <td class="fw-bold">تاريخ التعيين</td>
                                <td class="fw-bold">عنوان السكن</td>
                                <td class="fw-bold col-md-1">رقم الهاتف</td>
                                <td class="fw-bold">تحرير / إزالة</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp

                            @foreach ($admins as $item)
                                <tr class="  align-middle @if ($item->position_id == 1) text-danger @endif">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->idnum }}</td>
                                    <td>{{ $item->filenum }}</td>
                                    <td class="col-md-2">
                                        {{ $item->specialized }}
                                    </td>
                                    {{-- <td>{{ $item->position_id }}</td> --}}
                                    <td>{{ $item->position->name }}</td>
                                    <td>{{ $item->added }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->tele }}</td>
                                    <td>
                                        <a href="/teacher/school-teacher/{{ session('sc')->id }}/edit/{{ $item->id }}"
                                            class="btn btn-sm btn-secondary m-1">تحرير</a>
                                        <form method="POST"
                                            action="/teacher/school-teacher/{{ session('sc')->id }}/delete/{{ $item->id }}"
                                            class="inline-block" style="display: inline;">
                                            @csrf
                                            @method('post')

                                            <button class="btn btn-sm btn-danger m-1 inline-block">حذف</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($teachers as $item)
                                <tr class="  align-middle ">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->idnum }}</td>
                                    <td>{{ $item->filenum }}</td>
                                    <td class="col-md-2">
                                        {{ $item->specialized }}
                                    </td>
                                    {{-- <td>{{ $item->position_id }}</td> --}}
                                    <td>{{ $item->position->name }}</td>
                                    <td>{{ $item->added }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->tele }}</td>
                                    <td>
                                        <a href="/teacher/school-teacher/{{ session('sc')->id }}/edit/{{ $item->id }}"
                                            class="btn btn-sm btn-secondary m-1">تحرير</a>
                                        <form method="POST"
                                            action="/teacher/school-teacher/{{ session('sc')->id }}/delete/{{ $item->id }}"
                                            class="inline-block" style="display: inline;">
                                            @csrf
                                            @method('post')

                                            <button class="btn btn-sm btn-danger m-1 inline-block">حذف</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
