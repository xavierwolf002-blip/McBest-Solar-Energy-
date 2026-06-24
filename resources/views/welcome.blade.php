<x-layout>
@if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag)
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
@endif
<?php $component->withAttributes([]); ?>
     <x-slot:title> 
        McBest Renewable Solar Energy | Premium Solar Solutions
     </x-slot>

    <!-- Hero Section -->
    <section class="relative  text-white overflow-hidden min-h-screen flex items-center">
        <div class="absolute inset-0 z-0">
            <!-- Background Image with Parallax Effect -->
            <img src="{{ asset('image/Herosection.jpg') }}" alt="Solar Energy" class="w-full h-full object-cover opacity-30 mix-blend-overlay transform scale-105" />
            
            <!-- Sophisticated Gradients to prevent 'cut' background -->
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/40 via-transparent to-gray-900"></div>
            <!-- Abstract Glowing Orbs -->
            <div class="absolute top-[10%] left-[20%] w-[40%] h-[40%] rounded-full bg-primary/20 blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[20%] right-[10%] w-[30%] h-[30%] rounded-full bg-secondary/20 blur-[100px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 flex flex-col justify-center">
            <div class="max-w-3xl animate-slide-in relative">
                <!-- Pill -->
                <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-semibold text-sm mb-8 border border-gray-700 shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Reliable Power for Nigeria
                </div>
                
                <!-- Headline -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                    Power Your Future with <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Clean Energy</span>
                </h1>
                
                <!-- Subheadline -->
                <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-2xl leading-relaxed font-light">
                    Premium solar installation, inverter repair, and smart home solutions. Say goodbye to power outages and high electricity bills forever.
                </p>
                
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-5 mb-16">
                    <a href="{{ route('contact') }}" class="group relative inline-flex justify-center items-center bg-primary hover:bg-primary-dark text-white px-8 py-4 rounded-xl font-bold text-lg shadow-[0_0_30px_rgba(34,197,94,0.3)] transition-all hover:-translate-y-1 overflow-hidden">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                        <span class="relative z-10 flex items-center">
                            Get a Free Quote
                            <i class="fas fa-arrow-right ml-3 text-sm group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </a>
                    <a href="{{ route('services') }}" class="inline-flex justify-center items-center bg-gray-800/50 hover:bg-gray-800 backdrop-blur-md text-white px-8 py-4 rounded-xl font-bold text-lg transition-all border border-gray-700 hover:-translate-y-1 hover:border-gray-500 hover:shadow-xl">
                        Explore Services
                    </a>
                </div>
            </div>
            
            <!-- Floating Glassmorphic Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl relative z-20">
                <div class="bg-gray-800/40 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-6 shadow-2xl transform hover:-translate-y-1 transition-all">
                    <p class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">500<span class="text-primary">+</span></p>
                    <p class="text-gray-400 font-medium text-sm tracking-wide uppercase">Installations</p>
                </div>
                <div class="bg-gray-800/40 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-6 shadow-2xl transform hover:-translate-y-1 transition-all">
                    <p class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">10<span class="text-primary">+</span></p>
                    <p class="text-gray-400 font-medium text-sm tracking-wide uppercase">Years Exp</p>
                </div>
                <div class="bg-gray-800/40 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-6 shadow-2xl transform hover:-translate-y-1 transition-all">
                    <p class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">24<span class="text-primary">/</span>7</p>
                    <p class="text-gray-400 font-medium text-sm tracking-wide uppercase">Support</p>
                </div>
                <div class="bg-gray-800/40 backdrop-blur-xl border border-gray-700/50 rounded-2xl p-6 shadow-2xl transform hover:-translate-y-1 transition-all">
                    <p class="text-4xl font-extrabold text-white mb-1 drop-shadow-md">100<span class="text-primary">%</span></p>
                    <p class="text-gray-400 font-medium text-sm tracking-wide uppercase">Satisfaction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview Section -->
    <section class="py-24 bg-gray-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary font-bold tracking-wide uppercase mb-2">Our Expertise</h2>
                <h3 class="text-4xl font-extrabold text-white mb-6">Comprehensive Energy Solutions</h3>
                <p class="text-lg text-gray-400">We provide end-to-end solar and electrical services tailored for homes, businesses, and industrial facilities.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group bg-gray-900bg-gray-800 rounded-[2rem] shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-700/50 flex flex-col transform hover:-translate-y-2">
                    <div class="h-64 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Solar Installation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-primary/20 backdrop-blur-md rounded-xl flex items-center justify-center text-primary border border-primary/30 mr-4">
                                <i class="fas fa-solar-panel text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">Solar Installation</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1">Complete solar systems design and installation for uninterrupted power supply using tier-1 panels and smart inverters.</p>
                        <a href="{{ route('services') }}" class="inline-flex items-center text-primary font-bold hover:text-primary-dark group-hover:translate-x-2 transition-transform">
                            Learn more <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="group bg-gray-900bg-gray-800 rounded-[2rem] shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-700/50 flex flex-col transform hover:-translate-y-2">
                    <div class="h-64 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1620287341056-49a2f1ab2fdc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Inverter Repair" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-secondary/20 backdrop-blur-md rounded-xl flex items-center justify-center text-secondary border border-secondary/30 mr-4">
                                <i class="fas fa-car-battery text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">Inverter Repair</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1">Expert diagnosis, repair, and maintenance of all inverter brands to ensure optimal performance and longevity.</p>
                        <a href="{{ route('services') }}" class="inline-flex items-center text-secondary font-bold hover:text-secondary-dark group-hover:translate-x-2 transition-transform">
                            Learn more <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="group bg-gray-900bg-gray-800 rounded-[2rem] shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-700/50 flex flex-col transform hover:-translate-y-2">
                    <div class="h-64 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="House Wiring" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/40 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 flex items-center">
                            <div class="w-12 h-12 bg-warning/20 backdrop-blur-md rounded-xl flex items-center justify-center text-yellow-400 border border-warning/30 mr-4">
                                <i class="fas fa-plug text-xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-white">Electrical Wiring</h4>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-400 mb-8 leading-relaxed flex-1">Professional house and commercial wiring that adheres to safety standards, integrating seamlessly with your solar setup.</p>
                        <a href="{{ route('services') }}" class="inline-flex items-center text-warning font-bold hover:text-yellow-600 group-hover:translate-x-2 transition-transform">
                            Learn more <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('services') }}" class="inline-flex items-center text-white font-bold hover:text-primary dark:hover:text-primary transition-colors">
                    View all services
                    <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us / CTA -->
    <!-- Why Choose Us / CTA -->
    <section class="py-24  text-white relative overflow-hidden ">
        <!-- Abstract Shapes -->
        <div class="absolute top-0 right-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary/20 blur-[120px]"></div>
            <div class="absolute bottom-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-secondary/10 blur-[100px]"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Left Side: Content -->
                <div>
                    <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800 text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase">Partner With Us</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-6 tracking-tight">Why Partner With <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary-light">McBest Solar?</span></h2>
                    <p class="text-xl text-gray-400 mb-10 leading-relaxed">We don't just sell equipment; we provide lasting energy independence with uncompromised quality and dedicated support.</p>
                    
                    <div class="space-y-8">
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gray-800 border border-gray-700 text-primary flex items-center justify-center text-xl shadow-lg group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-xl font-bold mb-2 text-white group-hover:text-primary-light transition-colors">Tier-1 Equipment</h4>
                                <p class="text-gray-400 leading-relaxed">We source only the highest quality solar panels, lithium batteries, and smart inverters with long-term warranties.</p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gray-800 border border-gray-700 text-primary flex items-center justify-center text-xl shadow-lg group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-xl font-bold mb-2 text-white group-hover:text-primary-light transition-colors">Expert Installation</h4>
                                <p class="text-gray-400 leading-relaxed">Our certified engineers ensure safe, highly efficient, and aesthetically pleasing installations tailored to your property.</p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-gray-800 border border-gray-700 text-primary flex items-center justify-center text-xl shadow-lg group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-xl font-bold mb-2 text-white group-hover:text-primary-light transition-colors">After-Sales Support</h4>
                                <p class="text-gray-400 leading-relaxed">A dedicated maintenance and rapid response team is always available to keep your power system running perfectly.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: CTA Card -->
                <div class="relative mt-8 lg:mt-0">
                    <!-- Decorative background card -->
                    
                    
                    <div class="bg-gray-800/90 backdrop-blur-xl border border-gray-700 rounded-[2rem] p-8 md:p-12 shadow-2xl relative text-center flex flex-col justify-center items-center min-h-[400px]">
                        <div class="w-20 h-20 bg-primary/20 text-primary rounded-full flex items-center justify-center text-3xl mb-8 shadow-inner shadow-primary/20">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4 tracking-tight">Ready to power up?</h3>
                        <p class="text-gray-400 mb-10 text-lg">Speak with our expert engineers today to design the perfect solar or electrical system for your specific needs.</p>
                        
                        <a href="{{ route('contact') }}" class="w-full bg-primary hover:bg-primary-dark text-white font-bold text-lg py-4 px-10 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-1 flex items-center justify-center">
                            Contact Us Now
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <p class="text-xs text-center text-gray-500 mt-6 flex items-center justify-center">
                            <i class="fas fa-clock mr-2 text-gray-600"></i> We typically respond within 24 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Floating Action Button -->
    <a href="https://wa.me/2348000000000" target="_blank" class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-lg hover:shadow-2xl hover:scale-110 transition-transform flex items-center justify-center group" aria-label="Chat on WhatsApp">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z" fill-rule="evenodd"/>
            <path d="M20.11 3.888C18.397 2.173 15.274 1 12.03 1 5.942 1 1 5.943 1 12.031c0 2.051.56 4.025 1.624 5.733L1.134 23l5.378-1.425C8.163 22.518 10.05 23 12.029 23c6.088 0 11.03-4.943 11.03-11.031 0-3.244-1.17-6.367-3.949-8.081zm-8.08 17.575c-1.696 0-3.328-.43-4.733-1.246l-.34-.199-3.518.931.942-3.468-.22-.349a9.492 9.492 0 01-1.455-5.083c0-5.263 4.28-9.544 9.543-9.544s9.544 4.281 9.544 9.544-4.281 9.544-9.543 9.544z" fill-rule="evenodd"/>
        </svg>
    </a>
 </x-layout>