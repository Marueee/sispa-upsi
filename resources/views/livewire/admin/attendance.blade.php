<div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Create Event & Mark Attendance</h2>

        {{-- Date Selection --}}
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Select Date *</label>
            <input type="date"
                wire:model.live="selectedDate"
                class="w-full md:w-1/3 border rounded px-3 py-2 border-gray-300 dark:border-gray-600">
        </div>

        {{-- Event Selection (shows only when date is selected) --}}
        @if($selectedDate)
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1">Select Event</label>
                <select wire:model.live="selectedEventId"
                    class="w-full md:w-1/3 border rounded px-3 py-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Create New Event</option>
                    @foreach ($existingEvents as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
            {{-- Event Creation Section --}}
            <div class="grid md:grid-cols-3 gap-4 p-4 rounded-lg">
                <div>
                    <label class="block text-sm font-medium">Event Name *</label>
                    <input type="text" wire:model="eventData.name" required
                        class="w-full border rounded px-3 py-2 border-gray-300 dark:bg-gray-700">
                    @error('eventData.name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Location</label>
                    <input type="text" wire:model="eventData.location"
                        class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Start Time</label>
                    <input type="time" wire:model="eventData.start_time"
                        class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">End Time</label>
                    <input type="time" wire:model="eventData.end_time"
                        class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600">
                </div>

                <div class="md:col-span-3">
                    <label class="block text-sm font-medium">Description</label>
                    <textarea wire:model="eventData.description" rows="2"
                        class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600"
                        placeholder="Event description (optional)"></textarea>
                </div>
            </div>

            {{-- Attendance Section --}}
            @if ($members->isNotEmpty())
                <div class="overflow-x-auto mt-4">
                    {{-- Batch Filter --}}
                    <div class="mb-4 flex items-center space-x-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Filter by Batch:</label>
                            <select wire:model.live="selectedBatch"
        <select wire:model.live="selectedBatch" id="batchFilter" class="border rounded px-3 py-2  border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">All Batches</option>
                                @foreach ($batches as $batch)
                                    <option value="{{ $batch }}">{{ $batch }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if($selectedBatch)
                        {{-- Show grouped tables when batch is selected --}}
                        @foreach ($groupedMembers as $batch => $batchMembers)
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold mb-2 p-2 rounded">Batch: {{ $batch }}</h3>
                                <table class="w-full border-collapse border">
                                    <thead>
                                        <tr>
                                            <th class="border px-4 py-2 text-center w-20">
                                                <input type="checkbox"
                                                    wire:model.live="selectAll"
                                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            </th>
                                            <th class="border px-4 py-2 text-left">Name</th>
                                            <th class="border px-4 py-2 text-center">Batch</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($batchMembers as $member)
                                            <tr>
                                                <td class="border px-4 py-2 text-center">
                                                    <input type="checkbox"
                                                        wire:model.live="attendance.{{ $member->id }}"
                                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                </td>
                                                <td class="border px-4 py-2">{{ $member->name }}</td>
                                                <td class="border px-4 py-2 text-center">{{ $member->batch }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @else
                        {{-- Show single table when no batch is selected --}}
                        <table class="w-full border-collapse border">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2 text-center w-20">
                                        <input type="checkbox"
                                            wire:model.live="selectAll"
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    </th>
                                    <th class="border px-4 py-2 text-left">Name</th>
                                    <th class="border px-4 py-2 text-center">Batch</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">
                                            <input type="checkbox"
                                                wire:model.live="attendance.{{ $member->id }}"
                                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        </td>
                                        <td class="border px-4 py-2">{{ $member->name }}</td>
                                        <td class="border px-4 py-2 text-center">{{ $member->batch }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            @else
                <div class="text-center py-4 text-gray-500">
                    No members found to mark attendance.
                </div>
            @endif

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-600 shadow-lg flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Create Event & Save Attendance</span>
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('livewire:initialized', () => {
                // Add confirmation before submitting
                const form = document.querySelector('form');
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Save Attendance?',
                        text: "Are you sure you want to save this attendance record?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, save it!',
                        width: '32em', // Make the modal wider
                        padding: '2em', // Add more padding
                        customClass: {
                            title: 'text-xl', // Larger title
                            popup: 'swal2-large', // Custom class for larger popup
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.dispatch('submit');
                        }
                    });
                });

                // Handle success response
                Livewire.on('attendanceSaved', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Attendance has been saved successfully!',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        width: '32em',
                        padding: '2em',
                        customClass: {
                            title: 'text-2xl font-bold',
                            popup: 'swal2-large',
                            htmlContainer: 'text-lg'
                        }
                    });
                });

                // Handle error response
                Livewire.on('attendanceError', () => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to save attendance. Please try again.',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        width: '32em',
                        padding: '2em',
                        customClass: {
                            title: 'text-2xl font-bold text-red-600',
                            popup: 'swal2-large',
                            htmlContainer: 'text-lg'
                        }
                    });
                });

                // Keep existing alert handler with larger styling
                Livewire.on('showAlert', (event) => {
                    Swal.fire({
                        title: event.title,
                        text: event.message,
                        icon: event.type,
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        width: '32em',
                        padding: '2em',
                        customClass: {
                            title: 'text-2xl font-bold',
                            popup: 'swal2-large',
                            htmlContainer: 'text-lg'
                        }
                    });
                });
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
</div>
