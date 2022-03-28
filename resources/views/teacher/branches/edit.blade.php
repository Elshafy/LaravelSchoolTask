@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <x-flash-t />
            <div class="my-5 border-bottom pb-3">
                <h4>تحرير أعداد طلاب الصف {{ $section->name }}</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <!-- Start content -->
                    <form id="calculation"
                        action="/teacher/assign-num-student/{{ $school_id }}/edit/{{ $section->id }}" method="POST">
                        @csrf
                        @method('POST')
                        @foreach ($branches as $item)
                            <div id="pare" class="row my-y">
                                <div class="col-md-1">
                                    <label for="numberOfFirstClasse" class="col-form-label">{{ $item->name }}</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" id="item" name="nums[]" value="{{ $item->num_student }}"
                                        id="numberOfFirstClasse" class="form-control" />
                                </div>
                            </div>
                        @endforeach

                        <div class="row my-2 ">
                            <div class="col-md-1">
                                <label for="numberOfSecondeClasse" class="col-form-label fw-bold">المجموع</label>
                            </div>
                            <div class="col-md-2">
                                <input type="number" id="total" class="form-control" readonly />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-4">تحديث</button>
                    </form>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </main>
@endsection
