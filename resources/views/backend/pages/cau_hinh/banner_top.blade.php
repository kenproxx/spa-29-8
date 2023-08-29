@extends('backend.layouts.master')
@section('title', 'Cấu hình Banner')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Video banner</label>
                        <input type="file" class="form-control" id="validationDefault01" name="video_banner"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Ảnh banner</label>
                        <input type="file" class="form-control" id="validationDefault02" name="image_banner"/>
                    </div>

                </div>
                 <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::BANNER_TOP }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>

@endsection

