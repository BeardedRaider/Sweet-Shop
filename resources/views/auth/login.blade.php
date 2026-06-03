<x-layout :title="'Login or Register'">

    {{-- Hero Section (matches other pages) --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Welcome Back 🍬</h1>
        <p class="mt-3 text-lg text-pink-900">
            Log in to your SweetShop account or create a new one to join the fun.
        </p>
    </section>

    {{-- Auth Card --}}
    <section
        class="max-w-md mx-auto mt-10 bg-gradient-to-br from-pink-50 to-pink-100 
                    rounded-2xl shadow-lg border-2 border-pink-200 p-8 relative overflow-hidden">

        {{-- Decorative candy corner --}}
        <div class="absolute -top-4 -right-4 text-6xl opacity-20 select-none">
            🍭
        </div>

        {{-- Error message --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg shadow-sm mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Success message --}}
        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg shadow-sm mb-4">
                {{ session('status') }}
            </div>
        @endif

        {{-- Tabs --}}
        <div class="flex justify-between mb-8 border-b border-pink-300 pb-2">
            <button id="tab-login" class="w-1/2 text-center py-2 font-semibold text-pink-700 border-b-2 border-pink-500">
                Login
            </button>

            <button id="tab-register"
                class="w-1/2 text-center py-2 font-semibold text-gray-500 hover:text-pink-600 transition">
                Register
            </button>
        </div>

        {{-- LOGIN FORM --}}
        <form id="form-login" method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded-lg shadow-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label class="block text-sm font-semibold text-pink-700">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Password</label>
                <input type="password" name="password" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>
            <div class="text-right">
                <a href="{{ route('password.request') }}"
                    class="text-pink-600 text-sm font-medium hover:text-pink-800 transition">
                    Forgot your password?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-pink-500 text-white py-3 rounded-full shadow-md 
                       hover:bg-pink-600 hover:shadow-lg transition font-semibold">
                Login
            </button>
        </form>

        {{-- REGISTER FORM --}}
        <form id="form-register" method="POST" action="{{ route('register') }}" class="hidden space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-pink-700">Name</label>
                <input type="text" name="name" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Password</label>
                <input type="password" name="password" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <button type="submit"
                class="w-full bg-pink-500 text-white py-3 rounded-full shadow-md 
                       hover:bg-pink-600 hover:shadow-lg transition font-semibold">
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
