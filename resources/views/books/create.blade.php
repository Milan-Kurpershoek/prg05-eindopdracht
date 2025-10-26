<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
<form action="{{route('books.store')}}" method="post">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{old('title')}}">
{{--            @error('title')--}}
{{--            <div class="alert alert-danger>{{$message}}"></div>--}}
{{--            @enderror--}}
        <x-input-error :messages="$errors->first('title')"/>
    </div>

    <div>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" value="{{old('author')}}">
        <x-input-error :messages="$errors->first('author')"/>
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{old('description')}}">
        <x-input-error :messages="$errors->first('description')"/>
    </div>

    <div>
        <label for="pages">Pages</label>
        <input type="text" name="pages" id="pages" value="{{old('pages')}}">
        <x-input-error :messages="$errors->first('pages')"/>
    </div>

    <div>
        <label for="genre_id">Genre</label>

        <select name="genre_id" id="genre_id">
            <option value="" disabled {{old('genre_id') ? '' : 'selected' }}>Choose the genre...</option>

            @foreach($genres as $genre)
                <option value="{{$genre->id}}" {{old('genre_id') == $genre->id ? 'selected' : ''}}>{{$genre->name}}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->first('genre_id')"/>
    </div>

    <div>
        <input type="submit" name="submit" value="Create">
    </div>
</form>
</body>
</html>
{{--<x-app-layout>--}}
{{--    <form action="{{route('books.store')}}" method="post">--}}
{{--        @csrf--}}
{{--        <div>--}}
{{--            <label for="title">Title</label>--}}
{{--            <input type="text" name="title" id="title">--}}
{{--            @error('title')--}}
{{--            <div class="alert alert-danger>{{$message}}"></div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label for="title">Description</label>--}}
{{--            <input type="text" name="description" id="description" value="{{old('description')}}">--}}
{{--            @error('title')--}}
{{--            <div class="alert alert-danger>{{$message}}"></div>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <select name="genre_id" id="genre_id">--}}
{{--                @foreach($genres as $genre)--}}
{{--                    <option value="{{$genre->id}}">{{$genre->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <input type="submit" name="submit" value="Create">--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-app-layout>--}}
