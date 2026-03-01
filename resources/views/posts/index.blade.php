<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manage Posts</h1>

            <a href="{{ route('posts.create') }}"
               class="bg-black text-white px-4 py-2 rounded hover:opacity-90">
                + New Post
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr class="text-left">
                        <th class="p-3">Title</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($posts as $post)
                        <tr class="border-t">
                            <td class="p-3 font-medium">
                                {{ $post->title }}
                            </td>

                            <td class="p-3">
                                {{ $post->category?->name ?? '—' }}
                            </td>

                            <td class="p-3 flex gap-2">
                                <a href="{{ route('posts.edit', $post) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded text-sm">
                                    Edit
                                </a>

                                <form action="{{ route('posts.destroy', $post) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-600 text-white rounded text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">
                                No posts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>