<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{config('app.name')}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
">
</head>

<body>
    <div class="container">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Errors</strong>
            <ul>
            @foreach($errors->all() as $error)

            <li>{{$error}}</li>

            @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </div>
</body>

</html>