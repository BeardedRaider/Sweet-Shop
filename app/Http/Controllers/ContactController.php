<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // For now, just log the message until admin panel is built
        Log::info('Contact form submitted:', $validated);

        return back()->with('success', 'Thanks for your message! We’ll get back to you soon.');
    }
}
