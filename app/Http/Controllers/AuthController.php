<?php

namespace App\Http\Controllers;
  
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $roleModel = new UserRole();

            $roles = $roleModel->getUserRole($user->id);

            if (in_array('Super Admin', $roles) || in_array('Editor', $roles) || in_array('Content Creator', $roles)) {
                    return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
                } else {
                    return redirect("login")->withSuccess("Oppes! You don't have the admin rights");
                }
            }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
          
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.index');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
        
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect("login")->withSuccess('logout successfully!');
    }
}