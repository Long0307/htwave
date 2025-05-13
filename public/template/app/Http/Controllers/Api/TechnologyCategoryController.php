<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TechnologyCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyCategoryResource;
use App\Http\Resources\TechnologyCategoryCollection;
use App\Http\Requests\TechnologyCategoryStoreRequest;
use App\Http\Requests\TechnologyCategoryUpdateRequest;

class TechnologyCategoryController extends Controller
{
    public function index(Request $request): TechnologyCategoryCollection
    {
        $this->authorize('view-any', TechnologyCategory::class);

        $search = $request->get('search', '');

        $technologyCategories = TechnologyCategory::search($search)
            ->latest()
            ->paginate();

        return new TechnologyCategoryCollection($technologyCategories);
    }

    public function store(
        TechnologyCategoryStoreRequest $request
    ): TechnologyCategoryResource {
        $this->authorize('create', TechnologyCategory::class);

        $validated = $request->validated();

        $technologyCategory = TechnologyCategory::create($validated);

        return new TechnologyCategoryResource($technologyCategory);
    }

    public function show(
        Request $request,
        TechnologyCategory $technologyCategory
    ): TechnologyCategoryResource {
        $this->authorize('view', $technologyCategory);

        return new TechnologyCategoryResource($technologyCategory);
    }

    public function update(
        TechnologyCategoryUpdateRequest $request,
        TechnologyCategory $technologyCategory
    ): TechnologyCategoryResource {
        $this->authorize('update', $technologyCategory);

        $validated = $request->validated();

        $technologyCategory->update($validated);

        return new TechnologyCategoryResource($technologyCategory);
    }

    public function destroy(
        Request $request,
        TechnologyCategory $technologyCategory
    ): Response {
        $this->authorize('delete', $technologyCategory);

        $technologyCategory->delete();

        return response()->noContent();
    }
}
