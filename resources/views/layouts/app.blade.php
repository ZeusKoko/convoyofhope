<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
         <script src="https://cdn.tailwindcss.com"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="gradient-bg text-gray-100 min-h-screen">
        <x-banner />


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">user Panel</a>

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

<div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold">Welcome back, <span class="orange-text">{{ Auth::user()->name }}</span>!</h1>
                <p class="text-gray-400">Your generosity makes a difference. Thank you!</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <div class="absolute -right-1 -top-1 h-3 w-3 rounded-full bg-orange-500"></div>
                    <i class="fas fa-bell text-2xl text-gray-300 hover:text-white cursor-pointer"></i>
                </div>
                <div class="h-10 w-10 rounded-full bg-orange-500 flex items-center justify-center">
                    <span class="font-bold">{{ strtoupper(Auth::user()->name[0]) }}
</span>
                </div>
            </div>
        </header>

        <!-- Summary Cards -->
        <div class="summary-cards grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-gray-800 rounded-xl p-6 shadow-lg transition-all duration-300 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400">Total Donations</p>
                        <h2 class="text-3xl font-bold mt-2">24</h2>
                    </div>
                    <div class="p-3 rounded-lg bg-gray-700">
                        <i class="fas fa-hand-holding-heart text-orange-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700 flex items-center">
                    <span class="text-green-400 text-sm"><i class="fas fa-arrow-up mr-1"></i> 12%</span>
                    <span class="text-gray-400 text-sm ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 shadow-lg transition-all duration-300 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400">Amount Donated</p>
                        <h2 class="text-3xl font-bold mt-2">$1,245</h2>
                    </div>
                    <div class="p-3 rounded-lg bg-gray-700">
                        <i class="fas fa-dollar-sign text-orange-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700 flex items-center">
                    <span class="text-green-400 text-sm"><i class="fas fa-arrow-up mr-1"></i> 8%</span>
                    <span class="text-gray-400 text-sm ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 shadow-lg transition-all duration-300 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-400">Latest Donation</p>
                        <h2 class="text-3xl font-bold mt-2">$150</h2>
                    </div>
                    <div class="p-3 rounded-lg bg-gray-700">
                        <i class="fas fa-calendar-check text-orange-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <span class="text-gray-400 text-sm">Medical supplies on May 15</span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
            <!-- Recent Donations Table -->
            <div class="lg:col-span-2 bg-gray-800 rounded-xl p-6 shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Recent Donations</h2>
                    <button class="text-orange-500 hover:text-orange-400 text-sm font-medium">
                        View All <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-400 text-left border-b border-gray-700">
                                <th class="pb-3">Item</th>
                                <th class="pb-3">Category</th>
                                <th class="pb-3">Date</th>
                                <th class="pb-3">Status</th>
                                <th class="pb-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr class="hover:bg-gray-700/50">
                                <td class="py-4">Winter Clothing Pack</td>
                                <td class="py-4">Clothes</td>
                                <td class="py-4">May 15, 2023</td>
                                <td class="py-4">
                                    <span class="donation-completed px-3 py-1 rounded-full text-sm">Completed</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-700/50">
                                <td class="py-4">Canned Food</td>
                                <td class="py-4">Food</td>
                                <td class="py-4">May 10, 2023</td>
                                <td class="py-4">
                                    <span class="donation-completed px-3 py-1 rounded-full text-sm">Completed</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-700/50">
                                <td class="py-4">First Aid Kits</td>
                                <td class="py-4">Medical</td>
                                <td class="py-4">May 5, 2023</td>
                                <td class="py-4">
                                    <span class="donation-pending px-3 py-1 rounded-full text-sm">Pending</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-700/50">
                                <td class="py-4">Children's Books</td>
                                <td class="py-4">Education</td>
                                <td class="py-4">Apr 28, 2023</td>
                                <td class="py-4">
                                    <span class="donation-completed px-3 py-1 rounded-full text-sm">Completed</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Donate -->
            <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                <h2 class="text-xl font-bold mb-6">Quick Donate</h2>
                <div class="orange-accent rounded-xl p-6 mb-6">
                    <h3 class="font-bold text-lg mb-2">Make an Impact Today</h3>
                    <p class="text-sm mb-4">Your donation helps provide essential resources to those in need.</p>
                    <button class="w-full bg-black text-white py-3 rounded-lg font-bold hover:bg-gray-900 transition">
                        Donate Now
                    </button>
                </div>
                
                <!-- Messages Section -->
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Send a Message</h2>
                     <form action="{{ route('send.message') }}" method="POST">
    @csrf
    <textarea name="message" class="form-control" placeholder="Write your message..."></textarea>
    <button class="btn btn-primary mt-2" type="submit">Send</button>
</form>
                </div>
            </div>
        </div>


    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
               <main>
    @yield('content')
</main>

            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
     <script>

        // Message Form Submission
        document.getElementById('messageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const category = document.getElementById('category').value;
            const message = document.getElementById('message').value;
            
            // In a real app, you would send this data to a server
            console.log('Message sent:', { category, message });
            
            // Show success message
            alert('Your message has been sent successfully!');
            
            // Reset form
            this.reset();
        });
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        }
        .orange-accent {
            background: linear-gradient(90deg, #FF7B25 0%, #FFA647 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 123, 37, 0.2);
        }
        /* imekata kufanya, you can delete za .message pekee*/
        .message-urgent {
            border-left: 4px solid #FF3A2D;
        }
        .message-general {
            border-left: 4px solid #3A86FF;
        }
        .message-feedback {
            border-left: 4px solid #3AFFA7;
        }
        .donation-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #FFC107;
        }
        .donation-completed {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28A745;
        }
        .donation-cancelled {
            background-color: rgba(220, 53, 69, 0.1);
            color: #DC3545;
        }
        @media (max-width: 768px) {
            .summary-cards {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</html>
