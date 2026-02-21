<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center 
                bg-gradient-to-br from-[#D9ECE2] via-[#D6D7EB] to-[#F9E1ED] p-6">

        <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl 
                    overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- LEFT : ILLUSTRATION -->
            <div class="hidden md:flex items-center justify-center 
                        bg-white p-10 relative">

                <img
                    src="/images/login.png"
                    alt="Register"
                    class="w-[420px] max-w-none drop-shadow-xl select-none"
                />
            </div>

            <!-- RIGHT : FORM -->
            <div class="flex items-center justify-center p-10 md:p-14">
                <div class="w-full max-w-sm">

                    <h1 class="text-2xl font-semibold text-[#27316E] mb-8">
                        Daftar akun <span class="font-bold">Scholaria</span>
                    </h1>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Nama -->
                        <div>
                            <x-input-label for="nama" value="Nama"
                                class="text-sm text-[#27316E]" />

                            <x-text-input
                                id="nama"
                                class="mt-2 w-full rounded-xl border 
                                       border-[#AAA2F5]/60 px-4 py-3
                                       focus:border-[#27316E] focus:ring-[#27316E]/30"
                                type="text"
                                name="nama"
                                :value="old('nama')"
                                required
                                autofocus
                            />

                            <x-input-error :messages="$errors->get('nama')" class="mt-1" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" value="Email"
                                class="text-sm text-[#27316E]" />

                            <x-text-input
                                id="email"
                                class="mt-2 w-full rounded-xl border 
                                       border-[#AAA2F5]/60 px-4 py-3
                                       focus:border-[#27316E] focus:ring-[#27316E]/30"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                            />

                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" value="Password"
                                class="text-sm text-[#27316E]" />

                            <x-text-input
                                id="password"
                                class="mt-2 w-full rounded-xl border 
                                       border-[#AAA2F5]/60 px-4 py-3
                                       focus:border-[#27316E] focus:ring-[#27316E]/30"
                                type="password"
                                name="password"
                                required
                            />

                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation"
                                value="Confirm Password"
                                class="text-sm text-[#27316E]" />

                            <x-text-input
                                id="password_confirmation"
                                class="mt-2 w-full rounded-xl border 
                                       border-[#AAA2F5]/60 px-4 py-3
                                       focus:border-[#27316E] focus:ring-[#27316E]/30"
                                type="password"
                                name="password_confirmation"
                                required
                            />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>

                        <!-- Button -->
                        <button
                            type="submit"
                            class="w-full py-3 mt-4 rounded-xl font-semibold
                                   bg-[#3B346D] text-white
                                   hover:bg-[#27316E]
                                   transition duration-300">
                            Register
                        </button>
                    </form>

                    <p class="text-sm text-center text-[#27316E]/70 mt-6">
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                           class="font-medium text-[#3B346D] hover:underline">
                            Login
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
