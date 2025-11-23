{{-- Flash message component: displays session-based notifications with auto-dismiss --}}
@if (session('success'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 4000)" 
         class="mb-4 px-4 py-2 rounded bg-green-100 text-green-800 border border-green-300 transition-opacity duration-500"
         x-transition.opacity>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 4000)" 
         class="mb-4 px-4 py-2 rounded bg-red-100 text-red-800 border border-red-300 transition-opacity duration-500"
         x-transition.opacity>
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 4000)" 
         class="mb-4 px-4 py-2 rounded bg-yellow-100 text-yellow-800 border border-yellow-300 transition-opacity duration-500"
         x-transition.opacity>
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 4000)" 
         class="mb-4 px-4 py-2 rounded bg-blue-100 text-blue-800 border border-blue-300 transition-opacity duration-500"
         x-transition.opacity>
        {{ session('info') }}
    </div>
@endif
