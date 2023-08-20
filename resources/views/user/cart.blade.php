@extends('auth.layout')

@section('page_status_cart')
    is-active
@endsection

@section('nama_1')
    SHOPPING
@endsection

@section('nama_2')
    CART
@endsection

@section('content')
    <section class="section" style="background-color: white">
        <div class="container">
            <table class="table is-fullwidth">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Kuantitas</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($carts as $cart)
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
                                        <ul class="block">
                                          <p>Color: <strong>{{ $cart->type }}</strong></p>
                                        </ul>
                                        <input type="text" value="{{ auth()->user()->id }}" name="id_user" hidden> 
                                        <input id="product_type" name="id_product_type" type="text" value="{{ $cart->id_product_type }}" hidden>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><input class="subtitle" id="price" style="border: 0px" onkeyup="priceFunc(this)" value="{{ $cart->price }}" ></td>
                        <td>
                            {{-- <form action="{{ route('order.index') }}" method="get">
                            @csrf --}}
                            <div class="nice-number block" style="min-width: 50px">
                                <input class="input" style="border-radius: 0px" id="product_qty" name="product_qty" type="number" value="{{ $cart->qty }}" min="1" oninput="qtyFunc(this)">
                            </div>
                        </td>
                        <td>
                            <p class="netprice subtitle" id="netprice">{{ $cart->qty * $cart->price }}</p>
                        </td>
                        <td>
                            <form method="post" action="{{route('cart.delete',$cart->id_product_type.$cart->id_user)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="delete" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="subtitle"><strong>Total</strong></td>
                        <td id="total" class="subtitle">{{ $result }}</td>
                        @if ($count_cart == 0)
                        
                        @else
                        <td><a type="button" class="button is-black" href="{{ route('order.index') }}">Checkout</a></td>
                        @endif
                        
                    </tr>
                {{-- </form> --}}
                </tbody>
                <nav class="pagination block" role="navigation" aria-label="pagination">
                    <a class="pagination-previous" href="{{ $carts->previousPageUrl() }}">Previous</a>
                    <a class="pagination-next" href="{{ $carts->nextPageUrl() }}">Next page</a>
                </nav>
            </table>
        </div>    
        <script type="text/javascript">
            function myFunction(imgs) {
            // Get the expanded image
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
            }
            function changeStock(id){
              document.querySelector('#pStock').innerText =  id;
            }

            function getID(id){
              document.querySelector('#product_type').value = id;
            }

            let netprice = document.getElementsByClassName('netprice');
            let total = document.getElementById('total');
            function totalFunc(){
                var a = 0;
                for(let i=0; i<netprice.length; i++){
                    a += parseInt(netprice[i].innerText);
                }
                total.innerText = a;
            }

            function qtyFunc(q){
                var price = q.parentElement.parentElement.parentElement.parentElement.children[1].children[0].value;
                q.parentElement.parentElement.parentElement.parentElement.children[3].children[0].innerText = q.value * price;

                totalFunc();
            }
        </script>

        <script>
            $(function(){
            $('input[type="number"]').niceNumber();
            });
        </script>

    </section>

@endsection
