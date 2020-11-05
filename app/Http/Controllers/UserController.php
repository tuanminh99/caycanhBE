<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use DeleteModelTrait;
    private $user, $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index() {
        $users = $this->user->latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }
    public function create() {
        $user = $this->user->latest()->paginate(5);
        $roles = $this->role->get();
        return view('admin.user.add', ['user'=>$user, 'roles'=>$roles]);
    }
    public function store(Request $request) {
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($request->roles != null){
            $user->roles()->sync($request->roles);
        }
        return redirect()->route('users.index');
    }
    public function edit($id) {
        $user = $this->user->find($id);
        $roles = $this->role->get();
        $roleOfUser = $user->roles;

        return view('admin.user.edit',compact('user', 'roles', 'roleOfUser'));
    }
    public function update(Request $request, $id){
        $user = $this->user->find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->user);
    }
}
