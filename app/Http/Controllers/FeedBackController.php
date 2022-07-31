<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use App\Models\User;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('FeedBack.feedback');
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
        $request->validate([
            'feedback'=>'required|max:255',
            "avaliacao"=> 'required|integer',
           ]);
        $feedback = new FeedBack([
            "feedback"=> $request->get('feedback'),
            "avaliacao"=> $request->get('avaliacao'),
       ]);
       $feedback->save();
       return redirect('/feedback')->with('success','Feedback enviado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->file("image") != null){
            $url = $request->file("image")->store('public/imagesPerfil');
            $user->image_url = $url;
        }
        $user->name = $request->get('nome');
        $user->email = $request->get('email');
        $user->cidade = $request->get('cidade');
        $user->cep = $request->get('cep');
        $user->telefone = $request->get('telefone');
        $user->save();
        return redirect('/meuPerfil');
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
