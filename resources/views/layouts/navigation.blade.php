<nav x-data="{ open: false }" class="bg-black/95 backdrop-blur-xl border-b border-neutral-800 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <!-- Audi-style rings logo -->
                        <div class="flex items-center space-x-0.5">
                            <div class="w-5 h-5 border-2 border-red-600 rounded-full"></div>
                            <div class="w-5 h-5 border-2 border-neutral-400 rounded-full -ml-2"></div>
                            <div class="w-5 h-5 border-2 border-neutral-400 rounded-full -ml-2"></div>
                            <div class="w-5 h-5 border-2 border-neutral-400 rounded-full -ml-2"></div>
                        </div>
                        <span class="text-white font-bold text-lg tracking-wide">Alba AutoCare</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 {{ request()->routeIs('dashboard') ? 'border-red-600 text-white' : 'border-transparent text-neutral-400 hover:text-white hover:border-neutral-600' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('vehicles.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 {{ request()->routeIs('vehicles.*') ? 'border-red-600 text-white' : 'border-transparent text-neutral-400 hover:text-white hover:border-neutral-600' }}">
                        Kendaraan
                    </a>
                    <a href="{{ route('maintenance-types.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 {{ request()->routeIs('maintenance-types.*') ? 'border-red-600 text-white' : 'border-transparent text-neutral-400 hover:text-white hover:border-neutral-600' }}">
                        Jenis Perawatan
                    </a>
                    <a href="{{ route('maintenances.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 {{ request()->routeIs('maintenances.*') ? 'border-red-600 text-white' : 'border-transparent text-neutral-400 hover:text-white hover:border-neutral-600' }}">
                        Perawatan
                    </a>
                    <a href="{{ route('spare-parts.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 {{ request()->routeIs('spare-parts.*') ? 'border-red-600 text-white' : 'border-transparent text-neutral-400 hover:text-white hover:border-neutral-600' }}">
                        Suku Cadang
                    </a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-neutral-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-neutral-900/95 backdrop-blur-xl border-t border-neutral-800">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-neutral-300 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-neutral-800 text-white border-l-2 border-red-600' : 'hover:bg-neutral-800' }}">
                Dashboard
            </a>
            <a href="{{ route('vehicles.index') }}" class="flex items-center px-4 py-3 text-neutral-300 rounded-lg {{ request()->routeIs('vehicles.*') ? 'bg-neutral-800 text-white border-l-2 border-red-600' : 'hover:bg-neutral-800' }}">
                Kendaraan
            </a>
            <a href="{{ route('maintenance-types.index') }}" class="flex items-center px-4 py-3 text-neutral-300 rounded-lg {{ request()->routeIs('maintenance-types.*') ? 'bg-neutral-800 text-white border-l-2 border-red-600' : 'hover:bg-neutral-800' }}">
                Jenis Perawatan
            </a>
            <a href="{{ route('maintenances.index') }}" class="flex items-center px-4 py-3 text-neutral-300 rounded-lg {{ request()->routeIs('maintenances.*') ? 'bg-neutral-800 text-white border-l-2 border-red-600' : 'hover:bg-neutral-800' }}">
                Perawatan
            </a>
            <a href="{{ route('spare-parts.index') }}" class="flex items-center px-4 py-3 text-neutral-300 rounded-lg {{ request()->routeIs('spare-parts.*') ? 'bg-neutral-800 text-white border-l-2 border-red-600' : 'hover:bg-neutral-800' }}">
                Suku Cadang
            </a>
        </div>
    </div>
</nav>
