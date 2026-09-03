@props([
'id' => 'bookingedit-modal',
'bookingId',
'namaJamaah',
'package',
'duration',
'date',
'roomType',
'note',
])

<div id="{{ $id }}"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4 font-sans">

    <div class="w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-xl">

        {{-- HEADER --}}
        <div class="flex items-center justify-between px-7 pt-6 pb-5">

            <h2 class="text-[20px] font-bold tracking-tight text-[#172033]">
                Edit Booking
                <span class="text-[#F72563]">
                    #KA-{{ $bookingId }}
                </span>
            </h2>

            <button
                type="button"
                data-modal-close="{{ $id }}"
                class="flex h-8 w-8 items-center justify-center text-[#91A0B8] transition hover:text-gray-600">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>


        {{-- FORM --}}
        <form action="{{ route('clients.update', $bookingId) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="px-7 pb-7">

                {{-- GRID : 3 KIRI | 4 KANAN --}}
                <div class="grid grid-cols-1 gap-x-8 gap-y-5 md:grid-cols-2">

                    {{-- ================= LEFT : 3 FIELD ================= --}}

                    {{-- Booking ID --}}
                    <div>
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Booking ID
                        </label>

                        <input
                            type="text"
                            value="#{{ $bookingId }}"
                            disabled
                            class="h-9.5 w-full rounded-xl border border-[#DDE4EE] bg-[#F8FAFC] px-4 text-[13px] font-medium text-[#F72563] outline-none">
                    </div>


                    {{-- Nama Jamaah --}}
                    <div>
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Nama Jamaah
                        </label>

                        <input
                            type="text"
                            name="namaJamaah"
                            value="{{ $namaJamaah }}"
                            required
                            class="h-9.5 w-full rounded-xl border border-[#DDE4EE] bg-white px-4 text-[13px] text-[#26344D] outline-none transition focus:border-[#F72563] focus:ring-2 focus:ring-[#F72563]/10">
                    </div>


                    {{-- Package --}}
                    <div>
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Package
                        </label>

                        <input
                            type="text"
                            name="package"
                            value="{{ $package }}"
                            required
                            class="h-9.5 w-full rounded-xl border border-[#DDE4EE] bg-white px-4 text-[13px] text-[#26344D] outline-none transition focus:border-[#F72563] focus:ring-2 focus:ring-[#F72563]/10">
                    </div>


                    {{-- ================= RIGHT : 4 FIELD ================= --}}

                    {{-- Duration --}}
                    <div>
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Duration
                        </label>

                        <div class="relative">
                            <select
                                name="duration"
                                required
                                class="h-9.5 w-full appearance-none rounded-xl border border-[#DDE4EE] bg-white px-4 pr-10 text-[13px] text-[#26344D] outline-none transition focus:border-[#F72563] focus:ring-2 focus:ring-[#F72563]/10">
                                <option value="">Select Duration</option>

                                <option value="9 hari" {{ $duration == '9 hari' ? 'selected' : '' }}>
                                    9 hari
                                </option>

                                <option value="12 hari" {{ $duration == '12 hari' ? 'selected' : '' }}>
                                    12 hari
                                </option>
                            </select>

                            <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-[#66748B]"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>


                    {{-- Departure Date --}}
                    <div>
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Departure Date
                        </label>

                        <input
                            type="date"
                            name="date"
                            value="{{ $date }}"
                            required
                            class="h-9.5 w-full rounded-xl border border-[#DDE4EE] bg-white px-4 text-[13px] text-[#26344D] outline-none transition focus:border-[#F72563] focus:ring-2 focus:ring-[#F72563]/10">
                    </div>


                    {{-- Room Type --}}
                    <div>
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Room Type
                        </label>

                        <div class="relative">
                            <select
                                name="roomType"
                                required
                                class="h-9.5 w-full appearance-none rounded-xl border border-[#DDE4EE] bg-white px-4 pr-10 text-[13px] text-[#26344D] outline-none transition focus:border-[#F72563] focus:ring-2 focus:ring-[#F72563]/10">
                                <option value="">Select Room Type</option>

                                <option value="Quad" {{ $roomType == 'Quad' ? 'selected' : '' }}>
                                    Quad
                                </option>

                                <option value="Triple" {{ $roomType == 'Triple' ? 'selected' : '' }}>
                                    Triple
                                </option>

                                <option value="Double" {{ $roomType == 'Double' ? 'selected' : '' }}>
                                    Double
                                </option>
                            </select>

                            <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-[#66748B]"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>


                    {{-- Note --}}
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-[13px] font-medium text-[#26344D]">
                            Note
                        </label>

                        <textarea
                            name="note"
                            rows="3"
                            class="min-h-20 w-full resize-none rounded-xl border border-[#DDE4EE] bg-white px-4 py-2.5 text-[13px] text-[#26344D] outline-none transition focus:border-[#F72563] focus:ring-2 focus:ring-[#F72563]/10">{{ $note }}</textarea>
                    </div>

                </div>
            </div>


            {{-- FOOTER / BUTTON --}}
            <div class="flex items-center justify-end gap-3 px-7 pb-6">

                <button
                    type="button"
                    data-modal-close="{{ $id }}"
                    class="h-9.5 rounded-full border border-[#DDE4EE] bg-white px-6 text-[13px] font-medium text-[#526078] transition hover:bg-[#F8FAFC]">
                    Cancel
                </button>

                <button
                    type="submit"
                    class="h-9.5 rounded-full bg-[#F72563] px-6 text-[13px] font-medium text-white shadow-sm transition hover:bg-[#E91E5B] hover:shadow-md">
                    Update Booking
                </button>

            </div>

        </form>

    </div>
</div>