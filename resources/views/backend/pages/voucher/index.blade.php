@extends('backend.layouts.master')
@section('title', 'Mã giảm giá')

@php
    $cssClasses = ['note-important', 'note-social', 'note-business'];
    $classIndex = 0;
@endphp

@section('content')
    @include('backend.widgets.thong-bao')

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
        <li class="nav-item">
            <a href="javascript:void(0)" class="
                      nav-link

                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      active
                      px-3 px-md-3
                      me-0 me-md-2 text-body-color
                    " id="all-category">
                <i class="ti ti-list fill-white me-0 me-md-1"></i>
                <span class="d-none d-md-block font-weight-medium">Tất cả</span>
            </a>
        </li>
        <li class="nav-item ms-auto">
            <a href="javascript:void(0)" class="btn btn-primary d-flex align-items-center px-3" id="add-notes">
                <i class="ti ti-file me-0 me-md-1 fs-4"></i>
                <span class="d-none d-md-block font-weight-medium fs-3">Tạo mã</span>
            </a>

        </li>
    </ul>
    <div class="tab-content">
        <div id="note-full-container" class="note-has-grid row">
            @foreach($listVoucher as $voucher)
                <div class="col-md-4 single-note-item all-category {{ $cssClasses[$classIndex] }}">
                    <div class="card card-body">
                        <span class="side-stick"></span>
                        <h5 class="note-title text-truncate w-75 mb-0"
                            data-noteHeading="Book a Ticket for Movie">{{ $voucher->name }}</h5>
                        <p class="note-date fs-2">{{ $voucher->begin_time }} | {{ $voucher->end_time }}</p>
                        <div class="note-content">
                            <p class="note-inner-content"
                               data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                Giá áp dụng tối thiểu: {{ $voucher->gia_ap_dung_toi_thieu ?? '0' }}
                                <br>
                                Phần trăm giảm: {{ $voucher->phan_tram_giam ?? '0%' }}
                                <br>
                                Giá giảm tối thiểu:{{ $voucher->gia_giam_toi_thieu ?? '0' }}
                                <br>
                                Giá giảm tối đa: {{ $voucher->gia_giam_toi_da ?? '0' }}
                                <br>
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('backend.voucher.destroy', $voucher->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"><i
                                        class="ti ti-trash fs-4 "></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @php
                    $classIndex = ($classIndex + 1) % count($cssClasses);
                @endphp
            @endforeach
        </div>
    </div>
    <!-- Modal Add notes -->
    <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title text-white">Thêm Mã giảm giá</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.voucher.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                            <label>Tên mã</label>
                                            <input type="text" class="form-control" placeholder="Nhập Tên mã" required
                                                   name="name"/>
                                        </div>
                                        <div class="note-title">
                                            <label>CODE</label>
                                            <div class="row">
                                                <div class="col-9">
                                                    <input type="text" class="form-control" id="code" required
                                                           minlength="7" maxlength="10"
                                                           name="code">
                                                </div>
                                                <div class="col-3">
                                                    <input type="button" class="btn btn-primary form-control"
                                                           onclick="generateRandomCode()"
                                                           value="Gen Code"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Bắt đầu</label>
                                                <input type="datetime-local" class="form-control" name="begin_time"
                                                       id="begin_time" required/>
                                            </div>
                                            <div class="col-6">
                                                <label>Kết thúc</label>
                                                <input type="datetime-local" class="form-control" name="end_time"
                                                       id="end_time" required/>
                                            </div>
                                        </div>
                                        <div>
                                            <label>Giá trị áp dụng tối thểu</label>
                                            <input type="number" min="0" value="0" class="form-control"
                                                   name="gia_ap_dung_toi_thieu"/>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Phần trăm giảm</label>
                                                <input type="number" min="0" max="100" value="0" class="form-control"
                                                       name="phan_tram_giam"/>
                                            </div>
                                            <div class="col-6">
                                                <label>Giảm tối đa</label>
                                                <input type="number" min="0" value="0" class="form-control"
                                                       name="gia_giam_toi_da"/>
                                            </div>
                                        </div>
                                        <div class="note-title">
                                            <div class="row">
                                                <div class="col-sm-6"><label>Áp dụng cho đại lý</label>
                                                    <select class="form-select agency" name="product_id">
                                                        <option value="0">Tất cả đại lý</option>
                                                        @foreach($listAgency as $agency)
                                                            <option value="{{ $agency->id }}">{{ $agency->ten_quan_ly }}
                                                                - {{ $agency->ten_co_so }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6"><label>Áp dụng cho sản phẩm</label>
                                                    <select class="form-select product" name="product_id">
                                                        <option value="0">Tất cả sản phẩm</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="note-title">
                                            <label>Số lượng</label>
                                            <input type="number" min="1" value="1" class="form-control" name="quantity"
                                                   required
                                                   placeholder="Nhập Số lượng"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../dist/js/apps/notes.js"></script>

@endsection

<script>

    function generateRandomCode() {
        const length = 10;
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        let randomCode = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            randomCode += characters.charAt(randomIndex);
        }
        document.getElementById('code').value = randomCode;
    }

    function upToCaseCode(input) {
        const cleanedValue = removeVietnameseDiacritics(input.value);
        input.value = cleanedValue.toUpperCase()
    }

    function removeVietnameseDiacritics(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    function confirmDelete() {
        return confirm("Bạn muốn xóa Voucher này không");
    }

    // chưa bắt lỗi ngaày kết thúc < ngày băt đầu
    const beginTimeInput = document.getElementById('begin_time');
    const endTimeInput = document.getElementById('end_time');

    endTimeInput.addEventListener('change', function () {
        const beginTime = new Date(beginTimeInput.value);
        const endTime = new Date(endTimeInput.value);
        console.log(beginTime)
        if (endTime <= beginTime) {
            endTimeInput.setCustomValidity('Kết thúc phải sau thời gian bắt đầu.');
        } else {
            endTimeInput.setCustomValidity('');
        }
    });
</script>
