<?php

namespace App\Http\Controllers;

use App\Http\Requests\FidelityPointRequest;
use App\Http\Resources\FidelityPointResource;
use App\Models\FidelityPoint;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FidelityPointController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', FidelityPoint::class);

        return FidelityPointResource::collection(FidelityPoint::all());
    }

    public function store(FidelityPointRequest $request)
    {
        $this->authorize('create', FidelityPoint::class);

        return new FidelityPointResource(FidelityPoint::create($request->validated()));
    }

    public function show(FidelityPoint $fidelityPoint)
    {
        $this->authorize('view', $fidelityPoint);

        return new FidelityPointResource($fidelityPoint);
    }

    public function update(FidelityPointRequest $request, FidelityPoint $fidelityPoint)
    {
        $this->authorize('update', $fidelityPoint);

        $fidelityPoint->update($request->validated());

        return new FidelityPointResource($fidelityPoint);
    }

    public function destroy(FidelityPoint $fidelityPoint)
    {
        $this->authorize('delete', $fidelityPoint);

        $fidelityPoint->delete();

        return response()->json();
    }
}
