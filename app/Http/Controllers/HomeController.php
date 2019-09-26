<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function password_change()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $password = bcrypt($user->password);
        //dd($password);
        return view('auth.edit-password', compact('user'));
    }
    public function password_change_success(Request $request)
    {
        //dd($request->all());

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            $messageType = "error";
            return response()->json([
                'message' => 'Your current password does not matches with the password you provided. Please try again.',
                'messageType'    => $messageType
                
            ]);
            /*Session::Flash('error', "Your current password does not matches with the password you provided. Please try again.");
            return redirect()->back();*/
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            $messageType = "error";
            return response()->json([
                'message' => 'New Password cannot be same as your current password. Please choose a different password.',
                'messageType'    => $messageType
                
            ]);
            /*Session::Flash('error', "New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->back();*/
        }
        if($request->get('new_password') !== $request->get('confirm_password')){
            //new password and confirm password are same
            //dd($request->all());
            $messageType = "error";
            return response()->json([
                'message' => 'New Password and confirm password does not match.please give same password.',
                'messageType'    => $messageType
                
            ]);
            /*Session::Flash('error', "New Password and confirm password does not match.please give same password.");
            return redirect()->back();*/
        }

        //dd($request->all());
        //Change Password
        $user = Auth::user();
        //dd($user);
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        Auth::logout();
        $messageType = "success";
        return response()->json([
            'message' => 'Password changed successfully.',
            'messageType'    => $messageType,
            'data'    => $user
        ]);

        /*Session::Flash('success',"Password changed successfully !");

        Auth::logout();
        return redirect('/');*/

        /*$messageType = "success";
        return response()->json([
            'message' => 'Password changed successfully.',
            'data'    => $user
        ]);*/

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function testfunction(){
        return view('test');
    }
}
