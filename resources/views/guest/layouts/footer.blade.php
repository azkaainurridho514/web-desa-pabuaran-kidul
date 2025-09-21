  <section data-bs-version="5.1" class="footer4 cid-uRsYP9pafe" once="footers" id="footer4-5">
      <div class="container py-4">
          <div class="row mbr-white gy-4 justify-content-between">
              <!-- Kolom 1: Logo dan Identitas Desa -->
              <div class="col-lg-3">
                  <div class="media-wrap col-md-8 col-12">
                      <img src="{{ asset("home/assets/images/logo20cirebon-397x414.png") }}" alt="Logo Desa Pabuaran Kidul">
                  </div>
              </div>

              <!-- Kolom 2: Alamat Lengkap -->
              <div class="col-lg-3">
                  <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7"><strong>Pemerintahan Desa</strong></h5>
                  <p class="mbr-text mbr-fonts-style mb-4 display-4">
                      {{ $footer->address ?? "" }}
                  </p>

                  <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-7"><strong>Ikuti Kami</strong></h5>
                  <div class="social-row display-7">
                      <div class="soc-item">
                          <a href="{{ $footer->fb_link ?? "" }}" target="_blank">
                              <span class="mbr-iconfont socicon socicon-facebook"></span>
                          </a>
                      </div>
                      <div class="soc-item">
                          <a href="{{ $footer->ig_link ?? "" }}" target="_blank">
                              <span class="mbr-iconfont socicon socicon-instagram"></span>
                          </a>
                      </div>
                      <div class="soc-item">
                          <a href="{{ $footer->yt_link ?? "" }}" target="_blank">
                              <span class="mbr-iconfont socicon socicon-youtube"></span>
                          </a>
                      </div>
                  </div>
              </div>

              <!-- Kolom 3: Menu Navigasi -->
              {{-- <div class="col-3 ps-5">
                  <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7"><strong>Menu</strong></h5>
                  <ul class="list mbr-fonts-style display-4">
                      <li class="mbr-text item-wrap"><a href="">Home</a></li>
                      <li class="mbr-text item-wrap"><a href="">Profil Desa</a></li>
                      <li class="mbr-text item-wrap"><a href="">Potensi</a></li>
                      <li class="mbr-text item-wrap"><a href="">Berita</a></li>
                      <li class="mbr-text item-wrap"><a href="">SOTK</a></li>
                  </ul>
              </div> --}}

              <!-- Kolom 4: Kontak dan Jam Layanan -->
              <div class="col-lg-3">
                  <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7"><strong>Kontak</strong></h5>
                  <p class="mbr-text mbr-fonts-style display-4">
                      Telepon: {{ $footer->telepon_kantor ?? "" }}<br>
                      WhatsApp: {{ $footer->whatsapp ?? "" }}<br><br>
                      <strong>Jam Layanan:</strong><br>
                      Senin – Jumat: {{ $footer->senin_jumat ?? "" }}<br>
                      Sabtu – Minggu: {{ $footer->sabtu_minggu ?? "" }}<br><br>
                      <strong>Laporan Pengaduan</strong><br>
                      <a href="pengaduanmasyarakat.html" style="text-decoration: underline; color: #ffffff;">Klik di sini</a>
                  </p>
              </div>

              <!-- Copyright -->
              <div class="col-12 mt-4 text-center">
                <div class="d-inline-flex align-items-center gap-3 flex-wrap justify-content-center">
                  <p class="mbr-text mb-0 mbr-fonts-style copyright display-7">
                    © 2025 {{ $home->title_nav ?? "" }} – All Rights Reserved
                  </p>
                  <div class="d-flex gap-3 mt-2 mt-md-0">
                    <img src="{{ asset("home/assets/images/logo20cirebon-96x100.png") }}" alt="Logo 1" height="40">
                    <img src="{{ asset("home/assets/images/logo1.png") }}" alt="Logo 2" height="40">
                    <img src="{{ asset("home/assets/images/logo2.png") }}" alt="Logo 3" height="40">
                  </div>
                </div>
              </div>
          </div>
      </div>
  </section>