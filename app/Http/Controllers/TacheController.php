<?php

namespace App\Http\Controllers;

use App\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
     $datas = Tache::paginate(10);
//->reject(function ($tache){
   //      return $tache->done==0;
    // });
    return view('taches.index',compact('datas'));
   
    }


    public function accompli(){
    
        $datas = Tache::Where('accompli', 1)->paginate(10);
        return view('taches.index', compact('datas'));
    }

    public function encours(){
    
        $datas = Tache::Where('accompli', 0)->paginate(10);
        return view('taches.index', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taches.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tache = new Tache();
        //$tache->creator_id = Auth::user()->id;
        //$tache->affectedTo_id = Auth::user()->id;
        $tache->titre = $request->titre;
        $tache->expiration = $request->expiration;
        $tache->description = $request->description;
        //if(isset($request->done))
        //{
        //    $tache->done = $request->done;
       // }
        $tache->save();
        notify()->success('modifier avec success');
              return redirect()->route('taches.index');

       // toastr()->success("La tache <span class'badge badge-dark'>#$taches->id</span> vient d'être créée.");
       // return redirect()->route('taches.index');
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
        $tache = Tache::findOrFail($id);
      return view('taches.edit', compact('tache')); 
     
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
   
        $tache = Tache::findOrFail($id);
        if($tache){ 
            if($tache->accompli==0){ 
        $tache->accompli = 1;
        $tache->save();} else{
            $tache->accompli = 0;
            $tache->save();
        }
        notify()->success('modifier avec success');
        return back();
        }   
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tache  $id
     * @return \Illuminate\Http\Response
     */
    public function modif(Request $request, Tache $tache){
      
        $tache->update($request->all());
        notify()->success('modifier avec success');
        return redirect()->route('taches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tache::where('id', $id)->delete();
        notify()->error('suppimer avec success');
        return back();
    }
}
