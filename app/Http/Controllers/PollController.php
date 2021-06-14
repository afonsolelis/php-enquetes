<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Option;

class PollController extends Controller
{
    public function index()
    {
        //GET é igual ao SELECT * WHERE 0;
        $polls = Poll::get();
        return view('index', ['polls' => $polls]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'bail|required|max:100',
            'starts_at' => 'required',
            'description' => 'max:200'
        ]);
        $poll = new Poll();
        $poll->title = $request->title;
        $poll->description = $request->description;
        $poll->status = 1;
        $poll->starts_at = $request->starts_at;
        $poll->closes_at = (empty($request->closes_at)) ? date('Y-m-d H:i:s', strtotime('+1 day', strtotime("today"))) : $request->closes_at;


        $poll->save();

        /* As opções */
        foreach($request->options as $k => $op) {
            $option = new Option();
            $option->order = $k;
            $option->value = $op;
            $option->status = 1;
            $option->poll_id = $poll->id;

            $option->save();
        }
        return redirect('/');
    }

    public function find($id)
    {
        $poll = new Poll();
        $poll = Poll::find($id);
        $options = Option::where('poll_id', $id)->get();

        return view('edit', ['poll' => $poll, 'options' => $options]);
    }

    public function show($id)
    {
        $poll = Poll::find($id);
        $options = Option::where('poll_id', $id)->get();
        return view('show', ['poll' => $poll, 'options' => $options]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'bail|required|max:100',
            'description' => 'max:200'
        ]);
        $poll = Poll::find($request->id);
        $poll->title = $request->title;
        $poll->description = $request->description;
        $poll->status = 1;
        $poll->closes_at = (empty($request->closes_at)) ? date('Y-m-d H:i:s', strtotime('+1 day', strtotime("today"))) : $request->closes_at;

        $poll->save();

        foreach($request->options as $k => $op) {
            $option = new Option();
            $option = Option::find($request->options_id[$k]);
            $option->order = $k;
            $option->value = $op;
            $option->status = 1;
            $option->poll_id = $poll->id;
            $option->save();
        }

        return redirect('/');
    }

    public function closePoll($id) {
        $poll = Poll::find($id);
        $poll->status = 0;
        $poll->save();

        return redirect('/');
    }

    public function delete($id)
    {
        Poll::destroy($id);
        return redirect('/');
    }
}
