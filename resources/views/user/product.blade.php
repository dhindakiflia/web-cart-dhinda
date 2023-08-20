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
      <div class="tile is-ancestor">
        <div class="tile is-vertical is-12">
          <div class="tile">
            <div class="tile is-parent is-vertical is-2">
              <article class="tile is-child">
                <aside class="menu">
                  <p class="menu-label">
                    Category
                  </p>
                  <ul class="menu-list" id="list_category">
                    @foreach ($categories as $category)
                    <li><a href="{{ route('product.category',['id' => $category->id]) }}">{{ $category->category }}</a></li>
                    @endforeach
                  </ul>
                </aside>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child">
                <div class="columns" id="column-grid" >
                  @foreach ($products as $product)
                  <div class="column">
                    <a href="{{ route('detail',['id' => $product->id]) }}">
                      <div class="card">
                        <div class="card-image">
                          <figure class="image is-4by4">
                            <img src="{{ asset($product->picture_name) }}" alt="Placeholder image">
                          </figure>
                        </div>
                        <div class="card-content">
                          <div class="media">
                            <div class="media-content">
                              <p class="title is-5">{{ $product->product_name }}</p>
                              <p class="subtitle is-6">Rp{{ number_format($product->price, 0, ".", ".") }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  @endforeach
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>

    </section>
@endsection