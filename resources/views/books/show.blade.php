{{--<x-app-layout>--}}
{{--    <p> {{ $book->title }}</p>--}}
{{--    <p>{{ $book->author }}</p>--}}
{{--    <p> {{ $book->description }}</p>--}}
{{--    <p> {{ $book->pages }}</p>--}}
{{--    <p> {{$book->genre->name}}</p>--}}
{{--    <p>{{ $book->genre_id }}</p>--}}





{{--    <h2>Test</h2>--}}
{{--</x-app-layout>--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
<p> {{ $book->title }}</p>
<p>{{ $book->author }}</p>
<p> {{ $book->description }}</p>
<p> {{ $book->pages }}</p>
<p> {{$book->genre->name}}</p>
<p> {{$book->user_id}}</p>

@can('edit-book', $book)
<a href="{{ route('books.edit', $book->id) }}">Edit</a>
@endcan

</body>
</html>
