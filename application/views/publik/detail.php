<!doctype html>
<html lang="zxx">


    <?php $this->load->view("publik/_partials/head.php") ?>
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
                          <h2>Daftar Berita</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

<section class="blog_area single-post-area padding_top">
      <div class="container">
         <div class="row">
            <div class="col-lg-10 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?php echo base_url('upload/product/'.$berita->image) ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo $berita->judul ?>
                     </h2>
                     
                     <p class="excert">
                        <?php echo $berita->description ?> 
                     </p>
                    
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
</body>

</html>