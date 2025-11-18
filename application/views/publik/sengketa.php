<!doctype html>
<html lang="zxx">


    <?php $this->load->view("publik/_partials/head.php") ?>
<body >
   
   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
 <?php $this->load->view("publik/_partials/banner.php") ?>
  
<br>  <!--  is menu -->
   <!-- feature_part start-->

    <section class="title-section">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-12">
                    <h1>Prosedur Penanganan Sengketa Informasi</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->
	<section class="feature_part ">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="feature_img">
                        <img src="<?php echo base_url('img/ppid/permohonan.png')?>" alt="">
                    </div>
                </div>
            
            </div>
        </div>
        
    </section>


<br>


<!-- akhir menu   --> 
    <!--::footer_part end::-->
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
</body>

</html>