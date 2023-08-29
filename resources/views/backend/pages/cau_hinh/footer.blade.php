@extends('backend.layouts.master')
@section('title', 'Cấu hình Footer')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="validationDefault01">Thông tin</label>
                        <textarea cols="80" name="thong_tin" rows="10" data-sample="1" data-sample-short>{{ $arrConfig['thong_tin'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationDefault01">Mã script</label>
                        <textarea cols="80" name="script_code" rows="10" data-sample="1" data-sample-short>{{ $arrConfig['script_code'] ?? '' }}</textarea>
                    </div>
                </div>
                 <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::FOOTER }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>

    <script src="../../dist/libs/ckeditor/ckeditor.js"></script>
    <script src="../../dist/libs/ckeditor/samples/js/sample.js"></script>
    <script data-sample="1">
        CKEDITOR.replace("thong_tin", {
            height: 150,
        });
        CKEDITOR.replace("script_code", {
            height: 150,
        });
    </script>
@endsection

