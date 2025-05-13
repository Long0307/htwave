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

class HomeForCustomerController extends Controller
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

        $Technology = Technology::all()->toArray();;
        // Kiểm tra nếu solution tồn tại
        $technologySubset = array_slice($Technology, 6, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$Technology) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('company.show')->with('error', 'Bài viết không tồn tại');
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

        // dd($TechnologyCategory);
        // Trả về view với dữ liệu
        return view('welcome', compact('Technology','contact','Solution',
        'TechnologyCategory','Banner'));
    }

    public function show($id)
    {
        // Lấy bài viết theo id
        $solution = Solution::find($id)->toArray();

        // dd($solution);

        $solutionSubset = array_slice($solution, 7, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy
        // $solutionSubset = array_slice($solution, 6, 20);
        // Kiểm tra nếu không tìm thấy bài viết
        if (!$solution) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('solution.show')->with('error', 'Bài viết không tồn tại');
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
        
        $Solution = Solution::all();
        // Kiểm tra nếu Solution tồn tại
        if ($Solution) {
            // Chuyển thành mảng
            $Solution = $Solution->toArray();
        } else {
            // Nếu không tìm thấy Solution với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $Solution = [];
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
        // Kiểm tra nếu solution tồn tại
        $technologySubset = array_slice($Technology, 6, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$Technology) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('company.show')->with('error', 'Bài viết không tồn tại');
        }

        // dd($solution);
        // Trả về view chi tiết bài viết
        return view('solution', compact('Technology','solution','Solution','solutionSubset','contact','TechnologyCategory','Banner'));
    }

    public function showTechnology($id)
    {
        // Lấy dữ liệu của contact có id = 1
        $technology = Technology::find($id)->toArray();
        // Kiểm tra nếu solution tồn tại
        $technologySubset = array_slice($technology, 6, 20); // 5 là chỉ số bắt đầu, 21 là số cột cần lấy

        // Kiểm tra nếu không tìm thấy bài viết
        if (!$technology) {
            // Redirect hoặc trả về trang lỗi
            return redirect()->route('solution.show')->with('error', 'Bài viết không tồn tại');
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

        // For menu
        $Technology = Technology::all()->toArray();
        // Kiểm tra nếu solution tồn tại

        //    // Trả về view với dữ liệu
        return view('technology', compact('Technology','technology','Solution','technologySubset','contact','TechnologyCategory','Banner'));
    }
}
