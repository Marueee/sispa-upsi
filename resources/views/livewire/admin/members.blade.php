<div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Members Management</h2>

        <!-- Form Section -->
        <form id="memberForm" wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4 mb-6">
            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="matric_no" class="block text-sm font-medium">Matric No</label>
                <input type="text" id="matric_no" wire:model="matric_no"
                    class="w-full border rounded px-3 py-2 @error('matric_no') border-red-500 @enderror">
                @error('matric_no')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="batch" class="block text-sm font-medium">Batch</label>
                <input type="text" id="batch" wire:model="batch"
                    class="w-full border rounded px-3 py-2 @error('batch') border-red-500 @enderror">
                @error('batch')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-flex items-center">
                    @if($isEdit)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Update
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Member
                    @endif
                </button>
                @if ($isEdit)
                    <button type="button" wire:click="resetForm"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        Cancel Edit
                    </button>
                @endif
            </div>
        </form>

        <!-- Filter Section -->
        <div class="mb-4">
            <label for="batchFilter" class="block text-sm font-medium mb-1">Filter by Batch</label>
            <select wire:model.live="selectedBatch" id="batchFilter"
                class="border rounded px-3 py-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">All Batches</option>
                @foreach ($batches as $batchOption)
                    <option value="{{ $batchOption }}">{{ $batchOption }}</option>
                @endforeach
            </select>
        </div>

        <!-- Table Section -->
        <table class="w-full table-auto border-collapse border">
            <thead>
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
                                class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Edit
                            </button>
                            <button wire:click="delete({{ $member->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded inline-flex items-center"
                                onclick="return confirm('Are you sure you want to delete this member?')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Delete
                            </button>
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

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('memberDeleted', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Member deleted successfully!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                });

                Livewire.on('deleteFailed', () => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to delete member',
                        timer: 2000,
                        showConfirmButton: false
                    });
                });

                Livewire.on('memberCreated', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Member added successfully!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                });

                // Add this new event listener
                Livewire.on('scrollToForm', () => {
                    document.getElementById('memberForm').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
        </script>
    @endpush
</div>
