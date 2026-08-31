<x-layout title="Setting">
    <div class="flex min-h-screen bg-gray-50">

        <x-sidebaragent active="settings" />

        <main class="flex-1 px-8 py-8">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Setting</h1>
            </div>

            {{-- Form Card --}}
            <div class="bg-white border border-gray-100 rounded-xl p-6 max-w-xl">
                <form class="space-y-5">

                    <div>
                        <label for="nama_cabang" class="block text-sm font-medium text-gray-700 mb-2">Nama Cabang</label>
                        <input type="text" id="nama_cabang" name="nama_cabang"
                            class="w-full px-3.5 py-2.5 text-sm rounded-lg border border-gray-200 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-rose-100 focus:border-rose-300">
                    </div>

                    <div>
                        <label for="admin_penanggung_jawab" class="block text-sm font-medium text-gray-700 mb-2">Admin
                            Penanggung Jawab</label>
                        <input type="text" id="admin_penanggung_jawab" name="admin_penanggung_jawab"
                            class="w-full px-3.5 py-2.5 text-sm rounded-lg border border-gray-200 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-rose-100 focus:border-rose-300">
                    </div>

                    <button type="button"
                        class="bg-rose-700 hover:bg-rose-800 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition">
                        Simpan Perubahan
                    </button>

                </form>
            </div>

        </main>
    </div>
</x-layout>
