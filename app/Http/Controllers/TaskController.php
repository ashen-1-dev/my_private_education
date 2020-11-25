<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Subject;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */

    public function createTask(Request $request)
    {
        $request->validate([
            'name'       => 'required|max:128',
            'subject_id' => 'required',
            'short_description' => 'required|max:100',
            'author'     => 'required|max:128',
            'theme_id'      => 'max:255'
                           ]);

        $add_new = new Task;
        $add_new->name = $request->input('name');
        $add_new->description = $request->input('description');
        $add_new->short_description = $request->input('short_description');
        $add_new->subject_id = $request->input('subject_id');
        $add_new->author = $request->input('author');
        $add_new->theme_id = $request->input('theme_id');
        $add_new->save();

        return Task::find($add_new->id);

    }



    public function allTasks(Request $request)
    {
//        $tasks = DB::table('tasks')
//            ->join('subjects', 'tasks.subject_id', '=', 'subjects.id')
//            ->select('tasks.*' , 'subjects.title AS subject')
//            ->get();
//        return $tasks;
        if (is_int((int)$request->count) && ((int)$request->count)>0 && ((int)$request->count)<= 100) {
            return Task::paginate($request->count)->withPath("api/tasks?count=$request->count");
        }

        return Task::paginate(10)->withPath('api/tasks');


    }

    public function showTask($taskId)
    {
//       $tasks = DB::table('tasks')->join('subjects', 'tasks.subject_id', '=', 'subjects.id')->select('tasks.*', 'subjects.name AS subject_name')->get();
//        return $tasks;
        return Task::where('id', '=', $taskId)->get();
    }

    public function editTask(Task $task, Request $request)
    {
        $request->validate([
            'name'       => 'required|max:128',
            'short_description' => 'required|max:100',
            'subject_id' => 'required',
            'author'     => 'required|max:128',
            'theme_id'      => 'max:255'
                           ]);

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->short_description = $request->input('short_description');
        $task->author = $request->input('author');
        $task->theme_id = $request->input('theme_id');


        $task->save();

        return Task::where('id', '=', $task->id)->get();
    }

    public function deleteTask(Task $task)
    {
        $task->delete();

        return 'Task №' . $task->id . ' has been deleted';
    }



}
