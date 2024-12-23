<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ReviewerSelection;
use App\Models\Manuscript;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //create user by admin
    public function create_user(){
        if(Auth::user()->role_id == 2){
            return redirect()->to('/home');
        }
        if(Auth::user()->role_id == 3){
            return redirect()->to('/home');
        }
        $users = User::all();
        $roles = Role::all();
        return view('user.create_user', compact('users', 'roles'));
    }

    //Validate User
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'organization' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    //Store User
    public function store_user(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'organization' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
        $reviewer = new User([
            'title' => $request['title'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'designation' => $request['designation'],
            'email' => $request['email'],
            'orc_id' => $request['orc_id'],
            'scopus_author_id' => $request['scopus_author_id'],
            'organization' => $request['organization'],
            'country' => $request['country'],
            'role_id' => $request['name'],
            'password' => Hash::make($request['password']),
        ]);
        $reviewer->save();
        return redirect('/create-user')->with('success', 'User successfully created');
    }

    //Store Reviewer
    public function store_reviewer(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'organization' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
        $reviewer = new User([
            'title' => $request['title'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'designation' => $request['designation'],
            'email' => $request['email'],
            'orc_id' => $request['orc_id'],
            'scopus_author_id' => $request['scopus_author_id'],
            'organization' => $request['organization'],
            'organization' => $request['organization'],
            'country' => $request['country'],
            'role_id' => 3,
            'password' => Hash::make($request['password']),
        ]);
        $reviewer->save();
        return redirect('/create-user')->with('success', 'User successfully created');
    }

    //reviewer list
    public function reviewer_list(){
        if(Auth::user()->role_id == 2){
            return redirect()->to('/home');
        }
        if(Auth::user()->role_id == 3){
            return redirect()->to('/home');
        }
        $users = User::WHERE('role_id', 3)->get();
        return view('user.reviewer_list',compact('users'));
    }

    //author list
    public function author_list(){
        if(Auth::user()->role_id == 2){
            return redirect()->to('/home');
        }
        if(Auth::user()->role_id == 3){
            return redirect()->to('/home');
        }
        $users = User::WHERE('role_id', 2)->get();
        return view('user.author_list',compact('users'));
    }

    //Create user role
    public function create_user_role(){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $roles = Role::all();
        return view('user.create_user_role', compact('roles'));
    }

    //Store user role
    public function store_user_role(Request $request){
        $data = $request->all();
        $reviewer_insert = Role::create($data);
        return redirect('/create-user-role')->with('success', 'Role added successfully');
    }

    //View user profile
    public function user_profile(User $users){
         $users = Auth::user();
         return view('user.user_profile', compact('users'));
     }

     //Update user profile
     public function update_user_profile(Request $request){
        $data = User::where('id', Auth::user()->id)->first();
        $data->title = $request->title;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->designation = $request->designation;
        // $data->email = $request->email;
        $data->orc_id = $request->orc_id;
        $data->scopus_author_id = $request->scopus_author_id;
        $data->organization = $request->organization;
        $data->country = $request->country;
        $data->save();
        return redirect('/user-profile')->with('success', 'Profile Update successfully');
    }
}
