@extends('backend.layouts.master')
@section('title', 'Cấu hình VN PAY')
@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <form action="{{ route('backend.cau-hinh.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_Version">VNP_Version</label>
                        <input type="text" class="form-control" id="vnp_Version" name="vnp_Version" value="{{ $arrConfig['vnp_Version'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_Command">VNP_Command</label>
                        <input type="text" class="form-control" id="vnp_Command" name="vnp_Command" value="{{ $arrConfig['vnp_Command'] ?? '' }}"/>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_TmnCode">VNP_TmnCode</label>
                        <input type="text" class="form-control" id="vnp_TmnCode" name="vnp_TmnCode" value="{{ $arrConfig['vnp_TmnCode'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_Amount">VNP_Amount</label>
                        <input type="text" class="form-control" id="vnp_Amount" name="vnp_Amount" value="{{ $arrConfig['vnp_Amount'] ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_BankCode">VNP_BankCode</label>
                        <input type="text" class="form-control" id="vnp_BankCode" name="vnp_BankCode" value="{{ $arrConfig['vnp_BankCode'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_CreateDate">VNP_CreateDate</label>
                        <input type="text" class="form-control" id="vnp_CreateDate" name="vnp_CreateDate" value="{{ $arrConfig['vnp_CreateDate'] ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_CurrCode">VNP_CurrCode</label>
                        <input type="text" class="form-control" id="vnp_CurrCode" name="vnp_CurrCode" value="{{ $arrConfig['vnp_CurrCode'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_IpAddr">VNP_IpAddr</label>
                        <input type="text" class="form-control" id="vnp_IpAddr" name="vnp_IpAddr" value="{{ $arrConfig['vnp_IpAddr'] ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_Locale">VNP_Locale</label>
                        <input type="text" class="form-control" id="vnp_Locale" name="vnp_Locale" value="{{ $arrConfig['vnp_Locale'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_OrderInfo">VNP_OrderInfo</label>
                        <input type="text" class="form-control" id="vnp_OrderInfo" name="vnp_OrderInfo" value="{{ $arrConfig['vnp_OrderInfo'] ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_OrderType">VNP_OrderType</label>
                        <input type="text" class="form-control" id=vnp_OrderType" name="vnp_OrderType" value="{{ $arrConfig['vnp_OrderType'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_ReturnUrl">VNP_ReturnUrl</label>
                        <input type="text" class="form-control" id="vnp_ReturnUrl" name="vnp_ReturnUrl" value="{{ $arrConfig['vnp_ReturnUrl'] ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="vnp_TxnRef">VNP_TxnRef</label>
                        <input type="text" class="form-control" id="vnp_TxnRef" name="vnp_TxnRef" value="{{ $arrConfig['vnp_TxnRef'] ?? '' }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vnp_SecureHash">VNP_SecureHash</label>
                        <input type="text" class="form-control" id="vnp_SecureHash" name="vnp_SecureHash" value="{{ $arrConfig['vnp_SecureHash'] ?? '' }}"/>
                    </div>
                </div>

                 <input type="hidden" name="type" value="{{ \App\Enum\ConfigType::API_VNPAY }}">
                <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
                    Lưu
                </button>
            </form>
        </div>
    </div>
@endsection

