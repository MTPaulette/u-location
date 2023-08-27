@extends('layouts.default')

@section('content')

  <div class="main-container">
    <!-- <div class="green-section"></div> -->
    <div class="head-title">
      <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
      <div class="w-50 float-left mt-10">
          <!-- <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#1</span></p> -->
          <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{ $order->code }}</span></p>
          <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ $order->created_at }}</span></p>
      </div>
      <div class="float-right logo mt-10">
            <img src="{{ public_path('/image/logo.png') }}" alt="Agrimax Logo" />
      </div>
      <div style="clear: both;"></div>
    </div>
    
    <div class="table-section bill-tbl w-100 mt-10">
      <table class="table w-100 mt-10">
          <tr>
              <th class="w-50">From</th>
              <th class="w-50">To</th>
          </tr>
          <tr>
              <td>
                  <div class="capitalize">
                      <p>Agrimax SARL</p>
                      <p>Yaounde, Cameroon</p>                    
                      <p>email: <span class="lowercase"> {{ $informations->email }}</span></p>
                      <p>Contact: <span class="lowercase">{{ $informations->telephone1 }} / {{ $informations->telephone2 }}</span></p>
                  </div>
              </td>
              <td>
                  <div class="capitalize">
                      <p>{{ $order->user->firstname }} <span class="uppercase">{{ $order->user->lastname }}</span> </p>
                      <p>{{ $order->address->street }}</p>                    
                      <p>email: <span class="lowercase">{{ $order->user->email }}</span></p>
                      <p>Contact: <span class="lowercase">{{ $order->user->telephone }}</span></p>
                  </div>
              </td>
          </tr>
      </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
      <table class="table w-100 mt-10">
          <tr>
              <th class="w-50">Payment Method</th>
              <th class="w-50">Shipping Method</th>
          </tr>
          <tr>
            <td>
              @if($order->paiement_mode)
                Cash On Delivery
              @else
                -
              @endif
            </td>
            <td>Free Shipping - Free Shipping</td>
          </tr>
      </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
      <table class="table w-100 mt-10">
          <tr>
              <th class="w-50">Product Id</th>
              <th class="w-100">Product Name</th>
              <th class="w-25">weight</th>
              <th class="w-50">Price<br>(FCFA)</th>
              <th class="w-50">Qty</th>
              <th class="w-50">Subtotal<br>(FCFA)</th>
              <th class="w-50">Tax Amount</th>
              <th class="w-50">Grand Total</th>
          </tr>
          
          @foreach($order->products ?? '' as $product)
          <tr align="center">
              <td>{{ $product->code }}</td>
              <td align="left">{{ $product->name }}</td>
              <td>{{ $product->pivot->weight }}</td>
              <td>{{ $product->pivot->price }}</td>
              <td>{{ $product->pivot->qty }}</td>
              <td>{{ $product->pivot->totalPrice }}</td>
              <td>0</td>
              <td>{{ $product->pivot->totalPrice }}</td>
          </tr>
          @endforeach
          <!-- <tr align="center">
              <td>M102</td>
              <td>Andoid Smart Phone</td>
              <td>$250</td>
              <td>2</td>
              <td>$500</td>
              <td>$50</td>
              <td>$550.00</td>
          </tr> -->
          <tr>
              <td colspan="8">
                  <div class="total-part">
                      <div class="total-left w-60 float-left" align="right">
                          <p>Sub Total</p>
                          <p>Tax (18%)</p>
                          <p>Total Payable</p>
                      </div>
                      <div class="total-right w-40 float-left text-bold" align="right">
                          <p>{{ $order->subtotal }} FCFA</p>
                          <p>$400</p>
                          <p>{{ $order->subtotal }} FCFA</p>
                      </div>
                      <div style="clear: both;"></div>
                  </div> 
              </td>
          </tr>
      </table>
    </div>
  </div>
@stop

<style type="text/css">
    .main-container{
        font-family: 'Roboto Condensed', sans-serif;
    }

    /* .green-section {
      position: absolute;
      z-index: -20;
      top: 0;
      bottom: 0;
      width: 28.5%;
      height: 20%;
      background-color: #047634;
    } */

    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top: 5px;
    }
    .mt-10{
        margin-top: 20px;
    }
    .mt-30{
        margin-top: 30px;
    }

    .text-center{
        text-align: center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width: 50%;   
    }
    .w-60{
        width: 65%;   
    }
    .w-40{
        width: 35%;   
    }
    .w-25{
        width: 15%;   
    }
    .w-15{
        width: 15%;   
    }
    .add-detail {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      position: relative;
    }

    .logo img{
        width: 170px;
        height: 120px;
        margin-top: -30px;
        margin-right: -10px;
    }

    .gray-color{
        color: #5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border: 1px solid black;
    }
    .capitalize {
        text-transform: capitalize;
    }
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }

    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        /* background: #047634; */
        /* color: white; */
        font-size: 15px;
    }
    table tr td{
        font-size: 13px;
    }
    table{
        border-collapse: collapse;
    }
    .capitalize p{
        line-height: 10px;
    }
    .float-left{
        float: left;
    }
    .float-right{
        float: right;
    }
    .total-part{
        font-size: 16px;
        line-height: 12px;
    }
    .total-right p{
        padding-right: 20px;
    }
</style>