@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <a class="btn btn-secondary float-end"
                    href="/teacher/test-analyse/{{ session('sc')->id }}/edit/{{ $branche->id }}/1">تحرير</a>
                <h4>تحليل أسئلة اختبار الفترة الأولى للصف {{ $branche->name }}</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <!-- Start content -->
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
                        <tbody>



                            @foreach ($students as $st)
                                {{-- @dd($st->degree[5]->degree) --}}
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    @foreach ($st->degree as $d)
                                        <td>{{ $d->degree }}</td>
                                    @endforeach



                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot class="table-light">
                            @php
                                $i = 0;
                                $x = '';
                                $x = $i;
                                $x = 'degree.' . $x . '.degree';
                            @endphp
                            <tr>
                                <td class="fw-bold">المجموع</td>
                                @foreach ($questions as $q)
                                    {{-- @dd( 'degree.' + $x+ '.degree' ) --}}
                                    <td class="fw-bold">{{ $students->sum($x) }}</td>
                                    @php
                                        $i++;

                                        $x = $i;
                                        $x = 'degree.' . $x . '.degree';
                                    @endphp
                                @endforeach


                            </tr>
                            <tr>
                                <td class="fw-bold">المتوسط</td>
                                @php
                                    $i = 0;
                                    $x = '';
                                    $x = $i;
                                    $x = 'degree.' . $x . '.degree';
                                @endphp
                                @foreach ($questions as $q)
                                    {{-- @dd( 'degree.' + $x+ '.degree' ) --}}
                                    <td class="fw-bold">{{ $students->sum($x) / $students->count() }}</td>
                                    @php
                                        $i++;

                                        $x = $i;
                                        $x = 'degree.' . $x . '.degree';
                                    @endphp
                                @endforeach

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

                    <!-- End content -->
                </div>
            </div>
        </div>
    </main>
@endsection
