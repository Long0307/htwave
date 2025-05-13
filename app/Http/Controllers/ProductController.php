<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
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

        // dd($TechnologyCategory);
        // Trả về view với dữ liệu
        return view('product', compact('contact','Solution',
        'TechnologyCategory','Banner'));
    }

}
