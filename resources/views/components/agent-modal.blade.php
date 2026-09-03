@props([
    'id' => 'agent-modal',
    'referralCode',
    'namaAgent',
    'email',
    'phone',
    'province',
    'regency',
    'district',
    'village',
    'address',
])

<div
    id="{{ $id }}"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-xs font-['Plus_Jakarta_Sans',sans-serif]"
>
    <div class="bg-white rounded-3xl p-6 sm:p-7 max-w-md w-full shadow-2xl border border-gray-100 animate-fadeIn">

        {{-- Header --}}
        <div class="flex items-center justify-between pb-3">
            <h3 class="text-lg font-bold text-gray-900 tracking-tight">
                Agent
                <span class="text-[#b80049]">
                    #{{ $referralCode }}
                </span>
            </h3>

            <button
                type="button"
                data-modal-close="{{ $id }}"
                class="p-1 text-gray-400 hover:text-gray-600 rounded-lg cursor-pointer transition-colors"
                aria-label="Tutup"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>

        {{-- Data --}}
        <div class="space-y-4 text-sm py-2">

            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    Nama Agent:
                </span>
                <span class="font-bold text-emerald-600 text-right">
                    {{ $namaAgent }}
                </span>
            </div>

            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    Email:
                </span>
                <span class="font-bold text-[#b80049] text-right">
                    {{ $email }}
                </span>
            </div>
            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    No. Telepon:
                </span>
                <span class="font-bold text-[#b80049] text-right">
                    {{ $phone }}
                </span>
            </div>

            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    Provinsi:
                </span>
                <span class="font-bold text-gray-900 text-right">
                    {{ $province }}
                </span>
            </div>

            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    Kabupaten/Kota:
                </span>
                <span class="font-bold text-gray-900 font-mono text-right">
                    {{ $regency }}
                </span>
            </div>

            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    Kecamatan:
                </span>
                <span class="font-bold text-gray-900 text-right">
                    {{ $district }}
                </span>
            </div>

            <div class="flex items-center justify-between gap-4">
                <span class="text-gray-500 font-medium">
                    Desa/Kelurahan:
                </span>
                <span class="font-bold text-gray-900 text-right">
                    {{ $village }}
                </span>
            </div>

        </div>

        {{-- Catatan --}}
        <div class="mt-4 p-3.5 bg-[#f8f9fa] rounded-xl text-xs text-gray-700 leading-relaxed border border-gray-100/80">
            <span class="font-bold text-gray-800">
                Alamat:
            </span>

            <span class="text-gray-600">
                {{ $address }}
            </span>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end mt-6">
            <button
                type="button"
                data-modal-close="{{ $id }}"
                class="px-6 py-2.5 bg-[#0f172a] hover:bg-[#1e293b] text-white rounded-xl text-xs font-semibold transition-colors cursor-pointer"
            >
                Tutup
            </button>
        </div>

    </div>
</div>