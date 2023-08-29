<?php

namespace App\Http\Controllers\backend;

use App\Enum\ProductFeedbackStatus;
use App\Http\Controllers\Controller;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;

class DanhGiaSanPhamController extends Controller
{
    public function index()
    {
        $feedbacks = ProductFeedback::where('status', '!=', ProductFeedbackStatus::DELETED)->get();
        return view('backend.pages.danh_gia_san_pham.index', compact('feedbacks'));
    }

    public function detail($id)
    {
        $feedback = ProductFeedback::find($id);
        if (!$feedback || $feedback->status == ProductFeedbackStatus::DELETED) {
            return back();
        }
        $statusList = [ProductFeedbackStatus::APPROVED, ProductFeedbackStatus::PENDING, ProductFeedbackStatus::REFUSE];
        return view('backend.pages.danh_gia_san_pham.detail', compact('feedback', 'statusList'));
    }

    public function update(Request $request, $id)
    {
        try {
            $feedback = ProductFeedback::find($id);
            if (!$feedback || $feedback->status == ProductFeedbackStatus::DELETED) {
                return back();
            }
            $feedback->status = $request->input('status');
            $feedback->save();
            return redirect(route('backend.danh-gia-san-pham.show'));
        } catch (\Exception $exception) {
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $feedback = ProductFeedback::find($id);
            if (!$feedback || $feedback->status == ProductFeedbackStatus::DELETED) {
                return back();
            }
            $feedback->status = ProductFeedbackStatus::DELETED;
            $feedback->save();
            return redirect(route('backend.danh-gia-san-pham.show'));
        } catch (\Exception $exception) {
            return back();
        }
    }
}
