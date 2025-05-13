<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TechnologyStatus;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TechnologyStatusStoreRequest;
use App\Http\Requests\TechnologyStatusUpdateRequest;

class TechnologyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', TechnologyStatus::class);

        $search = $request->get('search', '');

        $technologyStatuses = TechnologyStatus::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.technology_statuses.index',
            compact('technologyStatuses', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', TechnologyStatus::class);

        return view('app.technology_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        TechnologyStatusStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', TechnologyStatus::class);

        $validated = $request->validated();

        $technologyStatus = TechnologyStatus::create($validated);

        return redirect()
            ->route('technology-statuses.edit', $technologyStatus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        TechnologyStatus $technologyStatus
    ): View {
        $this->authorize('view', $technologyStatus);

        return view(
            'app.technology_statuses.show',
            compact('technologyStatus')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        TechnologyStatus $technologyStatus
    ): View {
        $this->authorize('update', $technologyStatus);

        return view(
            'app.technology_statuses.edit',
            compact('technologyStatus')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TechnologyStatusUpdateRequest $request,
        TechnologyStatus $technologyStatus
    ): RedirectResponse {
        $this->authorize('update', $technologyStatus);

        $validated = $request->validated();

        $technologyStatus->update($validated);

        return redirect()
            ->route('technology-statuses.edit', $technologyStatus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        TechnologyStatus $technologyStatus
    ): RedirectResponse {
        $this->authorize('delete', $technologyStatus);

        $technologyStatus->delete();

        return redirect()
            ->route('technology-statuses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
