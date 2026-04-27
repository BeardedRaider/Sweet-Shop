<x-layout :title="'Login or Register'">
    <section class="max-w-md mx-auto bg-white shadow rounded p-6">

        {{-- Tabs --}}
        <div class="flex justify-between mb-6 border-b pb-2">
            <button id="tab-login"
                class="w-1/2 text-center py-2 font-semibold text-pink-700 border-b-2 border-pink-500">
                Login
            </button>

            <button id="tab-register"
                class="w-1/2 text-center py-2 font-semibold text-gray-500 hover:text-pink-600 transition">
                Register
            </button>
        </div>

        {{-- LOGIN FORM --}}
        <form id="form-login" method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-pink-700 font-semibold">Email</label>
                <input type="email" name="email"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-semibold">Password</label>
                <input type="password" name="password"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 transition">
                Login
            </button>
        </form>

        {{-- REGISTER FORM --}}
        <form id="form-register" method="POST" action="{{ route('register') }}" class="hidden">
            @csrf

            <div class="mb-4">
                <label class="block text-pink-700 font-semibold">Name</label>
                <input type="text" name="name"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-semibold">Email</label>
                <input type="email" name="email"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-semibold">Password</label>
                <input type="password" name="password"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-pink-700 font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 transition">
                Create Account
            </button>
        </form>

    </section>

    {{-- Tab Switcher --}}
    <script>
        const tabLogin = document.getElementById('tab-login');
        const tabRegister = document.getElementById('tab-register');
        const formLogin = document.getElementById('form-login');
        const formRegister = document.getElementById('form-register');

        tabLogin.onclick = () => {
            formLogin.classList.remove('hidden');
            formRegister.classList.add('hidden');

            tabLogin.classList.add('text-pink-700', 'border-pink-500');
            tabLogin.classList.remove('text-gray-500');

            tabRegister.classList.add('text-gray-500');
            tabRegister.classList.remove('text-pink-700', 'border-pink-500');
        };

        tabRegister.onclick = () => {
            formLogin.classList.add('hidden');
            formRegister.classList.remove('hidden');

            tabRegister.classList.add('text-pink-700', 'border-pink-500');
            tabRegister.classList.remove('text-gray-500');

            tabLogin.classList.add('text-gray-500');
            tabLogin.classList.remove('text-pink-700', 'border-pink-500');
        };
    </script>
</x-layout>
