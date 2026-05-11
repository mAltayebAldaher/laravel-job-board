<x-layout :title="$pageTitle" >
    <h1> Comment Exploring (testing)</h1>
    @foreach ($comments as $comment)
    <h2 class="text-2xl"> {{ $comment->content }} </h2>
    <h2> {{ $comment->author }} </h2>
    <h2> {{ $comment->post->title }} </h2>
    @endforeach
    {{ $comments->links() }}
</x-layout>