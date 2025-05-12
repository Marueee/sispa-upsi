<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Attendance Report</h2>

    {{-- Date Filter --}}
    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Select Date</label>
        <input type="date"
            wire:model.live="filterDate"
            class="w-full md:w-1/3 border rounded px-3 py-2">
    </div>

    {{-- Activity Filter (shows only when date is selected) --}}
    @if($filterDate)
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Select Activity</label>
            <select wire:model.live="filterActivityName"
                    class="w-full md:w-1/3 border rounded px-3 py-2"
                    wire:change="loadReport">
                <option value="">-- Select Activity --</option>
                @foreach ($activityNames as $activity)
                    <option value="{{ $activity }}">{{ $activity }}</option>
                @endforeach
            </select>
        </div>
    @endif

    {{-- Report Content --}}
    @if ($filterDate && $filterActivityName && $reportRecords && $reportRecords->isNotEmpty())
        {{-- Activity Description --}}
        @if ($reportDescription)
            <div class="mb-4  ">
                <h3 class="font-semibold ">Activity Description:</h3>
                <p class="w-full md:w-1/3 border rounded px-3 py-2">{{ $reportDescription }}</p>
            </div>
        @endif

        {{-- Attendance Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border">
                <thead class>
                    <tr>
                        <th class="border px-4 py-2">No.</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Matric No</th>
                        <th class="border px-4 py-2">Batch</th>
                        <th class="border px-4 py-2">Present</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportRecords as $index => $att)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $att->member->name }}</td>
                            <td class="border px-4 py-2">{{ $att->member->matric_no }}</td>
                            <td class="border px-4 py-2">{{ $att->batch }}</td>
                            <td class="border px-4 py-2">
                                <span class="{{ $att->is_present ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $att->is_present ? 'Yes' : 'No' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif($filterDate && !$filterActivityName)
        <div class="text-center py-4 text-gray-500">
            Please select an activity to view the attendance report.
        </div>
    @elseif(!$filterDate)
        <div class="text-center py-4 text-gray-500">
            Please select a date to view available activities.
        </div>
    @else
        <div class="text-center py-4 text-gray-500">
            No attendance records found for the selected date and activity.
        </div>
    @endif
</div>
