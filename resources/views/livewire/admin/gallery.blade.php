
<div class="max-w-7xl mx-auto p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">{{ $isEdit ? 'Edit Gallery Item' : 'Create Gallery Item' }}</h1>
    </div>

    <div class="shadow-lg rounded-xl p-8 mb-10 max-w-4xl mx-auto">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-semibold">Title</label>
                <input type="text" id="title" wire:model="title"
                       class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 focus:border-indigo-500"
                       placeholder="Enter title">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold">Description</label>
                <textarea id="description" wire:model="description" rows="4"
                          class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 focus:border-indigo-500"
                          placeholder="Enter description"></textarea>
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold">Status</label>
                <select id="status" wire:model="status"
                        class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 bg-gray-50 focus:border-indigo-500">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold">Image</label>
                <input type="file" id="image" wire:model="image"
                       class="mt-1 w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium">
                    {{ $isEdit ? 'Update Item' : 'Create Item' }}
                </button>
            </div>
        </form>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-6 max-w-4xl mx-auto">
            {{ session('message') }}
        </div>
    @endif

    <div class="mx-auto max-w-10xl">
        <h2 class="text-2xl font-bold mb-4 text-center">Gallery Items</h2>
        <div class="shadow overflow-hidden border-b border-gray-300 rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach($gallery_items as $item)
                        <tr>
                            <td class="px-6 py-4">{{ $item->title }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <button wire:click="edit({{ $item->id }})" class="text-indigo-600 hover:underline">Edit</button>
                                <button wire:click="delete({{ $item->id }})" class="text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
