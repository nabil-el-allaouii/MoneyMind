<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('wishlist', compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => ['required' , 'string'],
            'target_amount' => ['required' , 'integer'],
            'monthly_contribution' => ['required' , 'integer']
        ]);
        $user_id = Auth::id();
        Wishlist::create([
            'name' => $request->input('item_name'),
            'target_price' => $request->input('target_amount'),
            'monthly_contribution' => $request->input('monthly_contribution'),
            'user_id' => $user_id
        ]);
        return redirect()->back();
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
        $request->validate([
            ''
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back();
    }
}
