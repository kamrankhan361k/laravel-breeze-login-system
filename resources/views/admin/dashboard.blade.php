<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Welcome to Admin Dashboard!</h3>
                    <p class="mb-4">You are logged in as an Administrator.</p>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
                        <div class="bg-red-50 p-6 rounded-lg">
                            <h4 class="font-semibold text-red-800">Users</h4>
                            <p class="text-2xl font-bold text-red-600">1,245</p>
                            <p class="text-sm text-red-500">Total Users</p>
                        </div>

                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h4 class="font-semibold text-blue-800">Sellers</h4>
                            <p class="text-2xl font-bold text-blue-600">89</p>
                            <p class="text-sm text-blue-500">Active Sellers</p>
                        </div>

                        <div class="bg-green-50 p-6 rounded-lg">
                            <h4 class="font-semibold text-green-800">Revenue</h4>
                            <p class="text-2xl font-bold text-green-600">$45,670</p>
                            <p class="text-sm text-green-500">Platform Revenue</p>
                        </div>

                        <div class="bg-purple-50 p-6 rounded-lg">
                            <h4 class="font-semibold text-purple-800">Orders</h4>
                            <p class="text-2xl font-bold text-purple-600">2,345</p>
                            <p class="text-sm text-purple-500">Total Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
