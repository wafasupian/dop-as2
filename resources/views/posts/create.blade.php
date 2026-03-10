<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Title</label>
                <input type="text" name="title"
                       value="{{ old('title') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Subtitle</label>
                <input type="text" name="subtitle"
                       value="{{ old('subtitle') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Category</label>
                <select name="category_id" id="category_id" class="w-full rounded-lg border-gray-300" required>
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700">Image (optional)</label>
                <input type="file" name="image" accept="image/*"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Content</label>
                <textarea name="text" rows="6"
                          class="w-full border rounded p-2">{{ old('text') }}</textarea>
            </div>

            <button class="bg-black text-white px-4 py-2 rounded">
                Create Post
            </button>
        </form>

    </div>
</x-app-layout>