<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;

class PermissionController extends Controller
{
    use DeleteModelTrait;
    private $per;
    public function __construct(Permission $per) {
        $this->per=$per;
    }
    public function index() {
        $pers = $this->per->whereNull('deleted_at')->latest()->paginate(5);
        return view('admin.per.index',compact('pers'));
    }
    public function create() {
        $perAll = $this->per->whereNull('deleted_at')->where('parent_id',0)->get();

        return view('admin.per.add',compact('perAll'));
    }
    public function store(Request $request) {
        $data = [
            'name'=>$request->name,
            'des'=>$request->des ,
            'parent_id'=>$request->parent_id,
            'key_code'=>$request->key_code,
        ];
        $pers = $this->per->create($data);
        return redirect()->route('per.index')->with(['add-oke'=>'Thêm thành công']);
    }
    public function edit($id) {
        $per = $this->per->find($id);
        $perAll = $this->per->whereNull('deleted_at')->where('parent_id',0)->get();
        return view('admin.per.edit',compact('per','perAll'));
    }
    public function update(Request $request,$id) {
        $this->per->find($id)->update([
            'name'=>$request->name,
            'des'=>$request->des ,
            'parent_id'=>$request->parent_id,
            'key_code'=>$request->key_code,
        ]);
        return redirect()->route('per.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->per);
    }
}
