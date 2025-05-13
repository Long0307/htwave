<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SolutionStoreRequest;
use App\Http\Requests\SolutionUpdateRequest;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Solution::class);

        $search = $request->get('search', '');

        $solutions = Solution::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.solutions.index', compact('solutions', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Solution::class);

        return view('app.solutions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolutionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Solution::class);

        $validated = $request->validated();
        if ($request->hasFile('Background1')) {
            $validated['Background1'] = $request
                ->file('Background1')
                ->store('public');
        }

        if ($request->hasFile('Background2')) {
            $validated['Background2'] = $request
                ->file('Background2')
                ->store('public');
        }

        $solution = Solution::create($validated);

        return redirect()
            ->route('solutions.edit', $solution)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Solution $solution): View
    {
        $this->authorize('view', $solution);

        return view('app.solutions.show', compact('solution'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Solution $solution): View
    {
        $this->authorize('update', $solution);

        return view('app.solutions.edit', compact('solution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SolutionUpdateRequest $request,
        Solution $solution
    ): RedirectResponse {
        $this->authorize('update', $solution);

        $validated = $request->validated();
        if ($request->hasFile('Background1')) {
            if ($solution->Background1) {
                Storage::delete($solution->Background1);
            }

            $validated['Background1'] = $request
                ->file('Background1')
                ->store('public');
        }

        if ($request->hasFile('Background2')) {
            if ($solution->Background2) {
                Storage::delete($solution->Background2);
            }

            $validated['Background2'] = $request
                ->file('Background2')
                ->store('public');
        }

        $solution->update($validated);

        return redirect()
            ->route('solutions.edit', $solution)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Solution $solution
    ): RedirectResponse {
        $this->authorize('delete', $solution);

        if ($solution->Background1) {
            Storage::delete($solution->Background1);
        }

        if ($solution->Background2) {
            Storage::delete($solution->Background2);
        }

        $solution->delete();

        return redirect()
            ->route('solutions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
