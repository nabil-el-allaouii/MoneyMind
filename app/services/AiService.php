<?php

namespace App\Services;
use GuzzleHttp\Client;
class AiService
{
    private $client;
    private $apiUrl;
    private $apiKey;
    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=";
        $this->apiKey = env('GEMINI_API_KEY');
    }
    public function getAdviceAi($expenses)
    {
       $formatedExpense = "";
        foreach ($expenses as $expense) {
            if ($expense->type == 'ponctuelle') {
                $formatedExpense .= " type : {{$expense->type}}category : {{$expense->category->name}} amount : {{$expense->price}} date: {{$expense->created_at}}\n ";
            } elseif ($expense->type == 'recurrentes') {
                $formatedExpense .= "{{$expense->type}} for {{$expense->category->name}} : {{$expense->price}} on {{$expense->depense_date}}\n ";
            }
        }
        $prompt = "in 2 to three sentences give me a financial advice or a tip depending on these information the price is in moroccan currency: \n " . $formatedExpense;
        $request = $this->client->post($this->apiUrl . $this->apiKey, [
            'headers' => [
                'Content-type' => 'application/json'
            ],
            'json' => [
                'contents' => [
                    'parts' =>  [

                        'text' => $prompt,
                    ]
                ]
            ],
        ]);
        $response = json_decode($request->getBody()->getContents(), true);
        $advice = $response['candidates'][0]['content']['parts'][0]['text'];
        return $advice;
    }
}