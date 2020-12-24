<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->job = $request->get('job');
        $user->save();

    }
    public function getMale()
    {
        return DB::table('users')->where('gender', 'male')->count();
    }

    public function getFemale()
    {
        return DB::table('users')->where('gender', 'female')->count();
    }

    public function getJob()
    {
        return  DB::table('users')
        ->groupBy(DB::raw('job, gender WITH ROLLUP'))
        ->get(['job', DB::raw('IFNULL(gender, "total") AS gender') , DB::raw('count(*) as sum')])
        ->reject(function ($row) {
            return !$row->job; // remove roll-up null value
        })
        ->groupBy('job'); // this one is collection's group by
    }

}
