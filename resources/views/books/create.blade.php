<x-app-layout>
    <form action="{{route('books.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            @error('title')
            <div class="alert alert-danger>{{$message}}"></div>
            @enderror
        </div>

        <div>
            <label for="title">Description</label>
            <input type="text" name="description" id="description" value="{{old('description')}}">
            @error('title')
            <div class="alert alert-danger>{{$message}}"></div>
            @enderror
        </div>

        <div>
            <select name="genre_id" id="genre_id">
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="submit" name="submit" value="Create">
        </div>
    </form>
</x-app-layout>
