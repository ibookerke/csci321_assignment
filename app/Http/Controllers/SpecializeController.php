<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecializeRequest;
use App\Models\DiseaseType;
use App\Models\Doctor;
use App\Models\Specialize;
use App\Models\User;
use Illuminate\Http\Request;

class SpecializeController extends Controller
{
    public function index()
    {
        $count = Specialize::query()->count();

        $specs = Specialize::query()
            ->orderBy('email');

        $dTypes = DiseaseType::query()->get()->keyBy('id');

        $users = User::query()
            ->get()->keyBy('email');

        return view('specializations.index', [
            'specs' => $specs->paginate(10),
            'dTypes' => $dTypes,
            'users' => $users,
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;

        $spec = Specialize::query()
            ->where('email', '=', $request->email)
            ->where('id', '=', $request->id)
            ->first();

        if(!$spec) {
            $new = true;
            $spec = new Specialize();
        }

        $users = User::query()
            ->whereIn('email', Doctor::query()->get()->pluck('email'))
            ->get();

        $dTypes = DiseaseType::query()
            ->get();

        return view('specializations.form', [
            'spec' => $spec,
            'users' =>  $users,
            'dTypes' => $dTypes,
            'new' => $new
        ]);
    }

    public function save(SpecializeRequest $request)
    {
        try {
            $new = false;
            $spec = Specialize::query()
                ->where('email', '=', $request->email)
                ->where('id', '=', $request->id)
                ->first();

            if(!$spec) {
                $new = true;
                $spec = new Specialize();
            }

            if($new) {
                Specialize::query()
                    ->create([
                        'email' => $request->email,
                        'id' => $request->id,
                    ]);
            }
            else{
                $spec->fill([
                    'email' => $request->email,
                    'id' => $request->id,
                ]);

                $spec->save();
            }

            session()->flash('message', 'Specialization data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('specializations.index');
    }

    public function delete(Request $request)
    {
        $spec = Specialize::query()
            ->where('email', '=', $request->email)
            ->where('id' , '=' , $request->id)
            ->first();

        if(!$spec) {
            session()->flash('message', 'There is no country with such cname' );
            session()->flash('message_color', 'danger');
            return redirect()->route('specializations.index');
        }

        Specialize::query()
            ->where('email', '=', $request->email)
            ->where('id' , '=' , $request->id)
            ->delete();


        session()->flash('message', 'Specialize has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('specializations.index');
    }
}
