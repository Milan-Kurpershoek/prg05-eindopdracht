<x-layout>
    <div class="min-h-screen flex justify-center items-start pt-16 bg-gray-100">
        <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data" class="bg-white text-gray-500 max-w-[340px] w-full mx-4 p-6 text-left text-sm rounded-lg border border-gray-300/60">
            @csrf
            <div>
                <label class="font-medium" for="title">Title</label>
                <input type="text" name="title" id="title" value="{{old('title')}}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('title')"/>
            </div>

            <div>
                <label class="font-medium" for="author">Author</label>
                <input type="text" name="author" id="author" value="{{old('author')}}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('author')"/>
            </div>

            <div>
                <label class="font-medium" for="description">Description</label>
                <input type="text" name="description" id="description" value="{{old('description')}}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('description')"/>
            </div>

            <div>
                <label class="font-medium" for="pages">Pages</label>
                <input type="text" name="pages" id="pages" value="{{old('pages')}}" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('pages')"/>
            </div>

            <div>
                <label class="font-medium" for="genre_id">Genre</label>

                <select name="genre_id" id="genre_id" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                    <option value="" disabled {{old('genre_id') ? '' : 'selected' }}>Choose the genre...</option>

                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}" {{old('genre_id') == $genre->id ? 'selected' : ''}}>{{$genre->name}}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->first('genre_id')"/>
            </div>

            <div>
                <label class="font-medium" for="image">Image</label>
                <input type="file" name="image" id="image" accept="image/*" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3">
                <x-input-error :messages="$errors->first('image')"/>
            </div>

            <div>
                <input type="submit" name="submit" value="Create" class="my-3 bg-indigo-500 py-2 px-5 rounded text-white font-medium">
            </div>
        </form>
    </div>
</x-layout>

