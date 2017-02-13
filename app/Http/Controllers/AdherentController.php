<?php

namespace App\Http\Controllers;

use App\Adherent;
use App\Http\Requests\StoreAdherent;
use Illuminate\Http\Request;

class AdherentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adherents = Adherent::all();
        return view('admin.adherents.index', ['page_title' => 'Liste des adhérents', 'adherents' => $adherents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adherent = new Adherent();
        return view('admin.adherents.form', ['page_title' => 'Nouvel adhérent', 'adherent' => $adherent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adherent = Adherent::create($request->all());
        return redirect()->route('adherents.show', $adherent);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Adherent $adherent)
    {
        return view('admin.adherents.show', ['page_title' => 'Informations sur l\'adhérent', 'adherent' => $adherent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adherent = Adherent::find($id);
        return view('admin.adherents.form', ['page_title' => 'Nouvel adhérent', 'adherent' => $adherent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdherent $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdherent $request, $id)
    {
        $adherent = Adherent::find($id);
        $adherent->update($request->all());
        return redirect()->route('adherents.show', $adherent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adherent = Adherent::find($id);

        if (!is_null($adherent)) {
            $adherent->delete();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}