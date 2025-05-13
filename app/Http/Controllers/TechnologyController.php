<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TechnologyStoreRequest;
use App\Http\Requests\TechnologyUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        $technology_categories = DB::table('tech_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($technology_categories) {
            // Chuyển thành mảng
            $technology_categories = $technology_categories->toArray();
        } else {
            // Nếu không tìm thấy technology_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $technology_categories = [];
        }

    //     <x-inputs.group class="col-sm-12">
    //     <x-inputs.select name="categories_id" label="Categories Id">
    //         @php $selected = old('categories_id', ($editing ? $technology_categories->_id : '')) @endphp
    //     </x-inputs.select>
    // </x-inputs.group>

        return view(
            'app.technologies.index',
            compact('technologies', 'search', 'technology_categories')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Technology::class);

        $technology_categories = DB::table('tech_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($technology_categories) {
            // Chuyển thành mảng
            $technology_categories = $technology_categories->toArray();
        } else {
            // Nếu không tìm thấy technology_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $technology_categories = [];
        }

        return view('app.technologies.create', compact("technology_categories"));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(TechnologyStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Technology::class);

        $validated = $request->all();
        
        // dd($validated);

        if ($request->hasFile('Background')) {

            $validated['Background'] = $request
                ->file('Background')
                ->store('public');
        
            $fileName1 = basename($validated['Background']);
        
            $request->file('Background')->move(public_path('storage'), $fileName1);
        }

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

        $this->authorize('create', Technology::class);

        $technology_categories = DB::table('tech_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($technology_categories) {
            // Chuyển thành mảng
            $technology_categories = $technology_categories->toArray();
        } else {
            // Nếu không tìm thấy technology_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $technology_categories = [];
        }

        return view('app.technologies.edit', compact('technology', 'technology_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TechnologyUpdateRequest $request,
        Technology $technology
    ): RedirectResponse {
        $this->authorize('update', $technology);

        $validated = $request->all();

        if ($request->hasFile('Background')) {

            $validated['Background'] = $request
                ->file('Background')
                ->store('public');
        
            $fileName1 = basename($validated['Background']);
        
            $request->file('Background')->move(public_path('storage'), $fileName1);
        }

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
