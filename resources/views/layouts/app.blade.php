<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
    <body class="font-sans antialiased">
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



            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                 <!-- Main Dashboard -->
  <div class="container my-5">
    <h2 class="mb-4 text-center fw-bold">Welcome, User</h2>
    
    <div class="row g-4">
      <!-- Total Donations -->
      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Total Donations</h5>
            <p class="display-6 text-success fw-bold">$1,250</p>
          </div>
        </div>
      </div>

      <!-- Recent Donation -->
      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Recent Donation</h5>
            <p class="text-muted">You donated <strong>$50</strong> to <em>Water For All</em> 3 days ago.</p>
          </div>
        </div>
      </div>

      <!-- Upcoming Event -->
      <div class="col-md-4">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Upcoming Event</h5>
            <p class="text-muted">Medical Aid Drive - <strong>May 30, 2025</strong></p>
            <a href="#" class="btn btn-outline-primary btn-sm mt-2">View Details</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Impact Summary -->
    <div class="mt-5">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Your Impact</h5>
          <p class="text-muted">You've helped <strong>120 people</strong> through your donations. Thank you for your generosity!</p>
        </div>
      </div>
    </div>
  </div>
  <form action="{{ route('send.message') }}" method="POST">
    @csrf
    <textarea name="message" class="form-control" placeholder="Write your message..."></textarea>
    <button class="btn btn-primary mt-2" type="submit">Send</button>
</form>


  <!-- Footer -->
  <footer class="bg-grey border-top mt-5 py-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between text-center text-muted">
      <p>&copy; 2025 Convoyofhope. All rights reserved.</p>
      <div>
        <a href="#" class="text-decoration-none text-muted me-3">Privacy Policy</a>
        <a href="#" class="text-decoration-none text-muted me-3">Terms</a>
        <a href="#" class="text-decoration-none text-muted">Contact</a>
      </div>
    </div>
  </footer>

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
</html>
