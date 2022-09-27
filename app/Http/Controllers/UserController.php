<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    Public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);
        $user->fill($input)->save();
        toastr()->success('Record has been updated successfully');
        return back();
    }
}
