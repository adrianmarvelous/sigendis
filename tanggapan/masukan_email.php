
<div style="display:flex;justify-content:center;width:100%;">
    <div style="
            padding:20px;
            margin:20px;
            border-radius:50px;
            width: 95%;
            height: 750px;
            background: rgba(255, 255, 255, 0.7); // Make sure this color has an opacity of less than 1
            backdrop-filter: blur(8px); // This be the blur">
            <div style="display:flex;justify-content:center;padding-top:150px;">
                <div style="width:400px;height:200px;padding:20px;border-radius:20px;background-color:white">
                    <form method="GET" action="index.php">
                     <p>Masukan Email yang sudah terdaftar :</p>
                     <input class="form-control" type="text"  name="email">
                     <br>
                     <input type="hidden" name="pages" value="index_tanggapan">
                     <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
    </div>
</div>