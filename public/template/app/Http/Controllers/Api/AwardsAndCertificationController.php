<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\AwardsAndCertification;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AwardsAndCertificationResource;
use App\Http\Resources\AwardsAndCertificationCollection;
use App\Http\Requests\AwardsAndCertificationStoreRequest;
use App\Http\Requests\AwardsAndCertificationUpdateRequest;

class AwardsAndCertificationController extends Controller
{
    public function index(Request $request): AwardsAndCertificationCollection
    {
        $this->authorize('view-any', AwardsAndCertification::class);

        $search = $request->get('search', '');

        $awardsAndCertifications = AwardsAndCertification::search($search)
            ->latest()
            ->paginate();

        return new AwardsAndCertificationCollection($awardsAndCertifications);
    }

    public function store(
        AwardsAndCertificationStoreRequest $request
    ): AwardsAndCertificationResource {
        $this->authorize('create', AwardsAndCertification::class);

        $validated = $request->validated();
        if ($request->hasFile('images')) {
            $validated['images'] = $request->file('images')->store('public');
        }

        $awardsAndCertification = AwardsAndCertification::create($validated);

        return new AwardsAndCertificationResource($awardsAndCertification);
    }

    public function show(
        Request $request,
        AwardsAndCertification $awardsAndCertification
    ): AwardsAndCertificationResource {
        $this->authorize('view', $awardsAndCertification);

        return new AwardsAndCertificationResource($awardsAndCertification);
    }

    public function update(
        AwardsAndCertificationUpdateRequest $request,
        AwardsAndCertification $awardsAndCertification
    ): AwardsAndCertificationResource {
        $this->authorize('update', $awardsAndCertification);

        $validated = $request->validated();

        if ($request->hasFile('images')) {
            if ($awardsAndCertification->images) {
                Storage::delete($awardsAndCertification->images);
            }

            $validated['images'] = $request->file('images')->store('public');
        }

        $awardsAndCertification->update($validated);

        return new AwardsAndCertificationResource($awardsAndCertification);
    }

    public function destroy(
        Request $request,
        AwardsAndCertification $awardsAndCertification
    ): Response {
        $this->authorize('delete', $awardsAndCertification);

        if ($awardsAndCertification->images) {
            Storage::delete($awardsAndCertification->images);
        }

        $awardsAndCertification->delete();

        return response()->noContent();
    }
}
