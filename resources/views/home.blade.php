@extends('layouts-blog')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">

    <!-- Page Title -->
    <h1 class="text-2xl font-bold mb-6">Latest Posts</h1>

    <!-- Category Filter -->
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('home') }}"
           class="px-4 py-2 rounded border {{ request('category_id') ? 'bg-gray-100' : 'bg-black text-white' }}">
            All
        </a>

        @foreach($categories as $category)
            <a href="{{ route('home', ['category_id' => $category->id]) }}"
               class="px-4 py-2 rounded border
               {{ request('category_id') == $category->id ? 'bg-black text-white' : 'bg-gray-100' }}">
                {{ $category->name ?? ('Category '.$category->id) }}
            </a>
        @endforeach
    </div>

    <!-- Posts List -->
    <div class="bg-white rounded-xl shadow divide-y">

        @forelse($posts as $post)
            <div class="p-6">

                <!-- Category + Date -->
                <p class="text-sm text-gray-500 mb-1">
                    {{ $post->category?->name ?? 'Uncategorized' }}
                    •
                    {{ $post->created_at->format('d M Y') }}
                </p>

                <!-- Title -->
                <h2 class="text-xl font-bold mb-2">
                    {{ $post->title }}
                </h2>

                <!-- Subtitle (⭐ REQUIRED CUSTOM FIELD) -->
                @if($post->subtitle)
                    <p class="text-gray-600 mb-3">
                        {{ $post->subtitle }}
                    </p>
                @endif

                <!-- Preview Text -->
                <p class="text-gray-700 mb-4">
                    {{ \Illuminate\Support\Str::limit($post->text, 120) }}
                </p>

                <!-- Read More -->
                <a href="{{ route('posts.show', $post) }}"
                   class="text-black font-semibold hover:underline">
                    Read more →
                </a>

            </div>
        @empty
            <div class="p-6 text-center text-gray-500">
                No posts available.
            </div>
        @endforelse

    </div>
</div>
@endsection