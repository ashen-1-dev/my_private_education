<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentRequest;
use App\Models\Parentt;
use Illuminate\Http\JsonResponse;

class ParenttController extends Controller
{
    /**
     * Получение списка всех учителей
     *
     * @param ParentRequest $request
     * @return JsonResponse
     */
    public function index(ParentRequest $request)
    {
        return response()->json(Parentt::all(), 200);
    }

    /**
     * Получение одного учителя
     *
     * @param Parentt $student
     * @param ParentRequest $request
     * @return JsonResponse
     */
    public function show(Parentt $parent, ParentRequest $request)
    {
        return response()->json($parent, 200);
    }

    /**
     * Обновление учителя
     *
     * @param ParentRequest $request
     * @param Parentt $parent
     * @return JsonResponse
     */
    public function update(ParentRequest $request, Parentt $parent)
    {
        $parent->update($request->all());
        return response()->json($parent, 200);
    }
}
