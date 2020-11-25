<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:128'
                           ]);
        $add_new = new Subject();
        $add_new->title = $request->input('title');

        $add_new->save();

        return Subject::find($add_new->id);
    }

    public function show() {
        return Subject::all();
    }

    public function edit(Subject $subject, Request $request) {
        $request->validate([
            'title' => 'required|max:128'
                           ]);
        $subject->title = $request->input('title');

        $subject->save();

        return Subject::where('id', '=', $subject->id)->get();
    }
    public function delete(Subject $subject)
    {
        $subject->delete();
        return 'Task №' . $subject->id . ' has been deleted';
    }
}
