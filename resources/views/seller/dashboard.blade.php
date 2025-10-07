<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Seller</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .seller-header {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            <!-- Page Heading -->
            <header class="seller-header shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div class="flex items-center">
                        <h2 class="font-semibold text-xl text-white leading-tight">
                            Seller Dashboard
                        </h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-white text-sm">Welcome, {{ Auth::guard('seller')->user()->name }}</span>
                        <span class="text-green-200 text-sm">({{ Auth::guard('seller')->user()->business_name }})</span>
                        <form method="POST" action="{{ route('seller.logout') }}">
                            @csrf
                            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
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
                                    <div class="bg-green-100 p-3 rounded-full mr-4">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 class="text-2xl font-bold text-gray-900">Welcome to Seller Dashboard!</h1>
                                        <p class="text-gray-600">You are logged in as a Seller - {{ Auth::guard('seller')->user()->business_name }}</p>
                                        @if(!Auth::guard('seller')->user()->is_approved)
                                            <div class="mt-2 bg-yellow-50 border border-yellow-200 rounded-md p-3">
                                                <p class="text-yellow-800 text-sm">
                                                    <strong>Account Pending Approval:</strong> Your seller account is awaiting approval from administrators.
                                                </p>
                                            </div>
                                        @else
                                            <div class="mt-2 bg-green-50 border border-green-200 rounded-md p-3">
                                                <p class="text-green-800 text-sm">
                                                    <strong>Account Approved:</strong> Your seller account is active and ready for business.
                                                </p>
                                            </div>
                                        @endif
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
                                            <div class="bg-blue-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Products</dt>
                                                <dd class="text-lg font-semibold text-gray-900">24</dd>
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Orders</dt>
                                                <dd class="text-lg font-semibold text-gray-900">156</dd>
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total Revenue</dt>
                                                <dd class="text-lg font-semibold text-gray-900">$12,450</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-orange-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Customers</dt>
                                                <dd class="text-lg font-semibold text-gray-900">89</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activities and Quick Actions -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Recent Orders</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-3 bg-green-50 rounded">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Order #ORD-001</p>
                                                <p class="text-sm text-gray-500">Customer: John Doe - $245.00</p>
                                            </div>
                                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Completed</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-white rounded border">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Order #ORD-002</p>
                                                <p class="text-sm text-gray-500">Customer: Jane Smith - $189.50</p>
                                            </div>
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Processing</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-white rounded border">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Order #ORD-003</p>
                                                <p class="text-sm text-gray-500">Customer: Bob Wilson - $567.25</p>
                                            </div>
                                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white shadow rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quick Actions</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <button class="p-4 bg-green-50 hover:bg-green-100 rounded-lg transition text-center">
                                            <svg class="w-8 h-8 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-green-800">Add Product</span>
                                        </button>
                                        <button class="p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition text-center">
                                            <svg class="w-8 h-8 text-blue-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-blue-800">View Orders</span>
                                        </button>
                                        <button class="p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition text-center">
                                            <svg class="w-8 h-8 text-purple-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-purple-800">Analytics</span>
                                        </button>
                                        <button class="p-4 bg-orange-50 hover:bg-orange-100 rounded-lg transition text-center">
                                            <svg class="w-8 h-8 text-orange-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-orange-800">Profile</span>
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
