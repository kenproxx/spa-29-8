@extends('backend.layouts.master')
@section('title', 'Tạo sản phẩm')

@section('content')
    <form action="{{ route('backend.san-pham.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="notes-box">
                <div class="notes-content">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div>
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập Tên sản phẩm" name="title"/>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Chọn Spa</label>
                                    <select class="form-control" name="agency_id" id="agency_id" onchange="loadServiceFromAgency()">
                                        @foreach($listSpa as $spa)
                                            <option value="{{ $spa->id }}">
                                                {{ $spa->ten_quan_ly }} - {{ $spa->ten_co_so }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Chọn Dịch vụ thêm</label>
                                    <select class="form-control" name="service_id[]" id="service_id">
                                        <option value="">Chưa có dịch vụ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Chọn thẻ Tag</label>
                                    <select class="form-control" name="tag_id" id="tag_id">
                                        <option value="">Không có tag</option>
                                        @foreach($listTag as $tag)
                                            <option value="{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Chọn Sticker</label>
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                         <a id="lfm" data-input="sticker" data-preview="holder" class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Choose
                                         </a>
                                       </span>
                                        <input id="sticker" class="form-control" type="text" name="sticker">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        <label>Giá gốc</label>
                                        <input type="number" min="0" class="form-control" name="gia_goc"
                                               placeholder="Nhập Giá gốc"/>
                                    </div>
                                    <div class="col-6">
                                        <label>Giá khuyến mãi</label>
                                        <input type="number" min="0" class="form-control" name="gia_khuyen_mai"
                                               placeholder="Nhập Giá khuyến mại"/>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label>Mô tả ngắn</label>
                                <textarea cols="80" name="mo_ta_ngan" rows="10" data-sample="1" data-sample-short></textarea>
                            </div>
                            <div>
                                <label>Mô tả chi tiết</label>
                                <textarea cols="80" name="mo_ta_chi_tiet" rows="10" data-sample="1" data-sample-short></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> <label>Ảnh Thumbnail</label>
                                    <input type="file" class="form-control" accept="image/*" name="avatar"/></div>
                                <div class="col-md-6"> <label>Ảnh Gallery</label>
                                    <input type="file" multiple name="gallery[]" accept="image/*" class="form-control"/></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Sản phẩm bán chạy</label>
                                    <input type="checkbox" class="form-check-input"
                                           placeholder="Nhập Số lượng" name="ban_chay"/>
                                </div>
                                <div class="col-sm-3">
                                    <label>Sản phẩm thịnh hành</label>
                                    <input type="checkbox" class="form-check-input"
                                           placeholder="Nhập Số lượng" name="thinh_hanh"/>
                                </div>
                                <div class="col-sm-3">
                                    <label>Sản phẩm HOT</label>
                                    <input type="checkbox" class="form-check-input"
                                           placeholder="Nhập Số lượng" name="hot"/>
                                </div>
                                <div class="col-sm-3">
                                    <label>Sản phẩm Flashsale</label>
                                    <input type="checkbox" class="form-check-input"
                                           placeholder="Nhập Số lượng" name="flash_sale"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="../../dist/libs/ckeditor/ckeditor.js"></script>
    <script src="../../dist/libs/ckeditor/samples/js/sample.js"></script>
    <script data-sample="1">
        CKEDITOR.replace("mo_ta_ngan", {
            height: 150,
        });
        CKEDITOR.replace("mo_ta_chi_tiet", {
            height: 150,
        });
    </script>
    <script>
        $('#lfm').filemanager('image');

    </script>

@endsection
<script>
    let serviceSelect;
    let agencySelect;
    document.addEventListener("DOMContentLoaded", function() {
        loadServiceFromAgency();
    });

    function loadServiceFromAgency() {
         serviceSelect = document.getElementById('service_id');
         agencySelect = document.getElementById('agency_id');
        const selectedAgencyId = agencySelect.value;

        serviceSelect.innerHTML = '';

        let url = '{{ route('backend.dich-vu-them.get-by-agency', ['id' => ':id']) }}'
        url = url.replace(':id', selectedAgencyId);

        fetch(url)
            .then(response => response.json())
            .then(data => {
                renderHTMLForMoreService(data)
            })
            .catch(error => {
                alert('Lỗi server, xin thử lại');
            });
    }

    function renderHTMLForMoreService(data) {

        if (0 !== data.length) {
            data.forEach(service => {
                const option = document.createElement('option');
                option.value = service.id;
                option.textContent = service.service_name;
                serviceSelect.appendChild(option);
            });
        } else {
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Chưa có dịch vụ';
            serviceSelect.appendChild(option);
        }
    }
</script>
<script>
    const checkboxes = document.querySelectorAll('.form-check-input');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            checkbox.value = checkbox.checked ? '1' : '0';
            console.log(checkbox.value)
        });
    });
</script>



