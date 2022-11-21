<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $count = Doctor::query()->count();

        $pServants = Doctor::query()
            ->orderBy('email');

        return view('doctors.index', [
            'public_servants' => $pServants->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;
        $pServant = Doctor::query()
            ->where('email', '=', $request->email)
            ->first();

        if(!$pServant) {
            $pServant = new Doctor();
            $new = true;
        }

        $users = User::query()
            ->get();

        return view('doctors.form', [
            'pServant' => $pServant,
            'new' => $new,
            'users' =>$users
        ]);
    }

    public function save(DoctorRequest $request)
    {

        try {
            $pServant = Doctor::query()
                ->where('email', '=', $request->email)
                ->first();

            if(!$pServant) {
                $pServant = new Doctor();
            }

            $pServant->fill([
                'email' => $request->email,
                'degree' => $request->degree,
            ]);

            $pServant->save();

            session()->flash('message', 'Doctor data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('doctors.index');
    }

    public function delete(Request $request)
    {
        $pServant = Doctor::query()
            ->where('email' , '=' , $request->email)
            ->first();

        if(!$pServant) {
            session()->flash('message', 'There is no doctor with such email' );
            session()->flash('message_color', 'danger');
            return redirect()->route('doctors.index');
        }

        $pServant->delete();
        session()->flash('message', 'Doctor has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('doctors.index');
    }
}
