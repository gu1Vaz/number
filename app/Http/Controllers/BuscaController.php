<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numeros;

class BuscaController extends Controller
{
    private $numeros;
    public function __construct( Numeros $numero) {
         $this->numeros = $numero;
     }
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numeros = new Numeros();
        if($busca =='NULL'){
            $busca = $request->get('busca');
        }
        $grupo = $request->get('grupo');
        $tipo = $request->get('tipo');
        $result= $numeros->get();
        $result = $result->where('ref', 'like', $busca);

        if ($request->has('grupo')) {
            $result = $result->where('grupo_id','==',$grupo);
        }
        if ($request->has('tipo')) {
            $result = $result->where('tipo','==',$tipo);
        }
        return view('Busca.busca',compact('result','busca'));
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public   function update(Request $request, $busca,Numeros $numeros)
    {
        if($busca =='-'){
            $busca = $request->get('busca');
        }
        $grupo = $request->get('grupo');
        $tipo = $request->get('tipo');

        $numeros = $numeros->where('ref', 'like', "%{$busca}%");

        $result= $numeros->get();
        if ($request->has('grupo')) {
            $result = $result->where('grupo_id','==',$grupo);
        }
        if ($request->has('tipo')) {
            $result = $result->where('tipo','==',$tipo);
        }
        return view('Busca.busca',compact('result','busca'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
