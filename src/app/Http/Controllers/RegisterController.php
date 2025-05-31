<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function imagePost(Request $request)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file_path = $file->storeAs('', $filename, 'public');
        Session::put('image', str_replace('public', 'storage', $file_path));

        $image = new Product();
        $image->filename = $filename;
        $image->file_path = 'storage/app/public/' . $dir . '/' . $filename;

        return view('index');
    }

    public function store(RegisterRequest $request)
    {
        $product = $request->all();
        Product::create($product);

        return view('index');
    }
}
