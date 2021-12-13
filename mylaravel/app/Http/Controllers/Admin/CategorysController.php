<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\Admin\CategoryAddRequest;
use Str;
class CategorysController extends Controller
{
    public function index(){
        $category = Category::with('parent')->paginate(10);
        return view('Admin.categorys.index',['category'=>$category]);
    }

    public function create(){
        $category = Category::where('parent_id',0)->get();
        return view('Admin.categorys.add', ['category'=>$category]);
    }

     public function store(CategoryAddRequest $request){
        $inputData = $request->all();
        $category = new Category();
        $category->name = $inputData['name'];
        $category->slug = Str::slug($inputData['name'], '-');
        $category->parent_id = isset($inputData['parent_id'])?$inputData['parent_id']:0;
        $category->save();
        return redirect()->route('auth.category');
    }

    public function detail($id){
        $category = Category::find($id);
        $categoryParent = Category::where('parent_id',0)->get();
        return view('Admin.categorys.edit', ['categoryParent' => $categoryParent, 'category'=>$category]);
    }

    public function update(CategoryAddRequest $request, $id){
        $inputData = $request->all();
        $category = Category::find($id);
        $category->name = $inputData['name'];
        $category->slug = Str::slug($inputData['name'], '-');
        $category->parent_id = isset($inputData['parent_id'])?$inputData['parent_id']:0;
        $category->save();
        return redirect()->route('auth.category');
    }

    public function delete($id){
        Category::where('id', $id)->delete();
        return redirect()->route('auth.category');
    }
}
//Khi xây dựng một truy vấn, chúng ta có thể chỉ định những relationships nào nên được tải bằng cách sử dụng phương thức with():
//Khi truy xuất các model records, bạn có thể muốn giới hạn kết quả của mình dựa trên sự tồn tại của một relationship