<?php

namespace App\Http\Controllers\Api;

use App\Models\Paise;
use Illuminate\Http\Request;
use App\Http\Requests\PaiseRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaiseResource;
use Psy\Util\Json;

class PaiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paises = Paise::paginate();

        return PaiseResource::collection($paises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaiseRequest $request): JsonResponse
    {
        $paise = Paise::create($request->validated());

        return response()->json(new PaiseResource($paise));
    }

    /**
     * Display the specified resource.
     */
    public function show(Paise $paise): JsonResponse
    {
        return response()->json(new PaiseResource($paise));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaiseRequest $request, Paise $paise): JsonResponse
    {
        $paise->update($request->validated());

        return response()->json(new PaiseResource($paise));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Paise $paise): JsonResponse
    {
        $paise->delete();
        return 
        
        response()->json("Se elimino el Pais", 204);
        //return response()->noContent();
    }
}
