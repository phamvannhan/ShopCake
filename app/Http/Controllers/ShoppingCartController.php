<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart; //phai them thu vien nay 
use Illuminate\Http\Request;
use App\Models\Products;
use validator;

class ShoppingCartController extends Controller
{
	
	public function viewCart()
    {
        $carts = Cart::content();
        return view('frontend.page.cart',compact('carts'));
        
    }
    public function addItem( $id) 
    {
        $products = Products::find($id);
        Cart::add([
                        ['id'=>$id,
                        'name'=>$products->name,
                        'qty'=>1,
                        'price'=>$products->unit_price,
                        'options'=>['img'=>$products->image]]
                  ]);
        $carts = Cart::content();
    	
    	return view('frontend.page.cart',compact('carts'));
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
           echo "ok";
           $id = $request->id;
           $qty = $request->qty;
           Cart::update($id,$qty);
        }

        /*$qty = $request->qty;
        $id = $request->proId;
        $rowId = $request->rowId->toArray();
        dd($rowId);*/
         
        //Cart::update($rowId,$qty); // for update
        /*$cartItems = Cart::content(); 
        echo "oke";*/
        // display all new data of cart
       // return view('page.upcart', compact('cartItems'))->with('status', 'cart updated');

    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect()->route('giohang');
        
    }

    public function ChecKout()
    {
        
        return view('frontend.page.dathang');
        
    }

    
    
}
