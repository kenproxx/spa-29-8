@extends('backend.layouts.master')
@section('title', 'Sản phẩm')
@section('content')

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <div class="table-responsive rounded-2">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                    <tr>
                        <th><h6 class="fs-4 fw-semibold mb-0">Tên cơ sở</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Ngành nghề</h6></th>
                        <th><h6 class="fs-4 fw-semibold mb-0">Địa chỉ</h6></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listDaiLy as $daiLy)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $daiLy->avatar ? $daiLy->avatar : '../../dist/images/blog/blog-img1.jpg'?>" class="rounded-2" width="42" height="42" />
                                    <div class="ms-3">
                                        <h6 class="fw-semibold mb-1">{{ $daiLy->ten_co_so }}</h6>
                                        <span class="fw-normal">{{ $daiLy->ten_quan_ly }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-light-danger text-danger rounded-3 fw-semibold fs-2">{{ $daiLy->nganh_nghe }}</span>
                                </div>
                            </td>
                            <td><p class="mb-0 fw-normal">{{ $daiLy->address }}</p></td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots fs-5"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-plus"></i>Add</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-trash"></i>Delete</a>
                                        </li>
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
@endsection

