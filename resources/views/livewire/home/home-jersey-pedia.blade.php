{{-- container --}}
<div class="container">
   <div class="banner">
      <img src="{{asset('assets/slider/slider1.png')}}" alt="">
   </div>

   {{-- Pilih liga --}}
   <section class="pilih-liga mt-4">
      <h3><strong>Pilih Liga</strong></h3>
      <div class="row mt-4">
         @foreach ($ligas as $liga)    
         <div class="col-3">
            <div class="card shadow">
               <div class="card-body d-flex justify-content-center">
                  <img src="{{ asset('assets/liga')}}/{{$liga->gambar}}" class="img-fluid" alt="">
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </section>

    {{-- best Product --}}
    <section class="best-products mt-4">
      <h3><strong>Best Products</strong></h3>
      <div class="row mt-4">
         @foreach ($products as $product)    
         <div class="col-3">
            <div class="card ">
               <div class="card-body text-center">
                  <div>
                     <img src="{{ asset('assets/jersey')}}/{{$product->gambar}}" class="img-fluid" alt="">
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <h5><strong>{{$product->nama}}</strong></h5>
                        <h5>Rp. {{number_format($product->harga)}}</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <a href="" class="btn btn-dark btn-lg btn-block"> detail</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </section>
{{-- end container --}}
</div>
