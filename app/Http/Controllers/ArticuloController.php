<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FormArticulo;

class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos=Articulo::all();

        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormArticulo $request)
    {
        $articulo =new Articulo();
        $articulo->codigo      = $request->codigo;
        $articulo->descripcion = $request->descripcion;
        $articulo->cantidad    = $request->cantidad;
        $articulo->precio      = $request->precio;
        if($request->hasFile('foto')){
        $articulo->foto        = $request->file('foto')->store('uploads','public');
        }

        $articulo->save();
       // return redirect()->route('empleados.index')->with('message','Registro con exito');
        return redirect('/articulos')->with('status','El registro realizado  con exito');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo=Articulo::findOrFail($id);
        return view ('articulo.edit')->with('articulo',$articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(FormArticulo $request, $id)
    {
        $rules=[ ];
        if($request->hasFile('foto')){
            $rules+=['foto' => 'required','max:10000','mimes:jpg'];
         }
           $this->validate($request,$rules);
            $articulos=request()->except(['_token','_method']);

            if($request->hasFile('foto')){
                $articulo=Articulo::findOrFail($id);
                Storage::delete('public/'.$articulo->foto );
                $articulos['foto'] = $request->file('foto')->store('uploads','public');
                }

                Articulo::where('id','=',$id)->update($articulos);
            $articulo=Articulo::findOrFail($id);

            return redirect('/articulos')->with('status','Los datos  se modificaron  con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        if (Storage::delete('public/'.$articulo->foto )) {
              $articulo->delete();
        }


        return redirect('/articulos')->with('status','articulo eleminado con exito');

    }
}
