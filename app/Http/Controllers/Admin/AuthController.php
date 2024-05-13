<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Service\AuthService;

class AuthController extends Controller
{
    // =======Constructor==========
    private $authService;
    public function __construct()
    {
        $this->authService = new AuthService();
    }
    // ============================
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(AuthRequest $request){
        try {
            $this->authService->register($request->except('_token'));
            return redirect()->route('users.index')->with('success', 'Registration Successful');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(User $user){
        try{
            if(auth()->user()->name!=$user->name){
                $user->delete();
                return back()->with('success', 'User deleted successfully');
            }
            return back()->with('success', 'You cannot delete yourself!');
        }catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
