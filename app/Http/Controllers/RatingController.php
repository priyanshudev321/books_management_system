<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        try{
            Log::info("All inputs of adding rating :: ", $request->all());

            $validation = Validator::make($request->all(), [
                'book_id' => 'required|exists:books,id',
                'rating' => 'required|integer|between:1,5',
            ]);
    
            $message = '';
    
            if($validation->fails()){
                $message = $validation->errors()->first();
                return back()->with('success', $message);
            }
    
            $existingRating = Rating::where('book_id', $request->book_id)
                                    ->where('user_id', auth()->id())
                                    ->first();
    
            if ($existingRating) {
                $existingRating->update(['rating' => $request->rating]);
                $message = 'Your rating has been updated.';
            } else {
                Rating::create([
                    'book_id' => $request->book_id,
                    'user_id' => auth()->id(),
                    'rating' => $request->rating,
                ]);
                $message = 'Your rating has been submitted.';
            }
    
            return back()->with('success', $message);
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }
}
