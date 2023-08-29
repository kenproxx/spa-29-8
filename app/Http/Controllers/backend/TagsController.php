<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listTag = Tags::all();
        return view('backend/pages/tags/index', compact('listTag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $id = $request->input('id');
            $name = $request->input('name');
            $user_id = Auth::user()->id;
            if ($id) {
                $tag = Tags::where('id', $id)->first();
                $tag->name = $name;
                $tag->updated_by = $user_id;
                $tag->save();
                return back()->with('success', 'Sửa thành công');
            } else {
                $tag = new Tags();
                $tag->created_by = $user_id;
                $tag->name = $name;
                $tag->save();
                return back()->with('success', 'Thêm mới thành công');
            }
        } catch (\Exception $exception) {

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tags::where('id', $id)->first(['name', 'id']);
        if ($tag) {
            return response()->json($tag);
        }
        return back()->with('error', 'Lỗi, thử lại');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tag = Tags::where('id', $id)->first();
            if ($tag) {
                $product = Product::where('tag_id', $id)->first();
                if ($product) {
                    return back()->with('error', 'Đang có sản phẩm sử dụng Tag này');
                }
                $tag->delete();
                return back()->with('success', 'Xóa thành công');
            }
            return back()->with('error', 'Lỗi, thử lại');
        } catch (\Exception $exception) {
            return back()->with('error', 'Lỗi, thử lại');
        }
    }
}
