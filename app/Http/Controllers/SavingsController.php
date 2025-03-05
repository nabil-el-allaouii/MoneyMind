<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $savings = Saving::where('user_id' , Auth::id())->first();
        return view('savings',compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'amount' => ['required' , 'integer'],
            'name' => ['required' , 'string'],
            'goal' => ['required' , 'integer']
        ]);

        Saving::create([
            'name' => $request->input('name'),
            'target_amount' => $request->input('goal'),
            'monthly_contribution' => $request->input('amount'),
            'user_id' => Auth::id()
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $request->validate([
            'newContribution' => ['required','integer'],
            'newTarget' => ['required','integer']
        ]);
        $saving = Saving::where('user_id' , Auth::id())->first();
        $saving->update([
            'target_amount' => $request->input('newTarget'),
            'monthly_contribution' => $request->input('newContribution'),
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $saving = Saving::find($id)->where('user_id' , Auth::id());
        $saving->delete();
        return redirect()->back();
    }
}
