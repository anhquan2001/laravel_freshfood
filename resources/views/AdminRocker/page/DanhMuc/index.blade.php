@extends('AdminRocker.share.master')
@section('tieu_de')
    Quản Lí Chuyên Mục
@endsection

@section('noi_dung')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm Mới Chuyên Mục</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/danh-muc/index" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên Chuyên Mục</label>
                            <input name="ten_danh_muc" type="text" class="form-control mt-1"
                                placeholder="Nhập vào tên chuyên mục">
                        </div>
                        <div class="form-group mt-2">
                            <label>Slug Chuyên Mục</label>
                            <input name="slug_danh_muc" type="text" class="form-control mt-1"
                                placeholder="Nhập vào tên chuyên mục">
                        </div>
                        <div class="form-group mt-2">
                            <label>Tình trạng</label>
                            <select name="is_open" class="form-control mt-1">
                                <option value="1">Hiển Thị</option>
                                <option value="0">Ẩn</option>
                            </select>

                        </div>
                        <div class="form-group text-end mt-2">
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Chuyên Mục
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Chuyên Mục</th>
                                    <th class="text-center">Slug Chuyên Mục</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <th class="text-center align-middle">{{ $key + 1 }}</th>
                                        <td class="align-middle">{{ $value->ten_danh_muc }}</td>
                                        <td class="align-middle">{{ $value->slug_danh_muc }}</td>
                                        <td class="align-middle">
                                            @if ($value->is_open == 1)
                                                <button class="btn btn-primary">Hiển Thị</button>
                                            @else
                                                <button class="btn btn-warning">Tạm Tắt</button>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a class="btn btn-info" href="/admin/danh-muc/cap-nhat/{{$value->id}}">Cập Nhật</a>
                                            <a class="btn btn-danger" href="/admin/danh-muc/huy-bo/{{$value->id}}">Hủy Bỏ</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
         new Vue({
            el      :   '#app',
            data    :   {
                them_moi   :   {},
                ds_phong   :   [],
                delete_phong  :   {},
                phong_update:   {},
            },
            created()   {
                this.createPhong();
                this.loadPhong();
            },
            methods :   {
                createPhong() {
                    axios
                        .post('/admin/danh-muc/index' , this.them_moi)
                        .then((res) => {
                            toastr.success('Đã thêm mới phòng thành công!');
                            this.loadPhong();
                            this.them_moi = {};
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadPhong()  {
                    axios
                        .get('/admin/danh-muc/data')
                        .then((res) => {
                            this.ds_phong = res.data.list;
                            console.log(this.ds_phong);
                        });
                },
            },
        });
    </script>
@endsection

