@extends('Admin.layout.app')
@section('content')
<div class="row">
		<div class="call-md-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tìm kiếm</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <form action="{{ route('admin.user.search') }}" method="GET">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              	 <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản</label>
                                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" placeholder="Tên tài khoản">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{Request::get('email')}}" placeholder="Địa chỉ email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" name="number_phone" value="{{Request::get('number_phone')}}" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quyền</label>
                                    <select class="form-control" name="role">
                                        @foreach(config('constant.role') as $key => $value)
                                        <option  option value="{{ $key }}" @if(Request::get('role') == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
              </div>
            </div>
            <!-- /.box-body -->
                <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Tìm kiếm</button>
                </div>
            </form>
          </div>
		</div>
		<div class="call-md-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Danh sách tài khoản</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="{{route('admin.user.create')}}" type="submit" class="btn btn-primary pull-right btn-margin-bottom">Thêm tài khoản</a>
              <table class="table table-bordered table-responsive">
              	<tbody>
              		<tr>
                            <th>#</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quyền</th>
                            <th></th>
                          </tr>
                          @if($users->isEmpty())
                            <tr>
                                <td colspan="9" style="text-align:center">Không có bản ghi nào</td>
                            </tr>
                          @else
                          @php $page = Request::get('page')?Request::get('page') : 1 @endphp
                          @foreach($users as $key => $user)
                          <tr>
                                <td>{{ $key+1 + ($page -1) * 5}}</td> 
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->gender == 1)
                                        <button class="btn btn-xs btn-success">Nam</button>
                                        @else 
                                        <button class="btn btn-xs btn-warning">Nữ</button>
                                    @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($user->date_of_birth)) }}</td>
                                <td>{{ $user->number_phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    @if ($user->role == 1)
                                        <button class="btn btn-xs btn-danger">Quản trị viên</button>
                                    @else
                                        <button class="btn btn-xs btn-success">Người dùng</button>
                                    @endif
                                </td>
                                <td>
                                     <a href="{{route('admin.user.edit',[$user->id])}}" class="btn btn-success">Chỉnh sửa</a>
                                     <button data-url="{{route('admin.user.delete',[$user->id])}}" class="btn btn-danger btn-delete">Xóa</button>
                                </td>
                          </tr>
                        @endforeach
                        @endif
              	</tbody>
              </table>
            </div>
             <div class="box-footer clearfix">
                    <div class="pull-right">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                </div>
          </div>
		</div>
</div>
<script>
      $(document).ready(function(){
        $('.btn-delete').click(function(){//gọi class 'btn-delete' trong thẻ button rồi gán sự kiện
          $('.modal-confirm').modal({//trong sự kiện click gỏi class 'modal-confirm'
            show: true
          });
          $('#form-confirm').attr('action',$(this).attr('data-url'));
        });

        }); //gọi id form-confirm set attribute cho action bằng attr 'data-url' của
            //class 'btn-delete' đã được gọi để form delete từ trang confirm sau khi 
            //action sẽ xuất ra trang index
      </script>
@stop