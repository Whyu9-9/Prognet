@extends('layouts.main')
@section('content')
     <!-- Main Layout -->
  <main>
    <div style="margin-top:120px;" class="container mt-5 pt-3">

      <!-- Grid row -->
      <div class="row" style="margin-top: -140px;">

        <!-- Grid column -->
        <div class="col-md-12">

          <div class="card pb-5">

            <div class="card-body">

              <div class="container">

                <!-- Section: Contact v.3 -->
                <section class="contact-section my-5">
                  <!-- Form with header -->
                  <div class="card">

                    <!-- Grid row -->
                    <div class="row">

                      <!-- Grid column -->
                      <div class="col-lg-8">

                        <div class="card-body form">

                          <!-- Header -->
                          <h3 class="mt-4">Detail Transaksi</h3>
                          <br>
                          <!-- Grid row -->
                          <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-name" class="">Nama Penerima</label>
                                <input type="text" id="nama" class="form-control" value="{{$transaksi->user->name}}" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-email" class="">Email</label>
                                <input type="email" id="email" class="form-control" value="{{$transaksi->user->email}}" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                          <!-- Grid row -->
                          <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-contact-phone" class="">Nomor Telepon</label>
                                <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->telp}}" disabled>
                              </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-12">

                              <div class="md-form mb-0">
                                <label for="form-province" class="">Provinsi</label>
                                <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->province}}" disabled>
                              </div>

                            </div>
                            <div class="col-md-12">

                                <div class="md-form mb-0">
                                    <label for="form-regecy" class="">Kota</label>    
                                    <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->regency}}" disabled>
                                </div>
  
                            </div>
                            <div class="col-md-12">

                                <div class="md-form mb-0">
                                    <label for="form-contact-company" class="">Alamat</label>
                                    <input type="text" id="alamat" class="form-control" value="{{$transaksi->address}}" disabled>
                                </div>
  
                            </div>
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="form-contact-company" class="">Kurir</label>
                                  <input type="text" id="alamat" class="form-control" value="{{$transaksi->courier->courier}}" disabled>
  
                                </div>
                            </div>

                            <!-- Grid column -->

                          </div>
                          <!-- Grid row -->

                          <!-- Grid row -->


                        </div>

                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-lg-4">

                        <div class="card-body">

                          <h3 class="my-4 pb-2">Rangkuman Pesanan</h3>
                          <br>
                          <label>Summary</label>
                          <ul class="text-lg-left list-unstyled ml-4">

                            <li>
                              <h6>Status: 
                                <span class="badge blue">
                                @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                    Menunggu Konfirmasi
                                @else
                                {{$transaksi->status}}
                                @endif</span>
                              </h6>
                            </li>
                            <li>
                                <h6>Sub Biaya: Rp.{{$transaksi->sub_total}}</h6>
                            </li>
                            <li>
                                <h6 id="biaya-ongkir">Biaya Pengiriman: Rp.{{$transaksi->shipping_cost}}</h6>
                            </li>
                            <li>
                                <h6>Total Biaya: Rp.{{$transaksi->total}}</h6>
                            </li>
                            <li>
                            <h6>Bukti Pembayaran: 
                                @if (is_null($transaksi->proof_of_payment))
                                <span class="badge success-color">Not yet</span>
                                @else
                                <span class="badge success-color">Already</span>
                                @endif
                            </h6>
                          </li>
                            <br>
                            
                            <li>
                                    @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                        <br>
                                        <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/transaksi/detail/status" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{$transaksi->id}}">
                                              <input type="hidden" name="status" value="3">
                                              <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apa yakin ingin acc pesanan ini?')">Verify</button>
                                            </form>
                                        </div>  
                                    @endif

                                    @if ($transaksi->status === 'verified')
                                            <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/transaksi/detail/status" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$transaksi->id}}">
                                                <input type="hidden" name="status" value="4">
                                                <button type="submit" class="btn btn-success btn-sm">Deliver Products</button>
                                            </form>
                                        </div>  
                                    @endif
                                    
                                        @if (is_null($transaksi->proof_of_payment))
                                       
                                        @else
                                            <div style="margin-top:10px;" class="d-flex justify-content-center">
                                                <button id="tombol" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalContactForm">Proof Of Payment</button>
                                            </div>
                                        @endif

                                        <div style="margin-top:10px;" class="d-flex justify-content-center">
                                          <a href="/admin/transaksi"><button class="btn btn-warning btn-rounded">Back</button></a>
                                        </div>
                            </li>

                          </ul>
                        </div>
                      </div>
                      <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                  </div>
                  <!-- Form with header -->
                </section>
                <!-- Section: Contact v.3 -->

              </div>

            </div>

          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>

  </main>
  <!-- Main Layout -->
      <!-- Main Container -->
      <br><br>
      <div style="width:1000px;" class="container">
        <section class="section my-5 pb-5">
  
          <!-- Shopping Cart table -->
          <div class="table-responsive">
            <h1 align="center">Rincian Produk</h1>
            <br>
            <table class="table">
  
              <!-- Table head -->
              <thead>
  
                <tr>
  
                  <th></th>
  
                  <th class="font-weight-bold">
  
                    <strong>Product</strong>
  
                  </th>
  
                  <th></th>

                  <th class="font-weight-bold">
                    <strong>Diskon</strong>
                  </th>
  
                  <th class="font-weight-bold">
  
                    <strong>Price</strong>
  
                  </th>

  
                  <th class="font-weight-bold">
  
                    <strong>QTY</strong>
  
                  </th>  

                </tr>
  
              </thead>
              <!-- Table head -->
  
              <!-- Table body -->
              <tbody>
  
                <!-- First row -->
                @foreach ($transaksi->transaction_detail as $item)
                    
                
                <tr>
  
                  <th scope="row">
                      @foreach ($item->product->product_image as $image)
                      
                          <img style="width:100px;height:100px;" src="{{asset('/uploads/product_images/'.$image->image_name)}}" alt=""class="img-fluid z-depth-0">
                          @break
                      @endforeach
                  </th>
  
                  <td>
                    <h5 class="mt-3">
                      <input type="hidden" name="id" id="product_id{{$loop->iteration-1}}" value="{{$item->product->id}}">
                      <strong>{{$item->product->product_name}}</strong>
                    </h5>
                  </td>
                  <td></td>
                  <td>{{$item->discount}}%</td>
                  <td>Rp.{{$item->selling_price}}</td>
                  <td class="text-center text-md-left">
  
                    <span>{{$item->qty}} </span>
  
                  </td>

                </tr>
                @endforeach
  
              </tbody>
              <!-- Table body -->
  
            </table>
  
          </div>
          <!-- Shopping Cart table -->
  
        </section>
      </div>
      <!-- Main Container -->
      <div class="modal" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog cascading-modal" role="document">
        <!-- Content -->
        <div class="modal-content">
      
          <!-- Header -->
          <div class="modal-header light-blue darken-3 white-text">
            <h4>Bukti Pembayaran</h4>
          </div>
      
          <!-- Body -->
          <div class="modal-body mb-0">
            <div align="center" class="d-flex justify-content-center">
                <img style="width:300px;height:300px;" src="{{url('proof_payment/'.$transaksi->proof_of_payment)}}"  id="output_image" onload="preview_image(event)" class="mb-2 mw-50 w-50 h-50 rounded">
              </div>
          </div>
        </div>
        <!-- Content -->
      </div>
      </div>
@endsection
