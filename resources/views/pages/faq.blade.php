<x-layout>
    <x-slot:title>FAQ | McBest Solar</x-slot>
    
    <!-- Hero Section -->
    <section class="relative text-white overflow-hidden pt-32 pb-16 lg:pt-40 lg:pb-16 flex items-center">
        <div class="absolute inset-0 z-0">
            <!-- Abstract Glowing Orbs -->
            <div class="absolute top-[30%] left-[30%] w-[40%] h-[40%] rounded-full bg-primary/20 blur-[120px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                Knowledge Base
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                Frequently Asked <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Questions</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed font-light">
                Find answers to common questions about solar installations, inverter repairs, and our services.
            </p>
        </div>
    </section>

    <div class="py-12 relative overflow-hidden" x-data="{ active: null }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-2xl overflow-hidden shadow-lg transition-all duration-300">
                    <button @click="active !== 1 ? active = 1 : active = null" class="w-full text-left px-8 py-6 flex justify-between items-center focus:outline-none group">
                        <h3 class="text-xl font-bold text-white group-hover:text-primary transition-colors">How long does a solar installation take?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300" :class="{'rotate-180 text-primary': active === 1}"></i>
                    </button>
                    <div x-show="active === 1" x-collapse>
                        <div class="px-8 pb-8 text-gray-400 leading-relaxed border-t border-gray-800 pt-6">
                            Depending on the size of the system, a standard residential solar installation typically takes 1 to 3 days. Commercial installations may take a week or more. We conduct a thorough site survey beforehand to ensure the installation is efficient and minimally disruptive.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-2xl overflow-hidden shadow-lg transition-all duration-300">
                    <button @click="active !== 2 ? active = 2 : active = null" class="w-full text-left px-8 py-6 flex justify-between items-center focus:outline-none group">
                        <h3 class="text-xl font-bold text-white group-hover:text-primary transition-colors">What size of solar system do I need?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300" :class="{'rotate-180 text-primary': active === 2}"></i>
                    </button>
                    <div x-show="active === 2" x-collapse>
                        <div class="px-8 pb-8 text-gray-400 leading-relaxed border-t border-gray-800 pt-6">
                            System size depends on your total energy consumption. We perform a free load audit to calculate your daily wattage usage. Based on that, we recommend the appropriate inverter capacity, number of batteries, and solar panels required to meet your needs reliably.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-2xl overflow-hidden shadow-lg transition-all duration-300">
                    <button @click="active !== 3 ? active = 3 : active = null" class="w-full text-left px-8 py-6 flex justify-between items-center focus:outline-none group">
                        <h3 class="text-xl font-bold text-white group-hover:text-primary transition-colors">Do you provide warranties on your equipment?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300" :class="{'rotate-180 text-primary': active === 3}"></i>
                    </button>
                    <div x-show="active === 3" x-collapse>
                        <div class="px-8 pb-8 text-gray-400 leading-relaxed border-t border-gray-800 pt-6">
                            Yes! We only use Tier-1 equipment. Our solar panels typically come with a 25-year performance warranty. Inverters have a 1-5 year warranty depending on the brand, and lithium batteries come with a 3-5 year warranty. We also provide a 1-year free maintenance guarantee on our workmanship.
                        </div>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-2xl overflow-hidden shadow-lg transition-all duration-300">
                    <button @click="active !== 4 ? active = 4 : active = null" class="w-full text-left px-8 py-6 flex justify-between items-center focus:outline-none group">
                        <h3 class="text-xl font-bold text-white group-hover:text-primary transition-colors">Can you repair an inverter you didn't install?</h3>
                        <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300" :class="{'rotate-180 text-primary': active === 4}"></i>
                    </button>
                    <div x-show="active === 4" x-collapse>
                        <div class="px-8 pb-8 text-gray-400 leading-relaxed border-t border-gray-800 pt-6">
                            Absolutely. Our experienced technicians can diagnose and repair almost all brands of inverters, regardless of who installed them. We handle board repairs, error code resolutions, and general servicing to get your system back online quickly.
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <p class="text-gray-400 mb-6">Still have questions?</p>
                <a href="{{ route('contact') }}" class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 text-white px-8 py-4 rounded-xl font-bold text-lg border border-gray-600 transition-all shadow-lg">
                    Contact Support
                </a>
            </div>
        </div>
    </div>
</x-layout>