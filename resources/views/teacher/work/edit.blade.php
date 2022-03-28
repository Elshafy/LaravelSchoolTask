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

                <h4>إحصائيات أعمال الفترة {{ $period_id }} للصف {{ $name }}</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <!-- Start content -->
                    <form id="super-pare"
                        action="/teacher/work-peroiod/{{ $school_id }}/edit/{{ $section_id }}/{{ $period_id }}"
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
                                    <td class="fw-bold">الناجحون</td>
                                    <td class="fw-bold">الراسبون</td>
                                    <td class="fw-bold">النسبة</td>
                                </tr>
                            </thead>

                            <tbody id="calc">

                                @foreach ($branches as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <input type="number" class="form-control text-center"
                                                value="{{ $item->num_student }}" readonly id="num" value="20" />
                                        </td>
                                        <td>
                                            <input type="number" value="{{ $data[$loop->index]->atteend }}"
                                                class="form-control text-center" data-sub="dissapper" name='atteend[]'
                                                id="atteend" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control text-center" readonly
                                                value="{{ $data[$loop->index]->disapper }}" id="dissapper"
                                                name='dissapper[]' id="stat1" value="5" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control text-center" data-sub="fail"
                                                id="success" name='success[]' id="stat1"
                                                value="{{ $data[$loop->index]->success }}" />
                                        </td>
                                        <td>
                                            <input type="number" value="{{ $data[$loop->index]->fail }}" id="fail"
                                                readonly name='fail[]' class="form-control text-center" id="stat1"
                                                value="5" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-center" id="ratio" readonly
                                                value="{{ ($data[$loop->index]->success * 100) / $item->num_student }} %" />
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                            <tfoot class="table-light">

                                <tr>
                                    <td class="fw-bold">المجموع</td>
                                    <td id="sum" class="fw-bold">{{ $branches->sum('num_student') }}</td>
                                    <td id="atteend-sum" class="fw-bold">{{ $data->sum('atteend') }}</td>
                                    <td id="dissapper-sum" class="fw-bold">{{ $data->sum('disapper') }}</td>
                                    <td id="success-sum" class="fw-bold">{{ $data->sum('success') }}</td>
                                    <td id="fail-sum" class="fw-bold">{{ $data->sum('fail') }}</td>
                                    <td class="fw-bold" id="ratio-sum">
                                        {{ ($data->sum('success') * 100) / $branches->sum('num_student') }} %
                                    </td>
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
