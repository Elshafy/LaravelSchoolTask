@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <a class="btn btn-secondary float-end" href="school/edit/{{ session('sc')->id }}">تحرير</a>
                <h4>البيانات الأساسية</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <table class="table table-striped">
                        <tr>
                            <td>اسم المدرسة:</td>
                            <td>{{ $school->name }}</td>
                        </tr>
                        <tr>
                            <td>المنطقة التعليمية:</td>
                            <td>{{ $school->rigion }}</td>
                        </tr>
                        <tr>
                            <td>اسم رئيس القسم:</td>
                            <td>{{ $school->admin->name }}</td>
                        </tr>
                        <tr>
                            <td>اسم الموجه الفني:</td>
                            <td>{{ $school->guide_name }}</td>
                        </tr>
                        <tr>
                            <td>اسم مدير المدرسة:</td>
                            <td>{{ $school->mod_name }}</td>
                        </tr>
                        <tr>
                            <td>عنوان المدرسة:</td>
                            <td>{{ $school->address }}</td>
                        </tr>
                        <tr>
                            <td>عدد فصول الصف الحادي عشر:</td>
                            <td>{{ $school->num_11 }}</td>
                        </tr>
                        <tr>
                            <td>عدد فصول الصف الثاني عشر:</td>
                            <td>{{ $school->num_12 }}</td>
                        </tr>
                        <tr>
                            <td>عدد الهيئة التعليمية:</td>
                            <td>{{ $school->num_teacher }}</td>
                        </tr>
                        <tr>
                            <td>رقم هاتف رئيس القسم:</td>
                            <td>{{ $school->admin->tele }}</td>
                        </tr>
                        <tr>
                            <td>رقم هاتف الموجه الفني:</td>
                            <td>{{ $school->guide_tele }}</td>
                        </tr>
                        <tr>
                            <td>رقم هاتف مدير المدرسة:</td>
                            <td>{{ $school->mod_tele }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
