<x-layout title="Login" type="login">

    <div class="min-h-screen w-full flex flex-col lg:flex-row bg-white">

        <div class="relative w-full h-56 sm:h-64 md:h-80 lg:h-screen lg:w-1/2 overflow-hidden bg-gray-200">
            <img src="{{ asset('images/KaabahJamaah.jpeg') }}" alt="Jamaah Umroh di depan Ka'bah"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>

            <div
                class="absolute bottom-4 left-4 right-4 sm:bottom-8 sm:left-6 sm:right-6 lg:bottom-14 lg:left-14 lg:right-14 text-white">
                <h2 class="text-xl sm:text-3xl lg:text-4xl font-bold mb-1 sm:mb-3">Sistem ERP Khalifah Asia</h2>
                <p class="text-sm lg:text-base text-white/90 leading-relaxed max-w-md">
                    Kelola pemesanan, inventaris, dan laporan dengan sistem terintegrasi
                    yang dirancang untuk efisiensi maksimal.
                </p>
            </div>
        </div>

        <div
            class="w-full lg:w-1/2 flex flex-col justify-center px-5 sm:px-8 md:px-16 lg:px-24 py-8 sm:py-10 bg-white mx-auto">

            <div class="max-w-md w-full mx-auto">

                <div class="mb-6 sm:mb-10 flex justify-center lg:justify-start">
                    <img src="{{ asset('images/KhalifahLogo.png') }}" alt="Khalifah Asia Tour & Travel — Bekasi"
                        class="h-10 sm:h-14 w-auto">
                </div>

                <h1 class="text-2xl sm:text-3xl font-bold text-[#1C1B1B] mb-2">
                    Login Agent
                </h1>
                <p class="text-sm sm:text-base text-[#5B3F43] mb-6 sm:mb-8">
                    Silakan masuk ke akun mitra Anda untuk melanjutkan.
                </p>

                <form action="{{ route('login') }}" method="POST" class="space-y-5 sm:space-y-6">
                    @csrf
                    <div>
                        <label for="login" class="block text-sm font-semibold text-[#1C1B1B] mb-2">
                            ID Agen / Email
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0ZM2 14H14V13.2C14 13.0167 13.9542 12.85 13.8625 12.7C13.7708 12.55 13.65 12.4333 13.5 12.35C12.6 11.9 11.6917 11.5625 10.775 11.3375C9.85833 11.1125 8.93333 11 8 11C7.06667 11 6.14167 11.1125 5.225 11.3375C4.30833 11.5625 3.4 11.9 2.5 12.35C2.35 12.4333 2.22917 12.55 2.1375 12.7C2.04583 12.85 2 13.0167 2 13.2V14ZM8 6C8.55 6 9.02083 5.80417 9.4125 5.4125C9.80417 5.02083 10 4.55 10 4C10 3.45 9.80417 2.97917 9.4125 2.5875C9.02083 2.19583 8.55 2 8 2C7.45 2 6.97917 2.19583 6.5875 2.5875C6.19583 2.97917 6 3.45 6 4C6 4.55 6.19583 5.02083 6.5875 5.4125C6.97917 5.80417 7.45 6 8 6Z"
                                        fill="#5B3F43" />
                                </svg>
                            </span>
                            <input id="login" type="text" name="email" placeholder="Masukkan ID atau Email"
                                required
                                class="w-full rounded-xl border border-[#E5E5E5] pl-12 pr-4 py-3 text-base text-[#1C1B1B] placeholder:text-[#5B3F43] focus:outline-none focus:ring-2 focus:ring-[#B80049] focus:border-[#B80049] transition">
                            
                        </div>
                        @error('email')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2 gap-2">
                            <label for="password" class="block text-sm font-semibold text-[#1C1B1B]">
                                Kata Sandi
                            </label>
                            <a href="#"
                                class="text-sm font-semibold text-[#B80049] hover:text-[#96003c] whitespace-nowrap">
                                Lupa Sandi?
                            </a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 21C1.45 21 0.979167 20.8042 0.5875 20.4125C0.195833 20.0208 0 19.55 0 19V9C0 8.45 0.195833 7.97917 0.5875 7.5875C0.979167 7.19583 1.45 7 2 7H3V5C3 3.61667 3.4875 2.4375 4.4625 1.4625C5.4375 0.4875 6.61667 0 8 0C9.38333 0 10.5625 0.4875 11.5375 1.4625C12.5125 2.4375 13 3.61667 13 5V7H14C14.55 7 15.0208 7.19583 15.4125 7.5875C15.8042 7.97917 16 8.45 16 9V19C16 19.55 15.8042 20.0208 15.4125 20.4125C15.0208 20.8042 14.55 21 14 21H2ZM2 19H14V9H2V19ZM8 16C8.55 16 9.02083 15.8042 9.4125 15.4125C9.80417 15.0208 10 14.55 10 14C10 13.45 9.80417 12.9792 9.4125 12.5875C9.02083 12.1958 8.55 12 8 12C7.45 12 6.97917 12.1958 6.5875 12.5875C6.19583 12.9792 6 13.45 6 14C6 14.55 6.19583 15.0208 6.5875 15.4125C6.97917 15.8042 7.45 16 8 16ZM5 7H11V5C11 4.16667 10.7083 3.45833 10.125 2.875C9.54167 2.29167 8.83333 2 8 2C7.16667 2 6.45833 2.29167 5.875 2.875C5.29167 3.45833 5 4.16667 5 5V7ZM2 19V9V19Z"
                                        fill="#5B3F43" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" placeholder="Masukkan kata sandi"
                                required
                                class="w-full rounded-xl border border-[#E5E5E5] pl-12 pr-12 py-3 text-base text-[#1C1B1B] placeholder:text-[#5B3F43] focus:outline-none focus:ring-2 focus:ring-[#B80049] focus:border-[#B80049] transition">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-[#5B3F43] hover:text-[#3f2c2f]">
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <svg id="eyeClosed" class="hidden h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a18.53 18.53 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                    </path>
                                    <line x1="1" y1="1" x2="23" y2="23"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-[#B80049] hover:bg-[#96003c] text-white font-semibold py-3 text-base transition shadow-sm">
                        Masuk
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-[#5B3F43]">
                    Butuh bantuan akses?
                    <a href="/register" class="font-semibold text-[#B80049] hover:text-[#96003c]">
                        Daftar Akun
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const closed = document.getElementById('eyeClosed');
            const open = document.getElementById('eyeOpen');

            const show = input.type === 'password';

            input.type = show ? 'text' : 'password';
            closed.classList.toggle('hidden', !show);
            open.classList.toggle('hidden', show);
        }
    </script>

</x-layout>
