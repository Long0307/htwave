<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BannerInfoController extends Controller
{
    public function index(Request $request)
    {
        $bannerintro = DB::table('bannerintro')->get();

        return view('app.bannerintro.index', compact('bannerintro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('app.bannerintro.create');
    }

    public function store(Request $request)
    {
 
        $validated = $request->all();

        if ($request->hasFile('images')) {
            $validated['images'] = $request->file('images')->store('public');

            $fileName1 = basename($validated['images']);

            $request->file('images')->move(public_path('storage'), $fileName1);

            DB::table('bannerintro')->insert([
                'slogan' => $request->input('slogan'),  // Lấy dữ liệu từ request
                'images' => "storage/".$fileName1,
            ]);
        }

        return redirect()->route('bannerintro.index')->with('success', 'Record created successfully!');
    }

    public function edit($id)
    {
        $bannerintro = DB::table('bannerintro')->find($id); // Tìm bản ghi với id
        return view('app.bannerintro.edit', compact('bannerintro'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->all();

        if ($request->hasFile('images')) {
            $validated['images'] = $request->file('images')->store('public');

            $fileName1 = basename($validated['images']);

            $request->file('images')->move(public_path('storage'), $fileName1);

            DB::table('bannerintro')
            ->where('id', $id)  // Điều kiện để cập nhật đúng bản ghi
            ->update([
                'slogan' => $request->input('slogan'),  // Lấy dữ liệu từ request
                'images' => "storage/".$fileName1,
            ]);
        
        }
    
        // Chuyển hướng hoặc hiển thị thông báo thành công
        return redirect()->route('bannerintro.index')->with('success', 'Record update successfully!');
    }

    public function destroy($id){
        DB::table('bannerintro')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }
}
