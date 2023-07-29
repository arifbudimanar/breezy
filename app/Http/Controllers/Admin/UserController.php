<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
                ->paginate(18)
                ->withQueryString();
        } else {
            $users = User::orderBy('name')
                ->paginate(18);
        }
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }
    public function create(): View
    {
        return view('admin.users.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.users.index')->with('success', __('User :name created successfully!', ['name' => $user->name]));
    }
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(User $user, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        if ($user->email !== $request->email) {
            $user->email_verified_at = null;
        }
        $user->timestamps = false;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('success', __('User :name updated successfully!', ['name' => $user->name]));
    }
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', __('User :name deleted successfully!', ['name' => $user->name]));
    }
    public function makeAdmin(User $user): RedirectResponse
    {
        if (!$user->emailVerified()) {
            return back()->with('warning', __('Error, :name email is not verified!', ['name' => $user->name]));
        }
        if (!$user->isVerified()) {
            return back()->with('warning', __('Error, :name account is not verified!', ['name' => $user->name]));
        }
        $user->timestamps = false;
        $user->update([
            'is_admin' => true,
        ]);
        return back()->with('success', __(':name made admin successfully!', ['name' => $user->name]));
    }
    public function removeAdmin(User $user): RedirectResponse
    {
        $user->timestamps = false;
        $user->update([
            'is_admin' => false,
        ]);
        return back()->with('success', __(':name remove admin successfully!', ['name' => $user->name]));
    }
    public function verify(User $user): RedirectResponse
    {
        if (!$user->emailVerified()) {
            return back()->with('warning', 'Error, ' . $user->name . ' email is not verified!');
        }
        $user->timestamps = false;
        $user->update([
            'is_verified' => true,
        ]);
        return back()->with('success', __(':name verified successfully!', ['name' => $user->name]));
    }
    public function unverify(User $user): RedirectResponse
    {
        $user->timestamps = false;
        if ($user->isAdmin()) {
            $user->update([
                'is_admin' => false,
                'is_verified' => false,
            ]);
            return back()->with('success', __(':name remove admin and unverified successfully!', ['name' => $user->name]));
        }
        $user->update([
            'is_verified' => false,
        ]);
        return back()->with('success', __(':name unverified successfully!', ['name' => $user->name]));
    }
    public function resetPassword(User $user): RedirectResponse
    {
        $user->timestamps = false;
        $user->update([
            'password' => bcrypt('password'),
        ]);
        return back()->with('success', __(':name password reset successfully!', ['name' => $user->name]));
    }
}
