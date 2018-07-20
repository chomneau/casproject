<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $category = Category::orderBy('created_at', 'Decs')->get();
        return view('admin.category.index')->with('category', $category);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category'=>'required'
        ]);

        $category = new Category();
        $category->name = $request->category;
        $category->admin_id = auth::user()->id;
        $category->save();

        Session::flash('success', 'You successfully added new category!');
        return redirect()->back();
    }
    public function edit($id)
    {

        $editCategory = Category::find($id);
        return view('admin.category.editCategory')
            ->with('editCategory', $editCategory);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->admin_id = auth::user()->id;
        $category->save();
        Session::flash('success', 'You successfully updated a category!');
        return redirect('admin/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'You successfully Deleted a category!');
        return redirect()->back();
    }
}
