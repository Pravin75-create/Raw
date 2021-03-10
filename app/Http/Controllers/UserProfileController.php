<?php


namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles.index')->with('profile', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
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
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'usertype' => 'required',
            'isban' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
            'usertype' => $request->usertype,
            'isban' => $request->isban,
        ]);

        return redirect(route('userprofile.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        return view('profiles.profile')->with('profiles', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        return view('profiles.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
    public function ban(User $id, Request $request)
    {
        if ($id) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email', $id
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users|email',
            ]);
        }
        $id->name = $request->name;
        $id->password = $request->password;
        $id->email = $request->email;
        $id->usertype = $request->usertype;
        $id->isban = $request->isban;
        $id->save();
        return redirect(route('userprofile.index'));
    }
    public function notban(User $id, Request $request)
    {
        if ($id) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email', $id
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users|email',
            ]);
        }
        $id->name = $request->name;
        $id->password = $request->password;
        $id->email = $request->email;
        $id->usertype = $request->usertype;
        $id->isban = $request->isban;
        $id->save();
        return redirect(route('userprofile.index'));
    }
    public function view(User $id)
    {
        return view('profiles.show')->with('show', $id);
    }
}
