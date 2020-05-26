<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DagangElektronik.com</title>
<link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('assets/User/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/User/styles/responsive.css')}}">	
</head>

<body>
<div class="super_container">
    @extends('layouts.navbar')
    <div class="container" style="margin-top: 140px">
        <section>
          <!-- Shopping Cart table -->
          <div class="table-responsive">
            <table class="table">
              <!-- Table head -->
              <thead style="color:#333333;">
                <tr>
                  <th>
                    <strong>Jatuh Tempo Pembayaran</strong>
                  </th>
                  <th>
                    <strong>ID Transaksi</strong>
                  </th>
                  <th>
                    <strong>Alamat</strong>
                  </th>
                  <th>
                    <strong>Kota</strong>
                  </th>
                  <th>
                      <strong>Provinsi</strong>
                  </th>
                  <th>
                      <strong>Total Pembayaran</strong>
                  </th>
                  <th>
                      <strong>Status</strong>
                  </th>
                  <th>
                    <strong>Opsi</strong>
                  </th>
                </tr>
              </thead>
              <!-- Table head -->
              <!-- Table body -->
              <tbody style="color:#666666;">
                <!-- First row -->
                @foreach ($transaksi as $item)
                <tr> 
                  <td>
                    @if ($item->status == 'unverified' & $item->timeout > date('Y-m-d H:i:s'))
                    @php
                        date_default_timezone_set("Asia/Makassar");
                        $date1 = new DateTime($item->timeout);
                        $date2 = new DateTime(date('Y-m-d H:i:s'));
                        $tenggat = $date1->diff($date2);
                    @endphp
                          <span class="badge badge-danger">Sisa Waktu Pembayaran: {{$tenggat->h}} Jam, {{$tenggat->i}} Menit</span>
                     @endif
                  </td>               
                  <td>
                      <strong>{{$item->id}}</strong>
                  </td>
                  <td>
                      <strong>{{$item->address}}</strong>
                  </td>
                  <td>
                      <strong>{{$item->regency}}</strong>
                  </td>
                  <td>
                      <strong>{{$item->province}}</strong>
                  </td>
                  <td>
                      <strong>Rp.{{$item->total}}</strong>
                  </td>
                  <td>
                      <strong>{{$item->status}}</strong>
                  </td>
                  <td>
                    <a href="/transaksi/detail/{{$item->id}}"><strong>Lihat Detail</strong></a>
                  </td>
                </tr>
                @endforeach
                <!-- First row -->
              </tbody>
              <!-- Table body -->
            </table>
          </div>
          <!-- Shopping Cart table -->
        </section>
      </div>
      <!-- Main Container -->
</div>
<footer>
    <script src="{{ asset('assets/User/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('assets/User/styles/bootstrap4/popper.js')}}"></script>
    <script src="{{ asset('assets/User/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/User/plugins/greensock/TweenMax.min.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/greensock/TimelineMax.min.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/scrollmagic/ScrollMagic.min.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/greensock/animation.gsap.min.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/greensock/ScrollToPlugin.min.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/OwlCarousel2-2.2.1/owl.carousel.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/Isotope/isotope.pkgd.min.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/easing/easing.js')  }}"></script>
    <script src="{{ asset('assets/User/plugins/parallax-js-master/parallax.min.js')  }}"></script>
    <script src="{{ asset('assets/User/js/custom.js')  }}"></script>
</footer>
</body>
</html>