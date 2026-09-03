<x-layout title="Khalifah Asia">

    <div class="min-h-screen bg-slate-50 p-6 space-y-6">
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
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 bg-white border border-slate-100 rounded-2xl shadow-sm p-6">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900">Agents Management</h1>
                <p class="text-sm text-gray-400 mt-1">Manage and track all agent information and activities.</p>
            </div>


        </div>

        {{-- Agent Management --}}
        <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 ">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <h2 class="text-xl font-bold text-slate-800">Agent Management</h2>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    {{-- Search --}}
                    <form method="GET" class="relative flex-1 sm:flex-none">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" id="search-agent" placeholder="Cari agent..."
                            class="w-full sm:w-56 pl-9 pr-3 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-200 focus:border-rose-400">
                    </form>


                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-slate-500 border-b border-slate-100">
                            <th class="font-medium py-3 pr-4">Nama Agent</th>
                            <th class="font-medium py-3 pr-4">Referral Code</th>
                            <th class="font-medium py-3 pr-4">Lokasi</th>
                            {{-- <th class="font-medium py-3 pr-4">Status</th> --}}
                            <th class="font-medium py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agents as $agent)
                            <tr data-search="{{ $agent->name }} {{ $agent->referral_code }}"
                                class="agent-item border-b border-slate-50 last:border-0 hover:bg-slate-50/60 transition-colors">
                                <td class="py-3 pr-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/profile.png') }}" alt="{{ $agent['name'] }}"
                                            class="w-9 h-9 rounded-full object-cover">
                                        <span class="font-medium text-slate-800">{{ $agent['name'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4 text-slate-600">{{ $agent['referral_code'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $agent['province'] }}</td>

                                <td class="py-3">
                                    <div class="flex items-center justify-end gap-3 text-slate-400">
                                        <button type="button" data-modal-open="agent-detail-{{ $agent['id'] }}" title="Lihat"
                                            class="hover:text-slate-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('users.destroy', $agent['id']) }}" method="POST"
                                            onsubmit="return confirm('Hapus agent ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus" class="hover:text-rose-600">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <x-agent-modal 
                                id="agent-detail-{{ $agent['id'] }}" 
                                :referralCode="$agent['referral_code']"
                                :namaAgent="$agent['name']"
                                :email="$agent['email']"
                                :phone="$agent['phone']"
                                :province="$agent['province']"
                                :regency="$agent['regency']"
                                :district="$agent['district']"
                                :village="$agent['village']"
                                :address="$agent['address']"
                                />
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-slate-400">Belum ada data agent.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    {{--
    Contoh data yang perlu dikirim dari controller:

    return view('dashboard-admin', [
        'admin' => [
            'name' => 'Dashboard Admin',
            'id' => 'KHA-2023-0042',
            'avatar' => asset('images/admin.jpg'),
        ],
        'progress' => ['current' => 90, 'total' => 100],
        'agents' => [
            ['id' => 'KHA-2023-0102', 'name' => 'Siti Rahma', 'location' => 'Jakarta Pusat', 'status' => 'Aktif', 'avatar' => asset('images/agent1.jpg')],
            ['id' => 'KHA-2022-0088', 'name' => 'Ahmad Wijaya', 'location' => 'Bandung', 'status' => 'Aktif', 'avatar' => asset('images/agent2.jpg')],
            ['id' => 'KHA-2024-0015', 'name' => 'Dian Pertiwi', 'location' => 'Surabaya', 'status' => 'Tidak Aktif', 'avatar' => asset('images/agent3.jpg')],
        ],
        'agentsFrom' => 1,
        'agentsTo' => 3,
        'agentsTotal' => 45,
        'currentPage' => 1,
    ]);
--}}
    <script>
        const searchInput = document.querySelector('#search-agent');
        const items = document.querySelectorAll('.agent-item');

        searchInput.addEventListener('input', function() {
            const keyword = this.value.toLowerCase().trim();

            items.forEach(item => {
                const searchData = item.dataset.search.toLowerCase();

                item.classList.toggle(
                    'hidden',
                    !searchData.includes(keyword)
                );
            });
        });
    </script>
    @vite(['resources/js/modal.js'])

</x-layout>
