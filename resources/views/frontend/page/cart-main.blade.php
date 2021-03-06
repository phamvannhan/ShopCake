@extends('frontend.layouts.master')

@section('css')
<style>
    .editableform .control-group {
        margin-bottom: 0;
        white-space: nowrap;
        line-height: 20px;
    }

    .editable-input {
        float:left;
    }

    .editable-buttons {
        display: inline-block;
        vertical-align: top;
        margin-left: 7px;
        zoom: 1;
    }

    .editable-buttons .btn-default {
        background-color: #eee;
    }

    .editable-buttons .btn-sm, .btn-group-sm > .btn {
        padding: 8px 10px;
    }

    .input_quantity label {
        border: 1px solid #ebebeb;
        padding: 1px 10px;
        font-size: 18px;
        color: #666;
        border-radius: 2px;
        text-align: center;
        font-weight: 400;
        cursor: pointer;
    }
    .cart__list .popover {
        z-index: 1;
    }
</style>
@endsection

@section('content')
<br>
<!--dùng file jqueyry thêm chỉnh sửa phần số lượng-->
<div class="container">
    <div id="updateDiv">
         @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                      @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
    </div>
    <div class="col-md-9 col-sm-9">
         <table class="table table-bordered table-responsive table-striped shop_table">  
    <tr>
        <th >ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quanty</th>
        <th>Action</th>
        <th>
            ToTal
        </th>
    </tr>
   
    @foreach($carts as $cart)
         <tr>
            <td >{{$cart->id}}</td>
            <td>{{$cart->name}}</td>
            <td>     
                <img src="source/image/product/{{$cart->options->img}}" width="100px" height="50px">
               
            </td>
            <td>{{number_format($cart->price)}} VNĐ</td>
           
            <form action="cap-nhat-gio/{{$cart->rowId}}"  method="GET">
              <input type="hidden" name="_token" value="{!!csrf_token()!!}">
              
             <td  width="80px">
                
                <div class="input_quantity center" >
                    <a href="javascript:void(0);" class="btnUpdateCart" data-content="1" data-rowid="{{$cart->rowId}}" data-url="#"><i class="fa fa-caret-up fa-2x" aria-hidden="true"></i></a>

                    <input type="text" value="{{$cart->qty}}" data-current="{{$cart->qty}}" data-rowid="{{$cart->rowId}}" data-url="{{route('capnhatgio', $cart->rowId)}}" name="quantity">
                    {{--  <label data-rowid="{{$cart->rowId}}" data-html="true" data-container=".cart__list" data-toggle="popover" data-placement="top" data-title="Update Quantity" data-content='<div id="popover-{{$cart->rowId}}" class="editableform-loading" style="display: none;"></div> <form class="form-inline editableform" style=""> <div class="control-group form-group"> <div> <div class="editable-input" style="position: relative;"> <input type="text" class="form-control input-sm" style="padding-right: 24px;"> <span class="editable-clear-x"></span> </div> <div class="editable-buttons"> <button type="submit" class="btn btn-primary btn-sm editable-submit"><i class="icon_check"></i></button> <button type="button" class="btn btn-default btn-sm editable-cancel"><i class="icon_close"></i></button> </div> </div> <div class="editable-error-block help-block" style="display: none;"></div> </div> </form>'>{{$cart->qty}}</label>  --}}

                    <a href="javascript:void(0);" class="btnUpdateCart" data-content="-1" data-rowid="{{$cart->rowId}}" data-url="{{route('capnhatgio', $cart->rowId)}}"><i class="fa fa-caret-down fa-2x" aria-hidden="true"></i></a>
                </div>

                              
                         
             </td>
            <td class="action">
                <a class="updatecart" id="{{$cart->rowId}}"><span class="glyphicon glyphicon-refresh" style="color: blue;"></span></a>   
                <a href="cart/removeCart/{{$cart->rowId}}" ><span class="glyphicon glyphicon-remove" style="color: red;"></span></a>        
             </td>
            </form>
            <td>
              {{$cart->total()}}
            </td>
                
        </tr><!--end dong 1-->
        <tr>
            
        </tr>
        @endforeach  
    </table>
    </div><!--menu left sp mua-->
    <div class="col-lg-3 col-sm-4 col-xl-3">
        <div class="cart-totals pull-right">
            <div class="cart-totals-row" ><h5 class="cart-total-title">Cart Totals</h5></div>
            <div class="cart-totals-row" ><span>Cart Subtotal:</span> <span>{{Cart::subtotal()}} vnđ </span></div>
            <div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>
            <div class="cart-totals-row"><span>Order Total:</span> <span>{{Cart::subtotal()}} vnđ</span></div>
        </div>
    </div><!--menu right bill total-->
   
</div>
<br>
@section('script')
<script type="text/javascript" src="/source/assets/dest/js/cart.js"></script>
@endsection
@endsection



