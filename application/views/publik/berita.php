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







<section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                      <?php foreach ($berita as $berita_kec): ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?php echo base_url('upload/product/'.$berita_kec->image) ?>" height 500 alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?php echo $berita_kec->tanggal ?></h3>
                                    
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php echo site_url('publik/overview/detail/'.$berita_kec->berita_id) ?>">
                                    <h2><?php echo $berita_kec->judul ?></h2>
                                </a>
                                <p><?php echo substr($berita_kec->description, 0, 120) ?>...</p>
                               
                            </div>
                        </article>

                <?php endforeach; ?>



                      
                       

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>


                    </div>
                </div>
                       <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                      
    <?php $this->load->view("publik/_partials/recent_post.php") ?>
                     
                      
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