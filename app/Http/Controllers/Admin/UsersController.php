<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{
    public function index(): View
    {
        $search = request('search');
        if ($search) {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
                ->orderBy('name')
                ->paginate(10)
                ->withQueryString();
        } else {
            $users = User::orderBy('name')
                ->paginate(10);
        }
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with('success', 'User ' . $user->name . ' deleted successfully!');
    }

    public function makeAdmin(User $user): RedirectResponse
    {
        if ($user->email_verified_at == null) {
            return back()->with('warning', 'Error, ' . $user->name . ' email is not verified!');
        }
        if ($user->is_verified == 0) {
            return back()->with('warning', 'Error, ' . $user->name . ' is not verified!');
        }
        $user->timestamps = false;
        $user->is_admin = 1;
        $user->save();
        return back()->with('success', $user->name . ' made admin successfully!');
    }

    public function removeAdmin(User $user): RedirectResponse
    {
        $user->timestamps = false;
        $user->is_admin = 1;
        $user->save();
        return back()->with('success', $user->name . ' remove admin successfully!');
    }

    public function verify(User $user): RedirectResponse
    {
        if ($user->email_verified_at == null) {
            return back()->with('warning', 'Error, ' . $user->name . ' email is not verified!');
        }
        $user->timestamps = false;
        $user->is_verified = 1;
        $user->save();
        return back()->with('success', $user->name . ' verified successfully!');
    }

    public function unverify(User $user): RedirectResponse
    {
        if ($user->is_admin) {
            $user->timestamps = false;
            $user->is_admin = 0;
            $user->is_verified = 0;
            $user->save();
            return back()->with('success', $user->name . ' remove admin and unverified successfully!');
        }
        $user->timestamps = false;
        $user->is_verified = 0;
        $user->save();
        return back()->with('success', $user->name . ' unverified successfully!');
    }
}
