<!DOCTYPE html>
<html lang="ar" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moefr</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400&display=swap" rel="stylesheet" />
</head>


{{ $slot }}

<!-- Start Footer -->
<footer class="footer mt-auto">
    <div class="text-center bg-light py-3">جميع الحقوق محفوظة</div>
    <span id="getFullYear"></span>
</footer>
<!-- End Footer -->

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('js/main.js') }}"></script>
</body>

</html>
