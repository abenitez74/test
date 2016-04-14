<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::orderBy('id', 'ASC')->paginate(5);
        return view('admin.users.index')->with('users',$users);
    }


    public function create()
    {

    	return view('admin.users.create');
    }

    public function edit($id)
    {

        $user= User::find($id);
        return view('admin.users.edit')->with('user',$user);
        dd($user);
    }


    public function update(UserRequest $request, $id)
    {
        $user=User::find($id);
        $user->fill($request->all());
        $user->save();

         Flash::warning("El usuario ". $user->name. " ha sido editado con exito");
         return redirect()->route('admin.users.index');
        //dd($id);
    }

    public function store(Request $request)

    {
         	$user = new User($request -> all());
            $user -> password = bcrypt($request->password);
            $user ->save();
            Flash::success("Se ha registrado ". $user->name. "de manera exitosa");
            return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {

        
        $user= User::find($id);
        $user ->delete();
        Flash::error('El usuario '. $user->name. ' ha sido borrado exitosamente');
        return redirect()->route('admin.users.index');
    }
}
