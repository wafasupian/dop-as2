<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Edit Post</h1>

            <a href="{{ route('posts.index') }}"
               class="text-sm font-semibold text-gray-700 hover:underline">
                ← Back to Manage Posts
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
                <p class="font-semibold text-red-700 mb-2">Please fix the errors below:</p>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('posts.update', $post) }}"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block font-medium mb-1">Title</label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $post->title) }}"
                       class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block font-medium mb-1">Subtitle</label>
                <input type="text"
                       name="subtitle"
                       value="{{ old('subtitle', $post->subtitle) }}"
                       class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                @error('subtitle')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block font-medium mb-1">Category</label>
                <select name="category_id"
                        class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name ?? ('Category '.$cat->id) }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image + Remove/Replace -->
            <div class="border rounded-lg p-4">
                <h2 class="font-semibold mb-3">Post Image</h2>

                @if($post->image)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Current image:</p>
                        <img src="{{ asset('storage/'.$post->image) }}"
                             alt="Post image"
                             class="w-full max-w-md rounded-lg border object-cover">
                    </div>

                    <label class="inline-flex items-center mb-4">
                        <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">Remove current image</span>
                    </label>
                @else
                    <p class="text-sm text-gray-500 mb-4">No image uploaded yet.</p>
                @endif

                <div>
                    <label class="block font-medium mb-1">Replace / Upload New Image (optional)</label>
                    <input type="file"
                           name="image"
                           accept="image/*"
                           class="w-full border rounded p-2 bg-white">
                    <p class="text-xs text-gray-500 mt-1">Allowed: jpg, jpeg, png, webp. Max 2MB.</p>

                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Content -->
            <div>
                <label class="block font-medium mb-1">Content</label>
                <textarea name="text"
                          rows="8"
                          class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-gray-300">{{ old('text', $post->text) }}</textarea>
                @error('text')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-black text-white px-5 py-2 rounded hover:bg-gray-900 transition">
                    Update Post
                </button>

                <a href="{{ route('posts.index') }}"
                   class="px-5 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</x-app-layout>