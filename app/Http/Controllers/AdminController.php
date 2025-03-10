<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Inactif()
    {
        $TwoMonthsAgo = Carbon::now()->subMonths(2);
        $users = User::where('last_logged_in', '<', $TwoMonthsAgo)->get();
        foreach ($users as $user) {
            if ($user->role !== 'admin') {
                $user->delete();
            }
        }
        return redirect()->back();
    }
    public function index()
    {
        $totalBudget = 0;
        $thisMonth = Carbon::now()->subMonths(2);
        $Users = User::all();
        $inactif = User::where('last_logged_in', '<', $thisMonth)->get();
        $inactifCount = $inactif->count();
        $UsersCount = 0;
        foreach ($Users as $user) {
            if($user->role !== 'admin'){
                $totalBudget += $user->budget;
                $UsersCount ++;
            }
        }
        $average = intval($totalBudget / $UsersCount);
        $categories = Category::all();
        return view('admin.dashboard', compact('categories', 'UsersCount', 'average', 'inactifCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        Category::create([
            'name' => $request->input('category_name'),
            'description' => $request->input('description')
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
