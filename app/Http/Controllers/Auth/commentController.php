<?php

namespace App\Http\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\tbl_product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Comment;

/**
 * 
 */
class commentController extends Controller
{
	
	public function postComment($id, Requests $requests){
		$product_id=$id;
		$product = tbl_product::find($product_id);
		$comment = new Comment;
		$comment->product_id = $product_id;
		$comment->customer_id = Auth::tbl_customers()->customer_id;
		$comment->comment = $requests->comment;
		$comment->save(); 

		return Redirect::to('/chi-tiet-san-pham/')->with('thongbao','viet binh luan thanh cong');

	}
}