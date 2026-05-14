<x-layout :title="$pageTitle" >
    <h1> Comment Exploring (testing)</h1>
    @foreach ($comment->toArray() as $key => $value)

    @if(is_array($value))
        <pre>{{ print_r($value, true) }}</pre>
    @else
        <h2>{{ $key }} : {{ $value }}</h2>
    @endif
    @endforeach
</x-layout>