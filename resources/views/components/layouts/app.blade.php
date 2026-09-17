<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Jay's Vet Clinic</title>
    <!-- Vite injecting Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased font-sans">
    
    <main>
        <!-- Livewire components will inject here -->
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>