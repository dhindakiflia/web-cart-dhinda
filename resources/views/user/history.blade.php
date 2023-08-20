@extends('auth.layout')

@section('page_status_order')
    is-active
@endsection

@section('nama_1')
    YOUR
@endsection

@section('nama_2')
    ORDER(S)
@endsection

@section('content')
    <section class="section">
        <div class="tabs is-centered is-boxed is-medium">
            <ul>
              <li class="is-active">
                <a href="{{ route('history.index') }}">
                  {{-- <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span> --}}
                  <span>All</span>
                </a>
              </li>
              {{-- <li>
                <a href="{{ route('history.open') }}">
                  <span class="icon is-small"><i class="fas fa-music" aria-hidden="true"></i></span>
                  <span>Open</span>
                </a>
              </li>
              <li>
                <a href="{{ route('history.closed') }}">
                  <span class="icon is-small"><i class="fas fa-film" aria-hidden="true"></i></span>
                  <span>Closed</span>
                </a>
              </li> --}}
            </ul>
          </div>

            <?php 
            $keys = array_keys($details);
            for($i = 0; $i < count($details); $i++) {
                // echo $keys[$i] . "{<br>";
            ?>
            <div class="container box">
                <div class="container">
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
                <?php 
                foreach($details[$keys[$i]] as $key => $value) {
                    // echo $key . " : " . $value . "<br>";
                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="tile is-ancestor">
                                                <div class="tile is-vertical is-12">
                                                  <div class="tile">
                                                    <div class="tile is-parent is-vertical is-3">
                                                        @if ($value->status=='closed')
                                                        <span class="tag is-danger">Closed</span> 
                                                        @else
                                                        <span class="tag is-link">Open</span> 
                                                        @endif
                                                    
                                                      <article class="tile is-child">
                                                        {{-- gambar main produk  --}}
                                                        <figure class="image is-96x96">
                                                            <img src="{{ asset($value->picture_name) }}">
                                                        </figure>
                                                      </article>
                                                    </div>
                                                    
                                                    <div class="tile is-parent">
                                                      <div class="tile is-child">
                                                        <p class="title is-4">{{ $value->product_name }}</p>
                                                        <p class="subtitle is-6">Color: <strong>{{ $value->type }}</strong></p>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="subtitle" id="price">{{ $value->price }}</p></td>
                                        <td>
                                            <p class="subtitle" style="border-radius: 0px" id="product_qty" name="product_qty[]">{{ $value->qty }}</p>
                                        </td>
                                        <td>
                                            <p class="netprice subtitle" id="netprice">{{ $value->qty * $value->price }}</p>
                                        </td>
                                    </tr>
                                </tbody>  

                <?php 
                }?>
                {{-- <tr>
                    <td colspan="3" class="subtitle"><strong>Discount</strong></td>
                    <td id="total" class="subtitle">{{ $value->discount }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="subtitle"><strong>Total</strong></td>
                    <td id="total" class="subtitle" >{{ $value->total }}</td>
                </tr> --}}
            
        </table>
    </div>    
</div>
</div>


</div>
            <?php        
            }?>
        
        {{-- @php
            
        @endphp --}}
    </section>
@endsection