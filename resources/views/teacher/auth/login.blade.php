@extends('teacher.layout')
@section('content')

    <body dir="rtl" class="d-flex flex-column h-100">
        <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">الشعار</a>
            </div>
        </nav>
        <!-- End Navbar -->
        <main class="flex-shrink-0">
            <div class="container">
                <div class="row my-5 justify-content-center">
                    <div class="col-md-4">
                        <form action="/teacher/login" method="POST">
                            @method('POST')
                            @csrf
                            <h4 class="text-center my-5">تسجيل الدخول</h4>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">اسم المستخدم</label>
                                <input type="text" class="form-control" name="name" id="username"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-2"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
                                <input type="text" name="idnum" class="form-control" id="exampleInputPassword1" />
                                @error('tele')
                                    <p class="text-red-500 text-xs mt-2"> {{ $message }} </p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                تسجيل الدخول
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    @endsection
