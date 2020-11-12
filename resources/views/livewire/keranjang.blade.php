<div class="container mt-2" >
    <div class="row mt-4 mb-2">
        <div class="col">
            <h2>Product Details</h2>
             {{-- breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Keranjang</li>

                </ol>
              </nav>
              {{-- end bread crumb --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                      {{session('message')}}  
                </div>                
            @endif
        </div>
    </div>

    {{-- content --}}
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Name Set</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td><strong>TotalHarga</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($pesanan_detail as $pd)
                        <tr>
                            <td>{{$no++}}</td>
                            <td><img src="{{url('assets/jersey')}}/{{$pd->product->gambar}}" class="img-fluid" width="100" alt=""></td>
                            <td>
                                {{$pd->product->nama}}
                            </td>
                            <td>
                                @if ($pd->nameset)
                                    Nama : {{$pd->nama}} <br>
                                    Nomor: {{$pd->nomor}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                {{$pd->jumlah}}
                            </td>
                            <td>
                                Rp. {{number_format($pd->product->harga)}}
                            </td>
                            <td>
                                <strong>
                                    Rp. {{number_format($pd->total_harga)}}
                                </strong>
                            </td>
                            <td>
                                <i wire:click="destroy({{$pd->id}})"  class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" >Data Kosong</td>
                        </tr>
                        @endforelse
                        @if (!empty($pesanan))     
                        <tr>
                            <td colspan="6" align="right" >
                                <strong>
                                    Total Harga : 
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Rp. {{number_format($pesanan->total_harga)}}
                                </strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right" >
                                <strong>
                                    Kode Unik :
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Rp. {{number_format($pesanan->kode_unik)}}
                                </strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right" >
                                <strong>
                                    Total Yang harus dibayar :
                                </strong>
                            </td>
                            <td>
                                <strong>
                                    Rp. {{number_format($pesanan->total_harga + $pesanan->kode_unik)}}
                                </strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td colspan="2">
                                <a href="{{route('checkout')}}" class="btn btn-success btn-blok">
                                    <i class="fas fa-arrow-right"></i> Check Out
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
