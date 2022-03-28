@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
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
            <div class="my-5 border-bottom pb-3">

                <h4>تحليل الفترة {{ $period_id }} للصف {{ $name }}</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <!-- Start content -->
                    <form action="/teacher/test-peroiod/{{ $school_id }}/edit/{{ $section_id }}/{{ $period_id }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <table class="table text-center">
                            <thead class="table-light">
                                <tr>
                                    <td class="fw-bold">الصف</td>
                                    <td class="fw-bold">العدد</td>
                                    <td class="fw-bold">الحاضرون</td>
                                    <td class="fw-bold">الغائبون</td>
                                    <td class="fw-bold">28</td>
                                    <td class="fw-bold">28.5 - 39</td>
                                    <td class="fw-bold">39.5 - 50</td>
                                    <td class="fw-bold">50.5 - 55.5</td>
                                    <td class="fw-bold">56</td>
                                    <td class="fw-bold">الناجح</td>
                                    <td class="fw-bold">الراسب</td>
                                    <td class="fw-bold">النسبة</td>
                                </tr>
                            </thead>
                            @foreach ($branches as $item)
                                <tbody>
                                    {{-- @dd($data[0]->bad) --}}
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <input type="number" value="{{ $item->num_student }}"
                                                class="form-control text-center" readonly id="stat-test-1" value="20" />
                                        </td>

                                        <td>
                                            <input type="number" value="{{ $data[$loop->index]->atteend }}"
                                                class="form-control text-center" id="stat-test-1" name="atteend[]"
                                                value="1" />
                                        </td>

                                        <td>
                                            <input type="number" value="{{ $data[$loop->index]->disapper }}"
                                                class="form-control text-center" id="stat-test-1" name="disapper[]"
                                                value="1" />
                                        </td>

                                        <td>
                                            <input type="number" value="{{ $data[$loop->index]->bad }}"
                                                class="form-control text-center" name="bad[]" id="stat-test-1" />
                                        </td>

                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $data[$loop->index]->not_bad }}" name="not_bad[]"
                                                id="stat-test-1" />
                                        </td>

                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $data[$loop->index]->mid }}" name="mid[]" id="stat-test-1" />
                                        </td>

                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $data[$loop->index]->good }}" name="good[]" id="stat-test-1" />
                                        </td>

                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $data[$loop->index]->excelente }}" name="excelente[]"
                                                id="stat-test-1" />
                                        </td>

                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $data[$loop->index]->success }}" name="success[]"
                                                id="stat-test-1" value="17" />
                                        </td>

                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $data[$loop->index]->fail }}" name="fail[]" id="stat-test-1"
                                                value="3" />
                                        </td>

                                        <td>
                                            <input type="text" class="form-control text-center" id="stat-test-1"
                                                value="85.00 %" />
                                        </td>
                                    </tr>
                            @endforeach



                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td class="fw-bold">المجموع</td>
                                    <td class="fw-bold">100</td>
                                    <td class="fw-bold">95</td>
                                    <td class="fw-bold">5</td>
                                    <td class="fw-bold">5</td>
                                    <td class="fw-bold">15</td>
                                    <td class="fw-bold">45</td>
                                    <td class="fw-bold">10</td>
                                    <td class="fw-bold">5</td>
                                    <td class="fw-bold">85</td>
                                    <td class="fw-bold">15</td>
                                    <td class="fw-bold">85.00 %</td>
                                </tr>
                            </tfoot>
                        </table>
                        <button type="submit" class="btn btn-primary my-4">حفظ</button>
                    </form>
                    <!-- End content -->
                </div>
            </div>
        </div>
    </main>
@endsection
