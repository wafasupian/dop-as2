<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Title -->
            <div>
                <label class="block font-medium">Title</label>
                <input type="text" name="title"
                       value="{{ old('title') }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Subtitle (CUSTOM FIELD ⭐) -->
            <div>
                <label class="block font-medium">Subtitle</label>
                <input type="text" name="subtitle"
                       value="{{ old('subtitle') }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Category -->
            <div>
                <label class="block font-medium">Category</label>
                <select name="category_id" class="w-full border rounded p-2">
                    <option value="">Select category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">
                            {{ $cat->name ?? ('Category '.$cat->id) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Content -->
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