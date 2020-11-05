<?php

namespace App\Http\Controllers;

use App\Info;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DB;

class InfoController extends Controller
{
    private $info;
    use DeleteModelTrait;
    use StorageImageTrait;
    public function __construct(Info $info)
    {
        $this->info = $info;
    }

    public function index() {
        $infos = $this->info->latest()->paginate(5);
//        dd($infos);
        return view('admin.info.index',compact('infos'));
    }
    public function create() {
        return view('admin.info.add');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $dataUploadFeatureImage = $this->storageTraitUpload($request,'images','product');
            if (!empty($dataUploadFeatureImage)) {
                $this->info->create([
                    'titles' => $request->titles,
                    'brief' => $request->brief,
                    'contents' => $request->contents,
                    'images'=>$dataUploadFeatureImage['file_path']
                ]);
            }
            DB::commit();
            return redirect() -> route('infos.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }
    public function edit($id) {
        $info = $this->info->find($id);
        return view('admin.info.edit',compact('info'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataInfoUpdate = [
                'titles' => $request->titles,
                'brief' => $request->brief,
                'contents' => $request->contents,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'images','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataInfoUpdate['images'] = $dataUploadFeatureImage['file_path'];
            }
            $info = $this->info->find($id)->update($dataInfoUpdate);
            $info = $this->info->find($id);

            DB::commit();
            return redirect() -> route('infos.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->info);
    }
}
