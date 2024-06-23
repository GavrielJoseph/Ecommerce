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
               <input style="width: 500px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" type="text" name="search" placeholder="Search here">
               <input type="submit" value="Search" style="padding: 10px 20px; border-radius: 5px; border: none; background-color: #333; color: #fff; cursor: pointer;">
            </form>
         </div>
      </div>
      <div class="row">
         @foreach($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1" style="padding: 10px 20px; border-radius: 5px; background-color: #333; color: #fff; text-decoration: none;">
                     Product Details
                     </a>

                     @if($products->quantity > 0)
                        <form action="{{url('add_cart',$products->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width: 100px; padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
                              </div>
                              <div class="col-md-4">
                                 <input type="submit" value="Add to Cart" class="btn btn-primary" style="padding: 10px 20px; border-radius: 5px; border: none; background-color: #28a745; color: #fff; cursor: pointer;">
                              </div>
                           </div>
                        </form>
                     @else
                        <div class="alert alert-danger" role="alert">
                           This product is out of stock.
                        </div>
                        <button class="btn btn-secondary" disabled style="padding: 10px 20px; border-radius: 5px; border: none; background-color: #ccc; color: #fff;">Add to Cart</button>
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
      <div class="pagination" style="display: flex; justify-content: center; padding-top: 20px;">
         @if ($product->onFirstPage())
            <button class="pagination-button" disabled>Back</button>
         @else
            <a href="{{ $product->previousPageUrl() }}" class="pagination-button">Back</a>
         @endif

         @if ($product->hasMorePages())
            <a href="{{ $product->nextPageUrl() }}" class="pagination-button">Next</a>
         @else
            <button class="pagination-button" disabled>Next</button>
         @endif
      </div>
   </div>
</section>

<style>
.pagination-button {
   padding: 10px 20px;
   border-radius: 5px;
   border: none;
   background-color: #333;
   color: #fff;
   cursor: pointer;
   text-decoration: none;
}
.pagination-button:disabled {
   background-color: #ccc;
   cursor: not-allowed;
}
.pagination-button:hover:not(:disabled) {
   background-color: #e74c3c;
}
</style>
