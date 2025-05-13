<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;
use App\Models\Solution;
use App\Models\TechnologyCategory;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use App\Models\Technology;

class TechnologiesForCustomerController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Solution $contact): View
    {
        // Lấy dữ liệu của contact có id = 1
        $technology = Technology::where('id', Technology::min('id'))->first()->toArray();;
        // Kiểm tra nếu solution tồn tại
        $technologySubset = array_slice($technology, 6, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$technology) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('technology.show')->with('error', 'Bài viết không tồn tại');
        }
        // dd($technologySubset);

        $Solution = Solution::all();
        // Kiểm tra nếu Solution tồn tại
        if ($Solution) {
            // Chuyển thành mảng
            $Solution = $Solution->toArray();
        } else {
            // Nếu không tìm thấy Solution với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $Solution = [];
        }

        $contact = Contact::find(1);
        // Kiểm tra nếu contact tồn tại
        if ($contact) {
            // Chuyển thành mảng
            $contact = $contact->toArray();
        } else {
            // Nếu không tìm thấy contact với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $contact = [];
        }

        $TechnologyCategory = TechnologyCategory::all();
        // Kiểm tra nếu TechnologyCategory tồn tại
        if ($TechnologyCategory) {
            // Chuyển thành mảng
            $TechnologyCategory = $TechnologyCategory->toArray();
        } else {
            // Nếu không tìm thấy TechnologyCategory với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $TechnologyCategory = [];
        }

        $Banner = Banner::all();
        // Kiểm tra nếu Banner tồn tại
        if ($Banner) {
            // Chuyển thành mảng
            $Banner = $Banner->toArray();
        } else {
            // Nếu không tìm thấy Banner với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $Banner = [];
        }

        $Technology = Technology::all()->toArray();;
        // // Kiểm tra nếu solution tồn tại
        // $technologySubset = array_slice($Technology, 6, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$Technology) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('company.show')->with('error', 'Bài viết không tồn tại');
        }

        // Trả về view với dữ liệu
        return view('technology', compact('Technology','technology','Solution','technologySubset','contact','TechnologyCategory','Banner'));
    }
}
