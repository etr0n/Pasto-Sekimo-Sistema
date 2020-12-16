<?php

namespace App\Http\Controllers;

use App\Models\Siunta;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IvykiuLaikai;
use App\Models\Busenos;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SiuntaController extends Controller
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
        $siuntos = Siunta::all();
        return view('siuntos.index')-> with('siuntos', $siuntos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role_id',3)->get();
        return view('siuntos.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $laikas = IvykiuLaikai::create([
            'data_paimta' => Carbon::now()
        ]);  
        if($request->validate([
            'siuntejo_adresas' => ['required', 'max:255'],
            'gavejo_vardas' => ['required', 'max:255'],
            'gavejo_pavarde' => ['required',  'max:255'],
            'gavejo_adresas' => ['required',  'max:255'],
            'gavejo_epastas' => ['required', 'regex:/^.+@.+$/i']
        ])){
        
        Siunta::create([
                
                'siuntejo_adresas' => $request->siuntejo_adresas, 
                'gavejo_vardas'  => $request->gavejo_vardas, 
                'gavejo_pavarde'=> $request->gavejo_pavarde, 
                'gavejo_adresas'=>$request->gavejo_adresas, 
                'gavejo_epastas'=>$request->gavejo_epastas, 
                'busena_id' => 1,
                'ivykiulaikas_id' => $laikas->id,
                'user_id' => $request->user
            ]);
            Session::flash('message', 'Siunta registruota sėkmingai!');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Nepavyko regsitruoti naujos pašto siuntos!');
            Session::flash('alert-class', 'alert-danger'); 
        }
        

        return redirect() -> route('siuntos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siunta  $siunta
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
       
        $siunto = Siunta::find($id);
        return view('siuntos.show')->with('siunto', $siunto); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siunta  $siunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Siunta $siunto)
    {
        $busenos = Busenos::all();
        return view('siuntos.edit')->with([
            'siunta' => $siunto,
            'busenos' => $busenos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siunta  $siunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siunta $siunto)
    {
        $laikas = $siunto->ivykiuLaikas;

        if($request->busena==1){

            $laikas->data_paimta = Carbon::now();
        }
        else if($request->busena==2){

            $laikas->data_siunciama = Carbon::now();
        }
        else if($request->busena==3){

            $laikas->data_atsiimta = Carbon::now();
        }
        else if($request->busena==4){

            $laikas->data_ivykdyta = Carbon::now();
        }
        $siunto->busena_id = $request->busena;

      /*   if( is_null($laikas->data_paimta) ||  is_null($laikas->data_ivykdyta))
        {
            $diff=null; 
        }
        else
        {
            $diff = $siunto->ivykiuLaikas->data_ivykdyta->diffInDays($siunto->ivykiuLaikas->data_paimta);
            $diff->save();
        } */
     
        $laikas->save();
        $siunto->save();
        Session::flash('message', 'Siunta atnaujinta sėkmingai!');
        Session::flash('alert-class', 'alert-success');
        return redirect() -> route('siuntos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siunta  $siunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
      $siunta = Siunta::findOrFail($id);
      $siunta->delete();
      Session::flash('message', 'Siunta ištrinta sėkmingai!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('siuntos.index');
    }

    public function viewkliento()
    {
        $id= Auth::id();
        $siuntos = Siunta::Where('user_id',$id)->get();
        return view('siuntos.kliento')->with('siuntos', $siuntos);
    }

    public function trukme(Siunta $siunto)
    {
     
       /*  $nuo = $siunto->ivykiuLaikas->data_paimta;
        $iki = $siunto->ivykiuLaikas->data_ivykdyta;
        if (is_null($nuo) || is_null($iki)) {
            $diff = 0; // or throw new \InvalidArgumentException();
        } 
        else {
            $diff = $iki->diffInDays($nuo);
          }
         dd($diff);
        return view('siuntos.show')->with('diff', $diff );  */
    }
}
