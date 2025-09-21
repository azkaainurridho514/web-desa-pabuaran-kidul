<section class="cid-sambutan" id="sambutan-kades">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-md-3 mb-3" data-aos="fade-right">
            <img src="{{asset("home/assets/images/logo20cirebon-397x414.png")}}" alt="Kepala Desa" class="img-fluid">
        </div>
        <div class="col-md-9">
            <h3 class="display-5"><strong>Sambutan Kepala Desa</strong></h3>
            <p class="display-7 text-justify">
            {{ $home->sambutan_kepala_desa ?? "" }}
            </p>
        </div>
        </div>
    </div>
</section>