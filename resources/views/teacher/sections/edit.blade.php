@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <h4>إسناد المعلمين للصفوف</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <form action="/teacher/assign-teacher/{{ $school_id }}" method="post">
                        @csrf
                        @method('POST')
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
                                        <td>
                                            <select class="form-select" name="teacher[]"
                                                aria-label="Default select example">
                                                @foreach ($teachers as $teacher)
                                                    <option @if ($teacher->id == $item->teacher_id) selected @endif
                                                        value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                @endforeach


                                            </select>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary my-4">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
