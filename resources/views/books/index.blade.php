<x-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <h1 class="text-3xl font-semibold text-center mx-auto pt-3.5 ">Digi-Shelf</h1>
    <p class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto">A place to share your book collection with people all across the world!</p>
    <form class="text-sm text-slate-500 text-center mt-2 max-w-lg mx-auto" action="{{url('filter')}}" method="get">
        <select name="genre_id" id="genre_id" onchange="this.form.submit()">
            <option value="">Filter for genre...</option>
            @foreach($genres as $genre)
                <option value="{{$genre->id}}" {{request('genre_id') == $genre->id ? 'selected' : ''}}>{{$genre->name}}</option>
            @endforeach
        </select>
    </form>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-5xl mx-auto mt-12">
        @foreach($books as $book)
            @if($book->status !== 0)
                <div class="relative group rounded-lg overflow-hidden">
                    <div class="aspect-[2/3] w-full overflow-hidden">
                        <img src="{{asset('storage/' . $book->image)}}" alt=""{{$book->title}}"" class="w-full h-full object-cover" />
                    </div>
                    <div class="absolute inset-0 flex flex-col justify-end p-4 text-white bg-black/50 opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <h1 class="text-xl font-bold">{{ $book->title }}</h1>
                        <p class="text-lg font-medium">{{ $book->author }}</p>
                        <a href="{{ route('books.show', $book->id) }}" class="flex items-center gap-1 text-sm text-white/70">
                            Show details
                            <svg width="16" height="16" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.125 1.625H11.375V4.875" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.41602 7.58333L11.3743 1.625" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.75 7.04167V10.2917C9.75 10.579 9.63586 10.8545 9.4327 11.0577C9.22953 11.2609 8.95398 11.375 8.66667 11.375H2.70833C2.42102 11.375 2.14547 11.2609 1.9423 11.0577C1.73914 10.8545 1.625 10.579 1.625 10.2917V4.33333C1.625 4.04602 1.73914 3.77047 1.9423 3.5673C2.14547 3.36414 2.42102 3.25 2.70833 3.25H5.95833" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>


{{--        <form action="{{url('search')}}" method="get">--}}
{{--        <input type="search" name = "search">--}}
{{--        <input type="submit" value="search">--}}
{{--    </form>--}}

{{--    <form action="{{url('filter')}}" method="get">--}}
{{--        <select name="genre_id" id="genre_id" onchange="this.form.submit()">--}}
{{--            <option value="">Choose the genre...</option>--}}

{{--            @foreach($genres as $genre)--}}
{{--                <option value="{{$genre->id}}" {{request('genre_id') == $genre->id ? 'selected' : ''}}>{{$genre->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </form>--}}

{{--    @foreach($books as $book)--}}
{{--        @if($book->status === 0)--}}

{{--        @else--}}
{{--        <p> {{ $book->title }}</p>--}}
{{--        <p> {{$book->genre->name}}</p>--}}
{{--        <a href="{{ route('books.show', $book->id) }}">Details</a>--}}
{{--        @endif--}}
{{--    @endforeach--}}
</x-layout>
