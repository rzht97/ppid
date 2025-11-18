<!doctype html>
<html lang="zxx">


    <?php $this->load->view("publik/_partials/head.php") ?>
<body >
   
   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
 <?php $this->load->view("publik/_partials/banner.php") ?>
  
   
  <div class="section-top-border">
                <h3>Image Gallery</h3>
                <div class="row gallery-item">

                    <?php foreach ($berita as $berita_kec): ?>
                    <div class="col-md-3">
                        <a href="<?php echo base_url('upload/product/'.$berita_kec->image) ?>" class="gallery_img img-gal">
                            <div class="single-gallery-image" style="background: url(<?php echo base_url('upload/product/'.$berita_kec->image) ?>);"></div>
                        </a>

                    </div>
                         <?php endforeach; ?>
                </div>
</div>



<br></br>


<!-- akhir menu   --> 
    <!--::footer_part end::-->
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
</body>

</html>