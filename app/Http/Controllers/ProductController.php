<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('products');
    }
    public function createProduct()
    {
        return view('products/create');
    }
    public function store(Request $request)
    {

        $input = $request->all();
    if($image = $request->file('image')){
        $destination = 'images/';
        $profileImage = date("YmdHis") . "." .$image->getClientOriginalExtension();
        $image->move($destination, $profileImage);
        $input['image'] = $profileImage;
    }


        Product::create($input);
        return redirect()->route('products');



       // $product->save();
echo "ghoulam";
        //return redirect("/products");
    }
}
