@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Data Mahasiswa</h2>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" id="btn-tambah" data-bs-target="#modal-mahasiswa">Tambah Mahasiswa</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table-mahasiswa">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Mahasiswa -->
    <div class="modal fade" id="modal-mahasiswa" tabindex="-1" aria-labelledby="modal-mahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-mahasiswaLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-mahasiswa">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" min="1" placeholder="Masukkan NIM" class="form-control" id="nim" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" placeholder="Masukkan Nama" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" placeholder="Masukkan Tanggal Lahir" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Sosial">Sosial</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea placeholder="Masukkan Alamat" class="form-control" id="alamat" name="alamat" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Mahasiswa -->
    <div class="modal fade" id="hapusMahasiswa" tabindex="-1" aria-labelledby="hapusMahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusMahasiswaLabel">Hapus Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data <b id="nama-hapus"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-nim="" id="hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
        <script>
            var table;
            var currentNim = null;

            // Setup CSRF token untuk semua AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                xhrFields: {
                    withCredentials: true
                }
            });

            $(document).ready(function() {
                table = $('#table-mahasiswa').DataTable({
                    ajax: {
                        url: "/api/mahasiswa",
                        dataSrc: 'data',
                        xhrFields: {
                            withCredentials: true
                        },
                        error: function (xhr, error, thrown) {
                            console.error('AJAX Error:', xhr.responseText);
                            console.error('Error:', error);
                            console.error('Thrown:', thrown);
                            if (xhr.status === 401) {
                                toastr.error('Sesi Anda telah berakhir. Silakan login kembali.');
                                setTimeout(function() {
                                    window.location.href = '/';
                                }, 2000);
                            } else {
                                toastr.error('Gagal memuat data mahasiswa');
                            }
                        }
                    },
                    order: [[0, 'desc']],
                    dom: 'Bfrtip',
                    lengthMenu: [[10, 15, 20], [10, 15, 20]],
                    columns: [
                        {data: 'nim', name: 'nim'},
                        {data: 'nama', name: 'nama'},
                        {data: 'jk', name: 'jk'},
                        {data: 'tgl_lahir', name: 'tgl_lahir'},
                        {data: 'jurusan', name: 'jurusan'},
                        {data: 'alamat', name: 'alamat'},
                        {data:'nim', render: function(data) {
                            return '<div class="d-flex justify-content-center m-2">'+
                                        '<button type="button" class="btn btn-warning btn-sm m-2 edit-mahasiswa" data-nim="'+data+'">Edit</button>'+
                                        '<button type="button" class="btn btn-danger btn-sm m-2 hapus-mahasiswa" data-nim="'+data+'">Hapus</button>'+
                                    '</div>';
                        }},
                    ]
                });

                // Reset form dan modal saat tombol tambah diklik
                $('#btn-tambah').click(function() {
                    $('#modal-mahasiswa').modal('show');
                    resetForm();
                    $('#modal-mahasiswaLabel').text('Tambah Mahasiswa');
                    $('#btn-simpan').text('Simpan').attr('id', 'btn-simpan');
                    $('#nim').prop('disabled', false);
                    currentNim = null;
                });

                function resetForm() {
                    $('#form-tambah-mahasiswa')[0].reset();
                    $('#nim').prop('disabled', false);
                }

                function ambilData() {
                    return {
                        nama: $('#nama').val(),
                        nim: $('#nim').val(),
                        jk: $('#jk').val(),
                        tgl_lahir: $('#tgl_lahir').val(),
                        jurusan: $('#jurusan').val(),
                        alamat: $('#alamat').val()
                    }
                }

                // Handle form submit untuk tambah dan update
                $('#form-tambah-mahasiswa').on('submit', function(e) {
                    e.preventDefault();
                    var data = ambilData();
                    var url = currentNim ? "/api/mahasiswa/" + currentNim : "/api/mahasiswa";
                    var method = currentNim ? "PUT" : "POST";

                    $.ajax({
                        url: url,
                        type: method,
                        data: data,
                        xhrFields: {
                            withCredentials: true
                        },
                        success: function(response) {
                            table.ajax.reload();
                            $('#modal-mahasiswa').modal('hide');
                            resetForm();
                            toastr.success(response.message || 'Data berhasil disimpan');
                        },
                        error: function(xhr) {
                            var message = 'Terjadi kesalahan';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                message = xhr.responseJSON.message;
                            }
                            if (xhr.status === 401) {
                                message = 'Sesi Anda telah berakhir. Silakan login kembali.';
                                setTimeout(function() {
                                    window.location.href = '/';
                                }, 2000);
                            }
                            toastr.error(message);
                        }
                    });
                });

                // Handle edit mahasiswa
                $(document).on('click', '.edit-mahasiswa', function() {
                    var nim = $(this).data('nim');
                    currentNim = nim;

                    $.ajax({
                        url: "/api/mahasiswa/" + nim,
                        type: "GET",
                        xhrFields: {
                            withCredentials: true
                        },
                        success: function(response) {
                            var data = response.data || response;
                            $('#modal-mahasiswaLabel').text('Edit Mahasiswa');
                            $('#btn-simpan').text('Update').attr('id', 'btn-update');
                            $('#nama').val(data.nama);
                            $('#nim').val(data.nim).prop('disabled', true);
                            $('#jk').val(data.jk);
                            $('#tgl_lahir').val(data.tgl_lahir);
                            $('#jurusan').val(data.jurusan);
                            $('#alamat').val(data.alamat);
                            $('#modal-mahasiswa').modal('show');
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                toastr.error('Sesi Anda telah berakhir. Silakan login kembali.');
                                setTimeout(function() {
                                    window.location.href = '/';
                                }, 2000);
                            } else {
                                toastr.error('Gagal mengambil data mahasiswa');
                            }
                        }
                    });
                });

                // Handle hapus mahasiswa
                $(document).on('click', '.hapus-mahasiswa', function() {
                    var nim = $(this).data('nim');

                    $.ajax({
                        url: "/api/mahasiswa/" + nim,
                        type: "GET",
                        xhrFields: {
                            withCredentials: true
                        },
                        success: function(response) {
                            var data = response.data || response;
                            $('#nama-hapus').text(data.nama);
                            $('#hapus').data('nim', nim);
                            $('#hapusMahasiswa').modal('show');
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                toastr.error('Sesi Anda telah berakhir. Silakan login kembali.');
                                setTimeout(function() {
                                    window.location.href = '/';
                                }, 2000);
                            } else {
                                toastr.error('Gagal mengambil data mahasiswa');
                            }
                        }
                    });
                });

                // Konfirmasi hapus
                $('#hapus').click(function() {
                    var nim = $(this).data('nim');

                    $.ajax({
                        url: "/api/mahasiswa/" + nim,
                        type: "DELETE",
                        xhrFields: {
                            withCredentials: true
                        },
                        success: function(response) {
                            table.ajax.reload();
                            $('#hapusMahasiswa').modal('hide');
                            toastr.success(response.message || 'Data berhasil dihapus');
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                toastr.error('Sesi Anda telah berakhir. Silakan login kembali.');
                                setTimeout(function() {
                                    window.location.href = '/';
                                }, 2000);
                            } else {
                                toastr.error('Gagal menghapus data mahasiswa');
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
