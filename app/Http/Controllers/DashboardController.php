<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\AiService;

class DashboardController extends Controller
{
    protected $aiService;
    public function __construct(AiService $aiService)
    {
        $this->aiService = $aiService;
    }
    public function GetAdvice()
    {
        $info = Depense::where('user_id', Auth::id())
            ->select('category_id', 'price', 'depense_date', 'type')
            ->with('category:id,name')
            ->get();
            return $this->aiService->getAdviceAi($info);
    }
    public function index()
    {
        $userID = Auth::id();
        $totalExpenses = Depense::where('user_id', $userID)->sum('price');
        $CategoryBreak = Depense::where('user_id', $userID)->selectRaw('category_id , SUM(price) as Total')->groupBy('category_id')->with('category')->get();
        foreach ($CategoryBreak as $breakdown) {
            $breakdown->percentage = $totalExpenses > 0 ? round(($breakdown->Total / $totalExpenses) * 100) : 0;
        }
        $info = User::find(Auth::id());
        $AiAdvice = $this->GetAdvice();
        return view('dashboard', compact('info', 'CategoryBreak', 'totalExpenses' , 'AiAdvice'));
    }


    public function create() {}


    public function store(Request $request) {}


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
            'amount' => ['required', 'integer']
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
