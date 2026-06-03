{{-- 
    Forgot Password Page
    ---------------------
    This page allows the user to request a password reset link.
    It uses the same SweetShop styling as your login/register page.
--}}

<x-layout title="Forgot Password">

    {{-- Hero Section (matches other pages) --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Forgot Your Password? 🍬</h1>
        <p class="mt-3 text-lg text-pink-900">
            Enter your email and we’ll send you a reset link.
        </p>
    </section>

    {{-- Reset Request Card --}}
    <section class="max-w-md mx-auto mt-10 bg-gradient-to-br from-pink-50 to-pink-100 
                    rounded-2xl shadow-lg border-2 border-pink-200 p-8 relative overflow-hidden
                    transition transform hover:-translate-y-1 hover:shadow-xl">

        {{-- Decorative candy corner --}}
        <div class="absolute -top-4 -right-4 text-6xl opacity-20 select-none">🍭</div>

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

        {{-- Form --}}
        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-pink-700">Email Address</label>
                <input type="email" name="email" required
                       class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <button class="w-full bg-pink-500 text-white py-3 rounded-full shadow-md 
                           hover:bg-pink-600 hover:shadow-lg transition font-semibold">
                Send Reset Link
            </button>

            <div class="text-center mt-2">
                <a href="{{ route('login') }}" class="text-pink-600 hover:text-pink-800 text-sm">
                    Back to Login
                </a>
            </div>
        </form>
    </section>

</x-layout>
