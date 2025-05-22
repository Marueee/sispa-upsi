<div class="max-w-7xl mx-auto p-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">SISPA Applications</h1>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div
            class="bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-lg mb-6 max-w-4xl mx-auto">
            {{ session('message') }}
        </div>
    @endif

    <!-- Applications Table -->
    <div class="shadow overflow-hidden border-b border-gray-300 dark:border-gray-600 rounded-lg">
        <table
            class="min-w-full w-full divide-y divide-gray-300 dark:divide-gray-600 border border-gray-300 dark:border-gray-600">
            <thead class="border-gray-400 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Name</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Email</th>
                    <th
                        class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Status</th>
                    <th
                        class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($applications as $application)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $application->name }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">{{ $application->email }}
                        </td>
                        <td class="px-6 py-4 text-center border-b border-gray-300 dark:border-gray-700">
                            <span
                                class="px-3 py-1 inline-flex text-center leading-5 font-semibold rounded-full
                                {{ $application->status === 'approved'
                                    ? 'bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200'
                                    : ($application->status === 'rejected'
                                        ? 'bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-200'
                                        : 'bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200') }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right border-b border-gray-300 dark:border-gray-700">
                            <select wire:change="updateStatus({{ $application->id }}, $event.target.value)"
                                class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>
                                    Approved</option>
                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>
                                    Rejected</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
