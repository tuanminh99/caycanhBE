<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductAddRequest;
use App\productImage;
use App\ProductTag;
use App\Tag;
use App\Traits\DeleteModelTrait;
use App\User;
use App\Category;
use App\Product;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Storage;
use DB;

class ProductController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $category,$product, $cate, $productImage, $tag, $productTag;
    public function __construct(Category $category, Category $cate, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag) {
        $this->category = $category;
        $this->cate = $cate;
        $this->product=$product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function getCategory($parentId) {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function index() {
        $products = $this->product->latest()->paginate(5);
        return view('admin/product.index',compact('products'));
    }
    public function create() {
        $htmlOption = $this->getCategory($parentId = '');
        $data2 = $this->cate->all();
        return view('admin/product.add', compact(['htmlOption', 'data2']));
    }
    public function store(ProductAddRequest $request){
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                'content'=> $request->contents,
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);

            //insert data to product_images
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItems) {
                    //insert to tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItems]);
                    $tagIds[] = $tagInstance->id;
                }
            }
                $product->tags()->attach($tagIds);
                DB::commit();
                return redirect() -> route('products.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }

    public function edit($id) {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit',compact('htmlOption','product'));
    }

    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                'content'=> $request->contents,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //insert data to product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItems) {
                    //insert to tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItems]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect() -> route('products.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }

    public function delete($id) {
//        $product = $this->product->find($id);
//        $product->delete();
//        return response()->json([
//            'code' => 200,
//            'message' => 'success'
//        ], 200);
        return $this->deleteModelTrait($id,$this->product);
    }
    public function getsearch(Request $request){
        $products = Product::Where('name','like','%'.$request->key.'%')
            ->orWhere('price',$request->key)
            ->paginate(5);
        $total = Product::Where('name','like','%'.$request->key.'%')
            ->orWhere('price',$request->key)
            ->get();

        return view('admin.search',compact('products', 'total'));
    }
}
