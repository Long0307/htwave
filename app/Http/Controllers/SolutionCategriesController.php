<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use Illuminate\View\View;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class SolutionCategriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
    // Lấy dữ liệu của contact có id = 1
    $solution_categories = DB::table('solution_categories')->get();
    // Kiểm tra nếu solution tồn tại
    if ($solution_categories) {
        // Chuyển thành mảng
        $solution_categories = $solution_categories->toArray();
    } else {
        // Nếu không tìm thấy solution_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
        $solution_categories = [];
    }

    return view(
        'app.solution_categories.index', compact('solution_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::table('solution_categories')->insert($validated);

        $solution_categories = DB::table('solution_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($solution_categories) {
            // Chuyển thành mảng
            $solution_categories = $solution_categories->toArray();
        } else {
            // Nếu không tìm thấy solution_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $solution_categories = [];
        }

        return view('app.solution_categories.index', compact('solution_categories'))->with('success', 'Solution created successfully');
    }

    public function destroy($id)
    {
        // Sử dụng DB facade để xóa item theo ID
        DB::table('solution_categories')->where('id', $id)->delete();

        $solution_categories = DB::table('solution_categories')->get();
        // Kiểm tra nếu solution tồn tại
        if ($solution_categories) {
            // Chuyển thành mảng
            $solution_categories = $solution_categories->toArray();
        } else {
            // Nếu không tìm thấy solution_categories với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $solution_categories = [];
        }

        return view('app.solution_categories.index', compact('solution_categories'))->with('success', 'Item deleted successfully.');
    }
}
