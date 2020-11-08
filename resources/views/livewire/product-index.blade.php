<div class="container">
    <div class="row">
        <div class="col">
            {{-- breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Jersey</li>
                </ol>
              </nav>
              {{-- end bread crumb --}}
        </div>
    </div>
       <div class="d-flex justify-content-between align-content-center align-content-center">
          <div class="col-8">
             <h2 class="mt-3" >list Jersey<strong>{{$title}}</strong></h2>
          </div>
          <div class="col-4">
             <div class="input-group">
               <input type="text" wire:model="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
               <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                   <li class="fas fa-search"></li>
                </span>
              </div>
             </div>
          </div>
       </div>
    {{-- products --}}
    <section class="products mt-2">
        <div class="row mt-4">
           @foreach ($products as $product)    
           <div class="col-3">
              <div class="card mt-2">
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
                    <div class="row mt-2">
                       <div class="col-md-12">
                        <a href="{{route('product.detail', $product->id)}}" class="btn btn-dark btn-lg btn-block"><li class="fas fa-eye"></li> detail</a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           @endforeach
        </div>
        <div class="row">
            <div class="col">
            {{ $products->links() }}
            </div>
        </div>
     </section>
     {{-- end products --}}
</div>