<x-layout title="Create Admin">
    <div class="min-h-screen bg-white flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-[60vw] ">
            <div class="mb-5 flex justify-center">
                <img src="{{ asset('images/khalifahlogo.png') }}" alt="Khalifah Asia Bekasi"
                    class="h-15 w-auto object-contain">
            </div>

            <div class="mb-6 text-center">
                <h1 class="text-[30px] font-bold text-[#B80049]">Buat Akun Admin</h1>
                <p class="text-sm text-gray-500">Silakan isi formulir di bawah ini untuk membuat akun admin baru.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 ">
                <form action="{{ route('users.store') }}" method="POST"
                    class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-3">
                    @csrf
                    <div>
                        <label class="label" for="name">Nama Lengkap</label>
                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input required id="name" name="name" type="text" value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap Anda" class="input">
                        </div>
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="label" for="email">Alamat Email</label>
                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input required id="email" name="email" type="email" placeholder="nama@email.com"
                                value="{{ old('email') }}" class="input">
                        </div>
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="label" for="phone">Nomor Telepon / WhatsApp</label>
                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 5a2 2 0 012-2h2.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a2 2 0 012 2v1a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <input required id="phone" name="phone" type="text" placeholder="081234567890"
                                value="{{ old('phone') }}" class="input">
                        </div>
                        @error('phone')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="label" for="password">Kata Sandi</label>
                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input required id="password" name="password" type="password" value="{{ old('password') }}"
                                placeholder="Minimal 8 karakter" class="input pr-10">
                            <button type="button" onclick="togglePassword(this)" data-target="password"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eyeClosed" class="eye-closed h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c4.756 0 8.774-3.162 10.066-7.498a10.477 10.477 0 00-2.046-3.777M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.88 9.88a3 3 0 104.24 4.24" />
                                </svg>
                                <svg id="eyeOpen" class="eye-open h-4 w-4 hidden" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                    <div>
                        <label class="label" for="password">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input required id="password_confirmation" name="password_confirmation" type="password"
                                value="{{ old('password') }}" placeholder="Minimal 8 karakter" class="input pr-10">
                            <button type="button" onclick="togglePassword(this)" data-target="password_confirmation"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eyeClosed" class="eye-closed h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c4.756 0 8.774-3.162 10.066-7.498a10.477 10.477 0 00-2.046-3.777M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.88 9.88a3 3 0 104.24 4.24" />
                                </svg>
                                <svg id="eyeOpen" class="eye-open h-4 w-4 hidden" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label class="label" for="referral_code">
                            Kode Referral
                        </label>

                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15l4-4m0 0l-4-4m4 4H8" />
                                </svg>
                            </span>

                            <input type="text" id="referral_code" name="referral_code" maxlength="10"
                                placeholder="Contoh: AGENT123" value="{{ old('referral_code') }}"
                                class="input w-full pl-10" required>
                        </div>

                        @error('referral_code')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label class="label" for="province">Provinsi</label>

                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0
                    l-4.243-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>

                            <select id="province" name="province" class="input appearance-none"
                                value="{{ old('province') }}" data-old="{{ old('province') }}">
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                        @error('province')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="label" for="regency">Kabupaten / Kota</label>

                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0
                    l-4.243-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>

                            <select id="regency" name="regency" class="input appearance-none"
                                value="{{ old('regency') }}" disabled data-old="{{ old('regency') }}">
                                <option value="">Pilih Kabupaten / Kota</option>
                            </select>
                        </div>
                        @error('regency')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="label" for="district">Kecamatan</label>

                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0
                    l-4.243-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>

                            <select id="district" name="district" class="input appearance-none" disabled
                                value="{{ old('district') }}" data-old="{{ old('district') }}">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        @error('district')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="label" for="village">Kelurahan / Desa</label>

                        <div class="relative">
                            <span class="icon">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0
                    l-4.243-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>

                            <select id="village" name="village" class="input appearance-none" disabled
                                value="{{ old('village') }}" data-old="{{ old('village') }}">
                                <option value="">Pilih Kelurahan / Desa</option>
                            </select>
                        </div>
                        @error('village')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="label" for="address">Alamat Lengkap</label>
                        <div class="relative">
                            <textarea id="address" name="address" rows="3" class="input h-auto py-3"
                                placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                        </div>
                        @error('address')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
            </div>


            <button type="submit"
                class="w-full rounded-lg bg-[#B80049] mt-4 py-2.5 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-[#970039]">
                Daftar Sekarang
            </button>
            </form>

            
        </div>
    </div>
    </div>
    <style>
        .label {
            display: block;
            margin-bottom: .25rem;
            font-size: .75rem;
            font-weight: 600;
            color: #374151;
        }

        .icon {
            position: absolute;
            top: 50%;
            left: 12px;
            display: flex;
            width: 16px;
            height: 16px;
            align-items: center;
            justify-content: center;
            transform: translateY(-50%);
            color: #1B6D24;
            pointer-events: none;
        }

        .input {
            width: 100%;
            height: 42px;
            border: 1px solid #e5e7eb;
            border-radius: .5rem;
            padding: .625rem .75rem .625rem 2.5rem;
            font-size: .875rem;
            color: #374151;
            outline: none;
        }

        .input:focus {
            border-color: #B80049;
            box-shadow: 0 0 0 2px rgba(184, 0, 73, .15);
        }
    </style>

    <script>
        function togglePassword(button) {
            const input = document.getElementById(button.dataset.target);
            const eyeClosed = button.querySelector('.eye-closed');
            const eyeOpen = button.querySelector('.eye-open');

            const show = input.type === 'password';

            input.type = show ? 'text' : 'password';

            eyeClosed.classList.toggle('hidden', show);
            eyeOpen.classList.toggle('hidden', !show);
        }
    </script>
    @vite('resources/js/addres.js')
</x-layout>
