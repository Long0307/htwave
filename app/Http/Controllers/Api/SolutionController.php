<?php

namespace App\Http\Controllers\Api;

use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SolutionResource;
use App\Http\Resources\SolutionCollection;
use App\Http\Requests\SolutionStoreRequest;
use App\Http\Requests\SolutionUpdateRequest;

class SolutionController extends Controller
{
    public function index(Request $request): SolutionCollection
    {
        $this->authorize('view-any', Solution::class);

        $search = $request->get('search', '');

        $solutions = Solution::search($search)
            ->latest()
            ->paginate();

        return new SolutionCollection($solutions);
    }

    public function store(SolutionStoreRequest $request): SolutionResource
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

        return new SolutionResource($solution);
    }

    public function show(Request $request, Solution $solution): SolutionResource
    {
        $this->authorize('view', $solution);

        return new SolutionResource($solution);
    }

    public function update(
        SolutionUpdateRequest $request,
        Solution $solution
    ): SolutionResource {
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

        return new SolutionResource($solution);
    }

    public function destroy(Request $request, Solution $solution): Response
    {
        $this->authorize('delete', $solution);

        if ($solution->Background1) {
            Storage::delete($solution->Background1);
        }

        if ($solution->Background2) {
            Storage::delete($solution->Background2);
        }

        $solution->delete();

        return response()->noContent();
    }
}
