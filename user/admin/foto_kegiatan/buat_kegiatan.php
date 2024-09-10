<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Foto Kegiatan</h1>
            <div class="card mb-4">
                <div class="card-body">
                <div class="table-responsive">
                    <form action="proses/foto_kegiatan/buat_kegiatan.php" method="POST" enctype="multipart/form-data">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 200px;">Nama Kegiatan</td>
                            <td style="width: 20px;">:</td>
                            <td><input class="form-control" type="text" name="nama_kegiatan" required></td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td>:</td>
                            <td><input class="form-control" type="text" name="nama_instansi" required></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Kegiatan</td>
                            <td>:</td>
                            <td>
                                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Kegiatan</td>
                            <td>:</td>
                            <td><input class="form-control" type="date" name="tanggal" required></td>
                        </tr>
                        <tr>
                            <td>Foto-foto Kegiatan</td>
                            <td>:</td>
                            <td><input class="form-control" type="file" name="foto_kegiatan[]" accept="image/*" multiple required></td>
                        </tr>
                    </table>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>