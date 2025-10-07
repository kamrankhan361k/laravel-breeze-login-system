<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Multi-Auth System</title>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Navigation -->
            <nav class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <h1 class="text-xl font-semibold">Multi-Auth System</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 text-center">
                                <h2 class="text-3xl font-bold mb-8">Welcome to Multi-Auth System</h2>
                                <p class="text-lg mb-8">Choose your login portal:</p>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                                    <!-- User Login -->
                                    <div class="bg-blue-50 p-6 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold text-blue-800 mb-4">User</h3>
                                        <p class="text-blue-600 mb-4">Regular user access</p>
                                        <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                            User Login
                                        </a>
                                    </div>

                                    <!-- Seller Login -->
                                    <div class="bg-green-50 p-6 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold text-green-800 mb-4">Seller</h3>
                                        <p class="text-green-600 mb-4">Manage your products and sales</p>
                                        <a href="/seller/login" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                            Seller Login
                                        </a>
                                    </div>

                                    <!-- Admin Login -->
                                    <div class="bg-red-50 p-6 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold text-red-800 mb-4">Admin</h3>
                                        <p class="text-red-600 mb-4">System administration</p>
                                        <a href="/admin/login" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                            Admin Login
                                        </a>
                                    </div>

                                    <!-- Audit Login -->
                                    <div class="bg-orange-50 p-6 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold text-orange-800 mb-4">Audit</h3>
                                        <p class="text-orange-600 mb-4">System auditing and compliance</p>
                                        <a href="/audit/login" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 transition">
                                            Audit Login
                                        </a>
                                    </div>

                                    <!-- Staff Login -->
                                    <div class="bg-purple-50 p-6 rounded-lg shadow">
                                        <h3 class="text-xl font-semibold text-purple-800 mb-4">Staff</h3>
                                        <p class="text-purple-600 mb-4">Staff member access</p>
                                        <a href="/staff/login" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                                            Staff Login
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-12">
                                    <h3 class="text-2xl font-semibold mb-6">New to our platform?</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <a href="/register" class="bg-gray-200 text-gray-800 px-4 py-3 rounded hover:bg-gray-300 transition">
                                            Register as User
                                        </a>
                                        <a href="/seller/register" class="bg-gray-200 text-gray-800 px-4 py-3 rounded hover:bg-gray-300 transition">
                                            Register as Seller
                                        </a>
                                        <a href="/admin/register" class="bg-gray-200 text-gray-800 px-4 py-3 rounded hover:bg-gray-300 transition">
                                            Register as Admin
                                        </a>
                                        <a href="/staff/register" class="bg-gray-200 text-gray-800 px-4 py-3 rounded hover:bg-gray-300 transition">
                                            Register as Staff
                                        </a>
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
