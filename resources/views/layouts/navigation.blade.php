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

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-neutral-800/50 border border-neutral-700 text-sm font-medium rounded-lg text-neutral-300 hover:text-white hover:bg-neutral-800 hover:border-neutral-600 focus:outline-none transition-all duration-200">
                            <div class="w-8 h-8 bg-gradient-to-br from-red-600 to-red-700 rounded-full flex items-center justify-center mr-2">
                                <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-neutral-800">
            <div class="px-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-br from-red-600 to-red-700 rounded-full flex items-center justify-center mr-3">
                    <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <div class="font-medium text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-neutral-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4">
                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-neutral-300 rounded-lg hover:bg-neutral-800">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-neutral-300 rounded-lg hover:bg-neutral-800">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
