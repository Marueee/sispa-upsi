<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Attendance Report</h2>

    {{-- Date Filter --}}
    <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Select Date</label>
        <input type="date"
            wire:model.live="filterDate"
            class="w-half md:w-1/3 border rounded px-3 py-2">
    </div>

    {{-- Activity Filter --}}
    @if($filterDate)
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Select Activity</label>
            <select wire:model.live="filterActivityName"
                    class="w-full md:w-1/3 border rounded px-3 py-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
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
            <div class="mb-4 p-4  border rounded rounded-lg">
                <h3 class="font-semibold  mb-2">Activity Description:</h3>
                <p class="">{{ $reportDescription }}</p>
            </div>
        @endif

        {{-- Attendance Summary by Batch --}}
        <div class="grid grid-cols-1 gap-4 mb-6">
            @foreach($reportRecords->groupBy('member.batch') as $batch => $records)
                <div class="p-4 border rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold mb-2">Batch {{ $batch }}</h3>

                    {{-- Summary Stats --}}
                    <div class="grid grid-cols-4 gap-4 mb-4">
                        <div class="text-center p-2 bg-gray-200 rounded">
                            <div class="text-sm text-gray-600">Total</div>
                            <div class="font-medium text-gray-600">{{ $records->count() }}</div>
                        </div>
                        <div class="text-center p-2 bg-green-200 rounded">
                            <div class="text-sm text-gray-600">Present</div>
                            <div class="font-medium text-green-600">{{ $records->where('is_present', true)->count() }}</div>
                        </div>
                        <div class="text-center p-2 bg-red-200 rounded">
                            <div class="text-sm text-gray-600">Absent</div>
                            <div class="font-medium text-red-600">{{ $records->where('is_present', false)->count() }}</div>
                        </div>
                        <div class="text-center p-2 bg-blue-200 rounded">
                            <div class="text-sm text-gray-600">Attendance Rate</div>
                            <div class="font-medium text-blue-600">
                                @php
                                    $total = $records->count();
                                    $present = $records->where('is_present', true)->count();
                                    $rate = $total > 0 ? ($present / $total) * 100 : 0;
                                @endphp
                                {{ number_format($rate, 1) }}%
                            </div>
                        </div>
                    </div>

                    {{-- Absent Students List --}}
                    @if($records->where('is_present', false)->count() > 0)
                        <div x-data="{ open: false }" class="mt-4">
                            <button
                                @click="open = !open"
                                class="flex items-center justify-between w-full p-3 text-left bg-red-200 rounded-lg hover:bg-red-100 transition-colors"
                            >
                                <div class="flex items-center space-x-2">
                                    <span class="font-medium text-red-600">
                                        Absent Students ({{ $records->where('is_present', false)->count() }})
                                    </span>
                                </div>
                                <svg
                                    class="w-5 h-5 text-red-600 transform transition-transform duration-200"
                                    :class="{'rotate-180': open}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="mt-2 text-red-600 bg-red-200 rounded-lg p-3"
                            >
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($records->where('is_present', false) as $absent)
                                        <li class="">
                                            {{ $absent->member->name }}
                                            ({{ $absent->member->student_id ?? $absent->member->matric_no ?? 'No ID' }})
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-4 text-gray-500">
            @if(!$filterDate)
                Please select a date to view available activities.
            @elseif(!$filterActivityName)
                Please select an activity to view the attendance report.
            @else
                No attendance records found for the selected date and activity.
            @endif
        </div>
    @endif
</div>
