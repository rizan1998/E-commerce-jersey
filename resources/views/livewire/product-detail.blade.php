<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <h2>Product Details</h2>
             {{-- breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route('product')}}">List Jersey</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Jersey</li>

                </ol>
              </nav>
              {{-- end bread crumb --}}
        </div>
    </div>
    {{-- content --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{url('assets/jersey')}}/{{$product->gambar}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h2><strong>{{$product->nama}}</strong></h2>
           
            <h4>
                Rp. {{number_format($product->harga)}}
                <h5 class="pl-2" >
                @if ($product->is_ready == 1)
                <span class="badge badge-success">
                <li class="fas fa-check"></li> Ready Stock
                </span>
            @else
            <span class="badge badge-danger">
                <li class="fas fa-times"></li> Stock Habis
                </span>
            @endif
            </h5>
            </h4>
            <hr>
            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang"> 
                        <table class="table" style="border-top : hidden">
                            <tr>
                                <td>Liga</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ url('assets/liga') }}/{{ $product->liga->gambar }}" class="img-fluid"
                                        width="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $product->jenis }}</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{ $product->berat }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input id="jumlah_pesanan" type="number"
                                        class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                        wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required
                                        autocomplete="name" autofocus>
    
                                    @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <h5>{{$jumlah_pesanan}}</h5>
                            @if($jumlah_pesanan > 1)
                            @else
                            <tr>
                                <td colspan="3"><strong>Name Set (isi jika tambah nameset)</strong> </td>
                            </tr>
                            <tr>
                                <td>Harga Name Set</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($product->harga_nameset) }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        wire:model="nama" value="{{ old('nama') }}"
                                        autocomplete="name" autofocus>
    
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <input id="nomor" type="number"
                                        class="form-control @error('nomor') is-invalid @enderror"
                                        wire:model="nomor" value="{{ old('nomor') }}"
                                        autocomplete="name" autofocus>
    
                                    @error('nomor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                        </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}
</div>