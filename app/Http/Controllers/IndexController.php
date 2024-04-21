<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller {

    public function getAllItems(Request $request)
    {
        // Make a GET request to the API
        $apilink = 'http://127.0.0.1:8080/api/search-product';
        $isfirst = true;

        if ($request->filled('min_price')) {
            if($isfirst){
                $apilink = $apilink."?min_price=".$request->input('min_price');
                $isfirst = false;
            }else{
                $apilink = $apilink."&min_price=".$request->input('min_price');
            }
        }

        if ($request->filled('max_price')) {
            if($isfirst){
                $apilink = $apilink."?max_price=".$request->input('max_price');
                $isfirst = false;
            }else{
                $apilink = $apilink."&max_price=".$request->input('max_price');
            }
        }

        if ($request->filled('name')) {
            if($isfirst){
                $apilink = $apilink."?name=".$request->input('name');
                $isfirst = false;
            }else{
                $apilink = $apilink."&name=".$request->input('name');
            }
        }

        if ($request->filled('sort') && in_array($request->input('sort'), ['asc', 'desc'])) {
            if($isfirst){
                $apilink = $apilink."?sort=".$request->input('sort');
                $isfirst = false;
            }else{
                $apilink = $apilink."&sort=".$request->input('sort');
            }
        }


        $response = Http::get($apilink);



        // Check if the request was successful
        if ($response->successful()) {
            // Get the JSON response body
            $items = $response->json();

            // Process the items or return them to a view
            return view('welcome', ['items' => $items]);
        } else {
            // Handle the error response
            echo "Api request Error";
        }
    }
    
}