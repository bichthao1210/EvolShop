@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                       @foreach($search_product as $key => $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" height="250px" alt="" />
                                              <form action="{{URL::to('/save-cart')}}" method="POST">
                                                {{csrf_field()}}
                                            <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$product->product_name}}</p>
                                            <label> Số lượng: </label>
                                            <input name="qty" type="number" min="1" value="1"/>
                                            <input name="productid_hidden" type="hidden"  value="{{$product->product_id}}"/>

                                             <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng
                                            </button>
                                            </form>
                                        </div>
                                      
                                </div>
                            </a>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items--> 
        <!--/recommended_items-->
@endsection