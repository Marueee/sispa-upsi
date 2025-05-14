<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Mark Attendance</h2>

    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium ">Batch</label>
                <select wire:model.live="selectedBatch" class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Select Batch --</option>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch }}">{{ $batch }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Date</label>
                <input type="date" wire:model="date" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Activity Name</label>
                <input type="text" wire:model="activity_name" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Description</label>
                <textarea wire:model="description" class="w-full border rounded px-3 py-2" rows="3"
                    placeholder="Enter activity description"></textarea>
            </div>
        </div>

        @if ($members->isNotEmpty())
            <div class="overflow-x-auto mt-4">
                <table class="w-full border-collapse border">
                    <thead class="">
                        <tr>
                            <th class="border px-4 py-2 text-center">
                                <label class="flex items-center justify-center space-x-2">
                                    <input type="checkbox"
                                        wire:model.live="selectAll"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    {{-- <span>Present</span> --}}
                                </label>
                            </th>
                            <th class="border px-4 py-2 text-center">Name</th>
                            <th class="border px-4 py-2 text-center">Matric No</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                            <tr class="">
                                <td class="border px-4 py-2 text-center">
                                    <input type="checkbox"
                                        wire:model.live="attendance.{{ $member->id }}"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $member->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $member->matric_no }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Attendance
            </button>
        @endif
    </form>
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('showAlert', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.type,
            timer: 3000,
            showConfirmButton: false
        });
    });
</script>
