<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Contact;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Solution $solution, Contact $contact): View
    {
        // Lấy dữ liệu của contact có id = 1
        $solution = Solution::all();
        // Kiểm tra nếu solution tồn tại
        if ($solution) {
            // Chuyển thành mảng
            $solution = $solution->toArray();
        } else {
            // Nếu không tìm thấy solution với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $solution = [];
        }

        // Lấy dữ liệu của contact có id = 1
        $contact = Contact::all();
        // Kiểm tra nếu contact tồn tại
        if ($contact) {
            // Chuyển thành mảng
            $contact = $contact->toArray();
        } else {
            // Nếu không tìm thấy contact với id = 1, trả về mảng rỗng hoặc xử lý lỗi
            $contact = [];
        }

        // Trả về view với dữ liệu
        return view('welcome', compact('solution','contact'));
    }
}
