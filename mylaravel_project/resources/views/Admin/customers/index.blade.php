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
            <form action="{{ route('admin.customer.search') }}" method="GET">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              	 <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
                                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" placeholder="Tên khách hàng">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ email</label>
                                    <input type="text" class="form-control" name="email" value="{{Request::get('email')}}" placeholder="Địa chỉ email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{Request::get('phone')}}" placeholder="Số điện thoại">
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
              <h3 class="box-title">Danh sách khách hàng</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-responsive">
              	<tbody>
              		<tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày tạo</th>
                          </tr>
                          @if($customers->isEmpty())
                            <tr>
                                <td colspan="9" style="text-align:center">Không có bản ghi nào</td>
                            </tr>
                          @else
                          @php $page = Request::get('page')?Request::get('page') : 1 @endphp
                          @foreach($customers as $key => $customer)
                          <tr>
                                <td>{{ ($key+1) + ($page -1) * 20 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    {{$customer->phone}}
                                </td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                   {{ $customer->created_at }}
                                </td>
                                <td>
                                     <button data-url="{{route('admin.customer.delete',[$customer->id])}}" class="btn btn-danger btn-delete">Xóa</button>
                                </td>
                          </tr>
                        @endforeach
                        @endif
              	</tbody>
              </table>
            </div>
             <div class="box-footer clearfix">
                    <div class="pull-right">
                        {{ $customers->appends(request()->query())->links() }}
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