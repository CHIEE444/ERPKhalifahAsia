<x-layout title="Dashboard Agent">
    <div class="flex min-h-dvh bg-gray-50">

        {{-- Sidebar --}}
        <x-sidebaragent active="agent-management" />

        {{-- Main Content --}}
        <main class="flex-1 px-4 sm:px-6 lg:px-8 pt-20 pb-4 sm:pb-6 lg:pt-8 lg:pb-8 space-y-6 w-full min-w-0">

            {{-- Profile Card --}}
            <div
                class="bg-white rounded-2xl border border-rose-100 p-4 sm:p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-4 min-w-0">
                    <img src="https://ui-avatars.com/api/?name=Razif+Jelek&background=fbcfe8&color=9d174d"
                        alt="Foto Razif Jelek"
                        class="w-14 h-14 sm:w-16 sm:h-16 rounded-full object-cover border border-rose-100 shrink-0">
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900 truncate">Razif Jelek</h2>
                            <span class="text-xs font-medium text-green-700 bg-green-100 px-2.5 py-0.5 rounded-full shrink-0">
                                Active
                            </span>
                        </div>
                        <p class="text-sm text-gray-400 mt-1">ID: KHA-2023-0102</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <button type="button"
                        class="bg-rose-700 hover:bg-rose-800 text-white text-sm font-medium px-4 py-2 rounded-lg transition w-full sm:w-auto">
                        Edit Profile
                    </button>
                    <button type="button"
                        class="border border-green-600 text-green-700 hover:bg-green-50 text-sm font-medium px-4 py-2 rounded-lg transition w-full sm:w-auto">
                        Contact Agent
                    </button>
                </div>
            </div>

            {{-- Stats + Agent Details --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                {{-- Total Jamaah --}}
                <div
                    class="bg-white rounded-2xl border border-rose-100 p-5 sm:p-6 flex flex-col items-center justify-center text-center">
                    <svg class="w-7 h-7 text-rose-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <circle cx="9" cy="8" r="3" />
                        <path d="M3.5 20c0-3 2.5-5.5 5.5-5.5s5.5 2.5 5.5 5.5" />
                        <circle cx="17" cy="8" r="2.5" />
                        <path d="M15.5 14.6c2.6.3 4.5 2.6 4.5 5.4" />
                    </svg>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">45</p>
                    <p class="text-xs font-medium text-gray-400 tracking-wide mt-1">TOTAL JAMAAH</p>
                </div>

                {{-- Total Bookings --}}
                <div
                    class="bg-white rounded-2xl border border-rose-100 p-5 sm:p-6 flex flex-col items-center justify-center text-center">
                    <svg class="w-7 h-7 text-rose-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <rect x="6" y="2" width="12" height="20" rx="2" />
                        <path d="M10 6h4" />
                        <path d="M11 18h2" />
                    </svg>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">38</p>
                    <p class="text-xs font-medium text-gray-400 tracking-wide mt-1">TOTAL BOOKINGS</p>
                </div>

                {{-- Success Rate --}}
                <div
                    class="bg-white rounded-2xl border border-rose-100 p-5 sm:p-6 flex flex-col items-center justify-center text-center">
                    <svg class="w-7 h-7 text-green-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <path d="M3 17l6-6 4 4 8-8" />
                        <path d="M15 7h6v6" />
                    </svg>
                    <p class="text-2xl sm:text-3xl font-bold text-gray-900">92%</p>
                    <p class="text-xs font-medium text-gray-400 tracking-wide mt-1">SUCCESS RATE</p>
                </div>

                {{-- Agent Details --}}
                <div class="bg-white rounded-2xl border border-rose-100 p-5 sm:p-6">
                    <h3 class="text-base font-bold text-gray-900 mb-4">Agent Details</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="m3 7 9 6 9-6" />
                            </svg>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-xs">Email</p>
                                <p class="text-gray-700 break-words">siti.rahma@khalifahasia.com</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path
                                    d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2L8 9.6a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z" />
                            </svg>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-xs">Phone</p>
                                <p class="text-gray-700">+62 812-3456-7890</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-xs">Location</p>
                                <p class="text-gray-700">Jakarta Pusat</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-gray-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <path d="M16 2v4M8 2v4M3 10h18" />
                            </svg>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-xs">Join Date</p>
                                <p class="text-gray-700">January 15, 2023</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- History of Jamaah --}}
            <div class="bg-white rounded-2xl border border-rose-100 overflow-hidden">
                <div class="flex items-center justify-between px-4 sm:px-6 py-4 border-b border-gray-100 gap-2">
                    <h3 class="text-base font-bold text-gray-900">History of Jamaah</h3>
                    <a href="#" class="text-sm font-medium text-rose-700 hover:text-rose-800 shrink-0">View All &rarr;</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm min-w-[560px]">
                        <thead>
                            <tr class="bg-gray-50 text-left text-gray-500">
                                <th class="px-4 sm:px-6 py-3 font-medium whitespace-nowrap">Jamaah Name</th>
                                <th class="px-4 sm:px-6 py-3 font-medium whitespace-nowrap">Package Type</th>
                                <th class="px-4 sm:px-6 py-3 font-medium whitespace-nowrap">Departure Date</th>
                                <th class="px-4 sm:px-6 py-3 font-medium text-right whitespace-nowrap">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="odd:bg-white even:bg-gray-50/50">
                                <td class="px-4 sm:px-6 py-4 text-gray-700 whitespace-nowrap">Ahmad Zaki</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">Umrah Premium</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">12 Oct 2024</td>
                                <td class="px-4 sm:px-6 py-4 text-right">
                                    <span
                                        class="inline-block text-xs font-medium px-3 py-1 rounded-full bg-green-100 text-green-700">Paid</span>
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-gray-50/50">
                                <td class="px-4 sm:px-6 py-4 text-gray-700 whitespace-nowrap">Fatima Zahra</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">Umrah Reguler</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">25 Nov 2024</td>
                                <td class="px-4 sm:px-6 py-4 text-right">
                                    <span
                                        class="inline-block text-xs font-medium px-3 py-1 rounded-full bg-amber-100 text-amber-700">Partial</span>
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-gray-50/50">
                                <td class="px-4 sm:px-6 py-4 text-gray-700 whitespace-nowrap">Budi Santoso</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">Hajj Furoda</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">15 Jun 2025</td>
                                <td class="px-4 sm:px-6 py-4 text-right">
                                    <span
                                        class="inline-block text-xs font-medium px-3 py-1 rounded-full bg-gray-100 text-gray-500">Pending</span>
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-gray-50/50">
                                <td class="px-4 sm:px-6 py-4 text-gray-700 whitespace-nowrap">Siti Aminah</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">Umrah Plus Turki</td>
                                <td class="px-4 sm:px-6 py-4 text-gray-500 whitespace-nowrap">05 Dec 2024</td>
                                <td class="px-4 sm:px-6 py-4 text-right">
                                    <span
                                        class="inline-block text-xs font-medium px-3 py-1 rounded-full bg-green-100 text-green-700">Paid</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Footer --}}
            <footer class="flex flex-col sm:flex-row items-center sm:justify-between gap-3 text-xs text-gray-400 pt-2 text-center sm:text-left">
                <p>&copy; 2024 Khalifah Asia Tour &amp; Travel. All rights reserved.</p>
                <div class="flex items-center gap-4 sm:gap-6 flex-wrap justify-center">
                    <a href="#" class="hover:text-gray-600">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-600">Terms of Service</a>
                    <a href="#" class="hover:text-gray-600">Contact Support</a>
                </div>
            </footer>

        </main>
    </div>
</x-layout>