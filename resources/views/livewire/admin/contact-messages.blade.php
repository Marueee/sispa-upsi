<div class="max-w-7xl mx-auto p-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">Contact Messages</h1>
    </div>

    <!-- Success Message -->
    @if (session('error'))
    <div class="bg-red-500 text-white p-4">Error: {{ session('error') }}</div>
    @endif

    @if (session('success'))
    <div class="bg-green-500 text-white p-4">Success: {{ session('success') }}</div>
    @endif


    <!-- Messages Table -->
    <div class="shadow overflow-hidden border-b border-gray-300 dark:border-gray-600 rounded-lg">
        <table
            class="min-w-full w-full divide-y divide-gray-300 dark:divide-gray-600 border border-gray-300 dark:border-gray-600">
            <thead class="border-gray-400 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Subject
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Message
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">
                        Submitted At
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($messages as $message)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                        {{ $message->name }}
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                        {{ $message->email }}
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                        {{ $message->subject }}
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700">
                        {{ $message->message }}
                    </td>
                    <td class="px-6 py-4 text-right border-b border-gray-300 dark:border-gray-700">
                        {{ $message->created_at->format('Y-m-d H:i') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                        No contact messages found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>