@php
    use App\Models\Event;
    use App\Models\Donation;
    $upcomingEvents = \App\Models\Event::where('event_date', '>=', \Carbon\Carbon::today())->orderBy('event_date')->get();
    use Illuminate\Support\Facades\Auth;

     $latestDonation = Donation::with('event')
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->first();


    $upcomingEvents = Event::where('event_date', '>=', Carbon\Carbon::today())->orderBy('event_date')->get();

      $user = Auth::user();
      $allDonations = Donation::with('event')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    $recentDonations = $allDonations->take(4);

      $eventsContributedTo = Donation::where('user_id', $user->id)
        ->distinct('event_id')
        ->count('event_id');

    $totalDonated = Donation::where('user_id', $user->id)->sum('amount');

    $now = \Carbon\Carbon::now();
    $oneWeekAgo = \Carbon\Carbon::now()->subWeek();
    $twoWeeksAgo = \Carbon\Carbon::now()->subWeeks(2);

    $thisWeek = Donation::where('user_id', $user->id)
        ->whereBetween('created_at', [$oneWeekAgo, $now])
        ->sum('amount');

    $lastWeek = Donation::where('user_id', $user->id)
        ->whereBetween('created_at', [$twoWeeksAgo, $oneWeekAgo])
        ->sum('amount');

    if ($lastWeek > 0) {
        $percentageChange = (($thisWeek - $lastWeek) / $lastWeek) * 100;
        $formattedChange = number_format($percentageChange, 2);
        $changeClass = $percentageChange >= 0 ? 'text-green-400' : 'text-red-400';
        $changeSign = $percentageChange >= 0 ? '+' : '';
    } elseif ($thisWeek > 0) {
        $formattedChange = '100.00';
        $changeClass = 'text-green-400';
        $changeSign = '+';
    } else {
        $formattedChange = null;
        $changeClass = '';
        $changeSign = '';
    }
@endphp

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
                         @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
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
            <p class="text-gray-400">Total Events Contributed</p>
            <h2 class="text-3xl font-bold mt-2">{{ $eventsContributedTo }}</h2>
        </div>
        <div class="p-3 rounded-lg bg-gray-700">
            <i class="fas fa-hand-holding-heart text-orange-500 text-xl"></i>
        </div>
    </div>
</div>

                

            <div class="bg-gray-800 rounded-xl p-6 shadow-lg transition-all duration-300 card-hover"> 
    <div class="flex justify-between items-start">
        <div>
            <p class="text-gray-400">Amount Donated</p>
            <h2 class="text-3xl font-bold mt-2">
                @if($totalDonated > 0)
                    KES {{ number_format($totalDonated, 2) }}
                @else
                    <span class="text-gray-500 text-xl">No donations yet</span>
                @endif
            </h2>
        </div>
        <div class="p-3 rounded-lg bg-gray-700">
            <i class="fas fa-dollar-sign text-orange-500 text-xl"></i>
        </div>
    </div>

    @if($formattedChange)
        <div class="mt-4 pt-4 border-t border-gray-700 flex items-center">
            <span class="{{ $changeClass }} text-sm">
                {{ $changeSign }}{{ $formattedChange }}%
            </span>
            <span class="text-gray-400 text-sm ml-2">from last week</span>
        </div>
    @endif
</div>



            <div class="bg-gray-800 rounded-xl p-6 shadow-lg transition-all duration-300 card-hover">
    <div class="flex justify-between items-start">
        <div>
            <p class="text-gray-400">Latest Donation</p>
            <h2 class="text-3xl font-bold mt-2">
                @if ($latestDonation)
                    KES {{ number_format($latestDonation->amount) }}
                @else
                    No donations yet
                @endif
            </h2>
        </div>
        <div class="p-3 rounded-lg bg-gray-700">
            <i class="fas fa-calendar-check text-orange-500 text-xl"></i>
        </div>
    </div>
    <div class="mt-4 pt-4 border-t border-gray-700">
        @if ($latestDonation)
            <span class="text-gray-400 text-sm">
                For: <strong>{{ $latestDonation->event->title ?? 'N/A' }}</strong> on 
                <strong>{{ \Carbon\Carbon::parse($latestDonation->created_at)->format('M d, Y') }}</strong>
            </span>
        @else
            <span class="text-gray-400 text-sm">No donation records available.</span>
        @endif
    </div>
</div>

        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
            <!-- Recent Donations Table -->
            <div class="lg:col-span-2 bg-gray-800 rounded-xl p-6 shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-white">Recent Donations</h2>
        <button id="toggleDonations" class="text-orange-500 hover:text-orange-400 text-sm font-medium focus:outline-none">
            View All <i class="fas fa-chevron-down ml-1"></i>
        </button>
    </div>

    <div class="overflow-x-auto max-h-[320px]">
        <table class="w-full text-white">
            <thead>
                <tr class="text-gray-400 text-left border-b border-gray-700">
                    <th class="pb-3">Event</th>
                    <th class="pb-3">Date</th>
                    <th class="pb-3">Amount</th>
                </tr>
            </thead>
            <tbody id="donationTable" class="divide-y divide-gray-700 text-sm">
                @foreach ($recentDonations as $donation)
                    <tr class="hover:bg-gray-700/50 donation-row">
                        <td class="py-3">{{ $donation->event->title ?? 'N/A' }}</td>
                        <td class="py-3">{{ \Carbon\Carbon::parse($donation->created_at)->toFormattedDateString() }}</td>
                        <td class="py-3">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">KES {{ number_format($donation->amount, 2) }}</span>
                        </td>
                    </tr>
                @endforeach

                @foreach ($allDonations->skip(4) as $donation)
                    <tr class="hover:bg-gray-700/50 donation-row hidden extra-row">
                        <td class="py-3">{{ $donation->event->title ?? 'N/A' }}</td>
                        <td class="py-3">{{ \Carbon\Carbon::parse($donation->created_at)->toFormattedDateString() }}</td>
                        <td class="py-3">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">KES {{ number_format($donation->amount, 2) }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggleDonations');
        const extraRows = document.querySelectorAll('.extra-row');
        let expanded = false;

        toggleBtn.addEventListener('click', function () {
            expanded = !expanded;

            extraRows.forEach(row => {
                row.classList.toggle('hidden', !expanded);
            });

            toggleBtn.innerHTML = expanded
                ? 'View Less <i class="fas fa-chevron-up ml-1"></i>'
                : 'View All <i class="fas fa-chevron-down ml-1"></i>';
        });
    });
</script>


            <!-- Quick Donate -->
            <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                <h2 class="text-xl font-bold mb-6">Quick Donate</h2>
                <div class="orange-accent rounded-xl p-6 mb-6">
                    <h3 class="font-bold text-lg mb-2">Make an Impact Today</h3>
                    <p class="text-sm mb-4">Your donation helps provide essential resources to those in need.</p>
                    <button class="w-full bg-black text-white py-3 rounded-lg font-bold hover:bg-gray-900 transition" onclick="openModal()">
                        Donate Now
                    </button>
                    <div id="donationModal" class="modal">

    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2>Donation Form</h2>
      <div class="form-group">
        <form method="POST" action="{{ route('donation.store') }}">
    @csrf
        <label for="donorName">Name</label>
        <input type="text" name="name" placeholder="Full Name" required>
        
      </div>
      <div class="form-group">
        <label for="donorEmail">Email</label>
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="donorID">ID Number</label>
        <input type="text" name="national_id" placeholder="National ID" required>
      </div>
      <div class="form-group">
        <label for="donorNationality">Nationality</label>
        <input type="text" name="nationality" placeholder="Nationality" required>
      </div>
      <div class="form-group">
        <label for="donation_service">Select Event/Service:</label>
        <select name="event_id" required>
        <option value="">-- Choose Event --</option>
        @foreach($upcomingEvents as $event)
            <option value="{{ $event->id }}">{{ $event->title }} - {{ $event->event_date }}</option>
        @endforeach
        </select>


      </div>
      <div class="form-group">
        <label for="donationAmount">Amount (KES)</label>
        <input type="number" name="amount" placeholder="Amount (KES)" required>
      </div>
      <button class="confirm-btn" onclick="submitDonation()">Confirm</button>
    </div>
  </div>
                </div>
</form>
                
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
        //donation modal
        function openModal() {
      document.getElementById('donationModal').style.display = 'block';
    }

    function closeModal() {
      document.getElementById('donationModal').style.display = 'none';
    }

    function submitDonation() {
      const name = document.getElementById('donorName').value;
      const email = document.getElementById('donorEmail').value;
      const id = document.getElementById('donorID').value;
      const nationality = document.getElementById('donorNationality').value;
      const service = document.getElementById('donationType').value;
      const amount = document.getElementById('donationAmount').value;

      if (name && email && id && nationality && service && amount) {
        alert("Donation submitted successfully!\nThank you, " + name + "!");
        closeModal();
      } else {
        alert("Please fill in all fields.");
      }
    }

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
        body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
    }
    .donate-btn {
      background-color: orange;
      color: white;
      border: none;
      padding: 12px 24px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      margin: 40px;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
    }

    .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 30px;
      color:black;
      border-radius: 10px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      border: 4px solid navy;
    }

    .modal-content h2 {
        color: navy;
        margin-top: 0;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: navy; 
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .confirm-btn {
      background-color: green;
      color: white;
      padding: 12px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .close-btn {
      float: right;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      color: red;
    }
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
