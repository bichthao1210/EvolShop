@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
					
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								 

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
							
								<img src="images/product-details/rating.png" alt="" />
								<span>
									
									
						
									   <form action="{{URL::to('/save-cart')}}" method="POST">
                                                {{csrf_field()}}
                                            <h2>{{number_format($value->product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$value->product_name}}</p>
                                            <label> Số lượng: </label>
                                            <input name="qty" type="number" min="1" value="1"/>
                                            <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}"/><br>
                                
                                             <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng
                                            </button>
								</span>
								<p><b>Tình trạng:</b> Còn hàng</p>
								>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
	
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Chi tiết</a></li>
							
				
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<p>{{!!$value->product_desc!!}}</p>
							</div>
							
						
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
								  <?php
                                    $customer_id= Session::get('customer_id');
                                    $shipping_id= Session::get('shipping_id');
                                    if($customer_id!=NULL && $shipping_id==NULL) {

                                ?>
							@if(session('thongbao'))
								{{session('thongbao')}}
							@endif
									<div class="well">
										<h4>Viết bình luận<span class="glyphicon glyphicon-pencil"></span></h4>
									<form action="{{URL::to('/comment/')}}" method="post" role="form">
										<input type="hidden" name="_token" value="{{csrf_token()}}"/>
										<div class="form-group" >
											<textarea class="form-control" rows="3"></textarea>
										</div>
										<button type="submitt" class="btn btn-primary">
										Đánh giá
										</button>
									</form>
								</div>
								 <?php
                                 }else{
                            ?>
                            <h3> Đăng nhập để bình luận</h3>
                        <?php } ?>
							</div>
							
						</div>
					</div><!--/category-tab-->
						@endforeach
					
@endsection