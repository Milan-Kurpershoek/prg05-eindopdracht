<x-app-layout>
    <p> {{ $book->title }}</p>
    <p>{{ $book->author }}</p>
    <p> {{ $book->description }}</p>
    <p> {{ $book->pages }}</p>
    <p> {{$book->genre->name}}</p>
{{--    <p>{{ $book->genre_id }}</p>--}}





{{--    <h2>Test</h2>--}}
</x-app-layout>
