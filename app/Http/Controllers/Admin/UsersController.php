<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        //patikrina ar prisijunges, nepraleidzia URL'u 
       //jeigu neregistruotas tia nukreipi ai logino pagea
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')-> with('users', $users);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all(); //pasiemam visas roles

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       // dd($request);
        $user->role_id = $request->roles; //why
         $user->save();

         $data = $request->except('_method','_token', 'submit');
         if($user->update($data)){
   
            Session::flash('message', 'Vartotojas atnaujintas sėkmingai!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.users.index');
         }else{
            Session::flash('message', 'Nepavyko atnaujinti vartotojo duomenų!');
            Session::flash('alert-class', 'alert-danger');
         }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //dd($user);
        $user->delete();
        Session::flash('message', 'Vartotojas ištrintas sėkmingai!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.users.index');
    }
}
