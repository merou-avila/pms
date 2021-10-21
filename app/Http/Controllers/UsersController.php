<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->with('role');

        if (request()->has('s') and ! empty(request()->s)) {
            $keyword = request()->s;
            $attributes = implode(', ', (new User)->getFillable());
            $users = $users
                ->whereRaw("(
                    CONCAT_WS(' ', {$attributes}) LIKE '%{$keyword}%'
                )");
        }

        $users = $users->paginate(20);

        return view ('pages.users.index', compact(
            'users'
        ));
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', compact(
            'user'
        ));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only(
            'first_name',
            'last_name',
            'email',
        ));

         return redirect()->route('users.index', $user)
            ->withStatus('Successfully updated user profile.');
    }
}
