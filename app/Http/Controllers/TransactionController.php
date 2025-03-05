<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Depense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userID = Auth::id();
        $categories = Category::all();
        $depenses = Depense::where('user_id',$userID)->with('category')->get();
        $total = Depense::where('user_id' , $userID)->selectRaw('SUM(price) as total')->value('total');
        return view('transactions', compact('categories', 'depenses' , 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'transaction_type' => ['required' , 'string'],
            'amount' => ['required' , 'integer'],
            'category' => ['required' , 'integer'],
            'date' => ['nullable' , 'integer'],
        ]);
        $user = User::find(Auth::id());
        if($request->transaction_type === 'ponctuelle'){
            $user->reduceBudget($request->input('amount'));
        }
        Depense::create([
            'price' => $request->input('amount'),
            'type' => $request->input('transaction_type'),
            'depense_date' => $request->input('date'),
            'user_id' => Auth::id(),
            'category_id' => $request->input('category') 
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $depense = Depense::find($id);
        $depense->delete();
        return redirect()->back();
    }
}
