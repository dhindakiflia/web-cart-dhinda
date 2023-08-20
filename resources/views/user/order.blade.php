@extends('auth.layout')

@section('nama_1')
    SUMMARY
@endsection

@section('content')
<section class="section">
<div class="container box">
    <div class="content is-normal">
        <h2>Redeem Voucher</h2>
    </div>
    <form action="{{ route('order.index') }}" method="get">
        @csrf
        <input class="input is-link" type="text" placeholder="Voucher Code" name="voucher" style="max-width: 90%">
        <button type="submit" class="button is-link">SUBMIT</button>
    </form>
</div>

<form action="{{ route('order.store') }}" method="post">
    @csrf
    <input type="text" name="order_date" value="{{ date("Y-m-d h:i:s") }}" hidden>
    <input type="text" name="order_time" value="{{ date("h:i:s") }}" hidden>
    <input type="number" name="total" value="{{ $harus_bayar }}" hidden>
    <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
    <input type="number" name="result" value="{{ $result }}" hidden>
    <input type="number" name="discount" value="{{ $discount }}" hidden>
    
        <div class="container box">
            <div class="content is-normal">
                <h2>Alamat Pengiriman
                    @if ($detail_user->status == 'utama')
                        <span class="tag is-rounded">Utama</span>
                    @else
                        
                    @endif
                </h2>
                <table class="table ">
                    <tbody>
                        <tr>
                            <td><p><i class="fa-solid fa-user" style="color: #707070;"></i> {{ $detail_user->name }}</p></td>
                            <td><p><i class="fa-solid fa-phone" style="color: #707070;"></i> {{ $detail_user->phone }}</p></td>
                            <td><p><i class="fa-solid fa-location-dot" style="color: #707070;"></i> {{ $detail_user->address }}</p></td>
                            
                        </tr>
                    </tbody>
                </table>
              </div>
        </div>

        <div class="container box">
            <div class="content is-normal">
                <h2>Pesanan</h2>
                <div class="container">
                    <table class="table is-fullwidth">
                        <thead>
                          <tr>
                            <th>Produk</th>
                            <th>Harga Satuan</th>
                            <th>Kuantitas</th>
                            <th>Sub Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <input type="text" name="product_id" value="{{ $cart->id }}" hidden>
                            <tr>
                                <td>
                                    <div class="tile is-ancestor">
                                        <div class="tile is-vertical is-12">
                                          <div class="tile">
                                            <div class="tile is-parent is-vertical is-3">
                                              <article class="tile is-child">
                                                {{-- gambar main produk  --}}
                                                <figure class="image is-96x96">
                                                    <img src="{{ asset($cart->picture_name) }}">
                                                </figure>
                                              </article>
                                            </div>
                                            
                                            <div class="tile is-parent">
                                              <div class="tile is-child">
                                                <input type="text" value="{{ $cart->id }}" name="id_product" hidden>
                                                <p class="title is-4">{{ $cart->product_name }}</p>
                                                <p class="subtitle is-6">Color: <strong>{{ $cart->type }}</strong></p>
                                                <input type="text" value="{{ auth()->user()->id }}" name="id_user" hidden> 
                                                <input id="product_type" name="id_product_type[]" type="text" @error('id_product_type') is-invalid @enderror hidden>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><p class="subtitle" id="price">{{ $cart->price }}</p></td>
                                <td>
                                    <p class="subtitle" style="border-radius: 0px" id="product_qty" name="product_qty[]">{{ $cart->qty }}</p>
                                </td>
                                <td>
                                    <p class="netprice subtitle" id="netprice">{{ $cart->qty * $cart->price }}</p>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="subtitle"><strong>Sub Total Produk</strong></td>
                                <td id="total" class="subtitle">{{ $result }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="subtitle"><strong style="margin-right: 20px">Discount</strong>
                                
                                
                                @if ($discount == 0)
                                <span class="" style="margin-right: 10px"></span></td>
                                <td id="total" class="subtitle" >0</td>
                                @elseif($discount > 0 )
                                <span class="tag is-info is-large" style="margin-right: 10px">Diskon 10K</span></td>
                                <td id="total" class="subtitle" >{{ $discount }}</td>
                                @endif
                                
                                {{-- @if ($result > 50000)
                                <span class="tag is-info is-large" style="margin-right: 10px">Diskon 10K</span></td>
                                <td id="total" class="subtitle" >10000</td>

                                @elseif($result % 100 == 0)
                                <span class="tag is-info is-large" style="margin-right: 10px">Diskon 5K</span></td>
                                <td id="total" class="subtitle" >5000</td>

                                @elseif($result > 50000 && $result >100000)
                                <span class="tag is-info is-large" style="margin-right: 10px">Diskon 10K</span>
                                <span class="tag is-info is-large" style="margin-right: 10px">Diskon 5K</span></td>
                                <td id="total" class="subtitle" >15000</td>

                                @else
                                <span class="tag is-light is-large">No Voucher</span></td>
                                <td id="total" class="subtitle" >0</td>
                                @endif --}}
                            </tr>
                            <tr>
                                <td colspan="3" class="subtitle"><strong>Total</strong></td>
                                <td id="total" class="subtitle" >{{ $harus_bayar }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
        
        <div class="container box">
            <div class="content is-normal">
                <h2>Metode Pembayaran</h2>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="method" value="tf">
                            Bank Transfer
                        </label>
                    </div>
                    <br>
                    <div class="field is-grouped is-grouped-right">
                    <p class="control">
                        <button class="button is-black is-medium" type="submit">
                            Buat Pesanan
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </section>
    </form>
@endsection