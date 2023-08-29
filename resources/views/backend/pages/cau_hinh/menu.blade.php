@extends('backend.layouts.master')
@section('title', 'Cấu hình Menu')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Menu 1</label>
                        <input type="text" class="form-control" id="validationDefault01" name="123"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Menu 2</label>
                        <input type="text" class="form-control" id="validationDefault02" name="123"/>
                    </div>
                </div>
                <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::MENU }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>

@endsection

