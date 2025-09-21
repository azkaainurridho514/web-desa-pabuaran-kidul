@extends('auth.layouts.main')
@section("title", 'Tamu')
@section("title-header", 'Tamu')
@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <div class="row justify-content-lg-between px-3">
                    <h3 class="card-title">Data Pengunjung</h3>
                    <div class="card-group">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVisitorModal">
                        <i class="fas fa-plus"></i> Tambah Pengunjung
                      </button>
                    </div>
                  </div>
                </div>
                
                <div class="card-body">
                    {{-- Filter Section --}}
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select id="category-filter" class="form-control">
                                <option value="">-- Semua Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="date-range" class="form-control" placeholder="Pilih rentang tanggal">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button id="reset-filter" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>

                    {{-- DataTable --}}
                    <div class="table-responsive">
                        <table id="visitors-table"  class="table table-striped table-bordered text-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    {{-- <th>NIK</th> --}}
                                    <th>Telepon</th>
                                    <th>Tujuan</th>
                                    <th>RT/RW</th>
                                    {{-- <th>Jalan</th> --}}
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Durasi</th>
                                    {{-- <th>Dibuat</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Visitor -->
<div class="modal" id="visitorModal" tabindex="-1" aria-labelledby="visitorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="visitorModalLabel">Detail Visitor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <dl class="row">
          <dt class="col-sm-4">Nama</dt>
          <dd class="col-sm-8" id="modal-name"></dd>

          <dt class="col-sm-4">Nik</dt>
          <dd class="col-sm-8" id="modal-nik"></dd>

          <dt class="col-sm-4">No HP</dt>
          <dd class="col-sm-8" id="modal-phone"></dd>

          <dt class="col-sm-4">Tujuan</dt>
          <dd class="col-sm-8" id="modal-category"></dd>

          <dt class="col-sm-4">RT/RW</dt>
          <dd class="col-sm-8" id="modal-rt-rw"></dd>

          <dt class="col-sm-4">Jalan</dt>
          <dd class="col-sm-8" id="modal-street"></dd>

          <dt class="col-sm-4">Tanggal Kunjungan</dt>
          <dd class="col-sm-8" id="modal-dates"></dd>

          <dt class="col-sm-4">Durasi</dt>
          <dd class="col-sm-8" id="modal-duration"></dd>


          <dt class="col-sm-4">Description</dt>
          <dd class="col-sm-8" id="modal-description"></dd>
        </dl>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Visitor -->
<div class="modal" id="editVisitorModal" tabindex="-1" aria-labelledby="editVisitorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="editVisitorForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Visitor</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body row g-3">
          <input type="hidden" id="edit-id">
          <div class="col-md-6">
            @method('PUT')
            <input type="hidden" id="edit-id" name="id">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" id="edit-name" name="name" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">No HP</label>
            <input type="text" class="form-control" id="edit-phone" name="phone">
          </div>
          <div class="col-md-6">
            <label class="form-label">Nik</label>
            <input type="text" class="form-control" id="edit-nik" name="nik">
          </div>
          <div class="col-md-6">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" id="edit-description" name="description">
          </div>
          <div class="col-md-6">
            <label class="form-label">Kategori</label>
            {{-- <select class="form-select" id="edit-category" name="category_id" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select> --}}
            <select id="edit-category" class="form-control" name="category_id" required>
                <option value="">-- Semua Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">RT</label>
            <input type="text" class="form-control" id="edit-rt" name="rt">
          </div>
          <div class="col-md-3">
            <label class="form-label">RW</label>
            <input type="text" class="form-control" id="edit-rw" name="rw">
          </div>
          <div class="col-md-6">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="edit-start" name="start_date">
          </div>
          <div class="col-md-6">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="edit-end" name="end_date">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal Add Visitor -->
<div class="modal" id="addVisitorModal" tabindex="-1" aria-labelledby="addVisitorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="addVisitorForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Visitor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body row g-3">
          @csrf
          @method('POST')
          <div class="form-group col-md-6">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" id="add-name" required>
          </div>

          <div class="form-group col-md-6">
            <label for="nik">Nik</label>
            <input type="text" class="form-control" name="nik" id="add-nik" required>
          </div>
          <div class="form-group col-md-6">
            <label for="phone">No HP</label>
            <input type="text" class="form-control" name="phone" id="add-phone" required>
          </div>
          <div class="form-group col-md-6">
            <label for="rt">Rt</label>
            <input type="text" class="form-control" name="rt" id="add-rt" required>
          </div>
          <div class="form-group col-md-6">
            <label for="rw">Rw</label>
            <input type="text" class="form-control" name="rw" id="add-rw" required>
          </div>
          <div class="form-group col-md-6">
            <label for="street">Jalan</label>
            <input type="text" class="form-control" name="street" id="add-street" required>
          </div>

          <div class="form-group col-md-6">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" class="form-control" name="start_date" id="add-start" required>
          </div>

          <div class="form-group col-md-6">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" class="form-control" name="end_date" id="add-end" required>
          </div>

          <div class="form-group col-md-6">
            <label for="end_date">Tujuan</label>
            <select id="edit-category" class="form-control" name="category_id" required>
                <option value="">-- Semua Tujuan --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description" id="add-description" rows="3"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection


@push('scripts')
<!-- JSZip untuk export Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- pdfmake (SIMPAN jika nanti ingin pakai PDF), untuk sekarang tidak dipakai -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> --}}

<!-- DataTables core dan plugin -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Buttons (hanya yang digunakan) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
{{-- PDF dan Print tidak digunakan saat ini --}}
{{-- <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script> --}}

<!-- DataTables Responsive (kamu pakai scrollX, jadi ini bisa dihapus juga) -->
{{-- <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script> --}}

<!-- Moment.js & Daterangepicker -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom JS kamu (DataTable init, filter, dan delete) -->

<script>
$(document).ready(function() {
    // Initialize DataTable
    let table = $('#visitors-table').DataTable({
        // processing: true,
        serverSide: true,
        responsive: false,
        scrollX: true, // ← TAMBAHKAN INI untuk horizontal scroll
        // responsive: false, // ← DISABLE responsive mode
        ajax: {
            url: "{{ route('visitors.data') }}",
            data: function (d) {
                d.category_id = $('#category-filter').val();
                d.date_range = $('#date-range').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            // {data: 'nik', name: 'nik'},
            {data: 'phone', name: 'phone'},
            { data: 'category_name', name: 'category.name' },
            {data: 'rt_rw', name: 'rt_rw', orderable: false, searchable: false},
            // {data: 'street', name: 'street'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'duration', name: 'duration'},
            // {data: 'created_at', name: 'created_at'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false,
                width: '200px'  
            }
        ],
        dom: 'Bfrtip',
        buttons: [
             {
                extend: 'excel',
                text: 'Export Excel',
                filename: 'data_visitor_pabuaran_kidul', 
                title: 'Laporan Data Visitor',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            }
        ],
        language: {
            processing: "Memproses...",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(difilter dari _MAX_ total data)",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        }
    });
    if ($.fn.daterangepicker) {
        $('#date-range').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'YYYY-MM-DD'
            }
        });

        // Saat user memilih tanggal
        $('#date-range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            table.draw();
        });

        // Saat user menghapus tanggal
        $('#date-range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            table.draw();
        });
    } else {
        console.error("daterangepicker is not loaded.");
    }

    // Filter tujuan
    $('#category-filter').on('change', function() {
        table.draw();
    });

    // Reset filter
    $('#reset-filter').on('click', function() {
        $('#category-filter').val('');
        $('#date-range').val('');
        table.draw();
    });


    // Event ketika tombol view diklik
    $('#visitors-table').on('click', '.view-btn', function () {
        const id = $(this).data('id');

        $.ajax({
            url: '/visitors/' + id,
            type: 'GET',
            success: function (res) {
                $('#modal-name').text(res.name);
                $('#modal-nik').text(res.nik);
                $('#modal-description').text(res.description);
                $('#modal-street').text(res.street);
                $('#modal-phone').text(res.phone);
                $('#modal-category').text(res.category?.name ?? '-');
                $('#modal-rt-rw').text(`${res.rt}/${res.rw}`);
                $('#modal-dates').text(`${res.start_date} s/d ${res.end_date}`);
                $('#modal-duration').text(res.duration + ' hari');

                const modal = new bootstrap.Modal(document.getElementById('visitorModal'));
                modal.show();
            },
            error: function () {
                alert('Gagal memuat data!');
            }
        });
    });
    // Tombol Edit - ambil data dan buka modal
    $('#visitors-table').on('click', '.edit-btn', function () {
        const id = $(this).data('id');
        const formatDate = (dateString) => dateString.split('T')[0];
        $.get('/visitors/' + id + '/edit', function (res) {
            $('#edit-id').val(id);
            $('#edit-name').val(res.name);
            $('#edit-phone').val(res.phone);
            $('#edit-category').val(res.category?.id ?? '');
            $('#edit-rt').val(res.rt);
            $('#edit-rw').val(res.rw);
            $('#edit-nik').val(res.nik);
            $('#edit-description').val(res.description);
            $('#edit-start').val(formatDate(res.start_date));
            $('#edit-end').val(formatDate(res.end_date));

                new bootstrap.Modal(document.getElementById('editVisitorModal')).show();
            });
        });

        $('#editVisitorForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#edit-id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `/visitors/${id}`,
                method: 'PUT',
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    $('#editVisitorModal').modal('hide');
                    $('#visitors-table').DataTable().ajax.reload(null, false);
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan data.'
                    });
                }
            });
        });

    $(document).on('click', '.delete-btn', function() {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/visitors/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Terhapus!', response.message, 'success');
                            $('#visitors-table').DataTable().ajax.reload(null, false);
                        } else {
                            Swal.fire('Error!', response.message || 'Gagal menghapus data!', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data!', 'error');
                    }
                });
            }
        });
    });

    $('#addVisitorForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
        url: '/visitors',
        method: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            if (response.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.message,
                timer: 1500,
                showConfirmButton: false
            });

            $('#addVisitorModal').modal('hide');
            $('#addVisitorForm')[0].reset();
            $('#visitors-table').DataTable().ajax.reload(null, false); // Reload tabel jika pakai datatable
            } else {
            Swal.fire('Gagal', response.message, 'error');
            }
        },
        error: function (xhr) {
            console.log(xhr);
            let errors = xhr.responseJSON.errors;
            let errorMessage = 'Terjadi kesalahan validasi.';
            if (errors) {
            errorMessage = Object.values(errors).map(e => e[0]).join('<br>');
            }
            Swal.fire('Gagal', errorMessage, 'error');
        }
        });
    });

});
</script>
@endpush