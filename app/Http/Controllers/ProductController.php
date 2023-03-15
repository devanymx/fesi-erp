<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /*
     * Provides a simple menu for products
     * */
    public function showDashboard(Request $request){

        $authUser = Auth::user();
        $currentTeam = $authUser->currentTeam;

        $getProducts = $this->productsCheckFilters($request, $currentTeam);

        return view('products.dashboard',[
            'products' => $getProducts->paginate(1),
        ]);

    }

    private function productsCheckFilters(Request $request, Team $team)
    {

        $getProducts = $team->products();

        return $getProducts;

    }

}
