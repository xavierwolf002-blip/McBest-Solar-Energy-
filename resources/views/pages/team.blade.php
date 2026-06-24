<x-layout>
    <x-slot:title>Our Team | McBest Solar</x-slot>
    
    <section class="relative text-white overflow-hidden pt-32 pb-16 lg:pt-40 lg:pb-16 flex items-center">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[20%] left-[20%] w-[30%] h-[30%] rounded-full bg-primary/10 blur-[120px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                The Experts
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                Meet the <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Engineers</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed font-light">
                Our certified technicians and electrical engineers bring decades of combined experience to every project.
            </p>
        </div>
    </section>

    <div class="py-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                
                <!-- Team Member -->
                <div class="group bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-[2rem] overflow-hidden shadow-lg hover:shadow-[0_0_30px_rgba(34,197,94,0.1)] transition-all duration-500">
                    <div class="h-80 bg-gray-800 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center text-gray-600">
                            <i class="fas fa-user-tie text-6xl"></i>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=McBest+CEO&size=512&background=0D1424&color=22C55E" alt="CEO" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                    </div>
                    <div class="p-8 text-center border-t border-gray-800">
                        <h3 class="text-2xl font-bold text-white mb-2">Engr. Emmanuel</h3>
                        <p class="text-primary font-medium mb-4">Founder & Lead Engineer</p>
                        <p class="text-gray-400 text-sm">COREN Certified engineer with 15+ years in renewable energy systems.</p>
                    </div>
                </div>

                <!-- Placeholder Members -->
                <div class="group bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-[2rem] overflow-hidden shadow-lg hover:shadow-[0_0_30px_rgba(34,197,94,0.1)] transition-all duration-500">
                    <div class="h-80 bg-gray-800 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center text-gray-600"><i class="fas fa-user-cog text-6xl"></i></div>
                    </div>
                    <div class="p-8 text-center border-t border-gray-800">
                        <h3 class="text-2xl font-bold text-white mb-2">Senior Technician</h3>
                        <p class="text-secondary font-medium mb-4">Inverter Specialist</p>
                        <p class="text-gray-400 text-sm">Expert in deep-level diagnostics and board repair for all major inverter brands.</p>
                    </div>
                </div>

                <div class="group bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-[2rem] overflow-hidden shadow-lg hover:shadow-[0_0_30px_rgba(34,197,94,0.1)] transition-all duration-500">
                    <div class="h-80 bg-gray-800 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center text-gray-600"><i class="fas fa-user-hard-hat text-6xl"></i></div>
                    </div>
                    <div class="p-8 text-center border-t border-gray-800">
                        <h3 class="text-2xl font-bold text-white mb-2">Installation Lead</h3>
                        <p class="text-warning font-medium mb-4">Field Operations</p>
                        <p class="text-gray-400 text-sm">Ensures every roof mount and wiring conduit is installed to absolute perfection.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>