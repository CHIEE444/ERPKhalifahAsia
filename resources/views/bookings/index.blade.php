<x-layout title="Bookings Management">
    <div class="flex min-h-dvh bg-gray-50">


        <main class="flex-1 px-4 sm:px-6 lg:px-8 pt-20 pb-6 lg:pt-8 lg:pb-8 w-full min-w-0">
            @if (session('success'))
            <div class="rounded-lg bg-green-100 px-4 py-3 text-green-700">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="rounded-lg bg-red-100 px-4 py-3 text-red-700">
                {{ session('error') }}
            </div>
            @endif
            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Bookings Management</h1>
                    <p class="text-sm text-gray-400 mt-1">Manage, track, and process all client travel reservations.</p>
                </div>


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
                    <input type="text" placeholder="Search by ID, Jamaah Name, package, departure, status "
                        id="search-booking" name="search"
                        class="w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-rose-100 focus:border-rose-300">
                </div>

                {{-- Status pills --}}
                <div class="flex items-center gap-2 overflow-x-auto max-w-full pb-1 sm:pb-0">
                    <button type="button" onclick="filterItemsByStatus('all')"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-gray-900 text-white">All
                        Status</button>
                    <button type="button" onclick="filterItemsByStatus('completed')"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-green-50 text-green-600 hover:bg-green-100">Completed</button>
                    <button type="button" onclick="filterItemsByStatus('active')"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-blue-50 text-blue-600 hover:bg-blue-100">Active</button>
                    <button type="button" onclick="filterItemsByStatus('in_progress')"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-amber-50 text-amber-600 hover:bg-amber-100">In
                        Progress</button>
                    <button type="button" onclick="filterItemsByStatus('cancelled')"
                        class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium bg-gray-100 text-gray-500 hover:bg-gray-200">Cancelled</button>
                </div>
            </div>

            {{-- Table --}}
            <div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm min-w-[880px]">
                        <thead>
                            <tr
                                class="border-b border-gray-100 text-left text-gray-400 text-xs uppercase tracking-wide">
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Booking ID</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Jamaah Name</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Package</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Departure</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">Status</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @php
                            $statusColor = [
                            'completed' => 'bg-green-50 text-green-600',
                            'in_progress' => 'bg-amber-50 text-amber-600',
                            'cancelled' => 'bg-gray-100 text-gray-500',
                            'active' => 'bg-blue-50 text-blue-600',
                            ];
                            @endphp

                            @foreach ($clients as $client)
                            <tr class="hover:bg-gray-50/60 booking-item" data-status="{{ $client->status }}"
                                data-search="{{ $client->status }} #{{ $client->id }} {{ $client->name }} {{ $client->package }} {{ $client->date }} ">
                                <td class="px-6 py-4 text-rose-700 font-medium">#{{ $client->id }}</td>
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $client->name }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $client->package }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $client->date }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('clients.updateStatus', $client->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <select name="status" onchange="this.form.submit()"
                                            class="px-3 py-1 rounded-full text-xs font-medium border-0 cursor-pointer {{ $statusColor[$client->status] }}">
                                            <option value="in_progress" @selected($client->status === 'in_progress')>
                                                In Progress
                                            </option>
                                            <option value="active" @selected($client->status === 'active')>
                                                Active
                                            </option>

                                            <option value="completed" @selected($client->status === 'completed')>
                                                Completed
                                            </option>

                                            <option value="cancelled" @selected($client->status === 'cancelled')>
                                                Cancelled
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center text-gray-400">
                                        <button type="button" data-modal-open="booking-detail-{{ $client->id }}"
                                            class="hover:text-gray-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </button>
                                        <button type="button" data-modal-open="booking-edit-{{ $client->id }}"
                                            class="ml-3 hover:text-gray-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                    </div>
                                </td>
                            </tr>
                            <x-booking-modal id="booking-detail-{{ $client['id'] }}" :bookingId="$client['id']"
                                :namaJamaah="$client['name']" :email="$client['email']" :phone="$client['phone']" :city="$client['city']"
                                :package="$client['package']" :roomType="$client['room_type']" :duration="$client['duration']" :date="$client['date']"
                                :note="$client['note']" />
                            <x-bookingedit-modal id="booking-edit-{{ $client['id'] }}" :bookingId="$client['id']"
                                :namaJamaah="$client['name']" :package="$client['package']" :duration="$client['duration']" :date="$client['date']" :roomType="$client['room_type']" :note="$client['note']" />
                            @endforeach


                        </tbody>
                    </table>
                </div>


            </div>

        </main>
    </div>
    <script>
        const searchInput = document.querySelector('#search-booking');
        const items = document.querySelectorAll('.booking-item');

        let currentStatus = 'all';

        function filterItems() {
            const keyword = searchInput.value
                .toLowerCase()
                .replace(/[_\s]/g, '');

            items.forEach(item => {
                const itemStatus = item.dataset.status.toLowerCase();

                const searchData = item.dataset.search
                    .toLowerCase()
                    .replace(/[_\s]/g, '');

                const matchStatus =
                    currentStatus === 'all' || itemStatus === currentStatus;

                const matchSearch =
                    searchData.includes(keyword);

                item.classList.toggle(
                    'hidden',
                    !(matchStatus && matchSearch)
                );
            });
        }

        function filterItemsByStatus(status) {
            currentStatus = status;
            filterItems();
        }

        searchInput.addEventListener('input', filterItems);
    </script>
    @vite(['resources/js/modal.js'])
</x-layout>