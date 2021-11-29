<!DOCTYPE html>
<html lang="en">
<head>
    @include('aesthetic.head')
</head>
<body>
    @include('aesthetic.header')
    @yield('content')
    @include('aesthetic.footer')
    @include('aesthetic.script')
</body>
</html>