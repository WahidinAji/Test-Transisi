<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $employe = Employe::all();
            return \view('employes.index', \compact('employe'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $company = Company::all();
            return \view('employes.create', \compact('company'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'companies_id' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]);
            Employe::create([
                'companies_id' => $request->companies_id,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return \redirect('employes')->with(['success' => 'add data successfully']);
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        if (Auth::check()) {
            return \view('employes.show', \compact('employe'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        if (Auth::check()) {
            return \view('employes.edit', \compact('employe'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'companies_id' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]);
            $employe = Employe::find($employe->id);
            $employe->update([
                'companies_id' => $request->companies_id,
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return \redirect('employes')->with(['succes' => 'updated data successfully!!']);
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        if (Auth::check()) {
            Employe::destroy($employe->id);
            return \redirect()->back()->with(['success' => 'data berhasil dihapus!!']);
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }
}
