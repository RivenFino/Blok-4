<link rel="stylesheet" href="<?php echo BASE_URL."css/slider.css"?>">
<link rel="stylesheet" href="<?php echo BASE_URL."css/kategori.css"?>">
<link rel="stylesheet" href="<?php echo BASE_URL."css/kartu_produk.css"?>">
<div class="banner">

    <div class="content-slide">
        <?php
        $querySlider = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 4");

        $no = 1;
        while ($row = mysqli_fetch_assoc($querySlider)) {
            $banner_id = $row["banner_id"];
            $banner[$banner_id] = array("banner" => $row["banner"],
                                        "gambar" => $row["gambar"],
                                        "link"   => $row["link"],
                                        "deskripsi" => $row["deskripsi"],
                                        "sub_deskripsi" => $row["sub_deskripsi"]);
        }
        $total = count($banner);
        foreach ($banner AS $key => $value) 
        {
            $banner_id = $key;

            $banner = $value["banner"];
            $gambar = $value["gambar"];
            $link = $value["link"];
            $deskripsi = $value["deskripsi"];
            $sub_deskripsi = $value["sub_deskripsi"];

            echo
            "<div class='imgslide fade'>
                    <div class='numberslide'>$no / $total</div>
                    <a  href='$link'><img class='img-slide' src='image/slide/$gambar' alt='Banner'></a>
                    ";
            if ($deskripsi) {
                echo "<div class='text'>
                            <span class='deskripsi>$deskripsi</span>
                            <span class='sub_deskripsi>$sub_deskripsi</span>
                        </div>";
            }
            echo "
                </div>
                <a id='next-prev' class='prev' onClick='nextslide(-1)'>&#10094;</a>
                <a class='next' onClick='nextslide(1)'>&#10095;</a>
                ";
            $no++;
        }

        ?>

        <div class="page">
            <?php
            $no = 1;
            while ($no <= 4) {
                echo "<span class='dot' onclick='dotslide($no)'></span>";
                $no++;
            }
            ?>
        </div>
    </div>


    <script src="js/slide.js">
        var slideIndex = 1;
        showSlide(slideIndex);

        function nextslide(n) {
            showSlide(slideIndex += n);
        }

        function dotslide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            var i;
            var slides = document.getElementsByClassName("imgslide");
            var dot = document.getElementsByClassName("dot");

            if (n > slides.length) {
                slideIndex = 1;
            }

            if (n < 1) {
                slideIndex = slides.length;
            }

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            for (i = 0; i < slides.length; i++) {
                dot[i].className = dot[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";

            dot[slideIndex - 1].className += " active";
        }
    </script>
</div>

<div class="atas">
    <?php
        $kategori_id=@$_GET['kategori_id'];
        echo kategori($kategori_id);
    ?>
</div>

<div class="penuh">
    <div id="frame-barang">
        <div class="katalog">

            <div class="katalog">

                <div class="gallery" id="anggap frame barang">

                    <?php 
                    if($kategori_id)
                    {
                        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() ASC LIMIT 9");
                    }
                    else
                    {
                        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() ASC LIMIT 12");
                    }
                    $no = 1;
                    while($row=mysqli_fetch_assoc($query))
                    {
                        $harga = $row['harga']; 
                        
                        $style = false;
                        if($no == 3)
                        {
                            $style = "style='margin-right:0px";
                            $no = 0;
                        }
                        if($harga > 20000000)
                        {
                            $buy = "buy-2";
                            $warnaHarga = "harga-2";
                        }
                        else if($harga > 10000000)
                        {
                            $buy = "buy-1";
                            $warnaHarga = "harga-1";
                        }
                        else if($harga > 5000000)
                        {
                            $buy = "buy-4";
                            $warnaHarga = "harga-4";
                        }
                        else
                        {
                            $buy = "buy-3";
                            $warnaHarga = "harga-3";
                        }
                        
                    ?>

                    <div class="content">
                        <a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]";?>">
                            <div class="image">
                                <img width="100%" height="200px" src="<?php echo"image/barang/$row[gambar]"; ?>" alt="Gambar Produk">
                            </div>
                        </a>
                        <h3><a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]";?>"><?php echo $row['nama_barang']; ?></a></h3>
                        
                        <button onclick="window.location.href='<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]";?>'" class="<?php echo "$buy"; ?>"><h6 class="harga-button" ><?php echo rupiah($row['harga']); ?></h6></button>
                    </div>

                <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>