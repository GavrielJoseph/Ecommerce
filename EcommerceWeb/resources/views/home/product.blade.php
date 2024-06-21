<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
         <br><br>
         <div>
            <form action="{{url('search_product')}}" method="GET">
               @csrf
               <input style="width: 500px;" type="text" name="search" placeholder="Search here">
               <input type="submit" value="search">
            </form>
         </div>
      </div>
      <div class="row">
         @foreach($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1">
                     Product Details
                     </a>

                     @if($products->quantity > 0)
                        <form action="{{url('add_cart',$products->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                              </div>
                              <div class="col-md-4">
                                 <input type="submit" value="Add to Cart" class="btn btn-primary">
                              </div>
                           </div>
                        </form>
                     @else
                        <div class="alert alert-danger" role="alert">
                           This product is out of stock.
                        </div>
                        <button class="btn btn-secondary" disabled>Add to Cart</button>
                     @endif

                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>{{$products->name}}</h5>
                  @if($products->total_discount != null)
                     <h6 style="color: red">Rp {{$products->total_discount}}</h6>
                     <h6 style="text-decoration: line-through;">Rp {{$products->price}}</h6>
                  @else
                     <h6>Rp {{$products->price}}</h6>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <span style="padding-top: 20px;">
         <!-- pagination -->
         {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
      </span>
   </div>
</section>
