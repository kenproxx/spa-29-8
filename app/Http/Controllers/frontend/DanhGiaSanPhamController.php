<?php

namespace App\Http\Controllers\frontend;

use App\Enum\ProductFeedbackStatus;
use App\Http\Controllers\Controller;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhGiaSanPhamController extends Controller
{
    //Controller api create
    public function store(Request $request)
    {
        try {
            $feedback = new ProductFeedback();
            foreach ($request->except(['_token']) as $key => $value) {
                $feedback->{$key} = $value;
            }
            $feedback->user_id = Auth::user()->id;
            $feedback->status = ProductFeedbackStatus::PENDING;
            $success = $feedback->save();
            return $feedback;
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
