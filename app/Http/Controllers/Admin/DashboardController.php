<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Count all user
        $allUsers = User::count();
        $adminUsers = User::where('is_admin', true)->count();
        $notVerifiedUsers = User::where('is_verified', false)->count();
        $notVerifiedEmailUsers = User::where('email_verified_at', null)->count();

        // dd($allUsers, $adminUsers, $notVerifiedUsers, $notVerifiedEmailUsers);
        return view(
            'admin.dashboard',
            compact(
                'allUsers',
                'adminUsers',
                'notVerifiedUsers',
                'notVerifiedEmailUsers'
            )
        );
    }
}
