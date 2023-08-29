@extends('backend.layouts.master')
@section('title', 'Thẻ Tags')

@section('content')
    @include('backend.widgets.thong-bao')

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center  flex-row">
        <li class="nav-item ">
            <button data-bs-toggle="modal"
                    data-bs-target="#modal-tags"
                    class="btn btn-primary d-flex align-items-center px-3">
                <i class="ti ti-file me-0 me-md-1 fs-4"></i>Tạo Tags
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div id="note-full-container" class="note-has-grid row">
            @foreach($listTag as $tag)
                <div class="col-md-4 single-note-item all-category">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>{{ $tag->name }}</h5>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('backend.voucher.destroy', $tag->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="dropdown dropstart py-1 px-2 ms-auto">
                                        <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="ti ti-dots fs-5"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                   onclick="getById({{ $tag->id }})" data-bs-toggle="modal"
                                                   data-bs-target="#modal-tags"><i class="fs-4 ti ti-edit"></i>Sửa</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                   href="{{ route('backend.tags.destroy', $tag->id) }}">
                                                    <i class="fs-4 ti ti-trash"></i>Xóa</a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="modal-tags" tabindex="-1" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tạo mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('backend.tags.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Tên Tag</label>
                                <input type="text" class="form-control" name="name"
                                       id="name"
                                       placeholder="Nhập Tên Tag">
                            </div>
                        </div>
                    </div>
                    <input type="text" hidden id="id" name="id">
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
    async function getById(id) {
        $('#modalLabel').text('Chỉnh sửa');
        let url = '{{ route('backend.tags.show', ['id' => ':id']) }}'
        url = url.replace(':id', id);

        const response = await $.ajax({
            url: url,
            type: "GET"
        });

        if (response) {
            document.querySelector('#modal-tags #name').value = response.name;
            document.querySelector('#modal-tags #id').value = response.id;
        }
    }

    async function resetFormModal() {
        $('#modalLabel').text('Thêm mới');
        $('input[type="text"]').val('');
    }

    document.addEventListener("DOMContentLoaded", function () {
        const modalUser = document.getElementById('modal-tags');
        modalUser.addEventListener('hidden.bs.modal', function () {
            resetFormModal();
        });
    });

</script>
