<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Staff Dashboard</h1>

        {{-- Statistics Overview Section --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            @php
                $totalMembers = \App\Models\Member::count();
                $totalEvents = \App\Models\Event::count();
                $totalPresent = \App\Models\Attendance::where('is_present', true)->count();
                $totalAbsent = \App\Models\Attendance::where('is_present', false)->count();
            @endphp

            <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 hover:shadow-lg transition-all">
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Members</p>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white" x-data="{ count: 0 }" x-init="count = {{ $totalMembers }}">{{ $totalMembers }}</h2>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 hover:shadow-lg transition-all">
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Events</p>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalEvents }}</h2>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 hover:shadow-lg transition-all">
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-emerald-100 p-3 dark:bg-emerald-900">
                        <svg class="h-6 w-6 text-emerald-600 dark:text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Present Count</p>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalPresent }}</h2>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 hover:shadow-lg transition-all">
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-red-100 p-3 dark:bg-red-900">
                        <svg class="h-6 w-6 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Absent Count</p>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalAbsent }}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions and Batch Distribution Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            {{-- Quick Actions Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('admin.attendance') }}" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="text-sm font-medium text-blue-600 dark:text-blue-400">Take Attendance</span>
                    </a>
                    <a href="{{ route('admin.report') }}" class="flex items-center gap-3 p-3 rounded-lg bg-green-50 dark:bg-green-900/30 hover:bg-green-100 dark:hover:bg-green-900/50 transition-colors">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-sm font-medium text-green-600 dark:text-green-400">View Reports</span>
                    </a>
                </div>
            </div>

            {{-- Batch Distribution Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Members by Batch</h3>
                <div class="space-y-3">
                    @php
                        $batches = \App\Models\Member::select('batch')
                            ->selectRaw('count(*) as count')
                            ->groupBy('batch')
                            ->get();
                    @endphp
                    @foreach($batches as $batch)
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Batch {{ $batch->batch ?? 'Unknown' }}</span>
                            <div class="flex items-center gap-2">
                                <div class="h-2 w-24 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                                    <div class="h-full bg-blue-600 dark:bg-blue-500"
                                        style="width: {{ ($batch->count / $batches->sum('count')) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $batch->count }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Recent Events Section --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Recent Events</h3>
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
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Add animation to statistics counters
        document.addEventListener('alpine:init', () => {
            Alpine.data('counter', (start, end) => ({
                count: start,
                init() {
                    this.animate();
                },
                animate() {
                    const duration = 2000;
                    const steps = 60;
                    const stepValue = (end - start) / steps;
                    const stepDuration = duration / steps;

                    let currentStep = 0;
                    const interval = setInterval(() => {
                        currentStep++;
                        this.count = Math.round(start + (stepValue * currentStep));

                        if (currentStep >= steps) {
                            clearInterval(interval);
                            this.count = end;
                        }
                    }, stepDuration);
                }
            }));
        });
    </script>
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
