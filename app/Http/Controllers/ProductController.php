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
        $products=Product::all();
        return view('products',compact('products'));
    }
    public function createProduct(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('products.create');
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

    }

    public function selectProduct(Request $request)
    {
        $product=Product::find($request->id);
        return view('products.update',compact('product'));
    }
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_image = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_image);
            $product->image = $new_image;
        }
        $product->save();
        return redirect()->route('products');
    }


    public function deleteProduct(Request $request){
        $user = Product::findOrFail($request->product_id);
        $user->delete();
        return redirect()->route('products');

    }
}
