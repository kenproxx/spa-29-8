<form id="form" action="{{ route('backend.dai-ly.update', $agency->id) }}" method="post"
      enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="note-title">
            <label>Họ và tên</label>
            <input type="text" class="form-control" name="ten_quan_ly" id="ten_quan_ly" required value="{{ $agency->ten_quan_ly ?? '' }}"
                   placeholder="Nhập Họ và tên"/>
        </div>
        <div class="note-title">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $agency->email ?? '' }}"
                   placeholder="Nhập Email"/>
        </div>
        <div class="note-title">
            <label>Số điện thoại</label>
            <input type="tel" class="form-control" name="number_phone" id="number_phone" value="{{ $agency->number_phone ?? '' }}"
                   placeholder="Nhập Số điện thoại" required pattern="^(0\d{9,10})$"/>
        </div>
        <div class="note-title">
            <label>Tên cơ sở dịch vụ</label>
            <input type="text" class="form-control" name="ten_co_so" id="ten_co_so" required value="{{ $agency->ten_co_so ?? '' }}"
                   placeholder="Nhập Tên cơ sở dịch vụ"/>
        </div>
        <div class="note-title">
            <label>Ngành nghề kinh doanh</label>
            <input type="text" class="form-control" name="nganh_nghe" id="nganh_nghe" value="{{ $agency->nganh_nghe ?? '' }}"
                   placeholder="Nhập Ngành nghề kinh doanh"/>
        </div>
        <div class="note-title">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $agency->address ?? '' }}"
                   placeholder="Nhập Địa chỉ"/>
        </div>
        <div class="note-title">
            <label>Khu vực</label>
            <input type="text" class="form-control" name="khu_vuc" value="{{ $agency->khu_vuc ?? '' }}"
                   placeholder="Nhập Khu vực"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
