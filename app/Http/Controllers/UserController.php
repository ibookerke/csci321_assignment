<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $count = User::query()->count();

        $users = User::query()
            ->orderBy('email');

        return view('User.index', [
            'users' => $users->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }

    public function edit(Request $request)
    {
        $new = false;

        $user = User::query()
            ->where('email', $request?->email)
            ->first();

        if(!$user) {
            $new = true;
            $user = new User();
        }

        $countries = Country::query()
            ->orderBy('cname')
            ->get();

        return view('User.form', [
            'user' => $user,
            'countries' => $countries,
            'new' => $new
        ]);
    }

    public function save(UserRequest $request){

        try {
            $user = User::query()
                ->where('email' , '=' , $request->email)
                ->first();

            if(!$user) {
                $user = new User();
            }

            $user->fill([
                'email' => $request->email,
                'name' => $request->name,
                'surname' => $request->surname,
                'salary' => $request->salary,
                'phone' => $request->phone,
                'cname' => $request->cname,
            ]);

            $user->save();

            session()->flash('message', 'User data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('user.index');
    }


    public function delete(Request $request)
    {
        $user = User::query()
            ->where('email' , '=' , $request->email)
            ->first();

        if(!$user) {
            session()->flash('message', 'There is no user with such email' );
            session()->flash('message_color', 'danger');
            return redirect()->route('user.index');
        }

        $user->delete();
        session()->flash('message', 'User has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('user.index');
    }
}
