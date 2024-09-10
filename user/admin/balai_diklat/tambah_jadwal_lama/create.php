<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tambah Jadwal Lama</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                <form method="POST" action="../../proses/tambah_jadwal_lama.php" enctype="multipart/form-data">
                    <table class="table table-striped" style="padding: 100px">
            <tr>
                <td style="width: 150px;">Nama</td>
                <td style="width: 20px;">:</td>
                <td><input name="nama" class="form-control" type="text" required></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td><input name="email" class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td><input name="telp" class="form-control" type="number"></td>
            </tr>
            <tr>
                <td>Nama Instansi</td>
                <td>:</td>
                <td><input name="nama_instansi" class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>Nama Kegiatan</td>
                <td>:</td>
                <td><input name="nama_kegiatan" class="form-control" type="text" required></td>
            </tr>
            <tr>
                <td>Jumlah Peserta Laki-laki</td>
                <td>:</td>
                <td><input name="peserta_pria" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td>Jumlah Peserta Perempuan</td>
                <td>:</td>
                <td><input name="peserta_wanita" type="number" class="form-control" required></td>
            </tr>
            <tr>
                <td>Tanggal Mulai</td>
                <td>:</td>
                <td><input name="tgl_mulai" class="form-control" type="date" required></td>
            </tr>
            <tr>
                <td>Tanggal Selesai</td>
                <td>:</td>
                <td><input name="tgl_selesai" class="form-control" type="date" required></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:28px">Surat Permohonan</td>
            </tr>
            <tr>
                <td>Upload Surat Permohonan</td>
                <td>:</td>
                <td><input class="form-control" name="surat_permohonan" type="file" accept="application/pdf" required></td>
            </tr>
            <tr>
                <td>Nomer Surat Permohonan</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="no_srt_permohonan" required></td>
            </tr>
            <tr>
                <td>Tangal Surat Permohonan</td>
                <td>:</td>
                <td><input  class="form-control"  type="date" name="tgl_srt_permohonan" required></td>
            </tr>
            <tr>
                <td>Perihal Surat Permohonan</td>
                <td>:</td>
                <td><input  class="form-control"  type="text" name="perihal_srt_permohonan" required></td>
            </tr>
            <tr>
                <td colspan="3" style="font-size: 28px;">Surat Persetujuan</td>
            </tr>
            <tr>
                <td>Persetujuan</td>
                <td>:</td>
                <td>
                    <select class="form-control" name="status">
                        <option value="1">Disetujui</option>
                        <option value="0">Tidak Disetujui</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Surat Persetujuan</td>
                <td>:</td>
                <td><input class="form-control" type="date" name="tgl_persetujuan"></td>
            </tr>
            <tr>
                <td>No Surat Persetujuan</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="no_srt_persetujuan"></td>
            </tr>
        </table>
        <button class="btn btn-primary" type="submit">Simpan</button>
        </form>