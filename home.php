<div style="display:flex;justify-content:space-between;height:110%">
    <div style="margin-left:40px;color:#0F3C96; margin-top:150px;width:40%">
        <p style="font-size: 180px;line-height:90%;">Gedung </br> Diklat</p>
        <p style="font-size: 26px;margin-left:12px;">Badan Kepegawaian dan Diklat Sumber Daya Manusia</p>
        <p style="font-size: 26px;margin-left:12px;">Pemerintah Kota Surabaya</p>
    </div>
    <div style="width:60%;">
        <img style="width:95%;border-radius:40px;padding:20px;"  src="resource/photo/home 1.jpeg">
    </div>
</div>
<div style="display: flex;justify-content:space-around;padding:100px">
    <div class="card" style="width: 18rem;">
        <img src="resource/photo/home 1.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Fasilitas Balai Diklat</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Lihat</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="resource/photo/calendar icon.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Booking Balai Diklat</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="calendar/calendar.php" class="btn btn-primary">Lihat Jadwal</a>
        </div>
    </div>
</div>
<div style="display: flex;width:100%;">
    <div style="width:40%;padding:40px">
        <p style="font-size: 120px;line-height:100%;">Kegiatan di Gedung Diklat</p>
        <p style="font-size: 24px;">Berikut ini adalah kegiatan-kegiatan yang dilakukan di area Balai Diklat Badan Pengembangan dan Diklat Sumber Daya Manusia di Prigen</p>
        <a class="btn btn-primary btn-lg" href="?pages=index_kegiatan">Lihat</a>
    </div>
    <div id="carouselExampleSlidesOnly" style="padding: 30px;" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img style="border-radius:40px;" class="d-block w-100" src="resource/photo/kegiatan 1.jpeg" alt="First slide">
        </div>
        <div class="carousel-item">
        <img style="border-radius:40px" class="d-block w-100" src="resource/photo/kegiatan 2.jpeg" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img style="border-radius:40px" class="d-block w-100" src="resource/photo/kegiatan 3.jpeg" alt="Third slide">
        </div>
    </div>
    </div>
</div>
<?php 
    include 'user/assets/footer.php';
?>