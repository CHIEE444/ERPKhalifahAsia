@props([
    'title' => 'Khalifah Asia',
    'type' => 'default'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title . " - " . "Khalifah Asia Bekasi" }}</title>
</head>
<body class="flex min-h-screen font-sans">
    @if($type === 'default')
    <nav class="bg-[#F6F3F2] border-r-1 border-[#E4BDC2] text-white w-72 p-4 h-screen fixed">
        <x-layout.sidebar />
    </nav>
    @endif
    <main class="flex-grow {{ $type == 'default' ? 'ml-72' : ''}}">
        {{ $slot }}
    </main>
</body>
</html>