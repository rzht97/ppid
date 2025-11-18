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
                       
                        <h2>Regulasi Informasi Publik</h2>
                        <h4>Dasar Hukum dari Pelaksanaan PPID Kabupaten Sumedang adalah :</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            
                                <tbody>
                                    
                                    <tr>
                                        <td width="20">
                                            1
                                        </td>
                                        
                                        <td width="350">
                                            Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
                                        </td>
                                     
                                        <td width="30"><a target = "_blank" href = "https://www.kemenkeu.go.id/sites/default/files/uu%2014%20tahun%202008.pdf">download</a></td>
                                    </tr>
                                    

                                <tr>
                                        <td width="20">
                                            2
                                        </td>
                                        
                                        <td width="350">
                                            Peraturan Pemerintah Nomor 61 tahun 2010 tentang Pelaksanaan Undang-Undang Nomor 14 tahun 2008 tentang Keterbukaan Informasi Publik.
                                        </td>
                                     
                                        <td width="30"><a target = "_blank" href = "https://www.kemenkeu.go.id/sites/default/files/pp%20no%2061%20tahun%202010.pdf">download</a></td>
                                    </tr>

                                            <tr>
                                        <td width="20">
                                            3
                                        </td>
                                        
                                        <td width="350">
                                           PERATURAN BUPATI SUMEDANG NOMOR 97 TAHUN 2017 TENTANG PENGELOLAAN PELAYANAN INFORMASI DAN DOKUMENTASI PEMERINTAHAN DAERAH
                                        </td>
                                     
                                        <td width="30"> <a target = "_blank" href="https://mcapsumedang.files.wordpress.com/2017/12/perbup-97-tahun-2017-tentang-pengelolaan-pelayanan-informasi-dan-dokumentasi-pemerintahan-daerah.pdf">download</a></td>
                                    </tr>


                                </tbody>
                            </table>
                        
                      
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    <!-- upcoming_event part start-->






<!-- akhir menu   --> 
    <!--::footer_part end::-->
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
</body>

</html>