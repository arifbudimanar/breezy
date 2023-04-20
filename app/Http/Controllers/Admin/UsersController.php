<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User ' . $user->name . ' deleted successfully!');
    }
    public function makeAdmin(User $user)
    {
        $user->timestamps = false;
        $user->is_admin = 1;
        $user->save();
        return back()->with('success', $user->name . ' made admin successfully!');
    }
    public function removeAdmin(User $user)
    {
        $user->timestamps = false;
        $user->is_admin = 1;
        $user->save();
        return back()->with('success', $user->name . ' remove admin successfully!');
    }
}
