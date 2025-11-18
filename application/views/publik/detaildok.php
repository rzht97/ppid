<!doctype html>
<html lang="zxx">


    <?php $this->load->view("publik/_partials/head.php") ?>

<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">






<body >
   
   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
  <!-- banner part start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                         <img src="<?php echo base_url('img/ppid/ppidlogo2.png')?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 



    <section >
      <div class="container">
         <div class="row">
            <div class="col-lg-10 posts-list">
               <div class="single-post">
                  
                  <div class="blog_details">
                     <h2><?php echo $dokumen->judul ?>
                     </h2>
                      <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i> <?php echo $dokumen->user ?></a></li>
                        <li><a href="#"><i class="far fa-calendar"></i> <?php echo $dokumen->tanggal ?></a></li>
                     </ul>
                     <p class="excert">
                        <?php echo $dokumen->description ?> 
                     </p>
                       <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="<?php echo base_url().'index.php/publik/overview/download/'.$dokumen->id; ?>">  <img src="<?php echo base_url('img/icontambahan/file.png') ?>" width="30" /> download</a></li>
                        <li><a href="#"><?php echo $dokumen->kategori ?></a></li>
                     </ul>
                  </div>
              </div>
          </div>


      </div>
  </section>



<!-- akhir menu   --> 
    <!--::footer_part end::-->
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
 <?php $this->load->view("admin/_partials/js.php") ?>
</body>

</html>