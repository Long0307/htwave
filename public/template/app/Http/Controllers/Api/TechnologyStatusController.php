<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TechnologyStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyStatusResource;
use App\Http\Resources\TechnologyStatusCollection;
use App\Http\Requests\TechnologyStatusStoreRequest;
use App\Http\Requests\TechnologyStatusUpdateRequest;

class TechnologyStatusController extends Controller
{
    public function index(Request $request): TechnologyStatusCollection
    {
        $this->authorize('view-any', TechnologyStatus::class);

        $search = $request->get('search', '');

        $technologyStatuses = TechnologyStatus::search($search)
            ->latest()
            ->paginate();

        return new TechnologyStatusCollection($technologyStatuses);
    }

    public function store(
        TechnologyStatusStoreRequest $request
    ): TechnologyStatusResource {
        $this->authorize('create', TechnologyStatus::class);

        $validated = $request->validated();

        $technologyStatus = TechnologyStatus::create($validated);

        return new TechnologyStatusResource($technologyStatus);
    }

    public function show(
        Request $request,
        TechnologyStatus $technologyStatus
    ): TechnologyStatusResource {
        $this->authorize('view', $technologyStatus);

        return new TechnologyStatusResource($technologyStatus);
    }

    public function update(
        TechnologyStatusUpdateRequest $request,
        TechnologyStatus $technologyStatus
    ): TechnologyStatusResource {
        $this->authorize('update', $technologyStatus);

        $validated = $request->validated();

        $technologyStatus->update($validated);

        return new TechnologyStatusResource($technologyStatus);
    }

    public function destroy(
        Request $request,
        TechnologyStatus $technologyStatus
    ): Response {
        $this->authorize('delete', $technologyStatus);

        $technologyStatus->delete();

        return response()->noContent();
    }
}
