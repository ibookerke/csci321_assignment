<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $count = Disease::query()->count();

        $countries = Disease::query()
            ->orderBy('cname');
        return view('country.index', [
            'countries' => $countries->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        if($request?->cname == 'new') {
            $country = new Disease();
        }
        else{
            $country = Disease::query()
                ->where('cname', '=', $request->cname)
                ->first();
        }

        return view('country.form', [
            'country' => $country,
        ]);
    }

    public function save(DiseaseRequest $request)
    {

        try {
            $country = Disease::query()
                ->where('cname', '=', $request->original_cname)
                ->first();

            if(!$country) {
                $country = new Disease();
            }

            $country->fill([
                'cname' => $request->cname,
                'population' => $request->population,
            ]);

            $country->save();

            session()->flash('message', 'Disease data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('countries.index');
    }

    public function delete(Request $request)
    {
        $country = Disease::query()
            ->where('cname' , '=' , $request->cname)
            ->first();

        if(!$country) {
            session()->flash('message', 'There is no country with such cname' );
            session()->flash('message_color', 'danger');
            return redirect()->route('countries.index');
        }

        $country->delete();
        session()->flash('message', 'Disease has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('countries.index');
    }
}
