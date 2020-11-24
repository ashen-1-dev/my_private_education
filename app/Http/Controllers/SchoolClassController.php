<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClassRequest;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Получение списка всех классов
     *
     * @param SchoolClassRequest $request
     * @return JsonResponse
     */
    public function index(SchoolClassRequest $request)
    {
        return response()->json(SchoolClass::all(), 200);
    }

    public function store(SchoolClassRequest $request)
    {
        $teacher = Teacher::find((int)$request->input('teacher_id'));
        if ($teacher) {
            $schoolClass = $teacher->schoolClass()->create($request->all());
        } else {
            $schoolClass = SchoolClass::create($request->all());
        }
        return response()->json(SchoolClass::find($schoolClass->id), 201);
    }

    public function update(SchoolClassRequest $request)
    {

    }

    public function delete(SchoolClassRequest $request)
    {

    }
}
