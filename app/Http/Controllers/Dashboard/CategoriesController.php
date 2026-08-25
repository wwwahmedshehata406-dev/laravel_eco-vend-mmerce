<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\UpdateCategory;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Storage;

class CategoriesController extends Controller
{

    public function index() //$request
    {
        $categories = Category::with('parent')
            ->withCount([
                'products as products_number' => function ($query) {
                    $query->where('status', '=', 'active');
                }
            ])
            // ->filter($request->query())
            // ->orderBy('name')
            ->orderBy('id')
            ->paginate(5);
        // dd($categories);
        return view('dashboard.categories.index', compact('categories'));
    }




    public function create()
    {
        $parents = Category::all();
        $categories = new Category();
        return view('dashboard.categories.create', ['categories' => $categories, 'parents' => $parents]);
    }





    public function store(Request $request)
    {
        //* slug should be unique and generated from name  so  the value of it  = name and i should inter defferent names
        $request->merge(['slug' => \Str::slug($request->name)]);

        //* if request has the same name of marge
        $data = $request->except('image');

        //* uploadImage => is a function
        $data['image'] = $this->uploadImage($request);

        $category = Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function show(string $id)
    {
        //
    }



    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $categories = Category::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        // dd($categories);

        //* if category id != id edit order   and     parent id is null     or     parent id = id edit order     and     parent id is null
        $parents = Category::where('id', '!=', $id)->get();

        return view('dashboard.categories.edit', ['categories' => $categories, 'parents' => $parents]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request, string $id)
    {
        $categories = Category::findOrFail($id);

        //* image before update
        $old_image = $categories->image;

        //* if request has the same name of marge
        $data = $request->except('image');

        //* uploadImage function => if image exist return path if not exist no return 
        $new_img = $this->uploadImage($request);

        if ($new_img) {  
            $data['image'] = $new_img;
        }

        $categories->update($data);

        if ($old_image && $new_img) 
        {
            Storage::disk('public')->delete($old_image);
        }

        File::delete($old_image);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
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



    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate();
        return view('dashboard.categories.trash', ['categories'=>$categories]);
    }


    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('categories.trash')->with('success', 'Category Restored');

    }


    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect()->route('categories.trash')->with('success', 'Category Deleted forever!');

    }

}



