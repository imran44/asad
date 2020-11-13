<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Auth;
use Validator;
use Image;


class UserController extends Controller
{
     public function __construct()
    {
         

        $this->middleware('auth');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('display_name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index');
        session()->set('success',' User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::lists('display_name','id');
        $userRole = $user->roles->lists('id','id')->toArray();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();
        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
             session()->set('success',' User updated successfully');
        return redirect()->route('users.index');

                        // ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
            session()->set('error',' User deleted successfully');
                        
    }

     //profile
    public function profile(){
        
        return view('auth/profile', array('user' => Auth::user()) );
        
    }

     public function update_avatar(Request $request){

        $rules = array (
                
                'avatar' => 'required'
                 
        );
        
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ())
            return Redirect::to('auth/profile')
            ->withInput()
            ->withErrors ( $validator->messages());


        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            
            $avatar = Input::file('avatar');
            $filename  = time() . '.' . $avatar->getClientOriginalExtension();
            $path = 'uploads/avatar/' . $filename;
            Image::make($avatar->getRealPath())->resize(468, 249)->save($path);
            //$user->image = 'upload/'.$filename;
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('auth/profile', array('user' => Auth::user()) );
    }

}
