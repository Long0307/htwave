<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TechnologyStoreRequest;
use App\Http\Requests\TechnologyUpdateRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Technology::class);

        $search = $request->get('search', '');

        $technologies = Technology::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.technologies.index',
            compact('technologies', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Technology::class);

        return view('app.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Technology::class);

        $validated = $request->validated();

        $technology = Technology::create($validated);

        return redirect()
            ->route('technologies.edit', $technology)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Technology $technology): View
    {
        $this->authorize('view', $technology);

        return view('app.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Technology $technology): View
    {
        $this->authorize('update', $technology);

        return view('app.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TechnologyUpdateRequest $request,
        Technology $technology
    ): RedirectResponse {
        $this->authorize('update', $technology);

        $validated = $request->validated();

        $technology->update($validated);

        return redirect()
            ->route('technologies.edit', $technology)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Technology $technology
    ): RedirectResponse {
        $this->authorize('delete', $technology);

        $technology->delete();

        return redirect()
            ->route('technologies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
