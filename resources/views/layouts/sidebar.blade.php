<aside
    class="w-64 min-h-screen fixed bg-white/80 backdrop-blur-xl border-r border-gray-100 shadow-lg top-0 left-0 transition-all duration-300 group/sidebar">
    {{-- Profile Section dengan glassmorphism effect --}}
    <div class="relative px-6 py-6 border-b border-gray-100 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800">
        <div class="flex items-center space-x-4">
            <div class="relative group/profile">
                <img class="h-16 w-16 rounded-full object-cover ring-4 ring-white/20 p-0.5 transition-all duration-300 group-hover/profile:scale-105"
                    src="{{ asset('assets/images/airlangga.png') }}" alt="{{ Auth::user()->name ?? 'Profile' }}">
                <span
                    class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-400 border-2 border-white rounded-full shadow-lg animate-pulse"></span>
            </div>
            <div class="flex flex-col">
                <h2 class="text-xl font-bold text-white truncate tracking-tight">
                    {{ Auth::user()->name ?? 'User Name' }}
                </h2>
                <span
                    class="text-sm text-blue-100 font-medium tracking-wide">{{ Auth::user()->nim ?? '187221049' }}</span>
            </div>
        </div>
    </div>

    <nav class="px-4 py-6 space-y-2">
        {{-- Menu Items dengan improved hover & active states --}}
        @php
            $menuItems = [
                [
                    'route' => 'dashboard',
                    'label' => 'Dashboard',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
                ],
                [
                    'route' => 'profile.index',
                    'label' => 'Profile',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
                ],
                [
                    'route' => 'positions.index',
                    'label' => 'Positions',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>',
                ],
                [
                    'route' => 'teachers.index',
                    'label' => 'Teachers',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>',
                ],
                [
                    'route' => 'subjects.index',
                    'label' => 'Subjects',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                ],
                [
                    'route' => 'students.index',
                    'label' => 'Students',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                ],
                [
                    'route' => 'classrooms.index',
                    'label' => 'Classrooms',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V18a2 2 0 01-2 2H5a2 2 0 01-2-2V9.75zm6 7.5h6m-6-4h6"/>',
                ],
                [
                    'route' => 'classroom-subjects.index',
                    'label' => 'Class Schedule',
                    'icon' =>
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20h10a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2zm0 0h0"/>',
                ],
            ];
        @endphp

        @foreach ($menuItems as $item)
            <a href="{{ route($item['route']) }}"
                class="group flex items-center px-4 py-3.5 rounded-xl transition-all duration-300
                    {{ request()->routeIs($item['route'])
                        ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/30 scale-105'
                        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:shadow-md hover:scale-[1.02]' }}">
                <div class="relative">
                    <svg class="w-5 h-5 transition-all duration-300 group-hover:scale-110" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        {!! $item['icon'] !!}
                    </svg>
                    @if (request()->routeIs($item['route']))
                        <span class="absolute -right-1 -top-1 w-2 h-2 bg-white rounded-full"></span>
                    @endif
                </div>
                <span class="ml-4 font-semibold tracking-wide">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    {{-- Logout Button dengan improved styling --}}
    <div class="absolute w-full bottom-0 px-6 py-6 border-t border-gray-100 bg-white/80 backdrop-blur-sm">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="group flex items-center justify-center w-full px-4 py-3.5 text-sm font-semibold text-white
                    bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-xl 
                    transition-all duration-300 
                    hover:shadow-lg hover:shadow-blue-500/30 hover:scale-[1.02]
                    focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                    active:scale-95">
                <svg class="w-4 h-4 mr-2 transition-transform duration-300 group-hover:rotate-12" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="tracking-wider">Sign Out</span>
            </button>
        </form>
    </div>
</aside>
