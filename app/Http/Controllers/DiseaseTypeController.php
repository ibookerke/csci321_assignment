<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiseaseTypeRequest;
use App\Models\DiseaseType;
use Illuminate\Http\Request;

class DiseaseTypeController extends Controller
{

    public function index()
    {
        $count = DiseaseType::query()->count();

        $dTypes = DiseaseType::query()
            ->where('id', '!=', 0)
            ->orderBy('id');
        return view('disease_type.index', [
            'dTypes' => $dTypes->paginate(10),
            'firstPage' => 1,
            'lastPage' => ceil($count/10)
        ]);
    }


    public function edit(Request $request)
    {
        $new = false;
        $dType = DiseaseType::query()
            ->find($request->id);

        if(!$dType){
            $dType = new DiseaseType();
            $new = true;
        }

        return view('disease_type.form', [
            'dType' => $dType,
            'new' => $new
        ]);
    }

    public function save(DiseaseTypeRequest $request)
    {
        try {
            $dType = DiseaseType::query()
                ->find($request->id);


            if(!$dType) {
                $dType = new DiseaseType();
            }

            $dType->fill([
                'description' => $request->description,
            ]);

            $dType->save();

            session()->flash('message', 'Disease Type data has been successfully saved');
            session()->flash('message_color', 'success');
        }
        catch (\Exception $ex){
            session()->flash('message', $ex->getMessage() . ' in ' . $ex->getFile() . ' at ' . $ex->getLine() );
            session()->flash('message_color', 'danger');
        }

        return redirect()->route('disease-type.index');
    }

    public function delete(Request $request)
    {
        $dType = DiseaseType::query()
            ->where('id' , '=' , $request->id)
            ->first();

        if(!$dType) {
            session()->flash('message', 'There is no disease type with such id' );
            session()->flash('message_color', 'danger');
            return redirect()->route('disease-type.index');
        }

        $dType->delete();
        session()->flash('message', 'Disease type has been successfully deleted' );
        session()->flash('message_color', 'warning');
        return redirect()->route('disease-type.index');
    }

}
