<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Attendance Management</h2>

    <form wire:submit.prevent="submit" class="space-y-4 mb-6">
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium">Batch</label>
                <select wire:model.live="selectedBatch" class="w-full border rounded px-3 py-2 dark:bg-neutral-900">
                    <option value="">-- Select Batch --</option>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch }}">{{ $batch }}</option>
                    @endforeach
                </select>
                @error('selectedBatch')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Date</label>
                <input type="date" wire:model="date" class="w-full border rounded px-3 py-2 dark:bg-neutral-900"
                    required>
                @error('date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Activity Name</label>
                <input type="text" wire:model="activity_name"
                    class="w-full border rounded px-3 py-2 dark:bg-neutral-900" required
                    placeholder="Enter activity name">
                @error('activity_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Members table --}}
        @if ($selectedBatch && $members->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse border mt-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No.</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Matric No</th>
                            <th class="border px-4 py-2">
                                <div class="flex items-center justify-center space-x-2">
                                    <span class="mr-2">Present</span>
                                    <input type="checkbox" wire:click="toggleAllCheckboxes"
                                        class="form-checkbox h-5 w-5 text-blue-600 transition duration-150 ease-in-out"
                                        @checked(count($attendance) === $members->count())>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $index => $member)
                            <tr class="text-center hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $member->name }}</td>
                                <td class="border px-4 py-2">{{ $member->matric_no }}</td>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" wire:model="attendance.{{ $member->id }}"
                                        class="form-checkbox h-5 w-5 text-blue-600">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200 disabled:opacity-50">
                <span wire:loading.remove>Submit</span>
                <span wire:loading>Saving...</span>
            </button>
        @elseif ($selectedBatch)
            <div class="mt-4 p-4 bg-red-50 text-red-500 rounded">
                No members found for this batch.
            </div>
        @endif
    </form>
</div>

{{-- SweetAlert2 Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('showAlert', (data) => {
            Swal.fire({
                icon: data[0].type,
                title: data[0].title,
                text: data[0].message,
                confirmButtonColor: '#3B82F6',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        });
    });
</script>
