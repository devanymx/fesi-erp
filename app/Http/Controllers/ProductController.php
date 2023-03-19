<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

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
            'products' => $getProducts->paginate(6),
        ]);

    }

    private function productsCheckFilters(Request $request, Team $team)
    {

        $getProducts = $team->products();

        return $getProducts;

    }

    public function newProduct(Request $request){

        $product = new Product();

        return view('products.form', [
            'product' => $product,
            'method' => 'post'
        ]);

    }

    public function createProduct(Request $request){

        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'taxes' => ['integer', 'doesnt_end_with:3']
        ])->validate();

        $product = Product::create($input);
        $product->teams()->attach(1, [
            'max_stock' => '0',
            'min_stock' => '0',
            'stock' => '0'
        ]);

        return redirect()->route('products.dashboard');

    }

    public function editProduct(Request $request, Product $product){
        return view('products.form', [
            'product' => $product,
            'method' => 'put'
        ]);
    }

    public function updateProduct(Request $request, Product $product){
        $product->fill($request->all());
        $product->save();

        return redirect()->route('products.dashboard');
    }

}
