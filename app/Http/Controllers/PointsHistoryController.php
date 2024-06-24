<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointsHistoryRequest;
use App\Http\Resources\PointsHistoryResource;
use App\Models\PointsHistory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PointsHistoryController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', PointsHistory::class);

        return PointsHistoryResource::collection(PointsHistory::all());
    }

    public function store(PointsHistoryRequest $request)
    {
        $this->authorize('create', PointsHistory::class);

        return new PointsHistoryResource(PointsHistory::create($request->validated()));
    }

    public function show(PointsHistory $pointsHistory)
    {
        $this->authorize('view', $pointsHistory);

        return new PointsHistoryResource($pointsHistory);
    }

    public function update(PointsHistoryRequest $request, PointsHistory $pointsHistory)
    {
        $this->authorize('update', $pointsHistory);

        $pointsHistory->update($request->validated());

        return new PointsHistoryResource($pointsHistory);
    }

    public function destroy(PointsHistory $pointsHistory)
    {
        $this->authorize('delete', $pointsHistory);

        $pointsHistory->delete();

        return response()->json();
    }
}
