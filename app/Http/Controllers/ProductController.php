<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $brand = Brands::all();
        if (!Auth::user() || Auth::user()->role == "Member") {
            return view('welcome', compact('product','category'));
        } else {
            return view('administrasi.product.index', compact('product', 'category', 'brand'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Auth::user()->id);
        $category = Category::all();
        $brand = Brands::all();
        return view('administrasi.product.create', compact('category', 'brand'));
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
        $product = new Product();
        $spec = new Spec();

        if ($request->file('image') == null) {
            $product->image = 'no_item.jpg';
        } else {
            $file = $request->file('image');
            $imgFolder = 'images';
            $imgFile = time() . "_" . $file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $product->image = $imgFile;
        }
        //details
        $product->nama = $request->nama;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->categories_id = $request->sel_category;
        $product->brands_id = $request->sel_brand;
        $product->disc = $request->disc / 100;
        $product->tahun_rilis = $request->tahun_rilis;
        $check = $product->save();
        //spec

        if ($request->prosessor != "" && $request->grafis != "" && $request->storage!="") {
            $spec->products_id = $product->id;
            $spec->prosesor = $request->prosessor;
            $spec->grafis = $request->grafis;
            $spec->storage = $request->storage;
            $spec->ram = $request->ram;
            $spec->baterai = $request->baterai;
            $spec->berat = $request->berat;
            $spec->layar = $request->layar;
            $check = $spec->save();
        }

        if ($check) {
            return redirect('admin/product')->with('success', 'Product added successfully!');
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
        $product = Product::findOrFail($id);
        $category = Category::all();
        $brand = Brands::all();
        return view('administrasi.product.edit', compact('product', 'category', 'brand'));
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
        $id_product = decrypt($id);
        $product = Product::find($id_product);
        $spec = Spec::where('products_id', $id_product)->first();
        $file = $request->file('image');


        $image_path = "images/" . $product->image;

        if ($file != null) {
            if (File::exists($image_path)) {
                if ($product->image != 'no_item.jpg') {
                    File::delete($image_path);
                }
            }
            $imgFolder = 'images';
            $imgFile = time() . "_" . $file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $product->image = $imgFile;
        }

        //details
        $product->nama = $request->nama;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->categories_id = $request->sel_category;
        $product->brands_id = $request->sel_brand;
        $product->disc = $request->disc / 100;
        $product->tahun_rilis = $request->tahun_rilis;
        $check = $product->save();
        //spec

        if ($request->prosessor != "" && $request->grafis != "" && $request->storage!="") {
            $spec->products_id = $product->id;
            $spec->prosesor = $request->prosessor;
            $spec->grafis = $request->grafis;
            $spec->storage = $request->storage;
            $spec->ram = $request->ram;
            $spec->baterai = $request->baterai;
            $spec->berat = $request->berat;
            $spec->layar = $request->layar;
            $check = $spec->save();
        }

        if ($check) {
            return redirect('admin/product')->with('success', 'Product edited successfully!');
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
        
    }

    public function addToCart($id)
    {
        $cart = session()->get('cart');

        if ($id == "hapus") {
            session()->forget('cart');
            return redirect()->back()->with('success', 'Cart Reset!');
        } else {
            $p = Product::find($id);

            $harga = 0;
            if (!isset($cart[$id])) {
                if ($p->disc > 0) {
                    $harga = $p->harga - ($p->harga * $p->disc);
                } else {
                    $harga = $p->harga;
                }
                $cart[$id] = [
                    "id" => $p->id,
                    "name" => $p->nama,
                    "quantity" => 1,
                    "disc" => $p->disc,
                    "harga" => $p->harga,
                    "price" => $harga,
                    "photo" => 'images/' . $p->image
                ];
            } else {
                $cart[$id]['quantity']++;
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Laptop added to cart successfully!');
        }
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Laptop removed from cart successfully!');
    }

    public function addToBandingkan($id)
    {
        $bandingkan = Session::get('bandingkan');
        if ($id == 'hapus') {
            session()->forget('bandingkan');
            return redirect()->back()->with('success', 'Compare Item Reset');
        } else if ($id == 'hapus-back') {
            session()->forget('bandingkan');
            return redirect()->to('/')->with('success', 'Compare Item Reset');
        } else {
            $p = Product::find($id);

            if (!isset($bandingkan[$id])) {
                $bandingkan[$id] = [
                    "id" => $p->id,
                    "name" => $p->nama,
                    "photo" => 'images/' . $p->image
                ];
                if (count($bandingkan) > 2) {
                    unset($bandingkan[$id]);
                    return redirect()->back()->with('failed', 'Compare item must be 2!');
                } else {
                    session()->put('bandingkan', $bandingkan);
                    return redirect()->back()->with('success', 'Laptop added to compare!');
                }
            } else {
                unset($bandingkan[$id]);
                session()->put('bandingkan', $bandingkan);
                return redirect()->back()->with('failed', 'Laptop removed from compare!');
            }
        }
    }

    public function showAjax(Request $request)
    {
        $data = ($request->get('idProduct'));

        $dataProduct = Product::find($data);

        return response()->json(array(
            'msg' => view('frontend.modal', compact('dataProduct'))->render()
        ), 200);
    }

    public function cart()
    {
        return view('cart.cart');
    }

    public function bandingkan()
    {
        $bandingkan = Session::get('bandingkan');

        if (empty($bandingkan)) {
            return redirect()->back()->with('failed', 'Compare item is empty!');
        } else if (count($bandingkan) <= 1) {
            return redirect()->back()->with('failed', 'Compare item must be only 2!');
        } else {
            foreach ($bandingkan as $item) {
                $hasil[] = $item;
            }
            $product = Product::findMany([$hasil[0]['id'], $hasil[1]['id']]);
            return view('frontend.bandingkan', compact('product'));
        }
    }

    public function deleteData(Request $request)
    {
        $this->authorize('delete', Auth::user()->id);
        try {
            $id = $request->get('id');
            $product = Product::find($id);
            $product->delete();
            $image_path = "images/" . $product->image;
            if (File::exists($image_path)) {
                if ($product->image != 'no_item.jpg') {
                    File::delete($image_path);
                }
            }
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Product Data Deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'msg' => 'Product data is not deleted.'
            ), 200);
        }
    }

    public function saveDataField(Request $request)
    {
        $this->authorize('edit', Auth::user()->id);
        $id = $request->id;
        $field = $request->field;
        $value = $request->value;

        $Product = Product::find($id);
        $Product->$field = str_replace(array(',', 'Rp. '), '', $value);

        $Product->save();

        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Product data saved!'
        ), 200);
    }

    public static function harga_xxx($harga){
        $numbers = str_split('1234567890');
        $xxxx = substr($harga, 0, 1) . substr(str_replace($numbers, 'x', $harga), 1);
        $array = str_split($xxxx);
        $reverse = array_reverse($array);
        $count = 0;
        $text = '';
        foreach ($reverse as $w) {
            if ($count % 3 == 0) {
                $text .= '.';
            }
            $text .= $w;
            $count++;
        }
        return substr(strrev($text), 0, -1);
    }

    public function filter($id, $search){
        if($id == 'all' && $search =="all"){
            $product = Product::all();
        }elseif($id=='all' && $search!='all'){
            $product = Product::where('nama','like','%'.$search.'%')->get();
        }
        elseif($id != 'all' && $search != 'all'){
            $product = Product::where('categories_id',$id)->where('nama','like','%'.$search.'%')->get();
        }else{
            $product = Product::where('categories_id',$id)->get();
        }

        return response()->json(array(
            'msg' => view('card', compact('product'))->render()
        ), 200);
    }

    public function search($id,$category){
        if($id == "all" && $category!='all'){
            $product = Product::where('categories_id',$category)->get();
        }
        elseif($id=='all'){
            $product = Product::all();
        }elseif($id!="all" && $category!="all"){
            $product = Product::where('nama', 'like','%'.$id.'%')->where('categories_id',$category)->get();
        }else{
            $product = Product::where('nama', 'like','%'.$id.'%')->get();
        }
        
        return response()->json(array(
            'msg' => view('card', compact('product'))->render()
        ), 200);
    }
}
