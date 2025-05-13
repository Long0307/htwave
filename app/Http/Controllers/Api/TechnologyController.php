<?php

namespace App\Http\Controllers\Api;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyResource;
use App\Http\Resources\TechnologyCollection;
use App\Http\Requests\TechnologyStoreRequest;
use App\Http\Requests\TechnologyUpdateRequest;

class TechnologyController extends Controller
{
    public function index(Request $request): TechnologyCollection
    {
        $this->authorize('view-any', Technology::class);

        $search = $request->get('search', '');

        $technologies = Technology::search($search)
            ->latest()
            ->paginate();

        return new TechnologyCollection($technologies);
    }

    public function store(TechnologyStoreRequest $request): TechnologyResource
    {
        $this->authorize('create', Technology::class);

        $validated = $request->validated();

        $technology = Technology::create($validated);

        return new TechnologyResource($technology);
    }

    public function show(
        Request $request,
        Technology $technology
    ): TechnologyResource {
        $this->authorize('view', $technology);

        return new TechnologyResource($technology);
    }

    public function update(
        TechnologyUpdateRequest $request,
        Technology $technology
    ): TechnologyResource {
        $this->authorize('update', $technology);

        $validated = $request->validated();

        $technology->update($validated);

        return new TechnologyResource($technology);
    }

    public function destroy(Request $request, Technology $technology): Response
    {
        $this->authorize('delete', $technology);

        $technology->delete();

        return response()->noContent();
    }
}
