<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
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
                ->paginate(6)
                ->withQueryString();
        } else {
            $users = User::orderBy('name')
                ->paginate(6);
        }
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with('success', __('User :name deleted successfully!', ['name' => $user->name]));
    }

    public function makeAdmin(User $user): RedirectResponse
    {
        if ($user->email_verified_at == null) {
            return back()->with('warning', __('Error, :name email is not verified!', ['name' => $user->name]));
        }
        if ($user->is_verified == 0) {
            return back()->with('warning', __('Error, :name account is not verified!', ['name' => $user->name]));
        }
        $user->timestamps = false;
        $user->is_admin = 1;
        $user->save();
        return back()->with('success', __(':name made admin successfully!', ['name' => $user->name]));
    }

    public function removeAdmin(User $user): RedirectResponse
    {
        $user->timestamps = false;
        $user->is_admin = 0;
        $user->save();
        return back()->with('success', __(':name remove admin successfully!', ['name' => $user->name]));
    }

    public function verify(User $user): RedirectResponse
    {
        if ($user->email_verified_at == null) {
            return back()->with('warning', 'Error, ' . $user->name . ' email is not verified!');
        }
        $user->timestamps = false;
        $user->is_verified = 1;
        $user->save();
        return back()->with('success', __(':name verified successfully!', ['name' => $user->name]));
    }

    public function unverify(User $user): RedirectResponse
    {
        if ($user->is_admin) {
            $user->timestamps = false;
            $user->is_admin = 0;
            $user->is_verified = 0;
            $user->save();
            return back()->with('success', __(':name remove admin and unverified successfully!', ['name' => $user->name]));
        }
        $user->timestamps = false;
        $user->is_verified = 0;
        $user->save();
        return back()->with('success', __(':name unverified successfully!', ['name' => $user->name]));
    }

    public function resetPassword(User $user): RedirectResponse
    {
        $user->timestamps = false;
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->save();
        return back()->with('success', __(':name password reset successfully!', ['name' => $user->name]));
    }
}
