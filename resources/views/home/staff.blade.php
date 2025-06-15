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
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-tasks mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-chart-bar mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-envelope mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Messages</span>
                            <span class="ml-auto bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">3</span>
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
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-tasks mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-chart-bar mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-envelope mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Messages</span>
                            <span class="ml-auto bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">3</span>
                        </a>
                    </li>
                    <li class="pt-8 mt-8 border-t border-gray-800">
                        <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-300 hover:text-white group">
                            <i class="fas fa-sign-out-alt mr-3 text-orange-400 group-hover:text-white"></i>
                            <span>Logout</span>
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
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400">pcoming Distributions</p>
                <h3 class="text-2xl font-bold mt-1">24</h3>
            </div>
            <div class="p-3 rounded-full bg-red-900 bg-opacity-30">
                <i class="fas fa-truck text-red-400 text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            
           
        </div>
    </div>


                    <!-- Card 4: Recent Distributions -->
                    <div class="bg-gray-800 rounded-lg p-6 shadow-lg border-l-4 border-red-500 animate-fade-in card-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-400">Recent Distributions</p>
                                <h3 class="text-2xl font-bold mt-1">24</h3>
                            </div>
                            <div class="p-3 rounded-full bg-red-900 bg-opacity-30">
                                <i class="fas fa-truck text-red-400 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm text-gray-400">
                                <span>This Week</span>
                                <span>8</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                <div class="bg-red-500 h-2 rounded-full" style="width: 33%"></div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Distribution Chart -->
                    <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Weekly Food Distribution</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-orange-900 text-orange-300 rounded hover:bg-orange-800">Week</button>
                                <button class="px-3 py-1 text-xs bg-gray-700 text-gray-300 rounded hover:bg-gray-600">Month</button>
                                <button class="px-3 py-1 text-xs bg-gray-700 text-gray-300 rounded hover:bg-gray-600">Year</button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="distributionChart"></canvas>
                        </div>
                    </div>

                    <!-- Task Completion Chart -->
                    <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Task Completion Rate</h3>
                            <div class="flex items-center text-sm text-gray-400">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-1"></span>
                                <span>This Month</span>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="taskChart"></canvas>
                        </div>
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