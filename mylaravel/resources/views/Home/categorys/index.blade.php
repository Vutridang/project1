@extends('Home.layout.app')
@section('breadcrumbs')
  @include('Home.includes.breadcrumbs',array("title" => $category->name, 'url' => route('home.category.get',[$category->slug])))
@endsection
@section('content')
<div class="products-content">
	<div class="row">
		<div class="col-12">
			<div class="section-title">
				<h2>Sản phẩm</h2>
			</div>
		</div>
	</div>
				<div class="tab-content" id="myTabContent">
					@foreach($categorys as $key => $category)
					<div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}" id="{{$category->slug}}" role="tabpanel">
						<div class="tab-single">
							<div class="row">
								@if($products->isEmpty())
								<div class="col-12">
									<p class="text-center" style="margin-top: 10px; font-weight: bold; color: #ee4d2d;">Không có sản phẩm nào</p>
								</div>
								@else
								   @foreach($products as $prod)
								   <div class="col-xl-3 col-lg-4 col-md-4 col-12">
								   	    <div class="single-product">
								   	    	<div class="product-img">
								   	    		<a href="">
								   	    			<img class="default-img" src="{{ asset('uploads/products/' . $prod->images[0]->name)}}" alt="#">
								   	    			<img class="hover-img" src="{{ asset('uploads/products/' . $prod->images[0]->name)}}" alt="#">
								   	    			@if($prod->status_hight_light == 1)
						                            <span class="out-of-stock">
							                            Hot
						                            </span>
						                            @else
						                            <span class="new" style="background-color: blue;">
							                            Mới
						                            </span>
						                            @endif
						                        </a>
						                        <div class="button-head">
						                             <div class="product-action">
							                             <a data-toggle="modal"
							                              data-target="#exampleModal"
							                              title="Xem chi tiết" 
							                              href="">
							                               <i class="ti-eye"></i>
							                               <span>Xem chi tiết</span>
							                            </a>
						                             </div>
						                             <div class="product-action2">
							                               <a title="Thêm giỏ hàng" href="{{route('home.cart.add',[$prod->id])}}">
								                                Thêm giỏ hàng
							                               </a>
						                             </div>
					                            </div>
								   	    	</div>
								   	    	<div class="product-content">
					                             <h3>
						                             <a href="">{{$prod->name}}</a>
					                             </h3>
					                             <div class="product-price">
						                            <span style="font-weight: bold; color: red;">
							                          {{number_format($prod->price, 0, ",",".")}}VND
						                            </span>
					                             </div>
				                            </div>
								   	    </div>
								   </div>
								   @endforeach
								@endif
							</div>
							{{$products->appends(request()->query())->links()}}
						</div>
						
					</div>
					@endforeach
				</div>
			</div>
@stop