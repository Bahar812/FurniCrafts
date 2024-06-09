<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function loadAllCategory(){
        $all_category = Category::get();
        return view('admin.pageCategory', compact('all_category'));
    }

    public function addCategory(Request $request){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
            ]
            );

            $data = [
                'Category_Name' => $request->input('name'),
            ];

            // dd($data);
            Category::create($data);
            return redirect('/category')->with('success', 'Berhasil Simpan');
    }

    public function loadAddCategory(){
        return view('admin.addCategory');
    }
    public function deleteCategory($id){
        try {
            // Debugging
            // dd($uuid); // Uncomment this line to debug the value of $uuid

            // Validate if the UUID is correct
            if (Category::where('id', $id)->exists()) {
                Category::where('id', $id)->delete();
                return redirect('/category')->with('success', 'Sukses Menghapus Category');
            } else {
                return redirect('/category')->with('fail', 'Category not found');
            }
        } catch (\Exception $e) {
            return redirect('/category')->with('fail', $e->getMessage());
        }
    }
    public function loadEditForm($id){
        $category = Category::find($id);

        return view('admin.editCategory', compact('category'));
    }
    public function EditCategory(Request $request){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
            ]
            );

            $data = [
                'Category_Name' => $request->input('name'),
            ];

            Category::where('id',$request->category_id)->update($data);
            return redirect('/category')->with('success', 'Berhasil di Update');
    }

}
