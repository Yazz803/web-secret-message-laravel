<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FiturController extends Controller
{
    public function fitur(Request $request, User $user){
        $validatedData = $request->validate([
            'fitur' => 'required|min:1'
        ]);

        User::where('id', $user->id)->update($validatedData);

        return back();
    }
}
