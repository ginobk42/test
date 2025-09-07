<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page test</title>
</head>
<body>
    @forelse ($t as $test)
        <p>Id : {{ $test->id }}</p>
        <p>Age : {{ $test->age }}</p>
        <p>Description : {{ $test->description }}</p>
        <p>date de naissance : {{ $test->date_de_naissance }}</p>
    @empty
        <p>Aucun test !</p>
    @endforelse
</body>
</html>