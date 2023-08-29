<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CauHinhController extends Controller
{
    public function index($view)
    {
        $configs = Config::where('type', $view)->get(['id', 'name', 'value']);
        $arrConfig = [];
        foreach ($configs as $config) {
            $arrConfig[$config->name] = $config->value;
        }

        return view('backend.pages.cau_hinh.' . $view, compact('arrConfig'));
    }

    public function store(Request $request)
    {
        $type = $request->input('type');
        $user_id = Auth::user()->id;

        foreach ($request->except(['_token', 'type']) as $key => $value) {
            $isExitsKey = Config::where([['name', '=', $key], ['type', '=', $type]])->first();
            if ($isExitsKey) {
                $isExitsKey->value = $value;
                $isExitsKey->updated_by = $user_id;

                $isExitsKey->save();
            } else {
                $config = new Config();
                $config->name = $key;
                $config->value = $value;
                $config->type = $type;
                $config->created_by = $user_id;

                $config->save();
            }
        }
        return redirect()->back()->with('success', 'Sửa thành công');
    }

    public function saveLogoConfig(Request $request)
    {
        $type = $request->input('type');
        $user_id = Auth::user()->id;

        if ($request->file()) {

            foreach ($request->except(['_token', 'type']) as $key => $value) {

                if ($request->hasFile($key)) {
                    $file = $request->file($key);
                    $filePath = $file->store('config', 'public');
                }

                $isExitsKey = Config::where([['name', '=', $key], ['type', '=', $type]])->first();
                if ($isExitsKey) {
                    $isExitsKey->value = $filePath;
                    $isExitsKey->updated_by = $user_id;

                    $isExitsKey->save();
                } else {
                    $config = new Config();
                    $config->name = $key;
                    $config->value = $filePath;
                    $config->type = $type;
                    $config->created_by = $user_id;

                    $config->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Sửa thành công');
    }
}
