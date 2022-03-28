 <body dir="rtl" class="d-flex flex-column h-100">
     <!-- Start Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
             <a class="navbar-brand" href="/teacher/index">الشعار</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link" href="/teacher/index">البيانات الأساسية</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="/teacher/school-teacher/{{ session('sc')->id }}/index">الهيئة
                             التعليمية</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="/teacher/assign-teacher/{{ session('sc')->id }}/index">إسناد
                             المعلمين</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             أعداد الطلاب
                         </a>
                         </a>
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             @foreach (session('sc')->section as $section)
                                 <li>
                                     <a class="dropdown-item"
                                         href="/teacher/assign-num-student/{{ session('sc')->id }}/index/{{ $section->id }}">{{ $section->name }}</a>
                                 </li>
                             @endforeach

                         </ul>
                     </li>

                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             الإحصائيات
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             @foreach (session('sc')->section as $section)
                                 <li class="dropdown-submenu dropend">
                                     <a class="dropdown-item dropdown-toggle" href="#">الصف {{ $section->name }}</a>
                                     <ul class="dropdown-menu">
                                         <li class="dropdown-submenu dropend">
                                             <a class="dropdown-item dropdown-toggle" href="#">الفترة الأولى</a>
                                             <ul class="dropdown-menu">
                                                 <li>
                                                     <a class="dropdown-item"
                                                         href="/teacher/work-peroiod/{{ session('sc')->id }}/index/{{ $section->id }}/1">أعمال</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item"
                                                         href="/teacher/test-peroiod/{{ session('sc')->id }}/index/{{ $section->id }}/1">اختبار</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item" href="final-periode1-11.html">نهاية
                                                         الفترة</a>
                                                 </li>
                                             </ul>
                                         </li>
                                         <li class="dropdown-submenu dropend">
                                             <a class="dropdown-item dropdown-toggle" href="#">الفترة الثانية</a>
                                             <ul class="dropdown-menu">
                                                 <li>
                                                     <a class="dropdown-item" href="#">أعمال</a>
                                                 </li>
                                                 <li>
                                                     {{-- /teacher/test-peroiod/{{ session('sc')->id }}/index/{{ $section->id }}/2 --}}
                                                     <a class="dropdown-item" href="">اختبار</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item" href="#">نهاية الفترة</a>
                                                 </li>
                                             </ul>
                                         </li>
                                         <li class="dropdown-submenu dropend">
                                             <a class="dropdown-item dropdown-toggle" href="#">نهاية العام</a>
                                             <ul class="dropdown-menu">
                                                 <li>
                                                     <a class="dropdown-item"
                                                         href="/teacher/work-peroiod/{{ session('sc')->id }}/index/{{ $section->id }}/3">أعمال</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item" href="#">اختبار</a>
                                                 </li>
                                                 <li>
                                                     <a class="dropdown-item" href="#">نهاية العام</a>
                                                 </li>
                                             </ul>
                                         </li>
                                     </ul>
                                 </li>
                             @endforeach



                         </ul>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                             data-bs-toggle="dropdown" aria-expanded="false">
                             الاختبار
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             @foreach (session('sc')->section as $section)
                                 <li class="dropdown-submenu dropend">
                                     <a class="dropdown-item dropdown-toggle" href="#">الصف {{ $section->name }}</a>
                                     <ul class="dropdown-menu">

                                         @foreach ($section->branch as $b)
                                             <li class="dropdown-submenu dropend">
                                                 <a class="dropdown-item dropdown-toggle"
                                                     href="#">{{ $b->name }}</a>
                                                 <ul class="dropdown-menu">
                                                     <li>
                                                         <a class="dropdown-item"
                                                             href="/teacher/test-analyse/{{ session('sc')->id }}/index/{{ $b->id }}/1">الفترة
                                                             الاولى</a>
                                                     </li>
                                                     <li>
                                                         <a class="dropdown-item" href="">الفترة
                                                             الثانية </a>
                                                     </li>

                                                 </ul>
                                             </li>
                                         @endforeach


                                     </ul>
                                 </li>
                             @endforeach



                         </ul>
                     </li>


                 </ul>
                 <a class="navbar-text nav-link" onclick="document.querySelector('#logout-form').submit()"
                     href="#">تسجيل خروج</a>
                 <form id="logout-form" method="POST" action="/teacher/logout" class="hidden">
                     @csrf
                 </form>
             </div>
         </div>
     </nav>
     <!-- End Navbar -->
