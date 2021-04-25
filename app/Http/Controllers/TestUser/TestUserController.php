<?php

namespace App\Http\Controllers\TestUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\TestUserModel;

class TestUserController extends Controller
{
    public function testuser() {
        return response()->json(TestUserModel::get(), 200);
    }

    public function testuserById($id) {
        return response()->json(TestUserModel::find($id), 200);
    }

    public function filter(Request $request, TestUserModel $user) {

        $user = $user->newQuery();

    if ($request->has('fio')) {
        $user->where('fio', 'like', '%'.$request->input('fio').'%');
    }

    if ($request->has('active')) {
        $user->where('active', $request->input('active'));
    }

    if ($request->has('active_time_start')) {
        $user->where('active_time', '>=', $request->input('active_time_start'));
    }
    if ($request->has('active_time_end')) {
        $user->where('active_time', '<=', $request->input('active_time_end'));
    }
    $user->orderBy('id', 'ASC');
    return response()->json($user->get(), 200);

    }
}
