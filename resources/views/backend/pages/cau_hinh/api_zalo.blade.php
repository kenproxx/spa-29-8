@extends('backend.layouts.master')
@section('title', 'Cấu hình Zalo')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $arrConfig['url'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="method">Method</label>
                        <input type="text" class="form-control" id="method" name="method" value="{{ $arrConfig['method'] ?? '' }}"/>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="params">Params</label>
                        <input type="text" class="form-control" id="params" name="params" value="{{ $arrConfig['params'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="body">Body</label>
                        <input type="text" class="form-control" id="body" name="body" value="{{ $arrConfig['body'] ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="headers">Headers</label>
                        <input type="text" class="form-control" id="headers" name="headers" value="{{ $arrConfig['headers'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="files">Files</label>
                        <input type="text" class="form-control" id="files" name="files" value="{{ $arrConfig['files'] ?? '' }}"/>
                    </div>
                </div>



                 <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::API_ZALO }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>

@endsection

