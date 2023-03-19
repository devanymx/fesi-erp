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
            'products' => $getProducts->paginate(12),
        ]);

    }

    private function productsCheckFilters(Request $request, Team $team)
    {

        $getProducts = $team->products();

        if ($request->has('search')){
            $getProducts = $team->products()->where([
                ['name','like','%'.$request->get('search').'%']
            ]);
        }

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
            'max_stock' => $input['max_stock'],
            'min_stock' => $input['min_stock'],
            'stock' => $input['stock']
        ]);

        return redirect()->route('products.dashboard');

    }

    public function editProduct(Request $request, Product $product){
        $authUser = Auth::user();
        $currentTeam = $authUser->currentTeam;
        $pivot = $product->teams()->find($currentTeam->id);

        return view('products.form', [
            'product' => $product,
            'pivot' => $pivot,
            'method' => 'put'
        ]);
    }

    public function updateProduct(Request $request, Product $product){
        $authUser = Auth::user();
        $currentTeam = $authUser->currentTeam;
        $input = $request->all();

        $product->fill($input);
        $product->save();

        $productPivot = $product->teams()->find($currentTeam->id);
        $productPivot->pivot->stock = $input['stock'];
        $productPivot->pivot->max_stock = $input['max_stock'];
        $productPivot->pivot->min_stock = $input['min_stock'];
        $productPivot->pivot->save();

        return redirect()->route('products.dashboard');
    }

    public function moveProduct(Request $request, Product $product){
        $teams = Team::all();
        return view('products.move', compact('product', 'teams'));
    }

    public function makeMoveProduct(Request $request, Product $product){
        $input = $request->all();
        $destino = Team::find($input['destino']);
        $origen = Team::find($input['origen']);
        $min = 0;
        $max = 0;
        $stock = $input['stock'];


        if ($origen->id == 1){
            $this->attachToAnotherTeam($product, $max, $min, $stock, $destino);
        }else{
            $this->makeMovement($product, $max, $min, $stock, $destino, $origen);
        }

        return redirect()->route('products.dashboard');

    }

    private function attachToAnotherTeam(Product $product, int $max, int $min, int $stock, Team $team)
    {

        $product->teams()->attach($team->id, [
            'max_stock' => $max,
            'min_stock' => $min,
            'stock'     => $stock
        ]);

    }

    private function makeMovement(Product $product, int $max, int $min, int $stock, Team $destino, Team $origen)
    {
        $origenPivot = $product->teams()->find($origen->id);

        if ($stock > $origenPivot->pivot->stock){
            dd('El stock que se intenta ingresar es mayor al que hay en la sucursal origen');
        }

        $origenPivot->pivot->stock -= $stock;
        $origenPivot->pivot->save();

        $destinyPivot = $product->teams()->find($destino->id);
        if ($destinyPivot){
            $destinyPivot->pivot->stock += $stock;
            $destinyPivot->pivot->save();
        }else{
            $product->teams()->attach($destino->id,[
                'max_stock' => $max,
                'min_stock' => $min,
                'stock'     => $stock
            ]);
        }

    }

}
