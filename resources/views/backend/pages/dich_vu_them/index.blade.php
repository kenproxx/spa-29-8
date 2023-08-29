@extends('backend.layouts.master')
@section('title', 'Dịch vụ thêm')
@section('content')
   @include('backend.widgets.thong-bao')
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-more_service">
        Tạo mới
    </button>
    <div class="row">
        @foreach($listService as $service)
            <div class=" col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                        <img src="../../dist/images/blog/blog-img6.jpg" alt="" class="rounded-circle" width="40"
                             height="40">
                        <div>
                            <h5 class="fw-semibold mb-0">{{ $service->service_name }}</h5>
                            <?php
                                $daiLyIn4 = \App\Models\Agency::where('id', $service->agencys_id)->first(['ten_co_so', 'ten_quan_ly'])
                                ?>
                            <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>{{ $daiLyIn4->ten_quan_ly }} - {{ $daiLyIn4->ten_co_so }}</span>
                        </div>
                        <div class="dropdown dropstart py-1 px-2 ms-auto">
                            <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots fs-5"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                       onclick="showInfoService({{ $service->id }})" data-bs-toggle="modal"
                                       data-bs-target="#modal-more_service"><i class="fs-4 ti ti-edit"></i>Sửa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                       href="{{ route('backend.dich-vu-them.destroy', $service->id) }}">
                                        <i class="fs-4 ti ti-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="modal-more_service" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dịch vụ thêm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.dich-vu-them.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="notes-box">
                                <div class="notes-content">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="note-title">
                                                <div class="note-title">
                                                    <label>Tên dịch vụ</label>
                                                    <input type="text" class="form-control" name="service_name" id="service_name"
                                                           placeholder="Nhập Tên dịch vụ">
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label>Giá gốc</label>
                                                        <input type="number" class="form-control" name="gia_goc" id="gia_goc"
                                                               placeholder="Nhập Giá gốc"/>
                                                    </div>
                                                    <div class="col-6">
                                                        <label>Giá khuyến mãi</label>
                                                        <input type="number" class="form-control" name="gia_khuyen_mai" id="gia_khuyen_mai"
                                                               placeholder="Nhập Giá khuyến mãi"/>
                                                    </div>

                                                </div>
                                                <div class="note-title">
                                                    <label>Chọn Spa áp dụng</label>
                                                    <select
                                                        class="select2 form-control"
                                                        style="width: 100%; height: 36px" name="agencys_id" id="agencys_id"
                                                    >
                                                        @foreach($listDaiLy as $daiLy)
                                                            <option value="{{ $daiLy->id }}">{{ $daiLy->ten_quan_ly }} - {{ $daiLy->ten_co_so }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <script>

       function showInfoService(id) {
           let url = '{{ route('backend.dich-vu-them.show.id', ['id' => ':id']) }}'
           url = url.replace(':id', id);

           fetch(url)
               .then(response => response.json())
               .then(data => {
                   importDataToModal(data)
               })
               .catch(error => {
                   alert('Lỗi server, xin thử lại');
               });
       }

       let arrKeyId = [];

       function importDataToModal(data) {
           for (var key in data) {
               if (data.hasOwnProperty(key)) {
                   var value = data[key];
                   arrKeyId.push(key);
                   $('#' + key).val(value);
               }
           }
       }

       function resetFormModal() {
           arrKeyId.forEach(function (id) {
               $('#' + id).val('');
           });
       }

       document.addEventListener("DOMContentLoaded", function () {
           const modalUser = document.getElementById('modal-more_service');
           modalUser.addEventListener('hidden.bs.modal', function () {
               resetFormModal();
           });
       });

   </script>
@endsection


