@extends('base/index')

@section('content')

<div class="custom-product container py-5">
  <div class="trading-wrapper">

    <div class="">
      <table class="table">
        <tbody>
          <tr>
            <th scope="row">Amount</th>
            <td>${{$total}}</td>
          </tr>
          <tr>
            <th scope="row">Tax</th>
            <td>$0</td>
          </tr>
          <tr>
            <th scope="row">Delivery</th>
            <td colspan="2">$10</td>
          </tr>
          <tr>
            <th scope="row">Total Amount</th>
            <td colspan="2">${{$total + 10}}</td>
          </tr>
        </tbody>
      </table>

      <form action="" method="POST">
        @csrf
        <div class="form-group mt-5">
          <label for="paymentMethod">Payment Method</label>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="onlinePayment" name="paymentMethod" value=""><label class="form-check-label" for="onlinePayment">Online payment</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="em1Payment" name="paymentMethod"><label class="form-check-label" for="em1Payment">EM1 Payment</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="deliveryPayment" name="paymentMethod"><label class="form-check-label" for="deliveryPayment">Payment on delivery</label>
          </div>
        </div>
        <button type="submit" class="my-5 btn btn-light">Submit</button>
      </form>
    </div>
  </div>
</div>

@endSection