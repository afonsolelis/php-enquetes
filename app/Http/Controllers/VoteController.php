<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Option;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function find($id) {
        $poll = Poll::find($id);
        $option = Option::where('poll_id', $id)->get();
        return view('vote', ['poll' => $poll, 'options' => $option]);
    }

    public function vote(Request $request) {
        $vote = new Vote();
        $validated = $request->validate([
            'id' => 'bail|required',
            'opcao' => 'required'
        ]);
        $vote->voted_at = date('Y-m-d H:i:s');
        $vote->option = $request->opcao;
        $vote->option_id = $request->opcao;
        $vote->poll_id = $request->id;

        $vote->save();

        return redirect('/poll/results/'.$request->id);
    }

    public function results($id) {
        $poll = Poll::find($id);
        $option = Option::where('poll_id', $id)->get();
        $parcial = DB::table('poll_votes')->select(DB::raw('COUNT(1) as votes'))->where('poll_id', '=', $id)->groupBy('option_id')->orderBy('option', 'ASC')->get();
        return view('results', ['poll' => $poll, 'options' => $option, 'parcial' => $parcial]);
    }
}
