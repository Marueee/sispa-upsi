<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-layouts.app.sidebar :title="$title ?? null">
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Sispa UPSI</title>

            @livewireStyles
            <style>
                [wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline] {
                    display: none;
                }

                [wire\:loading\.block] {
                    display: block;
                }

                [wire\:loading\.flex] {
                    display: flex;
                }

                [wire\:loading\.table] {
                    display: table;
                }

                [wire\:loading\.inline-flex] {
                    display: inline-flex;
                }

                /* Pagination Styles */
                .pagination {
                    @apply flex justify-center gap-2 mt-4;
                }
                .pagination > * {
                    @apply px-3 py-1 rounded border;
                }
                .pagination span[aria-current="page"] {
                    @apply bg-blue-500 text-white border-blue-500;
                }
            </style>
        </head>
        <body>
            <flux:main>
                {{ $slot }}
            </flux:main>

            @livewireScripts
            @stack('scripts')
        </body>
        </html>
    </x-layouts.app.sidebar>
</body>
</html>
