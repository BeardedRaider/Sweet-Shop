<x-layout title="Contact Us">

    {{-- Hero (consistent with other pages) --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Get in Touch</h1>

        <p class="mt-4 text-lg text-pink-900">
            Questions, feedback, or just want to say hi? We’re always happy to hear from our sweet customers.
        </p>
    </section>

    {{-- Contact Content --}}
<section class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 px-6 pb-6 mt-10">

    {{-- Contact Info Card --}}
    <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl shadow-lg border-2 border-pink-200 p-8 space-y-6 relative overflow-hidden">

        {{-- Decorative candy corner --}}
        <div class="absolute -top-4 -right-4 text-6xl opacity-20 select-none">
            🍬
        </div>

        <h2 class="text-3xl font-bold text-pink-700 drop-shadow-sm">Contact Information</h2>

        <div class="space-y-3 text-pink-900/90">
            <p>
                <span class="font-semibold text-pink-700">Email:</span><br>
                support@sweetshop.com
            </p>

            <p>
                <span class="font-semibold text-pink-700">Phone:</span><br>
                01234 567 890
            </p>

            <p>
                <span class="font-semibold text-pink-700">Opening Hours:</span><br>
                Mon–Fri: 9am – 5pm<br>
                Sat: 10am – 4pm
            </p>
        </div>

        <div class="pt-4">
            <h3 class="text-lg font-semibold text-pink-700 mb-3">Follow Us</h3>

            <div class="grid grid-cols-2 gap-4 text-pink-600">

                <a class="flex items-center gap-2 hover:text-pink-800 transition">
                    @include('icons.facebook')
                    Facebook
                </a>

                <a class="flex items-center gap-2 hover:text-pink-800 transition">
                    @include('icons.instagram')
                    Instagram
                </a>

                <a class="flex items-center gap-2 hover:text-pink-800 transition">
                    @include('icons.etsy')
                    Etsy
                </a>

                <a class="flex items-center gap-2 hover:text-pink-800 transition">
                    @include('icons.tiktok')
                    TikTok
                </a>

            </div>
        </div>
    </div>

    {{-- Contact Form Card --}}
    <div class="bg-white rounded-2xl shadow-lg border-2 border-pink-200 p-8">

        <h2 class="text-3xl font-bold text-pink-700 mb-6 drop-shadow-sm">Send Us a Message</h2>

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-pink-700">Name</label>
                <input type="text" name="name" required
                       class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 py-1 px-2 
                              focus:ring-2 focus:ring-pink-300 focus:border-pink-400 transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Email</label>
                <input type="email" name="email" required
                       class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 py-1 px-2 
                              focus:ring-2 focus:ring-pink-300 focus:border-pink-400 transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Subject</label>
                <input type="text" name="subject" required
                       class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 py-1 px-2
                              focus:ring-2 focus:ring-pink-300 focus:border-pink-400 transition shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-pink-700">Message</label>
                <textarea name="message" required
                    class="w-full mt-1 rounded-xl border-2 border-pink-300 bg-pink-50/50 px-2
                    focus:ring-2 focus:ring-pink-300 focus:border-pink-400 transition-all duration-200 ease-out  shadow-sm
                    min-h-16 resize-none">
                </textarea>
            </div>

            <button 
                class="w-full bg-pink-500 text-white py-3 rounded-full shadow-md 
                       hover:bg-pink-600 hover:shadow-lg transition font-semibold">
                Send Message
            </button>
        </form>
    </div>

</section>


{{-- // Optional: A friendly reminder that we’re here to help, placed below the form for extra encouragement may add back later --}}

{{-- <section class="max-w-4xl mx-auto text-center mt-10 bg-pink-50 rounded-lg py-6 px-4 shadow-sm border border-pink-200">
    <p class="text-pink-800 font-medium">
        🍭 Still need help? We’re always here to assist with anything sweet!
    </p>
</section> --}}

{{-- // this script makes the textarea auto-expand as the user types, improving usability without needing to scroll within the box --}}
<script>
document.addEventListener("input", function (e) {
    if (e.target.tagName.toLowerCase() !== "textarea") return;

    e.target.style.height = "auto";

    // Allow the browser to recalc height before animating
    requestAnimationFrame(() => {
        e.target.style.height = e.target.scrollHeight + "px";
    });
});
</script>



</x-layout>
