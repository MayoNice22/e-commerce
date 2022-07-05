<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'Member'){
            $trans = Transaction::where('pembeli_id',$user->id)->get();
            return view('frontend.history',compact('trans'));
        }else{
            $trans = Transaction::all();
            return view('administrasi.history',compact('trans'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('frontend.detailhistory',compact('transaction'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_user = Auth::user()->id;
        $this->authorize('administrasi', $id_user);
        DB::table('products_transactions')->where('transaction_id',$id)->delete();
        Transaction::where('id',$id)->delete();
        return redirect()->back()->with('success', 'History Deleted!');
    }

    public function checkOut(){
        return view('cart.checkout');
    }

    public function submitCheckOut(){
        $cart = session('cart');
        $user = Auth::user();

        $t = new Transaction();
        $t->pembeli_id = $user->id;
        $t->kasir_id = null;
        $t->status = 0;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totalHarga = $t->insertProduct($cart, $user);
        $t->total = $totalHarga;
        $t->save();
        
        session()->forget('cart');
        return redirect()->to('/')->with('success', 'Berhasil Checkout!');
    }

    public function accept($id){
        $transaction = Transaction::find($id);
        $transaction->kasir_id = Auth::user()->id;
        $transaction->status = 1;
        $transaction->save();

        return redirect()->to('admin/history')->with('success', Auth::user()->name.' accepted the order!');
    }

    public function reject($id){
        $transaction = Transaction::find($id);
        $transaction->kasir_id = Auth::user()->id;
        $transaction->status = 2;
        $transaction->save();

        return redirect()->to('admin/history')->with('failed', Auth::user()->name.' rejected the order!');
    }
    
}
