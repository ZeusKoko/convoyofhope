@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-900 text-white">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 p-4 flex flex-col justify-between">
        <div>
            <!-- Logo -->
            <div class="text-2xl font-bold mb-6">Complex Logistics</div>

            <!-- Navigation Links -->
            <nav class="space-y-4">
                <a href="#" class="flex items-center p-2 bg-gray-700 rounded-lg">
                    🏠 <span class="ml-3">Dashboard</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded-lg">
                    📊 <span class="ml-3">Overview</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded-lg">
                    💬 <span class="ml-3">Chat</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded-lg">
                    👥 <span class="ml-3">Team</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded-lg">
                    ✅ <span class="ml-3">Tasks</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded-lg">
                    📜 <span class="ml-3">Reports</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-700 rounded-lg">
                    ⚙️ <span class="ml-3">Settings</span>
                </a>
            </nav>
        </div>

        <!-- Profile & Logout -->
        <div class="border-t border-gray-700 pt-4">
            <div class="flex items-center space-x-3">
                <img src="https://via.placeholder.com/40" class="rounded-full" alt="User Avatar">
                <div>
                    <p class="text-sm font-semibold">Hello, Elenor</p>
                    <a href="#" class="text-red-400 text-xs">Logout</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold">Welcome to Convoy of Hope</h1>
    </main>
</div>
@endsection
