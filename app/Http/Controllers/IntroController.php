<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntroAddRequest;
use App\Intro;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    use DeleteModelTrait;
    private $intro;
    public function __construct(Intro $intro) {
        $this->intro=$intro;
    }
    public function index() {
        $intros = $this->intro->latest()->paginate(5);
        return view('admin.intro.index',compact('intros'));
    }
    public function create() {
        return view('admin.intro.add');
    }
    public function store(IntroAddRequest $request) {
        $this->intro->create([
            'contents' => $request->contents
        ]);
        return redirect()->route('intros.index');
    }
    public function edit($id) {
        $intro = $this->intro->find($id);
        return view('admin.intro.edit',compact('intro'));
    }
    public function update(Request $request,$id) {
        $this->intro->find($id)->update([
            'contents' => $request->contents
        ]);
        return redirect()->route('intros.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->intro);
    }
}
