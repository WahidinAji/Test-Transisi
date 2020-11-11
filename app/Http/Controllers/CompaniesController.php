<?php

namespace App\Http\Controllers;

use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Image;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $company = Company::all();
            // \dd($company['logo']);
            return \view('companies.index', \compact('company'));
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
            return \view('companies.create');
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
                'name' => 'required',
                'email' => 'required|email|unique:companies',
                'logo' => 'required|file|image|mimes:png|max:2048',
                'website' => 'required',
            ]);
            //dikit lagi
            // $file = $request->file('logo');
            // $fileName = \time() . '.' . $file->getClientOriginalExtension();
            // // \dd($path);
            // // $path = Storage::putFile('app/company', $request->file('logo'));
            // // $path = $file->storeAs('app/company', $fileName);
            // // \dd($file);
            // $img = Image::make($request->file('logo'));
            // // $img->resize(100, 100);
            // // $img->stream();
            // // $path = Storage::disk('local')->put('app/company' . $fileName, $img);
            // $path = Storage::putFile('app/company', $request->file('logo'));

            // \dd($path);

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = $image->getClientOriginalName();
                $fileName =  time() . '_' . $imageName;
                // \dd($fileName);
                Image::make($image)->resize(100, 100)->save(storage_path('app/company/' . $fileName));
                // $image->logo = $fileName;
                // \dd($imageName);
            }
            Company::create([
                'name' => $request->name,
                'email' => $request->email,
                'logo' => $fileName,
                'website' => $request->website,
            ]);
            return \redirect('companies')->with(['success' => 'berhasil menambah data!!']);
            // if ($create == \true) {
            //     return \redirect('companies')->with(['success' => 'berhasil menambah data!!']);
            // } else {
            //     return \redirect()->back()->with(['error' => 'gagal menambah data!!']);
            // }
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        if (Auth::check()) {
            // $company = Company::find($id);
            return \view('companies.show', \compact('company'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if (Auth::check()) {
            // $company = Company::find($id);
            return \view('companies.edit', \compact('company'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        if (Auth::check()) {
            return \redirect('companies', \compact('company'));
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (Auth::check()) {
            Company::destroy($company->id);
            return \redirect()->back()->with(['success' => 'data berhasil dihapus!!']);
        } else {
            return \redirect('login')->with(['error' => 'anda harus login!!']);
        }
    }
}
