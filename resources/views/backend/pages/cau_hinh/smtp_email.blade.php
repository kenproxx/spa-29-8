@extends('backend.layouts.master')
@section('title', 'Cấu hình Email')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="MAIL_DRIVER">MAIL DRIVER</label>
                        <input type="text" class="form-control" id="MAIL_DRIVER" name="MAIL_DRIVER" value="{{ $arrConfig['MAIL_DRIVER'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="MAIL_HOST">MAIL HOST</label>
                        <input type="text" class="form-control" id="MAIL_HOST" name="MAIL_HOST" value="{{ $arrConfig['MAIL_HOST'] ?? '' }}"/>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="MAIL_PORT">MAIL PORT</label>
                        <input type="text" class="form-control" id="MAIL_PORT" name="MAIL_PORT" value="{{ $arrConfig['MAIL_PORT'] ?? '' }}"/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="MAIL_USERNAME">MAIL USERNAME</label>
                        <input type="text" class="form-control" id="MAIL_USERNAME" name="MAIL_USERNAME" value="{{ $arrConfig['MAIL_USERNAME'] ?? '' }}"/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="MAIL_PASSWORD">MAIL PASSWORD</label>
                        <input type="text" class="form-control" id="MAIL_PASSWORD" name="MAIL_PASSWORD" value="{{ $arrConfig['MAIL_PASSWORD'] ?? '' }}"/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="MAIL_ENCRYPTION">MAIL ENCRYPTION</label>
                        <input type="text" class="form-control" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" value="{{ $arrConfig['MAIL_ENCRYPTION'] ?? '' }}"/>
                    </div>
                </div>
                 <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::SMTP_EMAIL }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>

@endsection

