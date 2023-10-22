<nav class="bg-blue-200 border-blue-400 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">Qobuk</span>
        </a>
        @include('partials.languages')
        @include('partials.sections_menu')
    </div>
</nav>