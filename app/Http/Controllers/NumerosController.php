<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numeros;
use App\Models\Grupo;
use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;
use PDF ;

class NumerosController extends Controller
{
    private $grupos,$numeros;
    private $totalPage = 5;
    public function __construct( Grupo $grupo,Numeros $numero) {
         $this->grupos = $grupo;
         $this->numeros = $numero;
     }
    public function index()
    {
        $dados = $this->grupos->with('numeros')-> paginate( $this->totalPage);
        return view('paginaInicial.paginicial',compact('dados'));
    }
    public function gerarListaTelefonica()
    {
        //fix dompdf error por depreciação
        error_reporting(E_ALL ^ E_DEPRECATED);
        $favoritos = Auth::user()->numeros;
        $pdf = PDF::loadview('PDF.pdfFavoritos', compact('favoritos') );
        return $pdf->stream('RelatorioModalidades.pdf');
    }
    public function verNumero($idNumero)
    {
        $numero = $this->numeros->find($idNumero);
        return $numero->toJson();
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:2048',
            "nome"=> 'required|max:25',
            "pais"=> 'required|integer',
            "ddd"=> 'required|integer',
            "telefone"=> 'required|integer',
            "tipo"=> 'required|string',
            "grupo"=> 'required|string',
           ]);
        $url = $request->file("image")->store('public/imagesNumeros');
        $numero = new Numeros([
            "ref"=> $request->get('nome'),
            "pais"=> $request->get('pais'),
            "ddd"=> $request->get('ddd'),
            "numero"=> $request->get('telefone'),
            "tipo"=> $request->get('tipo'),
            "grupo_id"=> $request->get('grupo'),
            "user_id" => Auth::user()->id,
            "image_url"=> $url,
       ]);
       $numero->save();
       return redirect('/home')->with('success','Numero inserido com sucesso');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $grupos = Grupo::all();
        $numero = Numeros::findOrFail($id);
        return view('Operacoes.edit',compact('grupos','numero'));
    }


    public function update(Request $request, $id)
    {
        $numero = Numeros::findOrFail($id);
        $request->validate(['image'=>'required|mimes:jpg,jpeg,png,gif|max:2048']);
        $url = $request->file("image")->store('public/imagesNumeros');
        $numero->image_url = $url;
        /* if($request->file("image") != null){
            $request->validate(['image'=>'required|mimes:jpg,jpeg,png,gif|max:2048']);
            $url = $request->file("image")->store('public/imagesNumeros');
            $numero->image_url = $url;
        } */
        $numero->ref = $request->get('nome');
        $numero->pais = $request->get('pais');
        $numero->ddd = $request->get('ddd');
        $numero->numero = $request->get('numero');
        $numero->tipo = $request->get('tipo');
        $numero->grupo_id = $request->get('grupo');
        $numero->save();
        return redirect('/home')->with('success','Numero atualizado com sucesso');
    }


    public function destroy($id)
    {

       $numero = Numeros::findOrFail($id);
       $numero->delete();
       return redirect('/home')->with('success','Numero removido com sucesso');
    }
}
