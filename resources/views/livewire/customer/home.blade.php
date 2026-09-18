
    <div class="space-y-8">
    
    <!-- PAGE HEADER -->
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Welcome back, {{ auth()->user()->name ?? 'Pet Owner' }}!</h1>
        <p class="text-gray-500 mt-1 text-sm">Manage your pet's appointments and clinic visits.</p>
    </div>

    <!-- 1. NEXT UPCOMING APPOINTMENT HERO CARD -->
    <!-- Fulfills the requirement to allow users to view, update, or cancel their appointments[cite: 2] -->
    <div class="bg-brand-blue rounded-3xl p-6 md:p-8 shadow-xl text-white relative overflow-hidden">
        <!-- Decorative background circle -->
        <div class="absolute -right-10 -top-10 w-48 h-48 bg-white opacity-5 rounded-full blur-2xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-block px-3 py-1 bg-white/20 text-blue-100 text-xs font-bold uppercase tracking-wider rounded-full mb-3">
                    Next Appointment
                </span>
                <h2 class="text-2xl md:text-3xl font-black mb-1">{{ $nextAppointment['service'] }} for {{ $nextAppointment['pet_name'] }}</h2>
                <div class="flex items-center space-x-4 text-blue-100 text-sm md:text-base font-medium">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-1.5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        {{ \Carbon\Carbon::parse($nextAppointment['date'])->format('F j, Y') }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-1.5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ $nextAppointment['time'] }}
                    </span>
                </div>
            </div>

            <!-- Action Buttons for the specific appointment -->
            <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                <button class="px-5 py-2.5 bg-white text-brand-blue hover:bg-gray-100 font-bold rounded-xl transition-colors shadow-sm">
                    Reschedule
                </button>
                <button class="px-5 py-2.5 bg-red-500/20 text-white hover:bg-red-500 hover:text-white font-bold rounded-xl transition-colors">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- 2. QUICK ACTION TOOLBAR -->
    <!-- Maps to the Make Appointment and View Price List flows in the DFD -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <a href="/appointments" class="flex items-center justify-center p-4 bg-brand-blue hover:bg-brand-blue-hover text-white font-bold rounded-2xl shadow-md transition-all group">
            <svg class="w-6 h-6 mr-2 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
            Book New Appointment
        </a>
        <a href="/services" class="flex items-center justify-center p-4 bg-white hover:bg-gray-50 text-gray-700 font-bold rounded-2xl shadow-sm border border-gray-200 transition-colors">
            <svg class="w-6 h-6 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            View Price List
        </a>
    </div>

    <!-- 3. APPOINTMENT HISTORY DATA GRID -->
    <!-- Fulfills the requirement that the system focuses only on appointment scheduling and price display[cite: 2] -->
    <div class="bg-brand-background rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <h3 class="text-lg font-extrabold text-gray-900">My Appointments</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-brand-blue text-xs uppercase tracking-wider text-white border-b border-gray-100">
                        <th class="px-6 py-4 font-semibold">Date & Time</th>
                        <th class="px-6 py-4 font-semibold">Pet</th>
                        <th class="px-6 py-4 font-semibold">Service</th>
                        <th class="px-6 py-4 font-semibold">Price</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($appointmentHistory as $apt)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ \Carbon\Carbon::parse($apt['date'])->format('M j, Y') }}</div>
                                <div class="text-xs font-medium text-gray-500">{{ $apt['time'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-700">
                                {{ $apt['pet'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $apt['service'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $apt['price'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($apt['status'] === 'Confirmed')
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full text-green-700">Confirmed</span>
                                @elseif($apt['status'] === 'Completed')
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full text-gray-600">Completed</span>
                                @elseif($apt['status'] === 'Pending')
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full text-blue-600">Pending</span>
                                @else
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full text-red-600">Canceled</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
</div>
