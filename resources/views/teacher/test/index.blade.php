@extends('teacher.layout')
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="my-5 border-bottom pb-3">
                <a class="btn btn-secondary float-end"
                    href="/teacher/test-peroiod/{{ $school_id }}/edit/{{ $section_id }}/{{ $period_id }}">تحرير</a>
                <h4>إإحصائيات اختبار الفترة{{ $period_id }} للصف {{ $name }}</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    <!-- Start content -->
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
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($branches as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->num_student }}</td>
                                    <td>{{ $data[$i]->atteend }}</td>
                                    <td>{{ $data[$i]->disapper }}</td>
                                    <td>{{ $data[$i]->bad }}</td>
                                    <td>{{ $data[$i]->not_bad }}</td>
                                    <td>{{ $data[$i]->mid }}</td>
                                    <td>{{ $data[$i]->good }}</td>
                                    <td>{{ $data[$i]->excelente }}</td>
                                    <td>{{ $data[$i]->success }}</td>
                                    <td>{{ $data[$i]->fail }}</td>
                                    <td>{{ ($data[$i]->success * 100) / $data[$i++]->atteend }}%</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td class="fw-bold">المجموع</td>
                                <td class="fw-bold">{{ $branches->sum('num_student') }}</td>
                                <td class="fw-bold">{{ $data->sum('atteend') }}</td>
                                <td class="fw-bold">{{ $data->sum('disapper') }}</td>
                                <td class="fw-bold">{{ $data->sum('bad') }}</td>
                                <td class="fw-bold">{{ $data->sum('not_bad') }}</td>
                                <td class="fw-bold">{{ $data->sum('mid') }}</td>
                                <td class="fw-bold">{{ $data->sum('good') }}</td>
                                <td class="fw-bold">{{ $data->sum('excelente') }}</td>
                                <td class="fw-bold">{{ $data->sum('success') }}</td>
                                <td class="fw-bold">{{ $data->sum('fail') }}</td>
                                <td class="fw-bold">{{ ($data->sum('success') * 100) / $data->sum('atteend') }} %
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End content -->
                </div>
            </div>
        </div>
    </main>
@endsection
