<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = auth()->user()->transactions()->orderBy('created_at', 'desc')->get();

        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required|in:deposit,withdrawal',
            'amount' => 'required|numeric|min:0.01',
            'receipt' => 'required_if:type,deposit|file|mimes:jpg,jpeg,png,pdf', // Adjust mime types and max size as needed

        ]);



        $transaction = new Transaction();
        $transaction->type=$request->type;
        $transaction->amount= $request->amount;
        $transaction->user_id = auth()->user()->id;

        if ($request->type == 'deposit' && $request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public'); // Adjust the storage disk and path as needed
            $transaction->receipt_path = $receiptPath;
        }

        $transaction->save();

        return response()->json([
            'code'=>$transaction?200:400,
            'transacation'=>$transaction
        ]);
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
        //
    }
}
