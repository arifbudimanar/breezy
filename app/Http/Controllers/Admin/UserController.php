<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserListRequest;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(UserListRequest $request): View
    {
        $users = User::orderBy('name')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
                });
            })
            ->when($request->role, function ($query, $role) {
                $query->where('is_admin', $role === 'admin');
            })
            ->when($request->verified_account, function ($query, $verified_account) {
                $query->where('is_verified', $verified_account === 'true');
            })
            ->paginate(18)
            ->withQueryString();

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

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('User :name created successfully!', ['name' => $user->name]));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request): RedirectResponse
    {
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

        return redirect()
            ->route('admin.users.index')
            ->with('success', __('User :name deleted successfully!', ['name' => $user->name]));
    }

    public function makeAdmin(User $user): RedirectResponse
    {
        if (! $user->isEmailVerified()) {
            return back()->with('warning', __('Error, :name email is not verified!', ['name' => $user->name]));
        }
        if (! $user->isUserVerified()) {
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
        if (! $user->isEmailVerified()) {
            return back()->with('warning', 'Error, '.$user->name.' email is not verified!');
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
