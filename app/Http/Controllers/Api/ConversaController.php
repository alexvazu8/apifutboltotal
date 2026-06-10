<?php

namespace App\Http\Controllers\Api;

use App\Models\Conversa;
use Illuminate\Http\Request;
use App\Http\Requests\ConversaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConversaResource;

class ConversaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $conversas = Conversa::paginate();

        return ConversaResource::collection($conversas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConversaRequest $request): JsonResponse
    {
        $conversa = Conversa::create($request->validated());

        return response()->json(new ConversaResource($conversa));
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversa $conversa): JsonResponse
    {
        return response()->json(new ConversaResource($conversa));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConversaRequest $request, Conversa $conversa): JsonResponse
    {
        $conversa->update($request->validated());

        return response()->json(new ConversaResource($conversa));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Conversa $conversa): Response
    {
        $conversa->delete();

        return response()->noContent();
    }
}
