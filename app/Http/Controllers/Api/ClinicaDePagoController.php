<?php

namespace App\Http\Controllers\Api;

use App\Models\ClinicaDePago;
use Illuminate\Http\Request;
use App\Http\Requests\ClinicaDePagoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicaDePagoResource;

class ClinicaDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clinicaDePagos = ClinicaDePago::paginate();

        return ClinicaDePagoResource::collection($clinicaDePagos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinicaDePagoRequest $request): JsonResponse
    {
        $clinicaDePago = ClinicaDePago::create($request->validated());

        return response()->json(new ClinicaDePagoResource($clinicaDePago));
    }

    /**
     * Display the specified resource.
     */
    public function show(ClinicaDePago $clinicaDePago): JsonResponse
    {
        return response()->json(new ClinicaDePagoResource($clinicaDePago));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClinicaDePagoRequest $request, ClinicaDePago $clinicaDePago): JsonResponse
    {
        $clinicaDePago->update($request->validated());

        return response()->json(new ClinicaDePagoResource($clinicaDePago));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(ClinicaDePago $clinicaDePago): Response
    {
        $clinicaDePago->delete();

        return response()->noContent();
    }
}
