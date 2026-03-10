@extends('layouts-blog')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900">{{ $category->name }}</h1>
        <p class="text-gray-600 mt-1">Posts under this category.</p>
    </div>

    <div class="mb-6">
        <a href="{{ route('home') }}"
           class="px-4 py-2 rounded-full border text-sm font-medium transition bg-white text-gray-700 hover:bg-gray-50">
            ← Back to All Posts
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($posts as $post)
            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-56 object-cover">
                @endif

                <div class="p-6">
                    <div class="flex items-center justify-between gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                            {{ $category->name }}
                        </span>

                        <span class="text-xs text-gray-500">
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h2 class="mt-4 text-xl font-bold text-gray-900 leading-snug">
                        {{ $post->title }}
                    </h2>

                    @if($post->subtitle)
                        <p class="mt-2 text-gray-600 font-medium">
                            {{ $post->subtitle }}
                        </p>
                    @endif

                    <p class="mt-4 text-gray-700 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->text), 160) }}
                    </p>

                    <div class="mt-6 flex items-center justify-between">
                        <a href="{{ route('posts.show', $post) }}"
                           class="inline-flex items-center gap-2 text-sm font-semibold text-gray-900 hover:underline">
                            Read more
                            <span aria-hidden="true">→</span>
                        </a>

                        <a href="{{ route('posts.show', $post) }}"
                           class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-black transition">
                            View Post
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full bg-white rounded-xl border p-8 text-center text-gray-600">
                No posts found in this category.
            </div>
        @endforelse
    </div>

</div>
@endsection