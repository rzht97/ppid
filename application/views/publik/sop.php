<!doctype html>
<html lang="zxx">


    <?php $this->load->view("publik/_partials/head.php") ?>
<body >
   
   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
 <?php $this->load->view("publik/_partials/banner.php") ?>
  
<br> <!--  is menu -->
   <!-- feature_part start-->
    <section class="feature_part ">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="feature_img">
                        <img src="<?php echo base_url('img/ppid/SOP.jpg')?>" alt="">
                    </div>
                </div>
            
            </div>
        </div>
        
    </section>
    <!-- upcoming_event part start-->



<br>


<!-- akhir menu   --> 
    <!--::footer_part end::-->
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
</body>

</html>