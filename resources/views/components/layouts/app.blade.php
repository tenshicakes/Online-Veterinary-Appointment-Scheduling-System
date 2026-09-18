<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Jay's Vet Clinic</title>
    <!-- Vite injecting Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex" x-data="{ mobileOpen: false }">

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
        
        <!-- Logo / Header Icon -->
        <div class="flex items-center h-12 w-full text-white mb-8 px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6 transition-all duration-300">
            
            <!-- Clinic text fades in on hover -->
            <span class="overflow-hidden transition-all duration-300 font-extrabold tracking-wider whitespace-nowrap text-lg
                         w-auto ml-3 opacity-100 
                         md:w-0 md:ml-0 md:opacity-0 
                         group-hover:md:w-auto group-hover:md:ml-3 group-hover:md:opacity-100">
                <img src="{{ asset('images/clinic-logo.png') }}" 
                         alt="Doc Jay's Logo" 
                        class="w-40 h-40 lg:w-300 lg:h-70 object-contain shrink-0"> 
                    </div>
            </span>
        </div>

        <!-- Navigation Links  -->
        <nav class="flex flex-col space-y-2 flex-1">
            
            <a href="/home" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Home
                </span>
            </a>

            <a href="/appointment" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Book Appointment
                </span>
            </a>

            
            <a href="/services" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25a3 3 0 013-3h.75a3 3 0 013 3v.75a3 3 0 01-3 3h-.75a3 3 0 01-3-3v-.75z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75v-13.5a2.25 2.25 0 012.25-2.25h15a2.25 2.25 0 012.25 2.25v13.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25z" /></svg>
                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Services
                </span>
            </a>

            <a href="/profile" class="flex items-center h-12 w-full text-white/80 hover:text-white hover:bg-white/10 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.601a8.983 8.983 0 013.361-6.866 8.21 8.21 0 003 2.48z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" /></svg>
                <span class="overflow-hidden transition-all duration-300 font-semibold whitespace-nowrap w-auto ml-4 opacity-100 md:w-0 md:ml-0 md:opacity-0 group-hover:md:w-auto group-hover:md:ml-4 group-hover:md:opacity-100">
                    Profile
                </span>
            </a>
        </nav>

        <!-- Log Out Button -->
        <form method="POST" action="/logout" class="w-full m-0">
            @csrf
            <button type="submit" class="flex items-center h-12 w-full text-red-300 hover:text-white hover:bg-red-500/20 transition-colors px-6 md:px-0 md:justify-center group-hover:md:justify-start group-hover:md:px-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
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