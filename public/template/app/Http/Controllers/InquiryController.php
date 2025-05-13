<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\InquiryStoreRequest;
use App\Http\Requests\InquiryUpdateRequest;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Inquiry::class);

        $search = $request->get('search', '');

        $inquiries = Inquiry::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.inquiries.index', compact('inquiries', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Inquiry::class);

        return view('app.inquiries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InquiryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Inquiry::class);

        $validated = $request->validated();

        $inquiry = Inquiry::create($validated);

        return redirect()
            ->route('inquiries.edit', $inquiry)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Inquiry $inquiry): View
    {
        $this->authorize('view', $inquiry);

        return view('app.inquiries.show', compact('inquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Inquiry $inquiry): View
    {
        $this->authorize('update', $inquiry);

        return view('app.inquiries.edit', compact('inquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        InquiryUpdateRequest $request,
        Inquiry $inquiry
    ): RedirectResponse {
        $this->authorize('update', $inquiry);

        $validated = $request->validated();

        $inquiry->update($validated);

        return redirect()
            ->route('inquiries.edit', $inquiry)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Inquiry $inquiry
    ): RedirectResponse {
        $this->authorize('delete', $inquiry);

        $inquiry->delete();

        return redirect()
            ->route('inquiries.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
