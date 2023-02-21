<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDanhMucRequest;
use App\Http\Requests\UpdateDanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DanhMuc::get();
        return view('AdminRocker.page.DanhMuc.index',compact('data'));
    }
    public function store(Request $request)
    {
         DanhMuc::create([
             'ten_danh_muc'    => $request->ten_danh_muc,
             'slug_danh_muc'   => $request->slug_danh_muc,
             'is_open'           => $request->is_open,
         ]);
         return redirect('/admin/danh-muc/index');
         toastr()->success('Đã thành công');
    }
    public function getData()
    {
        $data = DanhMuc::get();
        return response()->json([
            'list'  => $data
        ]);
    }
 }
