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

        $getUsers = $this->checkFilters($request, $authUser);

        return view('dashboard',[
            'users' => $getUsers,
        ]);

    }

    private function checkFilters(Request $request, User $user)
    {
        $currentTeam = $user->currentTeam->id;

        $getUsers = User::role('usuario')->where('current_team_id',$currentTeam)->paginate(1);
        if ($request->has('search')){
            $getUsers = User::role('usuario')->where([
                ['current_team_id','=',$currentTeam],
                ['name','like','%'.$request->get('search').'%']
            ])->paginate(1);
        }

        //TODO: Filter by roles.
        if ($request->has('roles')){
            $getUsers = User::role('usuario')->where([
                ['current_team_id','=',$currentTeam],
            ])->paginate(1);
        }

        return $getUsers;
    }

}
