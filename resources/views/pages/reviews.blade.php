<x-layout>
    <x-slot:title> Customer Reviews | McBest Solar </x-slot>
    
    <!-- Hero Section -->
    <section class="relative text-white overflow-hidden pt-32 pb-16 lg:pt-40 lg:pb-16 flex items-center">
        <div class="absolute inset-0 z-0">
            <!-- Abstract Glowing Orbs -->
            <div class="absolute top-[20%] right-[30%] w-[30%] h-[30%] rounded-full bg-primary/20 blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[10%] left-[20%] w-[30%] h-[30%] rounded-full bg-warning/15 blur-[100px] pointer-events-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-gray-800/80 backdrop-blur-md text-primary-light font-bold text-sm mb-6 border border-gray-700 tracking-wide uppercase shadow-[0_0_15px_rgba(34,197,94,0.15)]">
                Testimonials
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 leading-[1.1]">
                Client <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-primary-light to-secondary drop-shadow-sm">Feedback</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed font-light">
                Don't just take our word for it. Hear what our satisfied clients have to say about our energy solutions.
            </p>
        </div>
    </section>

    <div class="py-12 relative overflow-hidden" x-data="{ showForm: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex flex-col sm:flex-row justify-between items-center sm:items-end mb-12 gap-6">
                <div class="text-center sm:text-left">
                    <h2 class="text-3xl font-bold text-white tracking-tight">Recent Reviews</h2>
                    <p class="text-gray-400 mt-2">Verified feedback from our customers</p>
                </div>
                <button @click="showForm = !showForm" class="bg-primary hover:bg-primary-dark text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-primary/20 transition-all">
                    <span x-show="!showForm">Leave a Review</span>
                    <span x-show="showForm" x-cloak>Cancel</span>
                </button>
            </div>

            <!-- Leave a Review Form -->
            <div x-show="showForm" x-collapse x-cloak class="mb-16">
                <div class="bg-gray-800/60 backdrop-blur-xl border border-gray-700 rounded-3xl p-8 max-w-3xl mx-auto shadow-2xl">
                    <h3 class="text-2xl font-bold text-white mb-6">Share your experience</h3>
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 text-green-400 rounded-xl">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('reviews.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Your Name</label>
                                <input type="text" name="customer_name" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Location</label>
                                <input type="text" name="location" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="e.g. Lagos, Abuja">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Service Type</label>
                                <select name="service_type" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                                    <option value="" disabled selected class="bg-gray-800 text-white">Select a service</option>
                                    <option value="Solar Installation" class="bg-gray-800 text-white">Solar Installation</option>
                                    <option value="Inverter System" class="bg-gray-800 text-white">Inverter System</option>
                                    <option value="Battery Replacement" class="bg-gray-800 text-white">Battery Replacement</option>
                                    <option value="Maintenance" class="bg-gray-800 text-white">Maintenance</option>
                                    <option value="Other" class="bg-gray-800 text-white">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Rating (1-5)</label>
                                <select name="rating" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                                    <option value="5" class="bg-gray-800 text-white">5 - Excellent</option>
                                    <option value="4" class="bg-gray-800 text-white">4 - Very Good</option>
                                    <option value="3" class="bg-gray-800 text-white">3 - Good</option>
                                    <option value="2" class="bg-gray-800 text-white">2 - Fair</option>
                                    <option value="1" class="bg-gray-800 text-white">1 - Poor</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Your Review</label>
                            <textarea name="review_text" rows="4" required class="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-4 px-8 rounded-xl shadow-lg shadow-primary/20 transition-all flex items-center justify-center">
                            Submit Review
                            <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Reviews Grid -->
            @if($reviews->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($reviews as $review)
                        <div class="bg-gray-800/40 backdrop-blur-md border border-gray-700/50 rounded-3xl p-8 hover:bg-gray-800/60 transition-all hover:-translate-y-1 group flex flex-col h-full">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex gap-1 text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star text-sm"></i>
                                        @else
                                            <i class="far fa-star text-sm opacity-30"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-500 font-medium bg-gray-900/50 px-3 py-1 rounded-full">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <p class="text-gray-300 mb-8 leading-relaxed flex-grow text-lg italic">"{!! nl2br(e($review->review_text)) !!}"</p>
                            
                            <div class="flex items-center pt-6 border-t border-gray-700/50 mt-auto">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/5 rounded-full flex items-center justify-center text-primary font-bold text-xl border border-primary/20 mr-4 shadow-inner">
                                    {{ substr($review->customer_name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-white font-bold">{{ $review->customer_name }}</h4>
                                    <p class="text-sm text-gray-400 flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-primary/70 mr-1.5"></i> {{ $review->location }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center text-sm">
                                <span class="bg-gray-900/50 text-gray-400 px-3 py-1 rounded-md">{{ $review->service_type }}</span>
                                <form action="{{ route('reviews.helpful', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-gray-500 hover:text-primary transition-colors flex items-center">
                                        <i class="far fa-thumbs-up mr-1.5"></i> Helpful ({{ $review->helpful_count ?? 0 }})
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16">
                    {{ $reviews->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-gray-800/30 rounded-3xl border border-gray-700/50">
                    <div class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center text-gray-500 mx-auto mb-6 text-3xl">
                        <i class="far fa-comment-dots"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">No Reviews Yet</h3>
                    <p class="text-gray-400">Be the first to share your experience with McBest Solar!</p>
                </div>
            @endif

        </div>
    </div>
</x-layout>