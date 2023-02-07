<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use Illuminate\Support\Facades\Http;
$data = Http::get('https://dummyjson.com/products')->json();
$data = $data['products'];
// dd($data[0]['images']);

?>







<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{url("css/cart.css")}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    @if(!isset($_SESSION["user"]))
    <h1>redirect</h1>
    <script>window.location = "/login";</script>
    @endif
    <div>
        <a href={{url('home')}} ><i style="font-size: 20px ; margin: 20px" class="fa-solid fa-arrow-left">&nbsp;&nbsp;&nbsp;B A C K</i></a>
    </div>
    <h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>


  @foreach ($data as $product )
  @if (in_array($product['id'], $_SESSION["cartIds"]))
  <div class="product">
    <div class="product-image">
      <img src={{url($product['images'][0])}}>
    </div>
    <div class="product-details">
      <div class="product-title">{{$product['title']}}</div>
      <p class="product-description">{{$product['description']}}</p>
    </div>
    <div class="product-price">{{$product['price']}}</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <a class="remove-product" href={{'cart?id='.$product['id'].'&remove=1'}}>
        Remove
      </a>
    </div>
    <div class="product-line-price">25.98</div>
  </div>
@endif

  @endforeach




  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>

      <button class="checkout">Checkout</button>

</div>

<script src={{url("js/cart.js")}}></script>
</body>
</html>
