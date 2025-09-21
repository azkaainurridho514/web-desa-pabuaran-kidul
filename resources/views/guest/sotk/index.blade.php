@extends('guest.layouts.main')
@section('main')
<section  class="aparat-section bg-black" style="background: url('{{ asset('home/assets/images/pabuaran-1280x720.jpg') }}') no-repeat center center; background-size: 100% 100% !important;">
  
        <div class="container" style="padding-top: 200px; padding-bottom: 100px">
            <div class="mbr-section-head">
                <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2" style="color: #1a237e;"><strong>SOTK</strong></h3>
                <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">Struktur Organisasi dan Tata Kerja Desa Pabuaran Kidul</h4>
            </div>
            <div class="row mbr-gallery mt-4">
                <div class="col-12 col-md-6 col-lg-12 item gallery-image">
                    <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#uRQTt1x2TF-modal" data-bs-target="#uRQTt1x2TF-modal">
                        <img class="w-100" src="assets/images/struktur.jpeg" alt="Mobirise Website Builder" data-slide-to="0" data-bs-slide-to="0" data-target="#lb-uRQTt1x2TF" data-bs-target="#lb-uRQTt1x2TF">
                    </div> 
                </div> 
            </div>
        </div>


    <h2 class="section-title text-white">APARAT PEMERINTAH DESA</h2>
    <div class="aparat-container">
        @foreach ($officers as $item)
            <div class="aparat-card">
                <img src="{{ asset($item->photo) }}" alt="">
                <h3>{{ $item->name }}</h3>
                <p>{{ $item->village_officials }}</p>
            </div>
        @endforeach

    </div>

</section>
@endsection