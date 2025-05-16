<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Members Management</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Filter Section -->


    <!-- Form Section -->
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4 mb-6">
        <div>
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" wire:model="name"
                class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="matric_no" class="block text-sm font-medium">Matric No</label>
            <input type="text" id="matric_no" wire:model="matric_no"
                class="w-full border rounded px-3 py-2 @error('matric_no') border-red-500 @enderror">
            @error('matric_no') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="batch" class="block text-sm font-medium">Batch</label>
            <input type="text" id="batch" wire:model="batch"
                class="w-full border rounded px-3 py-2 @error('batch') border-red-500 @enderror">
            @error('batch') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                {{ $isEdit ? 'Update' : 'Add Member' }}
            </button>
            @if ($isEdit)
                <button type="button" wire:click="resetForm"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel Edit
                </button>
            @endif
        </div>
    </form>
    <div class="mb-4 ">
        <label for="batchFilter" class="block text-sm font-medium mb-1">Filter by Batch</label>
        <select wire:model.live="selectedBatch" id="batchFilter" class="border rounded px-3 py-2  border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">All Batches</option>
            @foreach($batches as $batchOption)
                <option value="{{ $batchOption }}">{{ $batchOption }}</option>
            @endforeach
        </select>
    </div>

    <!-- Table Section -->
    <table class="w-full table-auto border-collapse border">
        <thead class>
            <tr>
                <th class="border px-4 py-2">No.</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Matric No</th>
                <th class="border px-4 py-2">Batch</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $index => $member)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $member->name }}</td>
                    <td class="border px-4 py-2">{{ $member->matric_no }}</td>
                    <td class="border px-4 py-2">{{ $member->batch }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <button wire:click="edit({{ $member->id }})"
                            class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</button>
                        <button wire:click="delete({{ $member->id }})"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                            onclick="return confirm('Are you sure to delete this member?')">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
