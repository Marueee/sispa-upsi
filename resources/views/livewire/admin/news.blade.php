<div class="max-w-7xl mx-auto p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">{{ $isEdit ? 'Edit News' : 'Create News Article' }}</h1>
    </div>

    <!-- News Form -->
    <div class="shadow-lg rounded-xl p-8 mb-10 max-w-4xl mx-auto">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold">Title</label>
                <input type="text" id="title" wire:model="title"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:border-indigo-500"
                    placeholder="Enter news title">
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-semibold">Content</label>
                <textarea id="content" wire:model="content" rows="5"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Write your content here..."></textarea>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold">Status</label>
                <select id="status" wire:model="status"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-semibold">Featured Image</label>
                <input type="file" id="image" wire:model="image"
                    class="mt-1 w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-indigo-700 file:text-indigo-700 dark:file:text-indigo-100 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-600">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium">
                    {{ $isEdit ? 'Update News' : 'Create News' }}
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

    <!-- News List -->
    <div class="mx-auto max-w-10xl">
        <h2 class="text-2xl font-bold mb-4 text-center">All News</h2>
        <div class="shadow overflow-hidden border-b border-gray-300 dark:border-gray-600 rounded-lg">
            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                    @foreach($news_items as $item)
                        <tr>
                            <td class="px-6 py-4">{{ $item->title }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $item->status === 'published' ? 'bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200' : 'bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <button wire:click="edit({{ $item->id }})"
                                    class="text-indigo-600 dark:text-indigo-400 hover:underline">Edit</button>
                                <button wire:click="delete({{ $item->id }})"
                                    class="text-red-600 dark:text-red-400 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
