<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }
    public function index() {
        $categories = $this->category->latest()->paginate(5);
        return view('admin/category.index', compact('categories'));
    }
    public function create()
    {

        $htmlOption = $this->getCategory($parentId = '');
        return view('admin/category.add', compact('htmlOption'));
    }
    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function getCategory($parentId) {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin/category.edit', compact('category', 'htmlOption'));
    }
    public function update($id,Request $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() -> route('categories.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id, $this->category);
    }
}
