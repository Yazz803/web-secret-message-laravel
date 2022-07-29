<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SpecialFeatureController extends Controller
{
    public function specialFeature(Request $request, User $user){
        $validatedData = $request->validate([
            'special_feature' => 'required|min:1'
        ]);

        User::where('id', $user->id)->update($validatedData);

        return back();
    }
}
