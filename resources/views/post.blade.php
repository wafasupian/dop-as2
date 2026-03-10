@extends('layouts-blog')

@section('content')
<main class="container mx-auto mt-6 flex justify-center">
    <section class="w-3/5 bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 alt="{{ $post->title }}"
                 class="w-full object-cover rounded mb-4">
        @endif

        <p class="text-gray-600 mb-4">
            Published on <span class="font-semibold">{{ $post->created_at->format('F j, Y') }}</span>
        </p>

        @if($post->subtitle)
            <p class="text-lg text-gray-700 mb-4">{{ $post->subtitle }}</p>
        @endif

        <div class="text-gray-800 space-y-4">
            <p>{{ $post->text }}</p>
        </div>
    </section>
</main>
@endsection