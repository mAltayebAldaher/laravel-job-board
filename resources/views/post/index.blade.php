<x-layout :title="$pageTitle" >
    <h1> this is blog</h1>
    @foreach ($posts as $post)
    <h2 class="text-2xl"> {{ $post->title }} </h2>
    <h2> {{ $post->body }} </h2>
    <h2> {{ $post->author }} </h2>
    @endforeach
    {{ $posts->links() }}
</x-layout>