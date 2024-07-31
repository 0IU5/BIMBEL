<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'feedback' => 'required',
        ]);

        Feedback::create([
            'id_user' => $user->id_user,
            'name' => $user->name,
            'email' => $user->email,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Feedback added successfully!!');
    }

    public function edit($id)
    {
        $feedback = Feedback::find($id);
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        
        $request->validate([
            'feedback' => 'required',
        ]);

        $feedback = Feedback::find($id);
        $feedback->update([
            'id_user' => $user->id_user,
            'name' => $user->name,
            'email' => $user->email,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('feedbacks.index')->with('update', 'Feedback update succesfully!!');
    }

    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect()->route('feedbacks.index')->with('delete', 'Feedback deleted succesfully!!');
    }
}
