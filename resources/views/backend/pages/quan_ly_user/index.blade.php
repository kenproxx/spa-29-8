@extends('backend.layouts.master')
@section('title', 'Người dùng')

<?php
$checkRole = \Illuminate\Support\Facades\Auth::user()->role_id
?>

<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        padding-right: 30px;
    }
</style>

@section('content')

    @include('backend.widgets.thong-bao')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom justify-content-between d-flex">
            <h5 class="card-title fw-semibold mb-0 lh-sm d-inline-block">Quản lý người dùng</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-user">
                Thêm mới
            </button>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th><h6 class="fs-4 fw-semibold mb-0">Họ và tên</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Số điện thoại</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Email</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Kakao</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Trạng thái</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Loại User</h6></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listUser as $user)
                            <?php $isDeleted = $user->status == \App\Enum\UserStatus::INACTIVE ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle"
                                             width="40"
                                             height="40"/>
                                    @else
                                        <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle"
                                             width="40"
                                             height="40"/>
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $user->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td><p class="mb-0 fw-normal">{{ $user->number_phone }}</p></td>
                            <td>
                                <p class="mb-0 fw-normal">{{ $user->email }}</p>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal">{{ $user->kakao_talk_id }}</p>
                            </td>
                            @php
                                $trang_thai = '';
                                    switch ($user->status){
                                        case \App\Enum\UserStatus::ACTIVE:
                                            $trang_thai = 'Kích hoạt';
                                        break;
                                        case \App\Enum\UserStatus::INACTIVE:
                                            $trang_thai = 'Đang khóa';
                                        break;
                                        case \App\Enum\UserStatus::DELETED:
                                            $trang_thai = 'Đã xóa';
                                        break;
                                    };
                                $role_str = '';
                                    switch ($user->role_id){
                                          case \App\Enum\UserRole::SUPER_ADMIN:
                                            $role_str = 'SUPER_ADMIN';
                                            break;
                                          case \App\Enum\UserRole::ADMIN:
                                            $role_str = 'ADMIN';
                                            break;
                                          case \App\Enum\UserRole::GUEST:
                                            $role_str = 'GUEST';
                                            break;
                                    }

                            @endphp
                            <td>
                                <p class="mb-0 fw-normal">{{ $trang_thai }}</p>
                            </td>
                            <td>
                           <span
                               class="badge <?php echo $isDeleted ? 'bg-light-danger'
                                    : ($user->role_id == '1' ? 'bg-light-primary'
                                    : ($user->role_id == '2' ? 'bg-light-secondary'
                                    : 'bg-light-danger')) ?>
                                 rounded-3 py-8 text-primary fw-semibold fs-2">
                                {{ $role_str }}
                           </span>
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="ti ti-dots-vertical fs-6"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li data-bs-toggle="modal" data-bs-target="#modal-user"
                                            onclick="editUser({{ $user->id }})">
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i
                                                    class="fs-4 ti ti-edit"></i>Sửa</a>
                                        </li>
                                        @if($checkRole == \App\Enum\UserRole::SUPER_ADMIN)
                                            @if($isDeleted)
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                       href="{{ route('backend.nguoi-dung.destroy', $user->id) }}"><i
                                                            class="fs-4 ti ti-trash"></i>Mở khóa</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                       href="{{ route('backend.nguoi-dung.destroy', $user->id) }}"><i
                                                            class="fs-4 ti ti-trash"></i>Khóa</a>
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-user" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tạo mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" action="{{ route('backend.nguoi-dung.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="note-title">
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" required
                                   placeholder="Nhập Họ và tên"/>
                        </div>
                        <div class="note-title">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" required
                                   placeholder="Nhập Email"/>
                        </div>
                        <div class="note-title">
                            <label id="labelPassword">Mật khẩu</label>
                            <input id="password" type="password" class="form-control" minlength="8" name="password"
                                   required>
                            <span class="fa fa-fw fa-eye field-icon toggle-password" id="eyeIcon"
                                  onclick="showPassword()"></span>
                        </div>
                        <div class="note-title">
                            <label>Số điện thoại</label>
                            <input type="tel" class="form-control" name="number_phone" id="number_phone"
                                   placeholder="Nhập Số điện thoại" required pattern="^(0\d{9,10})$"/>
                        </div>
                        <div class="note-title">
                            <label>Zalo</label>
                            <input type="tel" class="form-control" name="zalo_id" id="zalo_id" pattern="^(0\d{9,10})$"
                                   placeholder="Nhập Zalo"/>
                        </div>
                        <div class="note-title">
                            <label>Kakao</label>
                            <input type="text" class="form-control" name="kakao_talk_id" id="kakao_talk_id"
                                   placeholder="Nhập Kakao"/>
                        </div>
                        <div class="note-title">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address"
                                   placeholder="Nhập Địa chỉ"/>
                        </div>
                        <div class="row">
                            <div class="note-title col-sm-6">
                                <label>Phân quyền</label>
                                <select class="form-select" aria-label="Default select example" name="role_id"
                                        id="role_id">
                                    @foreach($listRole as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="note-title col-sm-6">
                                <label>Quản lý spa</label>
                                <select class="form-select" aria-label="Default select example" name="spa_id"
                                        id="spa_id">
                                    <option value="0">Không quản lý</option>
                                    @foreach($listSpa as $spa)
                                        <option value="{{ $spa->id }}">{{ $spa->ten_co_so ?? '' }}
                                            - {{ $spa->nganh_nghe ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="note-title">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="avatar" accept="image/*"
                                   placeholder="Title"/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>

    let isFormAdd = true
    let agency;

    async function editUser(id) {
        $('#modalLabel').text('Chỉnh sửa');
        let url = '{{ route('backend.nguoi-dung.show', ['id' => ':id']) }}'
        url = url.replace(':id', id);

        const response = await $.ajax({
            url: url,
            type: "GET"
        });

        agency = await getAgencyByUserId(id);
        await importDataToModal(response, id);
    }

    function getAgencyByUserId(id) {
        let url = '{{ route('backend.dai-ly.get-by-user-id', ['id' => ':id']) }}'
        url = url.replace(':id', id);
        return $.ajax({
            url: url,
            type: "GET"
        });
    }

    function getListAgency() {
        let url = '{{ route('backend.dai-ly.get-list-agency') }}'
        return $.ajax({
            url: url,
            type: "GET"
        });
    }

    function importDataToModal(data, id) {

        let isExistZalo = false

        if (data.zalo_id) {
            isExistZalo = true;
        }

        $('#name').val(data.name);
        $('#email').val(data.email).prop('disabled', true);
        $('#password').val('').prop('required', false);
        $('#number_phone').val(data.number_phone);
        $('#zalo_id').val(data.zalo_id).prop('disabled', isExistZalo);
        $('#kakao_talk_id').val(data.kakao_talk_id);
        $('#address').val(data.address);
        $('#role_id').val(data.role_id);

        const spaSelect = document.getElementById('spa_id');
        spaSelect.innerHTML = '';

        const defaultOption = new Option('Không quản lý', 0);
        spaSelect.appendChild(defaultOption);

        for (const obj of agency) {
            const optionElement = new Option(`${obj.ten_co_so} - ${obj.nganh_nghe}`, obj.id);
            spaSelect.appendChild(optionElement);
        }


        let url = '{{ route('backend.nguoi-dung.update', ['id' => ':id']) }}';
        url = url.replace(':id', id);
        document.getElementById('form').action = url;
        isFormAdd = false;
    }


    async function resetFormModal() {
        $('#modalLabel').text('Thêm mới');
        $('input[type="text"]').val('').prop('disabled', false);
        $('input[type="password"]').val('').prop('required', true);
        $('input[type="email"]').val('').prop('disabled', false);
        $('#labelPassword');
        $('input[type="number"]').val('');
        $('input[type="tel"]').val('').prop('disabled', false);
        $('select').prop('selectedIndex', 0);
        $('input[type="file"]').val('');

        const spaSelect = document.getElementById('spa_id');
        spaSelect.innerHTML = '';

        const defaultOption = new Option('Không quản lý', 0);
        spaSelect.appendChild(defaultOption);

        for (const obj of listAgency) {
            const optionElement = new Option(`${obj.ten_co_so} - ${obj.nganh_nghe}`, obj.id);
            spaSelect.appendChild(optionElement);
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const modalUser = document.getElementById('modal-user');
        modalUser.addEventListener('hidden.bs.modal', function () {
            resetFormModal();
        });
    });


    function showPassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }

</script>
