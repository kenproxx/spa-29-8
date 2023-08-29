@extends('backend.layouts.master')
@section('title', 'Cấu hình Tiêu đề')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="tieu_de">Tiêu đề</label>
                        <input type="text" class="form-control" id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề" value="{{ $arrConfig['tieu_de'] ?? '' }}"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="mo_ta_web">Mô tả web</label>
                        <textarea cols="80" id="mo_ta_web" name="mo_ta_web" rows="10" data-sample="1" data-sample-short>{{ $arrConfig['mo_ta_web'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="script_code">Mã script</label>
                        <textarea cols="80" id="script_code" name="script_code" rows="10" data-sample="1" data-sample-short>{{ $arrConfig['script_code'] ?? '' }}</textarea>
                    </div>
                </div>
                 <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::TIEU_DE }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>
    <script src="../../dist/libs/ckeditor/ckeditor.js"></script>
    <script src="../../dist/libs/ckeditor/samples/js/sample.js"></script>
    <script data-sample="1">
        CKEDITOR.replace("mo_ta_web", {
            height: 150,
        });
        CKEDITOR.replace("script_code", {
            height: 150,
        });
    </script>
@endsection

