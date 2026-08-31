<x-layout title="Bookings Management">
    <div class="flex min-h-dvh bg-gray-50">

        <x-sidebaragent active="bookings" />

        <main class="flex-1 px-4 sm:px-6 lg:px-8 pt-20 pb-6 lg:pt-8 lg:pb-8 w-full min-w-0">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Bookings Management</h1>
                    <p class="text-sm text-gray-400 mt-1">Manage, track, and process all client travel reservations.</p>
                </div>

                <button type="button"
                    class="flex items-center justify-center gap-2 bg-rose-700 hover:bg-rose-800 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition w-full sm:w-auto">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    New Booking
                </button>
            </div>

            {{-- Toolbar --}}
            <div class="bg-white border border-gray-100 rounded-xl p-4 mb-4 flex flex-wrap items-center gap-3">

                {{-- Search --}}
                <div class="relative w-full sm:flex-1 sm:min-w-[220px]">
                    <svg class="w-4 h-4 text-gray-300 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <path stroke-linecap="round" d="m21 21-4.3-4.3" />
                    </svg>
                    <input type="text" placeholder="Search by ID, Jamaah Name..."
                        class="w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-rose-100 focus:border-rose-300">
                </div>

                {{-- Status pills --}}
                <div class="flex items-center gap-2 overflow-x-auto max-w-full pb-1 sm:pb-0">
                    <button type="button"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-gray-900 text-white">All Status</button>
                    <button type="button"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-green-50 text-green-600 hover:bg-green-100">Confirmed</button>
                    <button type="button"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-amber-50 text-amber-600 hover:bg-amber-100">Pending</button>
                    <button type="button"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-500 hover:bg-gray-200">Cancelled</button>
                </div>

                <button type="button"
                    class="flex items-center justify-center gap-2 px-4 py-1.5 rounded-full text-sm font-medium border border-gray-200 text-gray-500 hover:bg-gray-50 w-full sm:w-auto">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M7 12h10M10 18h4" />
                    </svg>
                    More Filters
                </button>
            </div>

            {{-- Table --}}
            <div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                <table class="w-full text-sm min-w-[880px]">
                    <thead>
                        <tr class="border-b border-gray-100 text-left text-gray-400 text-xs uppercase tracking-wide">
                            <th class="px-6 py-4 font-medium whitespace-nowrap">Booking ID</th>
                            <th class="px-6 py-4 font-medium whitespace-nowrap">Jamaah Name</th>
                            <th class="px-6 py-4 font-medium whitespace-nowrap">Package</th>
                            <th class="px-6 py-4 font-medium whitespace-nowrap">Departure</th>
                            <th class="px-6 py-4 font-medium whitespace-nowrap">Total Price</th>
                            <th class="px-6 py-4 font-medium whitespace-nowrap">Status</th>
                            <th class="px-6 py-4 font-medium text-right whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        {{-- Row 1 --}}
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-6 py-4 text-rose-700 font-medium">#KA-2023-0891</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">Ahmad Abdullah</td>
                            <td class="px-6 py-4 text-gray-500">Umrah Premium Plus</td>
                            <td class="px-6 py-4 text-gray-500">12 Nov 2023</td>
                            <td class="px-6 py-4 text-gray-800">Rp 45.000.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600">Confirmed</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3 text-gray-400">
                                    <button type="button" class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                    <button type="button" class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 9V4h12v5M6 18h12v-4H6v4Zm0-4H4a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-2" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 2 --}}
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-6 py-4 text-rose-700 font-medium">#KA-2023-0892</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">Siti Aminah</td>
                            <td class="px-6 py-4 text-gray-500">Hajj Furoda 2024</td>
                            <td class="px-6 py-4 text-gray-500">15 Jun 2024</td>
                            <td class="px-6 py-4 text-gray-800">Rp 350.000.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-600">Pending</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3 text-gray-400">
                                    <button type="button" class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                    <button type="button" class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 9V4h12v5M6 18h12v-4H6v4Zm0-4H4a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-2" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 3 --}}
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-6 py-4 text-rose-700 font-medium">#KA-2023-0893</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">Budi Santoso Family (4 Pax)</td>
                            <td class="px-6 py-4 text-gray-500">Umrah Reguler</td>
                            <td class="px-6 py-4 text-gray-500">05 Dec 2023</td>
                            <td class="px-6 py-4 text-gray-800">Rp 120.000.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600">Confirmed</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3 text-gray-400">
                                    <button type="button" class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                    <button type="button" class="hover:text-gray-700">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 9V4h12v5M6 18h12v-4H6v4Zm0-4H4a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-2" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 4 (cancelled — actions muted) --}}
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-6 py-4 text-rose-700 font-medium">#KA-2023-0880</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">Hendra Gunawan</td>
                            <td class="px-6 py-4 text-gray-500">Umrah Ramadhan</td>
                            <td class="px-6 py-4 text-gray-500">10 Mar 2024</td>
                            <td class="px-6 py-4 text-gray-800">Rp 38.000.000</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-500">Cancelled</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3 text-gray-300">
                                    <button type="button" class="hover:text-gray-500">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                    <button type="button" disabled class="cursor-not-allowed">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 9V4h12v5M6 18h12v-4H6v4Zm0-4H4a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-2" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                </div>

                {{-- Pagination --}}
                <div class="flex flex-col sm:flex-row items-center sm:justify-between gap-3 px-4 sm:px-6 py-4 border-t border-gray-100 text-center sm:text-left">
                    <p class="text-sm text-gray-400">Showing 1 to 4 of 128 entries</p>

                    <div class="flex items-center gap-1.5 flex-wrap justify-center">
                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-gray-50">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6" />
                            </svg>
                        </button>

                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-rose-700 text-white text-sm font-medium">1</button>
                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 text-sm font-medium hover:bg-gray-50">2</button>
                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 text-sm font-medium hover:bg-gray-50">3</button>
                        <span class="w-8 h-8 flex items-center justify-center text-gray-300 text-sm">...</span>
                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 text-sm font-medium hover:bg-gray-50">12</button>

                        <button type="button"
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-gray-50">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </main>
    </div>
</x-layout>