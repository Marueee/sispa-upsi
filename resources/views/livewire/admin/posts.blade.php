<div class="max-w-7xl mx-auto p-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">{{ $isEdit ? 'Edit Post' : 'Create New Post' }}</h1>
    </div>

    <!-- Post Form -->
    <div class=" shadow-lg rounded-xl p-8 mb-10 max-w-4xl mx-auto" >
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-6">

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold">Title</label>
                <input type="text" id="title" wire:model="title"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:border-indigo-500"
                    placeholder="Enter post title">
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-semibold ">Content</label>
                <textarea id="content" wire:model="content" rows="5"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Write your content here..."></textarea>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold ">Status</label>
                <select id="status" wire:model="status"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Featured Image -->
            <div>
                <label for="image" class="block text-sm font-semibold">Featured Image</label>
                <input type="file" id="image" wire:model="image"
                    class="mt-1 w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-indigo-700 file:text-indigo-700 dark:file:text-indigo-100 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-600" />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700  text-sm font-medium transition-colors duration-150 ease-in-out shadow-sm hover:shadow-md  dark:focus:ring-offset-gray-800 dark:hover:bg-indigo-500">
                    <span>{{ $isEdit ? 'Update Post' : 'Create Post' }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

        </form>
    </div>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-lg mb-6 max-w-4xl mx-auto">
            {{ session('message') }}
        </div>
    @endif

    <!-- All Posts -->
    <div class="mx-auto max-w-10xl">
        <h2 class="text-2xl font-bold mb-4 text-center">All Posts</h2>

        <div class="shadow overflow-hidden border-b border-gray-300 dark:border-gray-600 rounded-lg">
            <table class="min-w-full w-full divide-y divide-gray-300 dark:divide-gray-600 border border-gray-300 dark:border-gray-600">
                <thead class=" border-gray-400 dark:border-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Title</th>
                        <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class=" border-gray-400 dark:border-gray-700 ">
                    @foreach($posts as $post)
                        <tr>
                            <td class="px-6 py-4 text-center border-b  border-gray-400 dark:border-gray-700">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-center border-b">
                                <span class="px-3 py-1 inline-flex text-center leading-5 font-semibold rounded-full
                                    {{ $post->status === 'published' ? 'bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200' : 'bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200' }}">
                                    {{ ucfirst($post->status) }}
                            </span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-3 border-b border-gray-400 dark:border-gray-700">
                                <button wire:click="edit({{ $post->id }})"
                                    class="text-indigo-600 dark:text-indigo-400 hover:underline">Edit</button>
                                <button wire:click="delete({{ $post->id }})"
                                    class="text-red-600 dark:text-red-400 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
