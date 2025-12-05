<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Simple admin dashboard controller.
     *
     * Provides a landing dashboard view for users with admin privileges.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}