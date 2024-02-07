
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">

</head>
<body class="pace-done theme-gray-600">

@yield('content')


<script src="{{ asset('assets/js/vendor.min.js') }}" type="c68007c239676529a12e25a6-text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js') }}" type="c68007c239676529a12e25a6-text/javascript"></script>

<script src="{{ asset('assets/js/loader.js') }}" data-cf-settings="c68007c239676529a12e25a6-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"84e878f7dc860109","r":1,"version":"2024.1.0","token":"4db8c6ef997743fda032d4f73cfeff63"}' crossorigin="anonymous"></script>
@include('sweetalert::alert')

</body>
</html>
