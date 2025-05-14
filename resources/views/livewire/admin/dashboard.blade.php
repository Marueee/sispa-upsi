<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard Overview</h1>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Total Members Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Members</p>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $batches->sum('count') }}</h2>
                    </div>
                </div>
            </div>

            <!-- Batch Distribution Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Members by Batch</h2>
                <div class="space-y-3">
                    @forelse($batches as $batch)
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
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">No members found</p>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Quick Actions</h2>
                <div class="grid gap-2">
                    <a href="{{ route('admin.members') }}"
                       class="flex items-center gap-2 rounded-lg bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-100 dark:bg-blue-900/50 dark:text-blue-400 dark:hover:bg-blue-900">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Member
                    </a>
                    <button class="flex items-center gap-2 rounded-lg bg-green-50 px-4 py-2 text-sm font-medium text-green-600 hover:bg-green-100 dark:bg-green-900/50 dark:text-green-400 dark:hover:bg-green-900">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Export Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
            <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Recent Activity</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Action</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-white">Member Added</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900 dark:text-white">John Doe</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">2 hours ago</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

