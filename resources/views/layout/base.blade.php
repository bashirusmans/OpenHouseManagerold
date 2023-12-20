<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Attendance Recorder</title>
</head>
<body class="dark" style="height: 100%">
    <script>
        var teacherurl = "{{ url('/teacher') }}";
    </script>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Attendance Recorder</a>
            <div class="d-flex">
                <div class="mt-1 mx-1">
                    @if (Auth::check())
                        <label>
                            <a href="{{ url('/logout') }}" class="login-btn btn btn-outline-danger">Logout</a>
                        </label>
                    @else
                        <label>
                            <a href="{{ url('/login') }}" class="login-btn btn btn-outline-danger">Login</a>
                        </label>
                    @endif
                    
                </div>
            </div>
        </div>
    </nav>
    <div style="height: 100%">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>