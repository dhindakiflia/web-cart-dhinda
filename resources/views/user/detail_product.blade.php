@extends('auth.layout')

@section('page_status_product')
    is-active
@endsection

@section('nama_1')
    OUR
@endsection

@section('nama_2')
    PRODUCTS
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-12">
                  <div class="tile box">
                    <div class="tile is-parent is-vertical is-5">
                        <div class="container">
                            <!-- The expanding image container -->

                            <div class="container" id="kontainer">
                                <!-- Expanded image -->
                                <img id="expandedImg" src="{{ asset($main_pics->name) }}" style="width:100%">
                                
                            </div>
                            <!-- The grid: four columns -->
                            <div class="row">
                                @foreach ($product_pics as $product_pic)
                                <div class="column" id="kolom">
                                <img id="images" src="{{ asset($product_pic->name) }}" onclick="myFunction(this);">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tile is-parent">
                      <form action="{{ route('cart.process') }}" method="post">
                        @csrf
                        <article class="tile is-child is-info">
                          @foreach ($products as $product)
                          <input type="text" value="{{ $product->id }}" name="id_product" hidden>
                          <p class="title">{{ $product->product_name }}</p>
                          <p class="subtitle">Rp{{ number_format($product->price, 0, ".", ".") }}</p>
                          
                          <ul class="block">
                            <p>Color
                              @error('id_product_type')
                               <strong style="color: red"> (Pilih Warna)</strong>
                              @enderror
                            </p>
                              @foreach ($product_types as $product_type)
                              <li style="display:inline-block" id="{{ $product_type->stock }}" onclick="changeStock(this.id)">
                                  <div class="buttons has-addons">
                                      <div class="button is-medium" style="display: inline-block">
                                          <article class="media">
                                              <span class="icon is-small">
                                                  <figure class="">
                                                      <p class="image is-32x32">
                                                        <img id="images" src="{{ asset($product_type->picture) }}" onclick="myFunction(this);" onmouseover="myFunction(this);">
                                                      </p>
                                                  </figure>
                                              </span>
                                          </article> 
                                      </div>
                                      <button type="button" id="{{ $product_type->id }}" class="button is-medium" onclick="getID(this.id)">{{ $product_type->type }}</button>
                                      
                                    </div>
                                  </li>
                              @endforeach
                          </ul>
                          

                          <script type="text/javascript">
                            function changeStock(id){
                              document.querySelector('#pStock').innerText =  id;
                            }

                            function getID(id){
                              document.querySelector('#product_type').value = id;
                            }
                          </script>

                          <input type="text" value="{{ auth()->user()->id }}" name="id_user" hidden> 
                          <input id="product_type" name="id_product_type" type="text" @error('id_product_type') is-invalid @enderror hidden>
                          
                          <p class="name">Stok: <strong id="pStock">{{ $product->stock }}</strong></p>
                          <div class="nice-number block" style="min-width: 50px">
                            <input class="input" style="border-radius:0px" name="product_qty" type="number" value="1" min="1">
                          </div>
                          <br>
                          <button type="submit" class="button is-black is-medium block">ADD TO CART</button>

                          <div class="block">
                            <p><b>Description</b></p>
                            <p class="subtitle" style="text-align: justify">{{ $product->desc }}</p>
                          </div>
                          
                          @endforeach
                        </article>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
        }
    </script>

    <script>
      $(function(){
      $('input[type="number"]').niceNumber();
      });
    </script>
    
@endsection

