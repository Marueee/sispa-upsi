
<div class="max-w-7xl mx-auto p-6">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold">Senarai Permohonan SISPA</h1>
    </div>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-lg mb-6 max-w-4xl mx-auto">
            {{ session('message') }}
        </div>
    @endif

    <!-- SISPA Applications Table -->
    <div class="mx-auto max-w-10xl">
        <div class="shadow overflow-hidden border-b border-gray-300 dark:border-gray-600 rounded-lg">
            <table class="min-w-full w-full divide-y divide-gray-300 dark:divide-gray-600 border border-gray-300 dark:border-gray-600">
                <thead class="border-gray-400 dark:border-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">No Matrik</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider border-b border-gray-400 dark:border-gray-700">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="border-gray-400 dark:border-gray-700">
                    @forelse($applications as $app)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-400 dark:border-gray-700">{{ $app->name }}</td>
                            <td class="px-6 py-4 border-b border-gray-400 dark:border-gray-700">{{ $app->no_matrik }}</td>
                            <td class="px-6 py-4 border-b border-gray-400 dark:border-gray-700">{{ $app->email }}</td>
                            <td class="px-6 py-4 border-b border-gray-400 dark:border-gray-700">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $app->status === 'Layak' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : ($app->status === 'Tidak Layak' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300') }}">
                                    {{ $app->status ?? 'Belum Disemak' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-400 dark:border-gray-700 text-center space-x-2">
                                <form action="{{ route('admin.sispa.updateStatus', $app->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="status" value="Layak">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-lg transition duration-150">
                                        Layak
                                    </button>
                                </form>
                                <form action="{{ route('admin.sispa.updateStatus', $app->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="status" value="Tidak Layak">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-lg transition duration-150">
                                        Tidak Layak
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 dark:text-gray-400">Tiada permohonan dijumpai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>