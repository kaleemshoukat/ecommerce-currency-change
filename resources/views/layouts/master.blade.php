<html>
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('includes.scripts')
    @yield('page-scripts')
</body>
</html>
