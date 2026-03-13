<x-app-layout>
    <div class="p-6 max-w-5xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Manage Categories</h1>
            <a href="{{ route('categories.create') }}"
               class="bg-black text-white px-4 py-2 rounded">
                + New Category
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left p-4">Name</th>
                        <th class="text-left p-4">Posts</th>
                        <th class="text-left p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="border-t">
                            <td class="p-4">{{ $category->name }}</td>
                            <td class="p-4">{{ $category->posts_count }}</td>
                            <td class="p-4 flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white rounded">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                      onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>