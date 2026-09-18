<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Jay's Vet Clinic</title>
    <!-- Vite injecting Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 font-sans antialiased min-h-screen flex" x-data="{ mobileOpen: false }">

    <!-- MOBILE BURGER BUTTON (The "Bookmark") -->
    <!-- Fixed top-left, visible only on mobile, looks like a tab hanging out -->
    <button 
        @click="mobileOpen = true" 
        class="md:hidden fixed top-6 left-0 z-40 bg-brand-blue text-white p-3 pr-4 rounded-r-xl shadow-lg transition-transform hover:bg-brand-dark">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <!-- MOBILE OVERLAY BACKDROP -->
    <!-- Darkens the background when the sidebar is open on phones -->
    <div 
        x-show="mobileOpen" 
        @click="mobileOpen = false"
        x-transition.opacity.duration.300ms
        class="md:hidden fixed inset-0 bg-black/50 z-40" x-cloak>
    </div>

    <!-- SIDEBAR -->
    <!-- Desktop: Fixed to left. Defaults to w-20, expands to w-64 on hover (group-hover). -->
    <!-- Mobile: Toggles via -translate-x-full and translate-x-0. -->
    <aside 
        :class="mobileOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
        class="fixed top-0 left-0 h-full bg-brand-blue shadow-2xl z-50 flex flex-col py-8 overflow-hidden
               transition-all duration-300 ease-in-out group
               w-64 md:w-20 hover:md:w-64">
        
        <!-- Logo / Header Card -->
        <div class="px-4 mb-6 transition-all duration-300 overflow-hidden
                    opacity-100 max-h-24
                    md:opacity-0 md:max-h-0 md:px-0
                    group-hover:md:opacity-100 group-hover:md:max-h-32 group-hover:md:px-4">
            <div class="bg-white rounded-2xl p-0 shadow-md h-20 flex items-center justify-center">
                <img src="{{ asset('images/clinic-logo.png') }}" 
                     alt="Doc Jay's Logo" 
                     class="scale-100 object-contain shrink-0">
            </div>
        </div>

        <!-- Navigation Links  -->
        <nav class="flex flex-col space-y-2 flex-1">
            
            <a href="/home" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
               </svg>

                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Home
                </span>
            </a>

            <a href="/appointment" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>

                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Book Appointment
                </span>
            </a>

            
            <a href="/services" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>

                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Services
                </span>
            </a>

            <a href="/profile" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Profile
                </span>
            </a>

            <a href="/about" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" /> 
                </svg>

                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    About
                </span>
            </a>

        </nav>

        <!-- Log Out Button -->
        <form method="POST" action="/logout" class="w-full m-0">
            @csrf
            <button type="submit" class="flex items-center h-12 w-full text-red-600 hover:text-white hover:bg-red-500/20 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>

                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Log Out
                </span>
            </button>
        </form>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <!-- md:ml-20 precisely matches the collapsed sidebar width (w-20), keeping it pushed safely to the right. -->
    <main class="flex-1 w-full min-h-screen pt-20 px-6 pb-12 md:pt-10 md:px-12 md:ml-20 overflow-y-auto">
        <div class="max-w-6xl mx-auto">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>
</html>