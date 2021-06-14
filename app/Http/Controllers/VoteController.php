<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Option;
use App\Events\VoteCreated;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function vote(Request $request) {

        $option = Option::find($request->option);
        $option->votes++;
        $option->save();

//        dd($option);
        return back()->with("success", 'Voto computado!');
    }

    public function results($id) {
        $poll = Poll::find($id);
        $option = Option::where('poll_id', $id)->get();
        return view('results', ['poll' => $poll, 'options' => $option]);
    }
}
