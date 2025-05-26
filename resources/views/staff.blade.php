<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">


        {{-- Attendance Summary Section --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @php
                $recentEvents = \App\Models\Event::with(['attendances.member'])->latest()->take(3)->get();
            @endphp

            @foreach($recentEvents as $event)
                <div
                    x-data="{ showModal: false }"
                    class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 cursor-pointer hover:shadow-lg transition-shadow"
                    @click="showModal = true"
                >
                    <h3 class="text-lg font-semibold mb-2">{{ $event->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                        {{ $event->date->format('d M Y') }}
                        @if($event->start_time)
                            <br>{{ $event->start_time->format('h:i A') }} - {{ $event->end_time ? $event->end_time->format('h:i A') : 'N/A' }}
                        @endif
                    </p>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-green-100 dark:bg-green-900/30 rounded-lg p-2">
                            <p class="text-sm text-green-600 dark:text-green-400">Present</p>
                            <p class="text-xl font-bold text-green-700 dark:text-green-300">
                                {{ $event->attendances->where('is_present', true)->count() }}
                            </p>
                        </div>
                        <div class="bg-red-100 dark:bg-red-900/30 rounded-lg p-2">
                            <p class="text-sm text-red-600 dark:text-red-400">Absent</p>
                            <p class="text-xl font-bold text-red-700 dark:text-red-300">
                                {{ $event->attendances->where('is_present', false)->count() }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Batches: {{ $event->attendances->pluck('member.batch')->unique()->sort()->join(', ') }}
                        </p>
                    </div>

                    {{-- Modal for detailed attendance --}}
                    <div
                        x-show="showModal"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 z-50 overflow-y-auto"
                        style="display: none;"
                        @click.self="showModal = false"
                    >
                        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                            </div>

                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full relative">
                                {{-- Close button (X) --}}
                                <button
                                    type="button"
                                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 focus:outline-none"
                                    @click.stop="showModal = false"
                                >
                                    <span class="sr-only">Close</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100 mb-4">
                                                {{ $event->name }} - Attendance Details
                                            </h3>

                                            <div class="mb-4">
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    Date: {{ $event->date->format('d M Y') }}
                                                </p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    Time: {{ $event->start_time ? $event->start_time->format('h:i A') : 'N/A' }} -
                                                    {{ $event->end_time ? $event->end_time->format('h:i A') : 'N/A' }}
                                                </p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    Location: {{ $event->location ?? 'N/A' }}
                                                </p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    Batches: {{ $event->attendances->pluck('member.batch')->unique()->sort()->join(', ') }}
                                                </p>
                                            </div>

                                            <div class="mt-4">
                                                <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-2">Present Members</h4>
                                                <div class="max-h-60 overflow-y-auto">
                                                    @foreach($event->attendances->where('is_present', true)->groupBy('member.batch') as $batch => $attendances)
                                                        <div class="mb-3">
                                                            <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Batch {{ $batch }}</h5>
                                                            @foreach($attendances as $attendance)
                                                                <div class="text-sm text-gray-600 dark:text-gray-400 py-1 pl-4">
                                                                    {{ $attendance->member->name }} ({{ $attendance->member->matric_no }})
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-2">Absent Members</h4>
                                                <div class="max-h-60 overflow-y-auto">
                                                    @foreach($event->attendances->where('is_present', false)->groupBy('member.batch') as $batch => $attendances)
                                                        <div class="mb-3">
                                                            <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Batch {{ $batch }}</h5>
                                                            @foreach($attendances as $attendance)
                                                                <div class="text-sm text-gray-600 dark:text-gray-400 py-1 pl-4">
                                                                    {{ $attendance->member->name }} ({{ $attendance->member->matric_no }})
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush

    <style>
        .swal2-large {
            font-size: 1.2em !important;
            border-radius: 15px !important;
        }

        .swal2-icon {
            transform: scale(1.2);
            margin: 1.5em auto !important;
        }
    </style>
</x-layouts.app>
