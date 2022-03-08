<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
   

    // use RegistersUsers;
    protected $base_route = 'admin.register';
    protected $view_path = 'admin.register';
    protected $panel = 'User';
    protected $model;

    // protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->model = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->model::all(); 
        return view($this->view_path.'.index', compact('users'));
    }

  
    public function create()
    {
        return view($this->view_path.'.create');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:6|confirmed'
        ], 
        [
            'name.required' => 'Please provide name.',
            'email.required' => 'Please provide valid email address.',
            'password.min' => 'Password cannot be less than 6 characters.',
            'password.confirmed' => 'Password do not match.',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],

        ]);

       
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
 
    }

    
    public function show($id)
    {
        $users = $this->model::find($id);
        return view('admin.register.show', compact('users'));
    }

    
    public function edit($id)
    {
        $users = $this->model::find($id);
        return view($this->view_path.'.edit', compact('users'));
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:6|confirmed'
        ], 
        [
            'name.required' => 'Please provide name.',
            'email.required' => 'Please provide valid email address.',
            'password.min' => 'Password cannot be less than 6 characters.',
            'password.confirmed' => 'Password do not match.',
        ]);

        $this->model::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],

        ]);

        $request->session()->flash('updated_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }

   
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user-> delete(); 

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }
}
