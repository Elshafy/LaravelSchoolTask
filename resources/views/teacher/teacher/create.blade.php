@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <h4>إضافة معلم جديد</h4>
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
                    <form action="/teacher/school-teacher/{{ session('sc')->id }}/create" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" class="form-control" id="schoole_id" name="school_id"
                            value="{{ $school_id }}" />
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">الرقم المدني</label>
                                <input type="text" class="form-control" id="nameOfHeadmaster" name="idnum" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">رقم الملف</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster" name="filenum" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">المؤهل العلمي</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="specialized" rows="3"></textarea>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">المسمى الوظيفي</label>
                                <select class="form-select" aria-label="Default select example" name="position_id">
                                    @foreach ($positions as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">تاريخ التعيين</label>
                                <input type="date" class="form-control" id="telephoneOfHeadmaster" name="added" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">عنوان السكن</label>
                                <input type="text" class="form-control" id="nameOfHeadmaster" name="address" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster" name="tele" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-4">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
