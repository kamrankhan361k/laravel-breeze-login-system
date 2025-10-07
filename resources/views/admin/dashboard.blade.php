<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .admin-header {
                background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            <!-- Page Heading -->
            <header class="admin-header shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div class="flex items-center">
                        <h2 class="font-semibold text-xl text-white leading-tight">
                            Admin Dashboard
                        </h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-white text-sm">Welcome, {{ Auth::guard('admin')->user()->name }}</span>
                        <span class="text-red-200 text-sm">({{ Auth::guard('admin')->user()->admin_type }})</span>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Welcome Message -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <div class="bg-red-100 p-3 rounded-full mr-4">
                                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 class="text-2xl font-bold text-gray-900">Welcome to Admin Dashboard!</h1>
                                        <p class="text-gray-600">You are logged in as an Administrator - {{ Auth::guard('admin')->user()->admin_type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-red-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                                <dd class="text-lg font-semibold text-gray-900">1,245</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-blue-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Active Sellers</dt>
                                                <dd class="text-lg font-semibold text-gray-900">89</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-green-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Platform Revenue</dt>
                                                <dd class="text-lg font-semibold text-gray-900">$45,670</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-purple-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Orders</dt>
                                                <dd class="text-lg font-semibold text-gray-900">2,345</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activities -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">System Overview</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-3 bg-red-50 rounded">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Pending Seller Approvals</p>
                                                <p class="text-sm text-gray-500">12 sellers waiting for approval</p>
                                            </div>
                                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Action Required</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-white rounded border">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">System Health</p>
                                                <p class="text-sm text-gray-500">All systems operational</p>
                                            </div>
                                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Normal</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-white rounded border">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Recent Signups</p>
                                                <p class="text-sm text-gray-500">45 new users today</p>
                                            </div>
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Active</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quick Actions</h3>
                                    <div class="space-y-3">
                                        <button class="w-full text-left px-4 py-3 bg-red-50 hover:bg-red-100 rounded-lg transition">
                                            <span class="text-red-800 font-medium">Manage Users</span>
                                            <p class="text-sm text-red-600">View and manage all users</p>
                                        </button>
                                        <button class="w-full text-left px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                                            <span class="text-blue-800 font-medium">Seller Approvals</span>
                                            <p class="text-sm text-blue-600">Approve pending seller accounts</p>
                                        </button>
                                        <button class="w-full text-left px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg transition">
                                            <span class="text-green-800 font-medium">System Reports</span>
                                            <p class="text-sm text-green-600">Generate system reports</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
