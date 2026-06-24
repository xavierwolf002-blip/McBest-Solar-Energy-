<div class="p-4 mt-auto border-t border-gray-200 dark:border-white/5">
    <form action="{{ route('filament.admin.auth.logout') }}" method="post">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-800 transition-colors">
            <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            <span class="font-medium">Sign out</span>
        </button>
    </form>
</div>
