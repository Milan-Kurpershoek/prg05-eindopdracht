<x-layout>
    <div class="min-h-screen flex justify-center items-start pt-16 bg-gray-100" >
        <form action="{{route('books.update', $book)}}" method="post" class="bg-white text-gray-500 max-w-[340px] w-full mx-4 p-6 text-left text-sm rounded-lg border border-gray-300/60">
            @csrf
            @method('PATCH')
            <div>
                <label class="font-medium" for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $book->title }}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('title')"/>
            </div>

            <div>
                <label class="font-medium" for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ $book->author }}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('author')"/>
            </div>

            <div>
                <label class="font-medium" for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ $book->description }}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('description')"/>
            </div>

            <div>
                <label class="font-medium" for="pages">Pages</label>
                <input type="text" name="pages" id="pages" value="{{ $book->pages }}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('pages')"/>
            </div>

            <div>
                <label class="font-medium" for="genre_id">Genre</label>

                <select name="genre_id" id="genre_id" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}" {{$book->genre_id == $genre->id ? 'selected': ''}}>{{$genre->name}}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->first('genre_id')"/>
            </div>

            <div>
                <input type="submit" name="submit" value="Update" class="my-3 bg-indigo-500 py-2 px-5 rounded text-white font-medium">
            </div>
        </form>
        <form action="{{route('books.destroy', $book->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="my-3 bg-indigo-500 py-2 px-5 rounded text-white font-medium">Delete Book</button >
        </form>
    </div>
</x-layout>
