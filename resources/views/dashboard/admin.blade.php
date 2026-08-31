<x-layout title="Khalifah Asia">

    <div class="min-h-screen bg-slate-50 p-6 space-y-6">

        {{-- Top row: Profile card + Progress card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Profile card --}}
            <div class="bg-white border border-rose-100 rounded-2xl shadow-sm p-6 flex items-center gap-4">
                <img src="{{ $admin['avatar'] ?? 'https://i.pravatar.cc/150?img=47' }}"
                    alt="{{ $admin['name'] ?? 'Admin' }}" alt="Admin Avatar"
                    class="w-16 h-16 rounded-full object-cover ring-2 ring-rose-500 ring-offset-2">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 leading-tight">Dashboard<br>Admin</h2>
                    <p class="text-sm text-slate-500 mt-1">ID: {{ $admin['id'] ?? 'KHA-2023-0042' }}</p>
                    <span class="inline-flex items-center gap-1.5 mt-2 text-sm text-slate-600">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Active
                    </span>
                </div>
            </div>

            {{-- Progress card --}}
            <div class="bg-white border border-rose-100 rounded-2xl shadow-sm p-6">
                <p class="text-sm text-slate-500">Progres Jamaah</p>
                <p class="text-3xl font-bold text-slate-800 mt-1">
                    {{ $progress['current'] ?? 90 }}
                    <span class="text-base font-medium text-slate-400">/ {{ $progress['total'] ?? 100 }}</span>
                </p>
                <div class="mt-4 h-2.5 w-full bg-slate-200 rounded-full overflow-hidden">
                    @php
                        $current = $progress['current'] ?? 90;
                        $total = $progress['total'] ?? 100;
                        $percent = $total > 0 ? min(100, ($current / $total) * 100) : 0;
                    @endphp
                    <div class="h-full bg-rose-800 rounded-full" style="width: {{ $percent }}%"></div>
                </div>
            </div>
        </div>

        {{-- Agent Management --}}
        <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6">

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

                    {{-- Add agent button --}}
                    {{-- <a href="{{ route('agents.create') ?? '#' }}" --}}
                    <a href=""
                        class="inline-flex items-center gap-2 bg-rose-800 hover:bg-rose-900 text-white text-sm font-medium px-4 py-2.5 rounded-lg whitespace-nowrap transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Agent
                    </a>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-slate-500 border-b border-slate-100">
                            <th class="font-medium py-3 pr-4">Nama Agent</th>
                            <th class="font-medium py-3 pr-4">ID Agent</th>
                            <th class="font-medium py-3 pr-4">Lokasi</th>
                            {{-- <th class="font-medium py-3 pr-4">Status</th> --}}
                            <th class="font-medium py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agents as $agent)
                            <tr data-search="{{ $agent->name }} {{ $agent->id }}"
                                class="agent-item border-b border-slate-50 last:border-0 hover:bg-slate-50/60 transition-colors">
                                <td class="py-3 pr-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/profile.png') }}" alt="{{ $agent['name'] }}"
                                            class="w-9 h-9 rounded-full object-cover">
                                        <span class="font-medium text-slate-800">{{ $agent['name'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4 text-slate-600">{{ $agent['id'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $agent['province'] }}</td>
                                {{-- <td class="py-3 pr-4">
                                @if ($agent['status'] === 'Aktif')
                                    <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-slate-100 text-slate-500">
                                        Tidak Aktif
                                    </span>
                                @endif
                            </td> --}}
                                <td class="py-3">
                                    <div class="flex items-center justify-end gap-3 text-slate-400">
                                        <button type="button" title="Lihat" class="hover:text-slate-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                        <button type="button" title="Edit" class="hover:text-slate-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                                            </svg>
                                        </button>
                                        <form action="" method="POST" {{-- <form action="{{ route('agents.destroy', $agent['id']) ?? '#' }}" method="POST" --}}
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

</x-layout>
