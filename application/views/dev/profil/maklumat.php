<!DOCTYPE html>
<html lang="en">


<head>
    <title>Maklumat Pelayanan - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
</head>

<body>

    

    <!-- <div class="preloader">
        <div class="preloader__image"></div>
    </div> -->
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?php $this->load->view('dev/partials/header.php') ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="page-header-shape-1"></div>
            <!-- /.page-header-shape-1 -->
            <div class="page-header-shape-2"></div>
            <!-- /.page-header-shape-2 -->
            <div class="page-header-shape-3"></div>
            <!-- /.page-header-shape-3 -->
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Profil</li>
                    </ul>
                    <h2>MAKLUMAT PELAYANAN</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="faqs-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_tittle text-center">
                            <h1>MAKLUMAT PELAYANAN PPID KABUPATEN SUMEDANG </h1>
                            <hr>
                            <br>
                        </div>
                        <h4>PPID Utama Kabupaten Sumedang berupaya memberikan pelayanan informasi publik dan berkomitmen untuk :</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            
                                <tbody>
                                    
                                    <tr>
                                        <td width="20">
                                            1
                                        </td>
                                        
                                        <td width="350">
                                            Memberikan pelayanan informasi yang prima berdasarkan Undang‐Undang No 14 Tahun 2008 tentang Keterbukaan Informasi Publik dan juga turut mewujudkan misi Pemerintah Kabupaten Sumedang yang berorientasi pada pelayanan publik;
                                     
                                    </tr>
                                    <tr>
                                        <td width="20">2</td>
                                        
                                        <td width="350">
                                            Memberikan kemudahan kepada publik dalam mendapatkan informasi yang diperlukan dengan murah dan sederhana;
                                        </td>                                   
                                   
                                    </tr>

                                     <tr>
                                        <td width="20">3</td>
                                        
                                        <td width="350">
                                            Menyediakan dan memberikan informasi publik yang dikuasai secara akurat, benar dan tidak menyesatkan;
                                        </td>                                   
                                   
                                    </tr>
                                     <tr>
                                        <td width="20">4</td>
                                        
                                        <td width="350">
                                            Menyediakan daftar informasi publik untuk informasi yang wajib disediakan dan diumumkan;
                                        </td>                                   
                                   
                                    </tr>
                                     <tr>
                                        <td width="20">5</td>
                                        
                                        <td width="350">
                                            Bertindak proaktif dalam memenuhi kebutuhan informasi masyarakat serta menjamin seluruh informasi publik dan fasilitas pelayanan sesuai dengan ketentuan yang berlaku;
                                        </td>                                   
                                   
                                    </tr>
                                     <tr>
                                        <td width="20">6</td>
                                        
                                        <td width="350">
                                            Menyiapkan ruang dan fasilitas yang nyaman dan tertata baik;
                                        </td>                                   
                                   
                                    </tr>
									<tr>
                                        <td width="20">7</td>
                                        
                                        <td width="350">
                                            Bersikap adil, tidak diskriminatif dan berperilaku sopan santun dalam memberikan layanan informasi publik;
                                        </td>                                   
                                   
                                    </tr>
									<tr>
                                        <td width="20">8</td>
                                        
                                        <td width="350">
                                            Menyiapkan petugas informasi yang berdedikasi dan siap melayani;
                                        </td>                                   
                                   
                                    </tr>
									<tr>
                                        <td width="20">9</td>
                                        
                                        <td width="350">
                                            Tidak melakukan pungutan biaya yang tidak sesuai dengan ketentuan peraturan perundangan dalam memberikan layanan informasi publik.
                                        </td>                                   
                                   
                                    </tr>

                                </tbody>
                            </table>
						</div>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view("dev/partials/sectionapp.php") ?>

        <!--Site Footer One Start-->
        <?php $this->load->view("dev/partials/footer.php") ?>
        <!--Site Footer One End-->


    </div>
    <!-- /.page-wrapper -->


    <?php $this->load->view("dev/partials/mobilemenu.php") ?>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <?php $this->load->view('dev/partials/js.php') ?>

</body>




</html>