<div x-data="{ isSidebarOpen: false }">
    <!-- Mobile Menu Toggle Button -->
    <button @click="isSidebarOpen = !isSidebarOpen" aria-label="Toggle navigation menu"
        class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-blue-600 text-white">
        <i class="fas" :class="isSidebarOpen ? 'fa-times' : 'fa-bars'"></i>
    </button>

    <aside
        class="fixed top-0 left-0 z-40 transition-all duration-300 transform lg:translate-x-0 h-screen bg-white/80
        backdrop-blur-xl border-r border-gray-100 shadow-lg w-64 lg:w-64 sm:w-20 xs:w-16 flex flex-col"
        :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        @php
            $userRole = Auth::user()->role; // Ambil role pengguna saat ini
            $menuItems = [
                [
                    'route' => 'dashboard',
                    'label' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'roles' => ['admin', 'teacher', 'student', 'parent'],
                ],
                [
                    'route' => 'profile.index',
                    'label' => 'Profile',
                    'icon' => 'fas fa-user',
                    'roles' => ['admin', 'teacher', 'student', 'parent'],
                ],
                [
                    'route' => 'positions.index',
                    'label' => 'Positions',
                    'icon' => 'fas fa-briefcase',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'teachers.index',
                    'label' => 'Teachers',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'subjects.index',
                    'label' => 'Subjects',
                    'icon' => 'fas fa-book',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'students.index',
                    'label' => 'Students',
                    'icon' => 'fas fa-user-graduate',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'facilitySchedules.index',
                    'label' => 'Facility Schedules',
                    'icon' => 'fas fa-calendar-alt',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'facilities.index',
                    'label' => 'Facilites',
                    'icon' => 'fas fa-calendar-alt',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'classrooms.index',
                    'label' => 'Classrooms',
                    'icon' => 'fas fa-school',
                    'roles' => ['admin', 'teacher', 'student'],
                ],
                [
                    'route' => 'classroomSubjects.index',
                    'label' => 'Courses',
                    'icon' => 'fas fa-book-open',
                    'roles' => ['student'],
                ],
                [
                    'route' => 'attendances.index',
                    'label' => 'Attendances',
                    'icon' => 'fas fa-clipboard-list',
                    'roles' => ['student'],
                ],
                [
                    'route' => 'classroomSubjects.index',
                    'label' => 'Class Schedule',
                    'icon' => 'fas fa-calendar-alt',
                    'roles' => ['teacher'],
                ],
                [
                    'route' => 'consultations.index',
                    'label' => 'Consultations',
                    'icon' => 'fas fa-comments',
                    'roles' => ['teacher', 'student', 'parent'],
                ],
                [
                    'route' => 'appointments.index',
                    'label' => 'Appointments',
                    'icon' => 'fas fa-clock',
                    'roles' => ['teacher'],
                ],
                [
                    'route' => 'exams.index',
                    'label' => 'Exam Management',
                    'icon' => 'fas fa-file-alt',
                    'roles' => ['admin'],
                ],
                [
                    'route' => 'examClassrooms.index',
                    'label' => 'Exam Schedules',
                    'icon' => 'fas fa-file-alt',
                    'roles' => ['teacher', 'student'],
                ],
                [
                    'route' => 'gradeExams.index',
                    'label' => 'Grade Exams',
                    'icon' => 'fas fa-check-circle',
                    'roles' => ['teacher'],
                ],
                [
                    'route' => 'gradeExams.index',
                    'label' => 'Exams Results',
                    'icon' => 'fas fa-check-circle',
                    'roles' => ['student'],
                ],
                [
                    'route' => 'payments.index',
                    'label' => 'Tuition Payments',
                    'icon' => 'fa fa-receipt',
                    'roles' => ['parent', 'admin'],
                ],
            ];
        @endphp
        <!-- Profile Section -->
        <div
            class="flex-shrink-0 px-6 py-6 border-b border-gray-100 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800">
            <div class="flex items-center space-x-4">
                <div class="relative group/profile flex-shrink-0">
                    @php
                        $name = Auth::user()->name;
                        $initials = collect(explode(' ', $name))
                            ->map(function ($segment) {
                                return strtoupper(substr($segment, 0, 1));
                            })
                            ->take(2)
                            ->join('');
                    @endphp

                    @if (Auth::user()->image)
                        <div class="relative overflow-hidden h-12 w-12 lg:h-16 lg:w-16 rounded-full">
                            <img class="h-full w-full object-cover ring-4 ring-white/20 transition-all duration-300 group-hover/profile:scale-110 group-hover/profile:ring-white/40"
                                src="{{ asset('storage/images/users/' . Auth::user()->image) }}"
                                alt="{{ Auth::user()->name }}">
                        </div>
                    @else
                        <div
                            class="h-12 w-12 lg:h-16 lg:w-16 rounded-full bg-blue-600 flex items-center justify-center ring-4 ring-blue-500/30 transition-all duration-300 group-hover/profile:ring-blue-500/50">
                            <span class="text-base lg:text-lg font-medium text-white">{{ $initials }}</span>
                        </div>
                    @endif

                    <span
                        class="absolute bottom-1 right-1 w-3 h-3 lg:w-4 lg:h-4 bg-emerald-400 border-2 border-white rounded-full shadow-lg animate-pulse"></span>
                </div>
                <div class="flex flex-col min-w-0 flex-1">
                    <h2 class="text-lg lg:text-xl font-bold text-white truncate tracking-tight group/name relative"
                        title="{{ Auth::user()->name ?? 'User Name' }}">
                        {{ Auth::user()->name ?? 'User Name' }}
                        <span
                            class="absolute left-0 -bottom-8 hidden group-hover/name:block bg-gray-900 text-white text-sm px-2 py-1 rounded whitespace-nowrap z-10">
                            {{ Auth::user()->name ?? 'User Name' }}
                        </span>
                    </h2>
                    <span class="text-xs lg:text-sm text-blue-100 font-medium tracking-wide truncate">
                        {{ Auth::user()->nim ?? '187221049' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav
            class="flex-1 px-2 lg:px-4 py-4 lg:py-6 space-y-1 lg:space-y-2 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent hover:scrollbar-thumb-gray-400">
            @foreach ($menuItems as $item)
                @if (in_array($userRole, $item['roles']))
                    <!-- Filter menu berdasarkan role -->
                    <a href="{{ route($item['route']) }}"
                        aria-current="{{ request()->routeIs($item['route']) ? 'page' : 'false' }}"
                        class="group flex items-center px-3 lg:px-4 py-2.5 lg:py-3.5 rounded-xl transition-all duration-300
    {{ request()->routeIs($item['route'])
        ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-500/30 scale-105'
        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:shadow-md hover:scale-[1.02]' }}">
                        <div class="relative">
                            <i class="{{ $item['icon'] }}"></i>
                            @if (request()->routeIs($item['route']))
                                <span
                                    class="absolute -right-1 -top-1 w-1.5 h-1.5 lg:w-2 lg:h-2 bg-white rounded-full"></span>
                            @endif
                        </div>
                        <span class="ml-3 lg:ml-4 font-semibold tracking-wide hidden sm:inline-block">
                            {{ $item['label'] }}
                        </span>
                    </a>
                @endif
            @endforeach
        </nav>

        <!-- Logout Button -->
        <div class="flex-shrink-0 px-4 lg:px-6 py-4 lg:py-6 border-t border-gray-100 bg-white/80 backdrop-blur-sm">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="group flex items-center justify-center w-full px-3 lg:px-4 py-2.5 lg:py-3.5 text-sm font-semibold text-white
                        bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-xl 
                        transition-all duration-300 
                        hover:shadow-lg hover:shadow-blue-500/30 hover:scale-[1.02]
                        focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                        active:scale-95">
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-12" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="ml-2 tracking-wider hidden sm:inline-block">Sign Out</span>
                </button>
            </form>
        </div>
    </aside>
</div>

<style>
    @media (max-width: 640px) {
        .xs\:w-16 {
            width: 4rem;
        }
    }

    /* Custom Scrollbar Styling */
    .scrollbar-thin {
        scrollbar-width: thin;
    }

    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
        background: transparent;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
        background-color: rgb(209 213 219);
        /* gray-300 */
        border-radius: 20px;
    }

    .scrollbar-thin:hover::-webkit-scrollbar-thumb {
        background-color: rgb(156 163 175);
        /* gray-400 */
    }
</style>
