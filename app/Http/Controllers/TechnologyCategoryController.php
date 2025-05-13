<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\TechnologyCategory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TechnologyCategoryStoreRequest;
use App\Http\Requests\TechnologyCategoryUpdateRequest;
use Illuminate\Support\Facades\DB;

class TechnologyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $technology_categories = DB::table('tech_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($technology_categories) {
            // Chuyển thành mảng
            $technology_categories = $technology_categories->toArray();
        } else {
            // Nếu không tìm thấy technology_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $technology_categories = [];
        }

        return view('app.technology_categories.index', compact('technology_categories'));
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
    public function store(Request $request){
        // $this->authorize('create', TechnologyCategory::class);

        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::table('tech_categories')->insert($validated);

        $technology_categories = DB::table('tech_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($technology_categories) {
            // Chuyển thành mảng
            $technology_categories = $technology_categories->toArray();
        } else {
            // Nếu không tìm thấy technology_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $technology_categories = [];
        }


        return view('app.technology_categories.index', compact('technology_categories'))->with('success', 'Category created successfully');;

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
