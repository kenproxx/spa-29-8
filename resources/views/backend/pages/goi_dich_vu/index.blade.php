@extends('backend.layouts.master')
@section('title', 'Goi dich vu')

@section('content')
    @include('backend.widgets.thong-bao')
    <a href="{{ route('backend.goi-dich-vu.create') }}">
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
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </th>
                        <th scope="col">Tên gói dịch vụ</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá hiện tại</th>
                        <th scope="col">Giá cũng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$productServices->isEmpty())
                        @foreach($productServices as $item)
                            <tr>
                                <td>
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../../dist/images/products/s1.jpg" class="rounded-circle" alt="..."
                                             width="56" height="56">
                                        <div class="ms-3">
                                            <h6 class="fw-semibold mb-0 fs-4">{{ $item->name }}</h6>
                                            <p class="mb-0">books</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0">{{ $item->time }}p</p>
                                </td>
                                <td>
                                    @php
                                        $product = \App\Models\Product::where('id', $item->product_id)->first();
                                    @endphp
                                    <p class="mb-0">{{ $product->title }}</p>
                                </td>
                                <td>
                                    <p class="mb-0">{{ $item->price }}</p>
                                </td>
                                <td>
                                    <p class="mb-0">{{ $item->old_price }}</p>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="bg-success p-1 rounded-circle"></span>
                                        <p class="mb-0 ms-2">{{ $item->status == 1 ? 'Kích hoạt' : 'Hủy kích hoạt'}}</p>
                                    </div>
                                </td>
                                <td><a class="fs-6 text-muted" href="{{route('backend.goi-dich-vu.detail', $item->id)}}" data-bs-toggle="tooltip"
                                       data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-dots-vertical"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
