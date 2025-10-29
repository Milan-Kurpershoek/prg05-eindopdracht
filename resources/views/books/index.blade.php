
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
{{--<x-layout>--}}

{{--</x-layout>--}}
{{--@include('layouts.navigation')--}}

<form action="{{url('search')}}" method="get">
    <input type="search" name = "search">
    <input type="submit" value="search">
</form>

<form action="{{url('filter')}}" method="get">
    <select name="genre_id" id="genre_id" onchange="this.form.submit()">
        <option value="">Choose the genre...</option>

        @foreach($genres as $genre)
            <option value="{{$genre->id}}" {{request('genre_id') == $genre->id ? 'selected' : ''}}>{{$genre->name}}</option>
        @endforeach
    </select>
</form>

@foreach($books as $book)
    <p> {{ $book->title }}</p>
    <p> {{$book->genre->name}}</p>
    <a href="{{ route('books.show', $book->id) }}">Details</a>
@endforeach

</body>
</html>

