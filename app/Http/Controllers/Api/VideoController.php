<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = Video::paginate();

        return VideoResource::collection($videos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request): JsonResponse
    {
        $video = Video::create($request->validated());

        return response()->json(new VideoResource($video));
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video): JsonResponse
    {
        return response()->json(new VideoResource($video));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, Video $video): JsonResponse
    {
        $video->update($request->validated());

        return response()->json(new VideoResource($video));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Video $video): Response
    {
        $video->delete();

        return response()->noContent();
    }
}
