<x-layout>
    <x-slot:title>Contact Us | McBest Solar</x-slot>
    
    <!-- Hero Section -->
    <section class="relative text-white overflow-hidden pt-32 pb-16 lg:pt-40 lg:pb-16 flex items-center">
        <div class="absolute inset-0 z-0">
            <!-- Abstract Glowing Orbs -->
            <div class="absolute top-[20%] right-[20%] w-[30%] h-[30%] rounded-full bg-primary/20 blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[10%] left-[20%] w-[30%] h-[30%] rounded-full bg-secondary/15 blur-[100px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                Get In Touch
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                Let's Build Your <br/><span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Energy Independence</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed font-light">
                Have questions or ready to start your solar project? Our team is here to provide expert guidance and support.
            </p>
        </div>
    </section>

    <div class="py-12 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                
                <!-- Contact Info -->
                <div class="space-y-8">
                    <h2 class="text-3xl font-bold text-white mb-8 tracking-tight">Contact Information</h2>
                    
                    <div class="group bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-[2rem] p-8 flex items-start shadow-lg hover:border-primary/50 transition-all duration-300">
                        <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center text-primary text-2xl shrink-0 group-hover:bg-primary group-hover:text-white transition-all shadow-inner border border-gray-700">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white mb-2">Our Office</h3>
                            <p class="text-gray-400 leading-relaxed">123 Solar Way, Tech District<br>Lagos, Nigeria</p>
                        </div>
                    </div>

                    <div class="group bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-[2rem] p-8 flex items-start shadow-lg hover:border-secondary/50 transition-all duration-300">
                        <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center text-secondary text-2xl shrink-0 group-hover:bg-secondary group-hover:text-white transition-all shadow-inner border border-gray-700">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white mb-2">Call Us</h3>
                            <p class="text-gray-400 leading-relaxed">+234 801 234 5678<br>Mon-Fri, 8am - 6pm</p>
                        </div>
                    </div>

                    <div class="group bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-[2rem] p-8 flex items-start shadow-lg hover:border-warning/50 transition-all duration-300">
                        <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center text-warning text-2xl shrink-0 group-hover:bg-warning group-hover:text-white transition-all shadow-inner border border-gray-700">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-white mb-2">Email Us</h3>
                            <p class="text-gray-400 leading-relaxed">hello@mcbestsolar.com<br>support@mcbestsolar.com</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-[2.5rem] transform rotate-2 scale-105 opacity-20 blur-xl"></div>
                    <div class="bg-gray-800/90 backdrop-blur-xl border border-gray-700 rounded-[2.5rem] p-10 md:p-12 shadow-2xl relative">
                        <h3 class="text-3xl font-bold text-white mb-8 tracking-tight">Send a Message</h3>
                        
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-300 mb-2">Full Name</label>
                                    <input type="text" name="name" id="name" required class="w-full px-5 py-4 rounded-xl border border-gray-600 bg-gray-900/50 text-white placeholder-gray-500 focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="John Doe">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-300 mb-2">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" required class="w-full px-5 py-4 rounded-xl border border-gray-600 bg-gray-900/50 text-white placeholder-gray-500 focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="0801 234 5678">
                                </div>
                            </div>
                            
                            <div>
                                <label for="service" class="block text-sm font-semibold text-gray-300 mb-2">Service Required</label>
                                <select name="service" id="service" class="w-full px-5 py-4 rounded-xl border border-gray-600 bg-gray-900/50 text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none">
                                    <option value="" disabled selected class="bg-gray-800 text-white">Select a service</option>
                                    <option value="solar" class="bg-gray-800 text-white">Solar Installation</option>
                                    <option value="inverter" class="bg-gray-800 text-white">Inverter Repair</option>
                                    <option value="wiring" class="bg-gray-800 text-white">Electrical Wiring</option>
                                    <option value="other" class="bg-gray-800 text-white">Other / Inquiry</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-300 mb-2">Your Message</label>
                                <textarea name="message" id="message" rows="5" required class="w-full px-5 py-4 rounded-xl border border-gray-600 bg-gray-900/50 text-white placeholder-gray-500 focus:ring-2 focus:ring-primary focus:border-transparent transition-all" placeholder="How can we help you?"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold text-lg py-4 px-6 rounded-xl shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-1 mt-4 flex items-center justify-center">
                                Send Message <i class="fas fa-paper-plane ml-3"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>