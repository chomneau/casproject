<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminProfile;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
//    public function showPostjobForm()
//    {
//        return view('pages.postjob');
//    }
    //show all users
    public function showAllUser()
    {
        $adminUser = Admin::all();
        return view('admin.admin-user.view-all-adminUser')
            ->with('adminUser', $adminUser);
    }


    public function showAdminProfile($id)
    {
        $adminProfile = Admin::find($id);
        return view('admin.admin-user.adminUserProfile')
            ->with('adminProfile', $adminProfile);
    }
    //register admin user
    public function showRegister()
    {
        return view('admin.admin-user.register-userAdmin');
    }

    //Create user admin method
    public function store(Request $request)
    {
        $this->validation($request);
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'admin' => 0,
            'password' => bcrypt($request['password'])
        ]);

        AdminProfile::create([
            'admin_id' => $admin->id,
            'avatar' => 'uploads/logos/1510817755img.png'
        ]);
        Session::flash('success', 'You have created a new user');
        return redirect('/admin/allUser');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    //show admin profile edit form
    public function EditAdminProfileForm($id)
    {
        $adminProfile = Admin::find($id);
        return view('admin.admin-user.edit-adminProfile')->with('adminProfile', $adminProfile);
    }

    //update admin profile method
    public function updateAdminProfile(Request $request, $id)
    {
       // return 12345;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255',
            'address' => 'required',
            'phone' => 'required',

        ]);

        $adminProfile = Admin::find($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatar', $avatar_new_name);
            $adminProfile->Adminprofile->avatar = 'uploads/avatar/' . $avatar_new_name;
            $adminProfile->Adminprofile->save();
        }


        $adminProfile->name = $request->name;
        $adminProfile->email = $request->email;
        $adminProfile->Adminprofile->phone = $request->phone;
        $adminProfile->Adminprofile->address = $request->address;
        $adminProfile->Adminprofile->about = $request->about;
       // $adminProfile->Adminprofile->admin_id = $id;
        $adminProfile->save();
        $adminProfile->Adminprofile->save();
        Session::flash('success', 'You have updated your profile');
        return redirect()->route('admin.adminProfile', $adminProfile->id);

    }

    //make user as admin
    public function makeAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->admin = 1;
        $admin->save();
        Session::flash('success', 'You have updated user permission');
        return redirect()->back();
    }

    //remove admin permission
    public function removePermission($id)
    {
        $admin = Admin::find($id);
        $admin->admin = 0;
        $admin->save();
        Session::flash('success', 'You have updated user permission');
        return redirect()->back();
    }

    //delete user
    public function destroy($id)
    {
        $delete = Admin::find($id);
        $delete->delete();
        Session::flash('success', 'You have deleted user from the list');
        return redirect()->back();
    }
    //update password form
    public function formUpdatePassword()
    {
        return view('admin.admin-user.changeUserAdminPassword');
    }
    //update password for employer
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::findOrFail(Auth::user()->id);

        if (Hash::check(Input::get('oldPassword'), $admin['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $admin->password = bcrypt(Input::get('password'));
            $admin->save();

            Session::flash('success', 'Password changed successfully!');
            return redirect('/admin');
        } else {
            Session::flash('error', 'Your current password not match! Try Again');
            return redirect()->back();
        }
    }


}
