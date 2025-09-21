<section style="padding: 50px 0; background-color: #9fa8da;">
  <div class="container" style="max-width: 1200px; margin: auto;">
    <h2 style="font-size: 45px; font-weight: bold; color: #000000; margin-bottom: 30px;">
      Peta Lokasi Desa
    </h2>

    <div class="row px-5 gap-3 justify-content-center">
      
      <!-- Kotak Informasi -->
        <div class="col-lg-5 mb-4" style="background-color: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
          <h4 style="font-weight: bold;">Batas Desa:</h4>
          <div style="display: flex; justify-content: space-between; margin-top: 10px;">
            <div>
              <strong>Utara</strong><br>
               {{ $home->batas_desa_utara }}
              <br><br>
              
              <strong>Selatan</strong><br>
              {{ $home->batas_desa_selatan }}
              <br><br>
            </div>
            <div>
              <strong>Timur</strong><br>
               {{ $home->batas_desa_timur }}
              <br><br>
              
              <strong>Barat</strong><br>
              {{ $home->batas_desa_barat }}
              <br><br>
            </div>
          </div>
      
          <hr style="margin: 20px 0;">
      
          <h4 style="font-weight: bold;">Luas Desa:</h4>
          <p>{{ $homeInformation->wilayah_administratif }}</p>
      
          <hr style="margin: 20px 0;">
      
          <h4 style="font-weight: bold;">Jumlah Penduduk:</h4>
          <p>{{ $homeInformation->total_jiwa }} Jiwa</p>
        </div>


      <!-- Peta -->
      <div class="col-lg-5 mb-4" style=" background-color: #fff9f0; border-radius: 20px; padding: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <iframe 
          src="{{ $home->maps }}" 
          width="100%" height="400" 
          style="border:0; border-radius: 15px;" 
          allowfullscreen="" loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>