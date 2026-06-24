<x-layout>
    <x-slot:title>Our Portfolio | McBest Solar</x-slot>
    
    <section class="relative text-white overflow-hidden pt-32 pb-16 lg:pt-40 lg:pb-16 flex items-center">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[20%] right-[30%] w-[30%] h-[30%] rounded-full bg-primary/20 blur-[120px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                Our Work
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                Recent <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Projects</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed font-light">
                Browse our gallery of recent solar installations and electrical projects across Nigeria.
            </p>
        </div>
    </section>

    <div class="py-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Project 1 -->
                <div class="group relative bg-gray-800 rounded-[2rem] overflow-hidden shadow-lg h-80 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-primary font-semibold text-sm tracking-wide uppercase mb-2 block">Residential</span>
                        <h3 class="text-2xl font-bold text-white mb-2">10kVA Hybrid System</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">Lagos State - Full house backup with 15kwh Lithium battery.</p>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="group relative bg-gray-800 rounded-[2rem] overflow-hidden shadow-lg h-80 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1592833159155-c62df1b65634?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-secondary font-semibold text-sm tracking-wide uppercase mb-2 block">Commercial</span>
                        <h3 class="text-2xl font-bold text-white mb-2">20kVA Office Backup</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">Abuja - Running ACs and office equipment seamlessly.</p>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="group relative bg-gray-800 rounded-[2rem] overflow-hidden shadow-lg h-80 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent opacity-90 group-hover:opacity-70 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-warning font-semibold text-sm tracking-wide uppercase mb-2 block">Electrical</span>
                        <h3 class="text-2xl font-bold text-white mb-2">Smart Home Wiring</h3>
                        <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">Port Harcourt - Complete conduit wiring and DB installation.</p>
                    </div>
                </div>

            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('contact') }}" class="inline-flex justify-center items-center bg-primary hover:bg-primary-dark text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg shadow-primary/30 transition-all hover:-translate-y-1">
                    Start Your Project
                </a>
            </div>
        </div>
    </div>
</x-layout>