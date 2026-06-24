<x-layout>
    <x-slot:title>{{ $project->title }} | McBest Solar</x-slot>
    
    <div class=" pt-32 pb-20 ">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 bg-primary/20 text-primary-light text-sm font-bold rounded-full mb-6 uppercase tracking-widest">{{ $project->category }}</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-6">{{ $project->title }}</h1>
            <div class="flex items-center justify-center space-x-6 text-gray-400">
                <span><i class="fas fa-map-marker-alt text-primary mr-2"></i>{{ $project->location }}</span>
                @if($project->completion_date)
                    <span><i class="fas fa-calendar-check text-primary mr-2"></i>{{ \Carbon\Carbon::parse($project->completion_date)->format('F Y') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-20 relative z-10">
        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full rounded-2xl shadow-2xl border-4 border-white dark:border-gray-800 object-cover max-h-[600px]">
        
        <div class="mt-12 bg-white dark:bg-gray-800 rounded-2xl p-8 md:p-12 shadow-sm border border-gray-100 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Project Overview</h2>
            <div class="prose prose-lg dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                {!! nl2br(e($project->description)) !!}
            </div>
            
            <div class="mt-12 pt-8  dark:border-gray-700 text-center">
                <p class="text-lg text-gray-900 dark:text-white font-semibold mb-6">Want a similar system for your property?</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-primary hover:bg-primary-dark text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-primary/30">
                    Get a Free Quote
                </a>
            </div>
        </div>
    </div>
</x-layout>