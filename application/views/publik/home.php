<!doctype html>
<html lang="zxx">


    <?php $this->load->view("publik/_partials/head.php") ?>
<body >
   
   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
 <?php $this->load->view("publik/_partials/banner.php") ?>
  
   
  <!--  is menu -->
   <!-- feature_part start-->
    <section class="feature_part ">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="feature_img">
                        <img src="<?php echo base_url('img/ppid/ppidlogo2.png')?>" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="feature_part_text">
                       
                        <h2>Selamat Datang di Website PPID Kabupaten Sumedang</h2>
                        <p>Informasi merupakan kebutuhan pokok setiap orang bagi pengembangan pribadi dan lingkungan sosialnya serta merupakan bagian penting bagi ketahanan nasional. Hak memperoleh informasi merupakan hak asasi manusia dan kebutuhan informasi publik merupakan salah satu ciri penting negara demokratis. Tugas Pejabat Pengelola Informasi dan Dokumentasi (PPID) menyediakan akses informasi publik bagi pemohon informasi. Sesuai dengan amanat pasal 13 UU no. 14 tahun 2008 tentang Keterbukaan Informasi Publik, Pemerintah Kabupaten Sumedang sebagai salah satu Badan Publik telah membentuk Pejabat Pengelola Informasi dan Dokumentasi (PPID) melalui Keputusan Bupati Sumedang Nomor 97 Tahun 2017 tentang Pengelolaan Pelayanan Informasi dan Dokumentasi Pemerintah Daerah. </p>
                        
                      
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    <!-- upcoming_event part start-->


<section class="popular_place padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="section_tittle text-center">
                       
                        <h2>Klasifikasi Informasi Publik  </h2>
                        <p>Berdaskan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, Klasifikasi Informasi Publik Sebagai Berikut</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_popular_place">
                        <img src="<?php echo base_url('img/icon/place_icon_1.png')?>" alt="">
                        <h4>Informasi Berkala</h4>
                        <p>Daftar Informasi Berkala Kab Sumedang Sebagai Berikut</p>
                        <a href="<?php echo site_url('publik/overview/berkala')?>" class="btn1">selengkapnya</a>
                    </div>
                </div><div class="col-lg-4 col-sm-6">
                    <div class="single_popular_place">
                        <img src="<?php echo base_url('img/icon/place_icon_2.png')?>" alt="">
                        <h4>Informasi Serta Merta</h4>
                         <p>Daftar Informasi Serta Merta Kab Sumedang Sebagai Berikut</p>
                        <a href="<?php echo site_url('publik/overview/sertamerta')?>" class="btn1">selengkapnya</a>>
                    </div>
                </div><div class="col-lg-4 col-sm-6">
                    <div class="single_popular_place">
                        <img src="<?php echo base_url('img/icon/place_icon_3.png')?>" alt="">
                        <h4>Informasi Setiap Saat</h4>
                         <p>Daftar Informasi Setiap Saat Kab Sumedang Sebagai Berikut</p>
                        <a href="<?php echo site_url('publik/overview/setiapsaat')?>" class="btn1">selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- use sasu part end-->
	<br>
	<div class="container">
    <div class="row">
        <div class="four col-md-3">
            <div class="counter-box"> <i class="fa fa-user"></i> <span class="counter"><?php echo $user->num_rows();?></span>
                <p>Pengguna</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box blue"> <i class="fa fa-file"></i> <span class="counter"><?php echo $jmlpermohonan->num_rows();?></span>
                <p>Jumlah Permohonan</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box colored"> <i class="fa fa-check-circle"></i> <span class="counter"><?php foreach ($diproses as $total):?>
				<?php echo $total->total ?>
				<?php endforeach;?></span>
                <p>Telah Diproses</p>
            </div>
        </div>
        <div class="four col-md-3">
            <div class="counter-box red"> <i class="fa fa-times-circle"></i> <span class="counter"><?php foreach ($ditolak as $data):?>
				<?php echo $data->total ?>
				<?php endforeach;?></span>
                <p>Ditolak</p>
            </div>
        </div>
    </div>
</div>
<!-- about_us part start-->
    <section class="place_details section_padding">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-md-8 col-lg-6">
                    <div class="place_detauls_text">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <div class="place_details_content">
                                    
                                    <h2>Visi </h2>
                                    <p>Visi adalah rumusan umum mengenai keadaan yang diinginkan pada akhir periode perencanaan yang didalamnya berisi suatu gambaran yang menantang tentang keadaan masa depan, cita dan citra yang ingin diwujudkan, dibangun melalui proses refleksi dan proyeksi yang digali dari nilai-nilai luhur yang dianut oleh seluruh komponen stakeholders.

Sesuai dengan arahan RPJMD Kabupaten Sumedang periode 2019-2023 bahwa pemerintah Kabupaten Sumedang akan mewujudkan Visi dan Misi yang telah ditetapkan. Adapun Visi Pemerintah Kabupaten Sumedang sesuai dengan RPJMD periode 2019-2023 sebagai berikut :
<b> 
“Terwujudnya Masyarakat Sumedang yang Sejahtera, Agamis, Maju, Profesional, dan Kreatif (SIMPATI) Pada Tahun 2023”</b></p>
                                    
                                </div>
                            </div>
                        </div>
                        <img src="<?php echo base_url('img/ppid/antihoax.png')?>" height 500 alt="#">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="place_details_img">
                        <img src="<?php echo base_url('img/ppid/bupati.jpg')?>"  width=800 alt="#">
                    </div>
                </div>
            </div>
        </div>
        <div class="view_all_btn">
            <a href="#" class="view_btn">view all</a>
        </div>
    </section>
    <!-- about_us part end-->
 <div class="section-top-border">

<h3>WEB VIDEO</h3>
 <div class="row gallery-item">
    <div class="col-md-4">
                                <div class="swiper-slide-container overlay">
                                    <img src="<?php echo base_url('img/ppid/sumedangdrone.jpg')?>" width="400px" height="300px" style="display: block; margin: auto; "class="video-play-button popup-youtube"  href="https://www.youtube.com/watch?v=y_FB7pHjq1E" > 
                               </div>

                                </div>
       <div class="col-md-4">
                                <div class="swiper-slide-container overlay">
                                    <img src="<?php echo base_url('img/ppid/sumedangdrone1.jpg')?>" width="400px" height="300px" style="display: block; margin: auto; "class="video-play-button popup-youtube"  href="https://www.youtube.com/watch?v=SUz57TE1Idw" > 
                               </div>
                               
                                </div>


     <div class="col-md-4">
                                <div class="swiper-slide-container overlay">
                                    <img src="<?php echo base_url('img/ppid/sumedangdrone2.jpg')?>" width="400px" height="300px" style="display: block; margin: auto; "class="video-play-button popup-youtube"  href="https://www.youtube.com/watch?v=yEpylcXfybk" > 
                               </div>
                               
                                </div>


                            </div>

    </div>

</div>
<!-- akhir menu   --> 
    <!--::footer_part end::-->
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
</body>

</html>