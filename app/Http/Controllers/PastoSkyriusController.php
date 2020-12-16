<?php

namespace App\Http\Controllers;

use App\Models\PastoSkyrius;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PastoSkyriusController extends Controller
{
    public function __construct()
    {
        //patikrina ar prisijunges, nepraleidzia URL'u 
       //jeigu neregistruotas tia nukreipi ai logino pagea
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastai = PastoSkyrius::all();
        return view('pastai.index')-> with('pastai', $pastai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->validate([
            'pavadinimas' => ['required', 'max:255', 'unique:pasto_skyrius'],
            'adresas' => ['required', 'max:255'],
            'miestas' => ['required',  'max:255'],
            'el_paštas' => ['required', 'regex:/^.+@.+$/i', 'unique:pasto_skyrius']
        ])){
            PastoSkyrius::create([
                'pavadinimas' => $request->pavadinimas,
                'adresas' => $request->adresas,
                'miestas' => $request->miestas,
                'el_paštas' => $request->el_paštas
            ]);
           /*  $request->session()->flash('message', 'Pašto skyrius registruotas sėkmingai'); */
            Session::flash('message', 'Pašto skyrius registruotas sėkmingai!');
            Session::flash('alert-class', 'alert-success');
        }
        else{
           /*  $request->session()->flash('alert-class', 'Klaida regsitruojant pašto skyriu'); */
           Session::flash('message', 'Nepavyko regsitruoti naują pašto skyriu!');
           Session::flash('alert-class', 'alert-danger');
        }

        return redirect() -> route('pastai.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PastoSkyrius  $pastoSkyrius
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $pastoSkyrius = PastoSkyrius::find($id);

        return view('pastai.edit')->with('pastai',$pastoSkyrius);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PastoSkyrius  $pastoSkyrius
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_method','_token', 'submit');
        $validator = Validator::make($request->all(), [
            'pavadinimas' => ['required','unique:pasto_skyrius'],
            'adresas' => ['required'],
            'miestas' => 'required',
            'el_paštas' => ['required']
         ]);
   
         if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
         }
         $subject = PastoSkyrius::find($id);
   
         if($subject->update($data)){
   
            Session::flash('message', 'Pašto skyrius atnaujintas sėkmingai!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('pastai.index');
         }else{
            Session::flash('message', 'Nepavyko atnaujinti duomenų!');
            Session::flash('alert-class', 'alert-danger');
         }
   
         return Back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PastoSkyrius  $pastoSkyrius
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
      $pastas = PastoSkyrius::findOrFail($id);
      $pastas->delete();
      Session::flash('message', 'Pašto skyrius ištrintas sėkmingai!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('pastai.index');
    }
}
