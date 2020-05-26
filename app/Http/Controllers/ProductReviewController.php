<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product_Review;
use App\Product;
use App\Admin;
use App\Notifications\AdminNotification;

class ProductReviewController extends Controller
{
    public function store(Request $request){
        $review = new Product_Review;
        $review->product_id = $request->product_id;
        $review->user_id = $request->user_id;
        $review->rate = $request->rate;
        $review->content = $request->content;

        $review->save();

        
        $reviews = Product_Review::where('product_id', '=', $request->product_id)->get();
        $meanRate = 0;
        $count = $reviews->count();

        foreach($reviews as $item){
            $meanRate = $meanRate+$item->rate;
        }

        $meanRate = $meanRate / $count;

        $produk = Product::find($request->product_id);
        $produk->product_rate = $meanRate;
        $produk->save();
        $admin = Admin::find(1);
        $notif = "<a class='dropdown-item' href='/admin/products/".$produk->id."'>".
                "<div class='item-content flex-grow'>".
                  "<h6 class='ellipsis font-weight-normal'></h6>".
                  "<p class='font-weight-light small-text text-muted mb-0'>Produk diberikan Review!".
                  "</p>".
                "</div>".
              "</a>";
        $admin->notify(new AdminNotification($notif));
    }

    public function update(Request $request){
        $review = Product_Review::find($request->review_id);
        $review->rate = $request->rate;
        $review->content = $request->content;
        $review->save();

        $reviews = Product_Review::where('product_id', '=', $review->product_id)->get();
        $meanRate = 0;
        $count = $reviews->count();

        foreach($reviews as $item){
            $meanRate = $meanRate+$item->rate;
        }

        $meanRate = $meanRate / $count;

        $produk = Product::find($review->product_id);
        $produk->product_rate = $meanRate;
        $produk->save();

        return redirect('/product/'.$review->product_id);
    }
}
