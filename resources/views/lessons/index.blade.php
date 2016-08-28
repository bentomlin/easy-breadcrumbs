<html>
<head>
    <title>Easy Breadcrumbs</title>
    <style type="text/css">
        .active {
            font-weight:bold;
        }
</head>
<body>

    @include('partials.breadcrumbs')

    @foreach($lessons as $lesson)
        <li>{{ $lesson-title }} - {{ $lesson->duration }}</li>
    @endforeach
</body>
</html>