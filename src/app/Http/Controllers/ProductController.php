<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\RegisterRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        $links = DB::table('products')->paginate(6);

        return view('index', ['product' => Product::order($request->sort)], compact('products', 'links'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Product::query();

        if (!empty($keyword))
        {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        return view('index', compact('keyword'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products', compact('product'));
    }

    public function update(RegisterRequest $request)
    {
        $product = $request->all();
        Product::find($request->id)->update($product);
        return view('index');
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return view('index');
    }
}
