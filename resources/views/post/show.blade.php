<x-layout :title="$pageTitle">

    <h2 class="text-2xl"> {{ $post->title }} </h2>
    <h2> {{ $post->body }} </h2>
    <h2> {{ $post->author }} </h2>
    
    @foreach ($post->comments as $comment)
    <div class="border border-gray-900/10 p-2 mt-10">
        <h3>{{ $comment->author }}</h3>
        <h3>{{ $comment->content }}</h3>
    </div>
    @endforeach

    <form method="post" action="/comment">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}"/>

        <div class="border border-gray-900/10 p-2 mt-10">

            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="author" class="block text-sm/6 font-medium text-gray-900">Your Name</label>
                    <div class="mt-2">
                        <input id="author" type="text" name="author" autocomplete="given-name"
                            value="{{ old('author') }}"
                            class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                    @error('author')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="content" class="block text-sm/6 font-medium text-gray-900">Your Comment</label>
                    <div class="mt-2">
                        <textarea id="Content" name="content" rows="3"
                            class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            {{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    Comment</button>
                    
            </div>
        </div>


    </form>



</x-layout>