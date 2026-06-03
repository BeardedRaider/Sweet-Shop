{{-- 
    Reset Password Page
    --------------------
    This page lets the user choose a new password after clicking
    the reset link sent to their email.
--}}

<x-layout title="Reset Password">

    {{-- Hero Section --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Reset Your Password 🍬</h1>
        <p class="mt-3 text-lg text-pink-900">
            Choose a new password to access your SweetShop account.
        </p>
    </section>

    {{-- Reset Form Card --}}
    <section class="max-w-md mx-auto mt-10 bg-gradient-to-br from-pink-50 to-pink-100 
                    rounded-2xl shadow-lg border-2 border-pink-200 p-8 relative overflow-hidden
                    transition transform hover:-translate-y-1 hover:shadow-xl">

        {{-- Decorative candy corner --}}
        <div class="absolute -top-4 -right-4 text-6xl opacity-20 select-none">🍬</div>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf

            {{-- Token from URL --}}
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label class="block text-sm font-semibold text-pink-700">Email Address</label>
                <input type="email" name="email" required
                       class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 
                              py-3 px-3 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 
                              transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">New Password</label>
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

            <button class="w-full bg-pink-500 text-white py-3 rounded-full shadow-md 
                           hover:bg-pink-600 hover:shadow-lg transition font-semibold">
                Reset Password
            </button>
        </form>
    </section>

</x-layout>
