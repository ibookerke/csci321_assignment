<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $count = Country::query()->count();

        $countries = Country::query()
            ->where('cname', '!=', Country::DefaultValue)
            ->orderBy('cname');
        return view('country.index', [
            'countries' => $countries->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;
        $country = Country::query()
            ->where('cname', '=', $request->cname)
            ->first();

        if(!$country){
            $country = new Country();
            $new = true;
        }

        return view('country.form', [
            'country' => $country,
            'new' => $new
        ]);
    }

    public function save(CountryRequest $request)
    {

        try {
            $country = Country::query()
                ->where('cname', '=', $request->cname)
                ->first();

            if(!$country) {
                $country = new Country();
            }

            $country->fill([
                'cname' => $request->cname,
                'population' => $request->population,
            ]);

            $country->save();

            session()->flash('message', 'Country data has been successfully saved');
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
        $country = Country::query()
            ->where('cname' , '=' , $request->cname)
            ->first();

        if(!$country) {
            session()->flash('message', 'There is no country with such cname' );
            session()->flash('message_color', 'danger');
            return redirect()->route('countries.index');
        }

        $country->delete();
        session()->flash('message', 'Country has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('countries.index');
    }
}
