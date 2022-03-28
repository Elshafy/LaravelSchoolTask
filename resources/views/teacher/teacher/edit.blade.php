@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <h4>تحرير
                    معلم جديد</h4>
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
                    <form action="/teacher/school-teacher/{{ session('sc')->id }}/edit/{{ $teacher->id }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" class="form-control" id="schoole_id" name="school_id"
                            value="{{ $school_id }}" />
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">الاسم</label>
                            <input type="text" class="form-control" value="{{ $teacher->name }}" id="name"
                                name="name" />
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">الرقم المدني</label>
                                <input type="text" class="form-control" id="nameOfHeadmaster"
                                    value="{{ $teacher->idnum }} " name=" idnum" />
                                @error('idnum')
                                    <p class="alert alert-danger mb-2">this id is exiest in
                                        school{{ session('ex')->school->name }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">رقم الملف</label>
                                <input type="text" class="form-control" id="telephoneOfHeadmaster"
                                    value="{{ $teacher->filenum }}" name=" filenum" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">المؤهل العلمي</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="specialized"
                                rows="3">{{ $teacher->specialized }}</textarea>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">المسمى الوظيفي</label>
                                <select class="form-select" aria-label="Default select example" name=" position_id">
                                    @foreach ($positions as $item)
                                        <option @if ($teacher->position_id == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">تاريخ التعيين</label>
                                <input type="date" class="form-control" value="{{ $teacher->added }}"
                                    id="telephoneOfHeadmaster" name="added" />
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="nameOfHeadmaster" class="form-label">عنوان السكن</label>
                                <input type="text" class="form-control" value="{{ $teacher->address }}"
                                    id="nameOfHeadmaster" name="address" />
                            </div>
                            <div class="col-md-6">
                                <label for="telephoneOfHeadmaster" class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control" value="{{ $teacher->tele }}"
                                    id="telephoneOfHeadmaster" name="tele" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-4">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
