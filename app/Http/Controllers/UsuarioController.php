<?php

namespace App\Http\Controllers;

use App\Rema;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios=User::where('rol','user')->orderBy('name','DESC')->get();
        return view('admin.usuarios',[
            'usuarios'=>$usuarios
        ]);
    }



    public function micuenta(User $user){
        return view('admin.micuenta',[
            'user'=>$user
        ]);
    }
    public function destroy(User $user){
        $user->delete();
        return redirect('admin/usuarios');

    }
    public function inicio(){
        return view('admin.inicio');
    }
    public function micuentaPost(Request $request){
//        return dd($request->all());

        $rules=[
            'name'=>'required',
            'email' =>'required|email|max:255|unique:users,email,'.$request->id,
            'password'=>'required|min:4',
        ];
        $user=User::find($request->id);

        $this->validate($request,$rules);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->save();

        return redirect('admin/inicio');

   }
    public function update(Request $request){
//        return dd($request->all());

        $rules=[
            'name'=>'required',
            'email' =>'required|email|max:255|unique:users,email,'.$request->id,
            'password'=>'required|min:4',
        ];
        $user=User::find($request->id);

        $this->validate($request,$rules);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
       $user->save();

        return redirect('admin/usuarios');





    }
    public function store(Request $request){
//        return dd($request->all());

        $rules=[
            'name'=>'required',
            'email' =>'required|email|max:255|unique:users',
            'password'=>'required|min:4',
        ];

        $this->validate($request,$rules);

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->rol='user';
        $user->save();

        return redirect('admin/usuarios');
            }
}
