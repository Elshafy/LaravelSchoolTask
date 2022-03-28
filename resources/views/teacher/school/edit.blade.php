@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">

                <h4>تحرير البيانات الأساسية</h4>
            </div>

            <x-flash-t />

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
                    <form action="/teacher/school/edit/{{ session('sc')->id }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">المنطقة التعليمية</label>
                                <input type="text" class="form-control" id="nameOfHeadmaster"
                                    value="{{ $school->rigion }}" name="rigion" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">اسم المدرسة</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster" name="name"
                                    value="{{ $school->name }}" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">اسم رئيس القسم</label>
                                <input type="text" class="form-control" value="{{ $school->admin->name }}"
                                    id="admin_name" name="admin_name" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">هاتف رئيس القسم</label>
                                <input type="text" class="form-control" id="admin_tele"
                                    value="{{ $school->admin->tele }}" name="admin_tele" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">اسم الموجه الفني</label>
                                <input type="text" class="form-control" id="nameOfHeadmaster"
                                    value="{{ $school->guide_name }}" name="guide_name" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">هاتف الموجه الفني</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster"
                                    value="{{ $school->guide_tele }}" name="guide_tele" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">اسم مدير المدرسة</label>
                                <input type="text" class="form-control" id="nameOfHeadmaster"
                                    value="{{ $school->mod_name }}" name="mod_name" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">هاتف مدير المدرسة</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster"
                                    value="{{ $school->mod_tele }}" name="mod_tele" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">عدد فصول الصف الحادي عشر</label>
                                <input type="number" class="form-control" id="nameOfHeadmaster" name="num_11"
                                    value="{{ $school->num_11 }}" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">عدد فصول الصف الثاني عشر</label>
                                <input type="number" class="form-control" id="telephoneOfHeadmaster"
                                    value="{{ $school->num_12 }}" name="num_12" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">عدد الهيئة التعليمية</label>
                                <input type="number" class="form-control" id="nameOfHeadmaster" name="num_teacher"
                                    value="{{ $school->num_teacher }}" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">عنوان المدرسة</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster"
                                    value="{{ $school->address }}" name="address" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-4">تحديث</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
