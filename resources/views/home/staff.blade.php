<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Staff Panel</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li class="dropdown-header">Manage Account</li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<body class="bg-black text-gray-100 font-sans overflow-hidden">
    <div class="flex h-screen">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-gray-900 border-r border-gray-800 flex-shrink-0 hidden md:block">
            <div class="p-4 border-b border-gray-800">
                <h1 class="text-2xl font-bold text-orange-500 flex items-center">
                    <i class="fas fa-hands-helping mr-2"></i>
                    <!-- hii ni Icon -->
                    <span>Convoy of Hope</span>
                </h1>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg bg-orange-900 text-white group">
                            <i class="fas fa-tachometer-alt mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                   
                </ul>
            </nav>
            
        </aside>

        <!-- Mobile sidebar toggle -->
        <div class="md:hidden fixed bottom-4 right-4 z-50">
            <button id="mobile-menu-button" class="p-3 bg-orange-600 rounded-full shadow-lg hover:bg-orange-700 focus:outline-none">
                <i class="fas fa-bars text-white"></i>
            </button>
        </div>

        <!-- Mobile sidebar (hidden by default) -->
        <div id="mobile-sidebar" class="fixed inset-0 bg-gray-900 z-40 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
            <div class="p-4 border-b border-gray-800">
                <h1 class="text-2xl font-bold text-orange-500 flex items-center justify-between">
                    <span class="flex items-center">
                        <i class="fas fa-hands-helping mr-2"></i>
                        FoodRelief
                    </span>
                    <button id="close-mobile-menu" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </h1>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg bg-orange-900 text-white group">
                            <i class="fas fa-tachometer-alt mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-gray-900 border-b border-gray-800 p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold">Dashboard</h2>
                    <span class="ml-4 text-sm text-gray-400 hidden md:block">Welcome back, {{ Auth::user()->name }}! Today is <span id="current-date" class="text-orange-400"></span></span>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full hover:bg-gray-800 relative">
                        <i class="fas fa-bell text-gray-300 hover:text-white"></i>
                        <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-orange-500"></span>
                    </button>
                    
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-900">
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                   

                    <!-- Card 2: Unread Messages -->
                    <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-l-4 border-amber-500 animate-fade-in card-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400">Unread Messages</p>
                                <h3 class="text-2xl font-bold mt-1">{{$count}}</h3>
                            </div>
       
                            <!-- Envelope Icon (Trigger Modal) -->
<div class="p-3 rounded-full bg-amber-900 bg-opacity-30 cursor-pointer" data-bs-toggle="modal" data-bs-target="#unreadMessagesModal">
    <i class="fas fa-envelope text-amber-400 text-xl"></i>
</div>

                        </div>
                        <div class="mt-4">
             
                        </div>
                    </div>

                    <!-- Unread Messages Modal -->
<div class="modal fade" id="unreadMessagesModal" tabindex="-1" aria-labelledby="unreadMessagesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content bg-gray-900 text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="unreadMessagesModalLabel">Unread Messages</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @forelse($unreadMessages as $msg)
        <div class="mb-4 p-4 rounded bg-gray-800 border-l-4 border-yellow-400 shadow">
            <p><strong>From:</strong> {{ $msg->user->name }}</p>
            <p>{{ $msg->message }}</p>
            <p class="text-xs text-gray-400">Sent: {{ $msg->created_at->format('M j, Y - h:i A') }}</p>

            <form action="{{ route('staff.reply', $msg->id) }}" method="POST" class="mt-2">
                @csrf
                <textarea name="reply" class="form-control text-black" placeholder="Type your reply..."></textarea>
                <button type="submit" class="btn btn-success btn-sm mt-2">Send Reply</button>
            </form>
        </div>
        @empty
            <p class="text-center text-gray-400">No unread messages.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>

         
                    <!-- Card 3: Assigned Regions -->
                    <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-l-4 border-yellow-500 animate-fade-in card-3">
                        <div class="flex items-center justify-between cursor-pointer" data-bs-toggle="modal" data-bs-target="#assignmentsModal">
                            <div>
                                <p class="text-gray-400">All Assigned Events</p>
                                <h3 class="text-2xl font-bold mt-1">{{ $assignments->count() }}</h3>
                            </div>
                            <div class="p-3 rounded-full bg-yellow-900 bg-opacity-30">
                                <i class="fas fa-map-marked-alt text-yellow-400 text-xl"></i>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm text-gray-400">
                                
                            </div>
                            
                        </div>
                    </div>
                                                <!-- Bootstrap Modal -->
                            <div class="modal fade" id="assignmentsModal" tabindex="-1" aria-labelledby="assignmentsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title" id="assignmentsModalLabel">Your Assigned Events ({{ $assignments->count() }})</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                    @if($assignments->count())
                                        <ul class="list-group">
                                            @foreach($assignments as $assignment)
                                                <li class="list-group-item">
                                                    <strong>{{ $assignment->event->title }}</strong> <br>
                                                    <span>Venue: {{ $assignment->event->venue }}</span> <br>
                                                    <span>Items: {{ $assignment->items }}</span> <br>
                                                    <span>Budget: KES {{ number_format($assignment->budget, 2) }}</span> <br>
                                                    <small class="text-muted">Assigned on: {{ $assignment->created_at->format('M d, Y') }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-center text-muted">No assignments yet.</p>
                                    @endif
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!--card5 : upcoming events assigned-->

                            <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-l-4 border-red-500 animate-fade-in card-4">
        <div class="flex items-center justify-between cursor-pointer" onclick="toggleUpcomingModal()">
    <div>
        <p class="text-gray-400">Upcoming Assignments</p>
        <h3 class="text-2xl font-bold mt-1">{{ $upcomingCount }}</h3>
    </div>
    <div class="p-3 rounded-full bg-red-900 bg-opacity-30">
        <i class="fas fa-truck text-red-400 text-xl"></i>
    </div>
</div>
        <div class="mt-4">
        </div>
    </div>
    <!-- Upcoming Assignments Modal -->
<div id="upcomingModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-gray-800 w-11/12 md:w-2/3 lg:w-1/2 rounded-lg shadow-lg p-6 relative">
        <button onclick="toggleUpcomingModal()" class="absolute top-2 right-2 text-gray-400 hover:text-white text-xl">&times;</button>
        <h2 class="text-xl font-bold mb-4 text-white">Upcoming Assignments</h2>
        <div class="overflow-x-auto max-h-[400px] overflow-y-auto">
            <table class="min-w-full text-sm text-left text-gray-300">
                <thead class="bg-gray-700 text-gray-400 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-2">Event</th>
                        <th class="px-4 py-2">Venue</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Staff</th>
                        <th class="px-4 py-2">Budget</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($upcomingAssignments as $assignment)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2">{{ $assignment->event->title }}</td>
                            <td class="px-4 py-2 text-orange-300">{{ $assignment->event->venue }}</td>
                            <td class="px-4 py-2">{{ $assignment->event->event_date }}</td>
                            <td class="px-4 py-2">{{ $assignment->staff->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-green-300">Ksh {{ number_format($assignment->budget) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-red-400">No upcoming assignments</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function toggleUpcomingModal() {
        const modal = document.getElementById('upcomingModal');
        modal.classList.toggle('hidden');
    }
</script>



                    
                </div>

<div class="bg-gray-800 p-6 rounded-xl shadow-lg mt-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-orange-400">Staff Activity Reports</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-white">
        <!-- Total Assignments -->
        <div class="bg-gray-700 p-4 rounded-lg shadow">
            <p class="text-gray-300">Total Assignments</p>
            <h3 class="text-2xl font-bold text-orange-400 mt-2">{{ $totalAssignments }}</h3>
        </div>

        <!-- Upcoming Assignments -->
        <div class="bg-gray-700 p-4 rounded-lg shadow">
            <p class="text-gray-300">Upcoming Assignments</p>
            <h3 class="text-2xl font-bold text-orange-400 mt-2">{{ $upcomingCount }}</h3>
        </div>

        <!-- Completed Assignments -->
        <div class="bg-gray-700 p-4 rounded-lg shadow">
            <p class="text-gray-300">Past Assignments</p>
            <h3 class="text-2xl font-bold text-orange-400 mt-2">{{ $pastCount }}</h3>
        </div>
    </div>

    <!-- Chart Placeholder -->
    <div class="mt-8 bg-gray-700 p-6 rounded-lg shadow">
        <h4 class="text-lg font-semibold text-orange-300 mb-4">Monthly Assignment Overview</h4>
        <canvas id="assignmentsChart" height="100"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- Upcoming Events Banner -->
<div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden relative mt-8">
    <h2 class="text-white text-lg font-bold p-4">Upcoming Events</h2>

    <div id="carousel" class="relative">
        <div class="relative h-56 sm:h-64 overflow-hidden rounded-xl">
            @foreach($upcomingEvents as $index => $event)
                <div 
                    class="carousel-slide absolute inset-0 transition-opacity duration-1000 ease-in-out cursor-pointer @if($index === 0) opacity-100 @else opacity-0 @endif"
                    onclick="showModal({{ $event->id }})"
                >
                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-full h-full object-cover rounded">
                    <div class="absolute bottom-0 bg-black/60 w-full p-3 text-white">
                        <div class="text-lg font-bold">{{ $event->title }}</div>
                        <div class="text-sm">{{ $event->venue }}</div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $event->id }}" 
                    class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
                    onclick="closeModal({{ $event->id }})"
                >
                    <div class="modal-content bg-white rounded-xl p-6 max-w-md w-full relative" onclick="event.stopPropagation()">
                        <button type="button" onclick="closeModal({{ $event->id }})" class="absolute top-2 right-3 text-xl font-bold text-gray-700 hover:text-black">&times;</button>

                        <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                        <p class="text-sm text-gray-600"><strong>Venue:</strong> {{ $event->venue }}</p>
                        <p class="mt-2 text-gray-700">{{ $event->description }}</p>
                        <p class="text-xs text-gray-500 mt-4">Date: {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Carousel Controls -->
        <button onclick="prevSlide()" class="absolute top-1/2 left-2 transform -translate-y-1/2 text-white bg-black/50 rounded-full p-2 hover:bg-black/70 z-10">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="nextSlide()" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-white bg-black/50 rounded-full p-2 hover:bg-black/70 z-10">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>


                <!-- Recent Activity Table -->
                <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Recent Activities</h3>
                        
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Events</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Venue</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Budget</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">staff</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
    @forelse ($pastAssignments as $assignment)
        <tr class="hover:bg-gray-700">
            <td class="px-4 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-white">
                    {{ $assignment->event->title }}
                </div>
            </td>
            <td class="px-4 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-900 text-orange-300">
                    {{ $assignment->event->venue }}
                </span>
            </td>
            <td class="px-4 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-300">
                    KES {{ number_format($assignment->budget, 2) }}
                </span>
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-400">
                {{ \Carbon\Carbon::parse($assignment->event->event_date)->format('M d, Y') }}
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-white">
                {{ $assignment->staff->name }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-400">No past assignments available.</td>
        </tr>
    @endforelse
</tbody>

                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const closeMobileMenu = document.getElementById('close-mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileSidebar.classList.remove('-translate-x-full');
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileSidebar.classList.add('-translate-x-full');
        });

        // Set current date
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const currentDate = new Date().toLocaleDateString('en-US', options);
        document.getElementById('current-date').textContent = currentDate;

        // Distribution Chart
        const distributionCtx = document.getElementById('distributionChart').getContext('2d');
        const distributionChart = new Chart(distributionCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Food Packs Distributed',
                    data: [120, 190, 150, 210, 180, 90, 60],
                    backgroundColor: [
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(249, 115, 22, 0.7)'
                    ],
                    borderColor: [
                        'rgba(249, 115, 22, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(249, 115, 22, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(55, 65, 81, 0.5)'
                        },
                        ticks: {
                            color: 'rgba(156, 163, 175, 1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'rgba(156, 163, 175, 1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.9)',
                        titleColor: 'rgba(249, 115, 22, 1)',
                        bodyColor: 'rgba(209, 213, 219, 1)',
                        borderColor: 'rgba(55, 65, 81, 1)',
                        borderWidth: 1,
                        padding: 10
                    }
                }
            }
        });

        // Task Completion Chart
        const taskCtx = document.getElementById('taskChart').getContext('2d');
        const taskChart = new Chart(taskCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Task Completion Rate',
                    data: [65, 75, 80, 90],
                    fill: true,
                    backgroundColor: 'rgba(249, 115, 22, 0.1)',
                    borderColor: 'rgba(249, 115, 22, 1)',
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(249, 115, 22, 1)',
                    pointBorderColor: '#fff',
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: 'rgba(249, 115, 22, 1)',
                    pointHoverBorderColor: '#fff',
                    pointHitRadius: 10,
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            color: 'rgba(55, 65, 81, 0.5)'
                        },
                        ticks: {
                            color: 'rgba(156, 163, 175, 1)',
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'rgba(156, 163, 175, 1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.9)',
                        titleColor: 'rgba(249, 115, 22, 1)',
                        bodyColor: 'rgba(209, 213, 219, 1)',
                        borderColor: 'rgba(55, 65, 81, 1)',
                        borderWidth: 1,
                        padding: 10,
                        callbacks: {
                            label: function(context) {
                                return 'Completion: ' + context.parsed.y + '%';
                            }
                        }
                    }
                }
            }
        });

        //reports
            const ctx = document.getElementById('assignmentsChart').getContext('2d');

    const assignmentsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($monthlyLabels) !!}, // e.g., ['Jan', 'Feb', 'Mar']
            datasets: [{
                label: 'Assignments',
                data: {!! json_encode($monthlyCounts) !!}, // e.g., [5, 2, 3]
                backgroundColor: 'rgba(255, 165, 0, 0.7)',
                borderColor: 'orange',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
            }
        }
    });
    
    </script>

    
    <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('opacity-100');
            slide.classList.add('opacity-0');
        });
        slides[index].classList.remove('opacity-0');
        slides[index].classList.add('opacity-100');
        currentSlide = index;
    }

    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }

    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }

    // Auto-slide every 3 seconds
    setInterval(() => {
        nextSlide();
    }, 3000);

    // Modal functions
    function showModal(id) {
        document.getElementById(`modal-${id}`).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(`modal-${id}`).classList.add('hidden');
    }
</script>

</body>
@include('home.footer')
<style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        ::-webkit-scrollbar-thumb {
            background: #f97316;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ea580c;
        }
        
        /* Animation for cards, si lazima but usitoe*/
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        
        /* Delay animations for each card */
        .card-1 { animation-delay: 0.1s; }
        .card-2 { animation-delay: 0.2s; }
        .card-3 { animation-delay: 0.3s; }
        .card-4 { animation-delay: 0.4s; }
    </style>
</html>