<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscoverRequest;
use App\Models\Country;
use App\Models\Discover;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function index()
    {
        $count = Discover::query()->count();

        $discoveries = Discover::query()
            ->orderBy('cname');
        return view('discoveries.index', [
            'discoveries' => $discoveries->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;

        $discover = Discover::query()
            ->where('cname', '=', $request->cname)
            ->where('disease_code', '=', $request->disease_code)
            ->first();

        if(!$discover) {
            $new = true;
            $discover = new Discover();
        }

        $diseases = Disease::query()
            ->get();

        $countries = Country::query()
            ->get();


        return view('discoveries.form', [
            'discover' => $discover,
            'diseases' => $diseases,
            'countries' => $countries,
            'new' => $new
        ]);
    }

    public function save(DiscoverRequest $request)
    {
        try {
            $new = false;
            $discover = Discover::query()
                ->where('cname', '=', $request->original_cname)
                ->where('disease_code', '=', $request->disease_code)
                ->first();

            if(!$discover) {
                $new = true;
                $discover = new Discover();
            }

            if($new) {
                Discover::query()
                    ->create([
                        'cname' => $request->cname,
                        'disease_code' => $request->disease_code,
                        'first_enc_date' => $request->first_enc_date
                    ]);
            }
            else{
                $discover->fill([
                    'cname' => $request->cname,
                    'disease_code' => $request->disease_code,
                    'first_enc_date' => $request->first_enc_date
                ]);

                $discover->save();
            }

            session()->flash('message', 'Discover data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('discoveries.index');
    }

    public function delete(Request $request)
    {
        $discover = Discover::query()
            ->where('cname' , '=' , $request->cname)
            ->where('disease_code', '=', $request->disease_code)
            ->first();

        if(!$discover) {
            session()->flash('message', 'There is no country with such cname' );
            session()->flash('message_color', 'danger');
            return redirect()->route('discoveries.index');
        }

        $lala = Discover::query()
            ->where('cname' , '=' , $request->cname)
            ->where('disease_code', '=', $request->disease_code)
            ->delete();


        session()->flash('message', 'Discover has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('discoveries.index');
    }
}
