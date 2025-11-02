<nav class="flex items-center justify-around px-6 md:px-16 lg:px-24 xl:px-32 py-4 border-b border-gray-300 bg-white relative transition-all">

    <div class="flex items-center justify-around w-full">

        <a href="{{route('books.index') }}">
            <img class="h-20" src="https://i.pinimg.com/564x/00/71/09/007109c08fdd0e5f64e1f91d553c52a6.jpg" alt="readingBird">
        </a>

        <div class="hidden sm:flex items-center gap-8">
            @auth
                @if(auth()->user()->canCreateBooks())
                <a href="{{route('books.create') }}" class="cursor-pointer px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full">Add</a>
                @else
                    <p>You need to write {{ 3 - auth()->user()->review()->count() }} more review to add a book</p>
                @endif
            @endauth
            <div class="flex items-center border pl-3 gap-2 bg-white border-gray-500/30 h-[46px] overflow-hidden max-w-md w-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 30 30" fill="#6B7280">
                    <path d="M13 3C7.489 3 3 7.489 3 13s4.489 10 10 10a9.95 9.95 0 0 0 6.322-2.264l5.971 5.971a1 1 0 1 0 1.414-1.414l-5.97-5.97A9.95 9.95 0 0 0 23 13c0-5.511-4.489-10-10-10m0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8"/>
                </svg>
                <form action="{{url('search')}}" method="get">
                    <input type="search" name="search" placeholder="Search for books" class="w-full h-full outline-none text-gray-500 placeholder-gray-500 text-sm">
                    <input hidden type="submit" value="search">
                </form>
            </div>

                <a href="{{ route('login') }}"  class="cursor-pointer px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full">Login</a>

                <a href="{{ route('register') }}"  class="cursor-pointer px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full">Register</a>

                <a href="{{route('admin.page') }}" class="cursor-pointer px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full">Admin</a>
        </div>
    </div>
</nav>
