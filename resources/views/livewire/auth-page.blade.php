<div>
    <!-- flex-col-reverse stacks the image on top for mobile, lg:flex-row splits them side-by-side on desktop -->
    <div x-data="{ isLogin: true }" class="min-h-screen flex flex-col-reverse lg:flex-row bg-white font-sans text-gray-900">

        <!-- FORM AREA (Bottom on mobile, Left on desktop) -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 sm:px-16 lg:px-24 py-12 lg:py-0">
                <div class="max-w-md w-full mx-auto">
                    <div class="flex items-center space-x-3 mb-1">
                        <!-- PNG Logo (Scales smoothly: 10 (40px) on mobile, 12 (48px) on desktop) -->
                        <img src="{{ asset('images/clinic-logo.png') }}" 
                         alt="Doc Jay's Logo" 
                        class="w-40 h-40 lg:w-300 lg:h-70 object-contain shrink-0"> 
                    </div>
                
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2" x-text="isLogin ? 'Welcome' : 'Create an Account'"></h1>
                <p class="text-gray-500 mb-10" x-text="isLogin ? 'Log in your account  to start an appointment.' : 'Sign up to start booking with Doc Jay\'s.'"></p>

                <!-- LOGIN FORM -->
                <form wire:submit="login" x-show="isLogin" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                    @error('auth_failed')
                        <div class="p-3 bg-red-100 border border-red-400 text-red-700 text-sm rounded-lg">
                            {{ $message }}
                        </div>
                    @enderror

                    <div>
                        <label class="block text-sm font-semibold text-black mb-1">Email Address</label>
                        <input type="email" wire:model="email" class="w-full px-0 py-2 bg-transparent border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-brand-blue transition-colors outline-none" placeholder="owner@example.com">
                        @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-black mb-1">Password</label>
                        <input type="password" wire:model="password" class="w-full px-0 py-2 bg-transparent border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-brand-blue transition-colors outline-none" placeholder="••••••••">
                        @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-brand-blue hover:bg-brand-blue-hover text-white font-bold py-3 px-4 rounded-lg transition-colors mt-4 shadow-lg shadow-brand-blue/30">
                        Log In
                    </button>
                    
                    <p class="text-center text-sm text-gray-600 mt-6">
                        Don't have an account? 
                        <button type="button" @click="isLogin = false; $wire.resetForm()" class="text-brand-blue font-bold hover:underline">Sign up</button>
                    </p>
                </form>

                <!-- SIGN UP FORM -->
                <form wire:submit="register" x-show="!isLogin" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-black mb-1">Full Name</label>
                        <input type="text" wire:model="name" class="w-full px-0 py-2 bg-transparent border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-brand-blue transition-colors outline-none" placeholder="Juan Dela Cruz">
                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-black mb-1">Email Address</label>
                        <input type="email" wire:model="email" class="w-full px-0 py-2 bg-transparent border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-brand-blue transition-colors outline-none" placeholder="owner@example.com">
                        @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-black mb-1">Password</label>
                        <input type="password" wire:model="password" class="w-full px-0 py-2 bg-transparent border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-brand-blue transition-colors outline-none" placeholder="••••••••">
                        @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-brand-blue hover:bg-brand-blue-hover text-white font-bold py-3 px-4 rounded-lg transition-colors mt-4 shadow-lg shadow-brand-blue/30">
                        Sign Up
                    </button>
                    
                    <p class="text-center text-sm text-gray-600 mt-6">
                        Already have an account? 
                        <button type="button" @click="isLogin = true; $wire.resetForm()" class="text-brand-blue font-bold hover:underline">Log in</button>
                    </p>
                </form>
            </div>
        </div>

        <!-- IMAGE CONTAINER (Top on mobile, Right on desktop) -->
        <div class="w-full lg:w-1/2 p-4 lg:p-8 flex items-center justify-center h-[40vh] lg:h-auto">
            
            <!-- Alpine.js Carousel Setup -->
            <div x-data="{
                    activeSlide: 0,
                    slides: [
                        '{{ asset('images/picture1.jpg') }}',
                        '{{ asset('images/picture2.jpg') }}',
                        '{{ asset('images/picture3.jpg') }}',
                        '{{ asset('images/picture4.jpg') }}',
                        '{{ asset('images/picture5.jpg') }}',
                        '{{ asset('images/picture6.jpg') }}',
                        '{{ asset('images/picture7.jpg') }}',


                    ],
                    next() { this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 : this.activeSlide + 1 },
                    prev() { this.activeSlide = this.activeSlide === 0 ? this.slides.length - 1 : this.activeSlide - 1 },
                    init() { setInterval(() => this.next(), 4000) }
                }" 
                class="relative w-full h-full lg:max-h-212.5 rounded-4xl overflow-hidden shadow-2xl bg-gray-200 group">

                <!-- Crossfading Images -->
                <template x-for="(slide, index) in slides" :key="index">
                    <img :src="slide" 
                         x-show="activeSlide === index"
                         x-transition:enter="transition opacity-700 ease-in-out"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition opacity-700 ease-in-out absolute inset-0"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         alt="Doc Jay's Veterinary Clinic" 
                         class="absolute inset-0 w-full h-full object-cover">
                </template>
                
                <!-- Gradient Overlay and Text -->
                <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6 lg:p-12 pointer-events-none z-10">
                    <h2 class="text-white text-2xl lg:text-4xl font-bold mb-1 lg:mb-2 drop-shadow-md">Doc Jay's Veterinary Clinic</h2>
                    <p class="text-white/90 text-sm lg:text-lg drop-shadow">#71 A Panorama St., SSS Village, Marikina City</p>
                    
                    <!-- Slide Indicators (Dots) -->
                    <div class="flex space-x-2 mt-4">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div :class="{'bg-white': activeSlide === index, 'bg-white/40': activeSlide !== index}" 
                                 class="w-2 h-2 rounded-full transition-colors"></div>
                        </template>
                    </div>
                </div>

                <!-- Manual Navigation Arrows -->
                <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-black/30 text-white hover:bg-black/60 transition opacity-0 group-hover:opacity-100 hidden md:block z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                
                <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-black/30 text-white hover:bg-black/60 transition opacity-0 group-hover:opacity-100 hidden md:block z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

            </div>
        </div>
        
    </div>
</div>