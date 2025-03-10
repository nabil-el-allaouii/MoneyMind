<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $globals = [];
        $categorized = [];
        $alerts = Alert::with('category')->where('user_id' , Auth::id())->get();
        foreach($alerts as $alert){
            if($alert && $alert->type === 'global'){
                $globals[] = $alert;
            }else{
                $categorized [] = $alert;
            }
        }
        return view('Alerts', compact('globals', 'categories','categorized'));
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
            'type' => ['required' , 'string'],
            'threshold' => ['required' , 'integer','min:1','max:100'],
            'id' => ['integer']
        ]);

        Alert::create([
            'percentage' => $request->input('threshold'),
            'type' => $request->input('type'),
            'category_id' => $request->input('id') ? $request->input('id') : null,
            'user_id' => Auth::id()
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
            'threshold' => ['required' , 'integer'],
            'type' => ['required' , 'string']
        ]);
        $alert = Alert::find($id);
        $alert->update([
            'percentage' =>$request->input('threshold'),
            'type' => $request->input('type'),
            'user_id' => Auth::id()
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alert = Alert::find($id);
        $alert->delete();
        return redirect()->back();
    }
}
