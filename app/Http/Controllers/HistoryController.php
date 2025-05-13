<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
            /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $history = DB::table('history')->get();

        return view('app.history.index', compact('history'));
    }

    public function create(Request $request)
    {
        $history = DB::table('history')->get();

        return view('app.history.create', compact('history'));
    }

    public function store(Request $request)
    {

        DB::table('history')->insert([
            'year' => $request->input('year'),  // Lấy dữ liệu từ request
            'description' => $request->input('description'),
        ]);

        // Chuyển hướng hoặc hiển thị thông báo thành công
        return redirect()->route('history.index')->with('success', 'Record created successfully!');

    }

    public function show($id)
    {
        $history = DB::table('history')->find($id);

        dd($history);
        // Kiểm tra nếu solution tồn tại
        return view('app.history.show', compact('history'));
    }

    public function edit($id)
    {
        $history = DB::table('history')->find($id); // Tìm bản ghi với id
        // dd($history);
        // Kiểm tra nếu solution tồn tại
        return view('app.history.edit', compact('history'));
    }

    public function update(Request $request, $id)
    {
        DB::table('history')
        ->where('id', $id)  // Điều kiện để cập nhật đúng bản ghi
        ->update([
            'year' => $request->input('year'),  // Lấy dữ liệu từ request
            'description' => $request->input('description'),
        ]);
    
        // Chuyển hướng hoặc hiển thị thông báo thành công
        return redirect()->route('history.index')->with('success', 'Record update successfully!');
    }

    public function destroy($id){
        DB::table('history')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }
}
