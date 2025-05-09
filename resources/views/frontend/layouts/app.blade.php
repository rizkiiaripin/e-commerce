<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('style')
    <title>Document</title>
</head>

<body>
    @include('frontend.layouts.header')
    <x-frontend.slider />
    <x-frontend.product />
    @include('frontend.layouts.bottom-bar')
    @stack('script')
</body>

</html>
