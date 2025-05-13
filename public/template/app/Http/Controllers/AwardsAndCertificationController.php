<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\AwardsAndCertification;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AwardsAndCertificationStoreRequest;
use App\Http\Requests\AwardsAndCertificationUpdateRequest;

class AwardsAndCertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', AwardsAndCertification::class);

        $search = $request->get('search', '');

        $awardsAndCertifications = AwardsAndCertification::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.awards_and_certifications.index',
            compact('awardsAndCertifications', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', AwardsAndCertification::class);

        return view('app.awards_and_certifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        AwardsAndCertificationStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', AwardsAndCertification::class);

        $validated = $request->validated();
        if ($request->hasFile('images')) {
            $validated['images'] = $request->file('images')->store('public');
        }

        $awardsAndCertification = AwardsAndCertification::create($validated);

        return redirect()
            ->route('awards-and-certifications.edit', $awardsAndCertification)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        AwardsAndCertification $awardsAndCertification
    ): View {
        $this->authorize('view', $awardsAndCertification);

        return view(
            'app.awards_and_certifications.show',
            compact('awardsAndCertification')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        AwardsAndCertification $awardsAndCertification
    ): View {
        $this->authorize('update', $awardsAndCertification);

        return view(
            'app.awards_and_certifications.edit',
            compact('awardsAndCertification')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AwardsAndCertificationUpdateRequest $request,
        AwardsAndCertification $awardsAndCertification
    ): RedirectResponse {
        $this->authorize('update', $awardsAndCertification);

        $validated = $request->validated();
        if ($request->hasFile('images')) {
            if ($awardsAndCertification->images) {
                Storage::delete($awardsAndCertification->images);
            }

            $validated['images'] = $request->file('images')->store('public');
        }

        $awardsAndCertification->update($validated);

        return redirect()
            ->route('awards-and-certifications.edit', $awardsAndCertification)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        AwardsAndCertification $awardsAndCertification
    ): RedirectResponse {
        $this->authorize('delete', $awardsAndCertification);

        if ($awardsAndCertification->images) {
            Storage::delete($awardsAndCertification->images);
        }

        $awardsAndCertification->delete();

        return redirect()
            ->route('awards-and-certifications.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
