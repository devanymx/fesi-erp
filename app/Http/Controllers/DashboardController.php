<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /*
     * Provides a simple menu for administrators
     * */
    public function showDashboard(Request $request){

        $authUser = Auth::user();

        $getUsers = $this->usersCheckFilters($request, $authUser);

        return view('dashboard',[
            'users' => $getUsers->paginate(1),
        ]);

    }

    private function usersCheckFilters(Request $request, User $user)
    {
        $currentTeam = $user->currentTeam->id;

        $getUsers = User::role('usuario')->where('current_team_id',$currentTeam);

        if ($request->has('search')){
            $getUsers = User::role('usuario')->where([
                ['current_team_id','=',$currentTeam],
                ['name','like','%'.$request->get('search').'%']
            ]);
        }

        if ($request->has('role')){
            $getUsers = User::role($request->get('role'))->where([
                ['current_team_id','=',$currentTeam],
            ]);
        }

        return $getUsers;
    }

}
