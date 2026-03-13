<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Create Category</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Category Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border rounded p-2">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-black text-white px-4 py-2 rounded">
                Create Category
            </button>
        </form>
    </div>
</x-app-layout>