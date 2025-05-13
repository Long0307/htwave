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

class CompanyForCustomerController extends Controller
{
    public function index(Request $request, Contact $contact, 
    TechnologyCategory $technologyCategory,
    Solution $Solution): View
    {
        $contact = Contact::find(1);
        // Kiểm tra nếu contact tồn tại
        if ($contact) {
            // Chuyển thành mảng
            $contact = $contact->toArray();
        } else {
            // Nếu không tìm thấy contact với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $contact = [];
        }

        $Solution = Solution::all();
        // Kiểm tra nếu Solution tồn tại
        if ($Solution) {
            // Chuyển thành mảng
            $Solution = $Solution->toArray();
        } else {
            // Nếu không tìm thấy Solution với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $Solution = [];
        }

        // dd($Solution);

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
        // Kiểm tra nếu solution tồn tại
        $technologySubset = array_slice($Technology, 6, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$Technology) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('company.show')->with('error', 'Bài viết không tồn tại');
        }

        
        $history = DB::table('history')->get();
        // Kiểm tra nếu Banner tồn tại
        if ($history) {
            // Chuyển thành mảng
            $history = $history->toArray();
        } else {
            // Nếu không tìm thấy history với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $history = [];
        }

        $awards_and_certifications = DB::table('awards_and_certifications')->get();
        // Kiểm tra nếu Banner tồn tại
        if ($awards_and_certifications) {
            // Chuyển thành mảng
            $awards_and_certifications = $awards_and_certifications->toArray();
        } else {
            // Nếu không tìm thấy awards_and_certifications với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $awards_and_certifications = [];
        }

        $technology_statuses = DB::table('technology_statuses')->get();
        // Kiểm tra nếu Banner tồn tại
        if ($technology_statuses) {
            // Chuyển thành mảng
            $technology_statuses = $technology_statuses->toArray();
        } else {
            // Nếu không tìm thấy technology_statuses với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $technology_statuses = [];
        }

        $bannerintro = DB::table('bannerintro')->get();
        // Kiểm tra nếu Banner tồn tại
        if ($bannerintro) {
            // Chuyển thành mảng
            $bannerintro = $bannerintro->toArray();
            // dd($bannerintro);
        } else {
            // Nếu không tìm thấy bannerintro với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $bannerintro = [];
        }

        return view('company', compact('bannerintro','technology_statuses','awards_and_certifications','history','Technology','contact','Solution',
        'TechnologyCategory','Banner'));
    }
}
