@extends('backend.layouts.master')
@section('title', 'Sản phẩm')
@section('content')

    @include('backend.widgets.thong-bao')
    <a href="{{ route('backend.san-pham.create') }}">
    <button type="button" class="btn btn-primary mb-3">
        Thêm mới
    </button>
    </a>
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <div class="table-responsive border rounded">
                <table class="table align-middle text-nowrap mb-0">
                    <thead>
                    <tr>

                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Giá gốc - Giá khuyến mại</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listProduct as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($product->avatar)
                                        <img src="{{ asset( 'storage/' . $product->avatar ) }}" class="rounded-circle" alt="..." width="56" height="56">
                                    @else
                                        <img src="../../dist/images/products/s1.jpg" class="rounded-circle" alt="..." width="56" height="56">
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="fw-semibold mb-0 fs-4">{{ $product->title }}</h6>
{{--                                        <p class="mb-0">books</p>--}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0">{{ $product->created_at }}</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="bg-success p-1 rounded-circle"></span>
                                    <p class="mb-0 ms-2">{{ $product->status == 1 ? 'Kích hoạt' : 'Hủy kích hoạt'}}</p>
                                </div>
                            </td>
                            <td><h6 class="mb-0 fs-4">{{ $product->gia_goc }} - {{ $product->gia_khuyen_mai }}</h6></td>
                            <td><a class="fs-6 text-muted" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-dots-vertical"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex align-items-center justify-content-end py-1">
                    <p class="mb-0 fs-2">Rows per page:</p>
                    <select class="form-select w-auto ms-0 ms-sm-2 me-8 me-sm-4 py-1 pe-7 ps-2 border-0" aria-label="Default select example">
                        <option selected>5</option>
                        <option value="1">10</option>
                        <option value="2">25</option>
                    </select>
                    <p class="mb-0 fs-2">1–5 of 12</p>
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center mb-0 ms-8 ms-sm-9">
                            <li class="page-item p-1">
                                <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-left"></i></a>
                            </li>
                            <li class="page-item p-1">
                                <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


@endsection

