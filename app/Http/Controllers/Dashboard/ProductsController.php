<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;


class ProductsController extends Controller
{

    public function index()
    {
        $Products = Product::with(['category', 'store'])->active()->paginate(5);
        // dd($Products);
        return view('dashboard.products.index' , ['Products'=>$Products]);
    }



    public function create()
    {
        $categories = Category::all();
        // $factorStore =  Store::all();
        return view('dashboard.products.create' , ['categories'=>$categories]);
    }



    public function store(CreateProduct $request)
    {
        // dd($request->all());
        
        $request->merge(['slug' => \Str::slug($request->name)]);


        //* if request has the same name of marge
        $data = $request->except('image');


        //* uploadImage => is a function
        $data['image'] = $this->uploadImage($request);


        $Products = Product::create($data);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Created Successfully.');

    }



    public function show(Product $product)
    {
        if($product->status != 'active'){
            abort(404);
        }
        return view('front.products.show' , compact('product'));
    }







    public function edit(string $id)
    {
        $Product = Product::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.products.update', compact( 'Product', 'categories'));
    }



    public function update(UpdateProduct $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->merge(['slug' => \Str::slug($request->name)]);

        //* if request has the same name of marge
        $data = $request->except('image');

        //* uploadImage => is a function
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }

        $product->update($data);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Updated Successfully.');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Product Deleted Successfully.');
        
    }   
    

    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image');

        $path = $file->store('uploads', ['disk' => 'public']);
        return $path;
    }


}
