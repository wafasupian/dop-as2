@extends('layouts-blog')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">Latest Posts</h1>
            <p class="text-gray-600 mt-1">Discover new stories, updates, and articles.</p>
        </div>

        <!-- Optional small hint -->
        <div class="text-sm text-gray-500">
            Showing: <span class="font-semibold text-gray-700">
                {{ request('category_id') ? 'Filtered' : 'All posts' }}
            </span>
        </div>
    </div>

    <!-- Category Filter -->
    <div class="flex flex-wrap gap-2 mb-10">
        <a href="{{ route('home') }}"
           class="px-4 py-2 rounded-full border text-sm font-medium transition
           {{ request('category_id') ? 'bg-white text-gray-700 hover:bg-gray-50' : 'bg-gray-900 text-white' }}">
            All
        </a>

        @foreach($categories as $category)
            <a href="{{ route('home', ['category_id' => $category->id]) }}"
               class="px-4 py-2 rounded-full border text-sm font-medium transition
               {{ request('category_id') == $category->id ? 'bg-gray-900 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                {{ $category->name ?? ('Category '.$category->id) }}
            </a>
        @endforeach
    </div>

    <!-- Posts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($posts as $post)
            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                <div class="p-6">

                    <!-- Meta -->
                    <div class="flex items-center justify-between gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                     bg-gray-100 text-gray-700">
                            {{ $post->category?->name ?? 'Uncategorized' }}
                        </span>

                        <span class="text-xs text-gray-500">
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h2 class="mt-4 text-xl font-bold text-gray-900 leading-snug">
                        {{ $post->title }}
                    </h2>

                    <!-- Subtitle -->
                    @if($post->subtitle)
                        <p class="mt-2 text-gray-600 font-medium">
                            {{ $post->subtitle }}
                        </p>
                    @endif

                    <!-- Excerpt -->
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->text), 160) }}
                    </p>

                    <!-- Actions -->
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
                No posts available.
            </div>
        @endforelse
    </div>

</div>
@endsection