<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('create', Auth::user()->id);
        $category = Category::all();

        return view('administrasi.category.index', compact('category'));
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
        $this->authorize('create', Auth::user()->id);
        $category = new Category();

        $category->nama = $request->nama;
        $check = $category->save();

        if ($check) {
            return redirect('admin/category')->with('success', 'Category added successfully!');
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
        $this->authorize('edit', Auth::user()->id);
        $id_category = decrypt($id);
        $category = Category::find($id_category);
        $category->nama = $request->nama;
        $check = $category->save();
        if ($check) {
            return redirect('admin/category')->with('success', 'Category edited successfully!');
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

    public function editForm(Request $request){
        $data = $request->get('id');
        $category = Category::find($data);
        return response()->json(array(
            'msg' => view('administrasi.category.editformonly', compact('category'))->render()
        ), 200);

        // 
    }

    public function deleteData(Request $request)
    {
        $this->authorize('delete', Auth::user()->id);
        try {
            $id = $request->get('id');
            $category = Category::find($id);
            $category->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Category Data Deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'msg' => 'Category data is not deleted.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $this->authorize('edit', Auth::user()->id);
        $id = $request->id;
        $field = $request->field;
        $value = $request->value;

        $category = Category::find($id);
        $category->$field = $value;

        $category->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Category data saved!'
        ), 200);
    }
}
