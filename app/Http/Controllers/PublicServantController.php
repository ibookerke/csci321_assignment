<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicServantRequest;
use App\Models\PublicServant;
use App\Models\User;
use Illuminate\Http\Request;

class PublicServantController extends Controller
{
    public function index()
    {
        $count = PublicServant::query()->count();

        $pServants = PublicServant::query()
            ->orderBy('email');

        return view('public_servants.index', [
            'public_servants' => $pServants->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;
        $pServant = PublicServant::query()
            ->where('email', '=', $request->email)
            ->first();

        if(!$pServant) {
            $pServant = new PublicServant();
            $new = true;
        }

        $users = User::query()
            ->get();

        return view('public_servants.form', [
            'pServant' => $pServant,
            'new' => $new,
            'users' =>$users
        ]);
    }

    public function save(PublicServantRequest $request)
    {

        try {
            $pServant = PublicServant::query()
                ->where('email', '=', $request->email)
                ->first();

            if(!$pServant) {
                $pServant = new PublicServant();
            }

            $pServant->fill([
                'email' => $request->email,
                'department' => $request->department,
            ]);

            $pServant->save();

            session()->flash('message', 'Public Servant data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('public_servants.index');
    }

    public function delete(Request $request)
    {
        $pServant = PublicServant::query()
            ->where('email' , '=' , $request->email)
            ->first();

        if(!$pServant) {
            session()->flash('message', 'There is no Public Servant with such email' );
            session()->flash('message_color', 'danger');
            return redirect()->route('public_servants.index');
        }

        $pServant->delete();
        session()->flash('message', 'Public Servant has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('public_servants.index');
    }
}
