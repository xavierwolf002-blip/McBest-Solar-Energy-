<x-layout>
    <x-slot:title>Our Services | McBest Solar</x-slot>
    
    <!-- Hero Section -->
    <section class="relative text-white overflow-hidden pt-32 pb-16 lg:pt-40 lg:pb-16 flex items-center">
        <div class="absolute inset-0 z-0">
            <!-- Abstract Glowing Orbs -->
            <div class="absolute top-[20%] right-[10%] w-[40%] h-[40%] rounded-full bg-primary/20 blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[10%] left-[10%] w-[30%] h-[30%] rounded-full bg-secondary/15 blur-[100px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                Our Expertise
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                Premium <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Energy Solutions</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed font-light">
                Comprehensive solar, electrical, and security services tailored for your home and business with uncompromising quality.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <div class="py-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group bg-gray-800/80 backdrop-blur-xl rounded-[2rem] shadow-lg hover:shadow-[0_0_40px_rgba(34,197,94,0.15)] transition-all duration-500 overflow-hidden border border-gray-700 flex flex-col transform hover:-translate-y-2">
                    <div class="h-56 bg-gray-900 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Solar Installation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-primary/20 backdrop-blur-md rounded-xl flex items-center justify-center text-primary border border-primary/30 mr-4 shadow-inner">
                                <i class="fas fa-solar-panel text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">Solar Installation</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1 group-hover:text-gray-300 transition-colors">End-to-end solar power design and installation. We calculate your load, design the optimal system, and install high-yield panels with deep-cycle lithium batteries for true energy independence.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-primary font-bold hover:text-primary-light group-hover:translate-x-2 transition-transform">
                            Request Quote <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="group bg-gray-800/80 backdrop-blur-xl rounded-[2rem] shadow-lg hover:shadow-[0_0_40px_rgba(56,189,248,0.15)] transition-all duration-500 overflow-hidden border border-gray-700 flex flex-col transform hover:-translate-y-2">
                    <div class="h-56 bg-gray-900 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1620287341056-49a2f1ab2fdc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Inverter Repair" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-secondary/20 backdrop-blur-md rounded-xl flex items-center justify-center text-secondary border border-secondary/30 mr-4 shadow-inner">
                                <i class="fas fa-car-battery text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">Inverter Repair</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1 group-hover:text-gray-300 transition-colors">Expert diagnostics and repair for all inverter brands. Whether it's a blown board, overload error, or battery charging issue, our technicians restore your power fast.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-secondary font-bold hover:text-secondary-light group-hover:translate-x-2 transition-transform">
                            Request Repair <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="group bg-gray-800/80 backdrop-blur-xl rounded-[2rem] shadow-lg hover:shadow-[0_0_40px_rgba(250,204,21,0.15)] transition-all duration-500 overflow-hidden border border-gray-700 flex flex-col transform hover:-translate-y-2">
                    <div class="h-56 bg-gray-900 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="House Wiring" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-warning/20 backdrop-blur-md rounded-xl flex items-center justify-center text-warning border border-warning/30 mr-4 shadow-inner">
                                <i class="fas fa-plug text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">House Wiring</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1 group-hover:text-gray-300 transition-colors">Professional electrical conduit, surface, and conduit wiring for new and existing buildings. We ensure load balancing and strict adherence to safety standards.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-warning font-bold hover:text-yellow-400 group-hover:translate-x-2 transition-transform">
                            Book Electrician <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="group bg-gray-800/80 backdrop-blur-xl rounded-[2rem] shadow-lg hover:shadow-[0_0_40px_rgba(168,85,247,0.15)] transition-all duration-500 overflow-hidden border border-gray-700 flex flex-col transform hover:-translate-y-2">
                    <div class="h-56 bg-gray-900 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Battery Maintenance" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-purple-500/20 backdrop-blur-md rounded-xl flex items-center justify-center text-purple-400 border border-purple-500/30 mr-4 shadow-inner">
                                <i class="fas fa-battery-full text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">Battery Services</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1 group-hover:text-gray-300 transition-colors">Tubular and Lithium battery maintenance, revival, and replacement. We test battery health and provide optimal replacement solutions to extend your backup time.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-purple-400 font-bold hover:text-purple-300 group-hover:translate-x-2 transition-transform">
                            Get Assessment <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="group bg-gray-800/80 backdrop-blur-xl rounded-[2rem] shadow-lg hover:shadow-[0_0_40px_rgba(239,68,68,0.15)] transition-all duration-500 overflow-hidden border border-gray-700 flex flex-col transform hover:-translate-y-2">
                    <div class="h-56 bg-gray-900 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="CCTV Installation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-red-500/20 backdrop-blur-md rounded-xl flex items-center justify-center text-red-400 border border-red-500/30 mr-4 shadow-inner">
                                <i class="fas fa-video text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">CCTV & Security</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1 group-hover:text-gray-300 transition-colors">Secure your premises with high-definition IP and analog CCTV systems. Features include night vision, mobile remote viewing, and motion detection alerts.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-red-400 font-bold hover:text-red-300 group-hover:translate-x-2 transition-transform">
                            Secure My Home <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>