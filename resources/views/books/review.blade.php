<x-layout>
    <div class="min-h-screen flex justify-center items-start pt-16 bg-gray-100">
        <form action="{{route('store.review')}}" method="post" class="bg-white text-gray-500 max-w-[340px] w-full mx-4 p-6 text-left text-sm rounded-lg border border-gray-300/60">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">

            <label class="font-medium" for="opinion">Your review</label>
            <textarea rows="3" id="opinion" name="opinion" class="w-full resize-none border mt-1.5 border-gray-500/30 outline-none rounded py-2.5 px-3" placeholder="Write your review"></textarea>
            <div class="flex items-center justify-between">
                <button type="submit" class="my-3 bg-indigo-500 py-2 px-5 rounded text-white font-medium">Post</button>
            </div>
        </form>
    </div>
</x-layout>
