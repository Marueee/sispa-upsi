<x-layouts.app.sidebar :title="$title ?? null">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sispa UPSI</title>

        @livewireStyles
    </head>
    <body>
        <flux:main>
            {{ $slot }}
        </flux:main>

        @livewireScripts
    </body>
    </html>
</x-layouts.app.sidebar>
