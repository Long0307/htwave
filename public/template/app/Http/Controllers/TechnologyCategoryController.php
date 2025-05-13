<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\TechnologyCategory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TechnologyCategoryStoreRequest;
use App\Http\Requests\TechnologyCategoryUpdateRequest;

class TechnologyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', TechnologyCategory::class);

        $search = $request->get('search', '');

        $technologyCategories = TechnologyCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.technology_categories.index',
            compact('technologyCategories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', TechnologyCategory::class);

        $technologies = Technology::pluck('Background', 'id');

        return view(
            'app.technology_categories.create',
            compact('technologies')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        TechnologyCategoryStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', TechnologyCategory::class);

        $validated = $request->validated();

        $technologyCategory = TechnologyCategory::create($validated);

        return redirect()
            ->route('technology-categories.edit', $technologyCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        TechnologyCategory $technologyCategory
    ): View {
        $this->authorize('view', $technologyCategory);

        return view(
            'app.technology_categories.show',
            compact('technologyCategory')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        TechnologyCategory $technologyCategory
    ): View {
        $this->authorize('update', $technologyCategory);

        $technologies = Technology::pluck('Background', 'id');

        return view(
            'app.technology_categories.edit',
            compact('technologyCategory', 'technologies')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TechnologyCategoryUpdateRequest $request,
        TechnologyCategory $technologyCategory
    ): RedirectResponse {
        $this->authorize('update', $technologyCategory);

        $validated = $request->validated();

        $technologyCategory->update($validated);

        return redirect()
            ->route('technology-categories.edit', $technologyCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        TechnologyCategory $technologyCategory
    ): RedirectResponse {
        $this->authorize('delete', $technologyCategory);

        $technologyCategory->delete();

        return redirect()
            ->route('technology-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
