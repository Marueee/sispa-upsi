<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Attendance</h2>

    {{-- Toggle buttons --}}
    <div class="mb-4 flex gap-2">
        <button wire:click="$set('showReport', false)" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Mark Attendance
        </button>
        <button wire:click="showReportSection" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            View Report
        </button>
    </div>

    {{-- Mark Attendance Section --}}
    @unless ($showReport)
        <form wire:submit.prevent="submit" class="space-y-4">
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Batch</label>
                    <select wire:model.live="selectedBatch" class="w-full border rounded px-3 py-2">
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
                    <table class="w-full table-auto border-collapse border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">No.</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Matric No</th>
                                <th class="border px-4 py-2">
                                    Present
                                    <input type="checkbox" wire:click="toggleAllCheckboxes" class="ml-2">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $index => $member)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $member->name }}</td>
                                    <td class="border px-4 py-2">{{ $member->matric_no }}</td>
                                    <td class="border px-4 py-2">
                                        <input type="checkbox" wire:model="attendance.{{ $member->id }}">
                                    </td>
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
    @endunless

    {{-- Attendance Report Section --}}
    @if ($showReport)
        <div class="mt-6">
            <div class="grid md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium">Select Date</label>
                    <input type="date" wire:model.live="filterDate" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Select Activity</label>
                    <select wire:model.live="filterActivityName" class="w-full border rounded px-3 py-2">
                        <option value="">-- Select Activity --</option>
                        @foreach ($activityNames as $activity)
                            <option value="{{ $activity }}">{{ $activity }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button wire:click="loadReport" class="mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                View Report
            </button>


            @if ($reportRecords)
                @if ($reportDescription)
                    <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold text-gray-700 mb-2">Activity Description:</h3>
                        <p class="text-gray-600">{{ $reportDescription }}</p>
                    </div>
                @endif
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">No.</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Matric No</th>
                                <th class="border px-4 py-2">Batch</th>
                                <th class="border px-4 py-2">Present</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reportRecords as $index => $att)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $att->member->name }}</td>
                                    <td class="border px-4 py-2">{{ $att->member->matric_no }}</td>
                                    <td class="border px-4 py-2">{{ $att->batch }}</td>
                                    <td class="border px-4 py-2">{{ $att->is_present ? 'Yes' : 'No' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @endif
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
