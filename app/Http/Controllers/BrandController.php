<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brands::all();

        return view('administrasi.brands.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Auth::user()->id);
        return view('administrasi.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Auth::user()->id);
        $brand = new Brands();

        if ($request->file('image') == null) {
            $brand->image = 'no_item.jpg';
        } else {
            $file = $request->file('image');
            $imgFolder = 'images';
            $imgFile = time() . "_" . $file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $brand->image = $imgFile;
        }
        //details
        $brand->nama = $request->nama;
        $check = $brand->save();

        if ($check) {
            return redirect('admin/brand')->with('success', 'Brand added successfully!');
        }
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
        $this->authorize('edit', Auth::user()->id);

        $id = decrypt($id);
        $brand = Brands::where('id', $id)->first();

        // dd($brand);
        return view('administrasi.brands.edit', compact('brand'));
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
        $this->authorize('edit', Auth::user()->id);
        $id_brand = decrypt($id);
        $brand = Brands::find($id_brand);
        $file = $request->file('image');


        $image_path = "images/" . $brand->image;

        if ($file != null) {
            if (File::exists($image_path)) {
                if ($brand->image != 'no_item.jpg') {
                    File::delete($image_path);
                }
            }
            
            $imgFolder = 'images';
            $imgFile = time() . "_" . $file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $brand->image = $imgFile;
        }
        
        $brand->nama = $request->nama;
        $check = $brand->save();
        if ($check) {
            return redirect('admin/brand')->with('success', 'Brand edited successfully!');
        }
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

    public function deleteData(Request $request)
    {
        $this->authorize('delete', Auth::user()->id);
        try {
            $id = $request->get('id');
            $brand = Brands::find($id);
            $brand->delete();
            $image_path = "images/" . $brand->image;
            if (File::exists($image_path)) {
                if ($brand->image != 'no_item.jpg') {
                    File::delete($image_path);
                }
            }
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Brand Data Deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'msg' => 'Brand data is not deleted.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $this->authorize('edit', Auth::user()->id);
        $id = $request->id;
        $field = $request->field;
        $value = $request->value;

        $brand = Brands::find($id);
        $brand->$field = $value;

        $brand->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Brand data saved!'
        ), 200);
    }
}
