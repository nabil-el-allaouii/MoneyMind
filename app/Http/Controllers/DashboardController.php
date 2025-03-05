<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userID = Auth::id();
        $totalExpenses = Depense::where('user_id' , $userID)->sum('price');
        $CategoryBreak = Depense::where('user_id' , $userID)->selectRaw('category_id , SUM(price) as Total')->groupBy('category_id')->with('category')->get();
        foreach($CategoryBreak as $breakdown){
            $breakdown->percentage = $totalExpenses > 0 ? round(($breakdown->Total / $totalExpenses) * 100) : 0;
        }
        $info = User::find(Auth::id());
        return view('dashboard', compact('info' , 'CategoryBreak', 'totalExpenses'));
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {

    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request)
    {
        $request->validate([
            'amount'=> ['required' , 'integer']
        ]);
        $user = User::find(Auth::id());
        $user->budget += $request->amount;
        $user->save();
        return redirect()->back();
    }


    public function destroy(string $id)
    {
        //
    }
}
