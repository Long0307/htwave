<?php

namespace App\Http\Controllers\Api;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\InquiryResource;
use App\Http\Resources\InquiryCollection;
use App\Http\Requests\InquiryStoreRequest;
use App\Http\Requests\InquiryUpdateRequest;

class InquiryController extends Controller
{
    public function index(Request $request): InquiryCollection
    {
        $this->authorize('view-any', Inquiry::class);

        $search = $request->get('search', '');

        $inquiries = Inquiry::search($search)
            ->latest()
            ->paginate();

        return new InquiryCollection($inquiries);
    }

    public function store(InquiryStoreRequest $request): InquiryResource
    {
        $this->authorize('create', Inquiry::class);

        $validated = $request->validated();

        $inquiry = Inquiry::create($validated);

        return new InquiryResource($inquiry);
    }

    public function show(Request $request, Inquiry $inquiry): InquiryResource
    {
        $this->authorize('view', $inquiry);

        return new InquiryResource($inquiry);
    }

    public function update(
        InquiryUpdateRequest $request,
        Inquiry $inquiry
    ): InquiryResource {
        $this->authorize('update', $inquiry);

        $validated = $request->validated();

        $inquiry->update($validated);

        return new InquiryResource($inquiry);
    }

    public function destroy(Request $request, Inquiry $inquiry): Response
    {
        $this->authorize('delete', $inquiry);

        $inquiry->delete();

        return response()->noContent();
    }
}
