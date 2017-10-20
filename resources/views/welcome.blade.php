<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        @foreach ($tasks as $task)
        <h1>{{ $task->body }}</h1>
        @endforeach
    </body>
</html>