<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'variant' => 'max:30'
                           ]);
        $add_new = new Theme();
        $add_new->title = $request->input('title');
        $add_new->variant = $request->input('variant');

        $add_new->save();

        return Theme::find($add_new->id);
    }

    public function show(){
        return Theme::all();
    }

    public function edit(Theme $theme, Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'variant' => 'max:30'
                           ]);
        $theme->title = $request->input('title');
        $theme->variant = $request->input('variant');

        return Theme::where('id', '=', $theme->id)->get();
    }

    public function delete(Theme $theme) {
        $theme->delete();

        return 'Theme №' . $theme->id . ' has been deleted';
    }
}
