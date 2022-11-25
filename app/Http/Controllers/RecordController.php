<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Models\Country;
use App\Models\PublicServant;
use App\Models\Record;
use App\Models\Disease;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $count = Record::query()->count();

        $records = Record::query()
            ->orderBy('cname');

        $users = User::query()
            ->get()->keyBy('email');

        return view('records.index', [
            'records' => $records->paginate(10),
            'users' => $users ?? [],
            'diseases' => $diseases ?? [],
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;

        $record = Record::query()
            ->where('email', '=', $request->email)
            ->where('cname', '=', $request->cname)
            ->where('disease_code', '=', $request->disease_code)
            ->first();

        if(!$record) {
            $new = true;
            $record = new Record();
        }

        $users = User::query()
            ->whereIn('email', PublicServant::query()->get()->pluck('email'))
            ->get();

        $diseases = Disease::query()
            ->get();

        $countries = Country::query()
            ->get();


        return view('records.form', [
            'record' => $record,
            'users' =>  $users,
            'diseases' => $diseases,
            'countries' => $countries,
            'new' => $new
        ]);
    }

    public function save(RecordRequest $request)
    {
        try {
            $new = false;
            $record = Record::query()
                ->where('email', '=', $request->email)
                ->where('cname', '=', $request->cname)
                ->where('disease_code', '=', $request->disease_code)
                ->first();

            if(!$record) {
                $new = true;
                $record = new Record();
            }

            if($new) {
                Record::query()
                    ->create([
                        'email' => $request->email,
                        'cname' => $request->cname,
                        'disease_code' => $request->disease_code,
                        'total_deaths' => $request->total_deaths,
                        'total_patients' => $request->total_patients
                    ]);
            }
            else{
                $record->fill([
                    'email' => $request->email,
                    'cname' => $request->cname,
                    'disease_code' => $request->disease_code,
                    'total_deaths' => $request->total_deaths,
                    'total_patients' => $request->total_patients
                ]);

                $record->save();
            }

            session()->flash('message', 'Record data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('records.index');
    }

    public function delete(Request $request)
    {
        $record = Record::query()
            ->where('email', '=', $request->email)
            ->where('cname' , '=' , $request->cname)
            ->where('disease_code', '=', $request->disease_code)
            ->first();

        if(!$record) {
            session()->flash('message', 'There is no country with such cname' );
            session()->flash('message_color', 'danger');
            return redirect()->route('records.index');
        }

        Record::query()
            ->where('email', '=', $request->email)
            ->where('cname' , '=' , $request->cname)
            ->where('disease_code', '=', $request->disease_code)
            ->delete();


        session()->flash('message', 'Record has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('records.index');
    }
}
