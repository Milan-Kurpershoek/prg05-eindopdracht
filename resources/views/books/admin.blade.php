<x-layout>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100 whitespace-nowrap">
            <tr>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Book
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    User
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                   Created at
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Updated at
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Status
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Actions
                </th>
                <th class="p-4 text-left text-[13px] font-semibold text-slate-900">
                    Toggle
                </th>
            </tr>
            </thead>

            @foreach($books as $book)
                <tbody class="whitespace-nowrap">
                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-[15px] text-slate-900 font-medium">
                        {{ $book->title}}
                    </td>
                    <td class="p-4 text-[15px] text-slate-600 font-medium">
                        {{ $book->user->name}}
                    </td>
                    <td class="p-4 text-[15px] text-slate-600 font-medium">
                        <p> {{$book->created_at}}</p>
                    </td>
                    <td class="p-4 text-[15px] text-slate-600 font-medium">
                        <p> {{$book->updated_at}}</p>
                    </td>
                    <td class="p-4 text-[15px] text-slate-600 font-medium">
                        <p> {{$book->status}}</p>
                    </td>
                    <td class="px-4 py-4 text-sm">
                        <a href="{{ route('books.edit', $book->id) }}" class="cursor-pointer text-green-600 font-medium mr-4">
                            Edit
                        </a>
                        <form action="{{route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="cursor-pointer text-red-600 font-medium">Delete</button >
                        </form>
{{--                        <button class="cursor-pointer text-green-600 font-medium mr-4">Edit</button>--}}
{{--                        <button class="cursor-pointer text-red-600 font-medium">Delete</button>--}}
                    </td>
                    <td class="px-4 py-4 text-sm">
                        <form action="{{route('books.status', $book)}}" method="post">
                            @csrf
                            @method('PATCH')

                            @if($book->status === 0)
                            <button class="text-green-600" type="submit">Activate</button>

                            @elseif($book->status === 1)
                            <button class="text-red-600" type="submit">Deactivate</button>

                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-layout>
