<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiseaseRequest;
use App\Models\Disease;
use App\Models\DiseaseType;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $count = Disease::query()->count();

        $diseases = Disease::query()
            ->orderBy('disease_code');

        $disease_types = DiseaseType::query()
            ->get()
            ->keyBy('id');

        return view('diseases.index', [
            'diseases' => $diseases->paginate(10),
            'types' => $disease_types,
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;
        $disease = Disease::query()
            ->where('disease_code', '=', $request?->disease_code)
            ->first();

        if(!$disease) {
            $new = true;
            $disease = new Disease();

        }

        $types = DiseaseType::query()
            ->orderBy('id')
            ->get()
            ->keyBy('id');

        return view('diseases.form', [
            'disease' => $disease,
            'types' => $types,
            'new' => $new
        ]);
    }

    public function save(DiseaseRequest $request)
    {

        try {
            $disease = Disease::query()
                ->where('disease_code', '=', $request->disease_code)
                ->first();

            if(!$disease) {
                $disease = new Disease();
            }

            $disease->fill([
                'disease_code' => $request->disease_code,
                'pathogen' => $request->pathogen,
                'description' => $request->description,
                'id' => $request->id
            ]);

            $disease->save();

            session()->flash('message', 'Disease data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('diseases.index');
    }

    public function delete(Request $request)
    {
        $disease = Disease::query()
            ->where('disease_code' , '=' , $request->disease_code)
            ->first();

        if(!$disease) {
            session()->flash('message', 'There is no disease with such disease_code' );
            session()->flash('message_color', 'danger');
            return redirect()->route('diseases.index');
        }

        $disease->delete();
        session()->flash('message', 'Disease has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('diseases.index');
    }
}
