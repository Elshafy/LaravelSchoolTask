@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <h4>تحليل أسئلة اختبار الفترة الأولى للصف الحادي عشر</h4>
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
                    <!-- Start content -->
                    <form id="super-pare"
                        action="/teacher/test-analyse/{{ session('sc')->id }}/edit/{{ $branche->id }}/1" method="post">
                        @method("POST")
                        @csrf
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <td></td>
                                    <td class="fw-bold" colspan="3">السؤال الأول</td>
                                    <td class="fw-bold" colspan="3">السؤال الثاني</td>
                                    <td class="fw-bold" colspan="3">السؤال الثالث</td>
                                    <td class="fw-bold" colspan="4">السؤال الرابع</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">م</td>
                                    @foreach ($questions as $q)
                                        <td class="fw-bold">{{ $q->degree }}</td>
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody id="calc">
                                @foreach ($students as $st)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        @foreach ($st->degree as $d)
                                            <td>
                                                <input type="number" value="{{ $d->degree }}"
                                                    class="form-control form-control-sm text-center"
                                                    id="{{ $loop->index + 1 }}" name="{{ $loop->index + 1 }}[]" />
                                            </td>
                                        @endforeach



                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td class="fw-bold">المجموع</td>
                                    <td id="1-sum" class="fw-bold">{{ $students->sum('degree.0.degree') }}</td>
                                    <td id="2-sum" class="fw-bold">{{ $students->sum('degree.1.degree') }}</td>
                                    <td id="3-sum" class="fw-bold">{{ $students->sum('degree.2.degree') }}</td>
                                    <td id="4-sum" class="fw-bold">{{ $students->sum('degree.3.degree') }}</td>
                                    <td id="5-sum" class="fw-bold">{{ $students->sum('degree.4.degree') }}</td>
                                    <td id="6-sum" class="fw-bold">{{ $students->sum('degree.5.degree') }}</td>
                                    <td id="7-sum" class="fw-bold">{{ $students->sum('degree.6.degree') }}</td>
                                    <td id="8-sum" class="fw-bold">{{ $students->sum('degree.7.degree') }}</td>
                                    <td id="9-sum" class="fw-bold">{{ $students->sum('degree.8.degree') }}</td>
                                    <td id="10-sum" class="fw-bold">{{ $students->sum('degree.9.degree') }}</td>
                                    <td id="11-sum" class="fw-bold">{{ $students->sum('degree.10.degree') }}</td>
                                    <td id="12-sum" class="fw-bold">{{ $students->sum('degree.11.degree') }}</td>
                                    <td id="13-sum" class="fw-bold">{{ $students->sum('degree.12.degree') }}</td>
                                </tr>
                                <tr>
                                    @php
                                        $count_student = $students->count();
                                    @endphp
                                    <td data-count="{{ $count_student }}" id="avg" class="fw-bold">المتوسط</td>
                                    <td id="1-avg" class="fw-bold">
                                        {{ $students->sum('degree.0.degree') / $count_student }}</td>
                                    <td id="2-avg" class="fw-bold">
                                        {{ $students->sum('degree.1.degree') / $count_student }}</td>
                                    <td id="3-avg" class="fw-bold">
                                        {{ $students->sum('degree.2.degree') / $count_student }}</td>
                                    <td id="4-avg" class="fw-bold">
                                        {{ $students->sum('degree.3.degree') / $count_student }}</td>
                                    <td id="5-avg" class="fw-bold">
                                        {{ $students->sum('degree.4.degree') / $count_student }}</td>
                                    <td id="6-avg" class="fw-bold">
                                        {{ $students->sum('degree.5.degree') / $count_student }}</td>
                                    <td id="7-avg" class="fw-bold">
                                        {{ $students->sum('degree.6.degree') / $count_student }}</td>
                                    <td id="8-avg" class="fw-bold">
                                        {{ $students->sum('degree.7.degree') / $count_student }}</td>
                                    <td id="9-avg" class="fw-bold">
                                        {{ $students->sum('degree.8.degree') / $count_student }}</td>
                                    <td id="10-avg" class="fw-bold">
                                        {{ $students->sum('degree.9.degree') / $count_student }}</td>
                                    <td id="11-avg" class="fw-bold">
                                        {{ $students->sum('degree.10.degree') / $count_student }}</td>
                                    <td id="12-avg" class="fw-bold">
                                        {{ $students->sum('degree.11.degree') / $count_student }}</td>
                                    <td id="13-avg" class="fw-bold">
                                        {{ $students->sum('degree.12.degree') / $count_student }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">النسبة</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                    <td class="fw-bold">100 %</td>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn btn-primary my-4" type="submit">حفظ</button>
                    </form>
                    <!-- End content -->
                </div>
            </div>
        </div>
    </main>
@endsection
