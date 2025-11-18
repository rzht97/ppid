<aside class="single_sidebar_widget popular_post_widget">
                          <h3 class="widget_title">Recent Post</h3>
                          <?php foreach ($berita as $berita_kec): ?>
                          <div class="media post_item">
                              <img src="<?php echo base_url('upload/product/'.$berita_kec->image) ?>" width="64" alt="post">
                              <div class="media-body">
                                  <a href="<?php echo site_url('publik/overview/detail/'.$berita_kec->berita_id) ?>">
                                      <h3><?php echo substr($berita_kec->judul, 0, 10) ?>...</h3>
                                  </a>
                                  <p><?php echo $berita_kec->tanggal ?></p>
                              </div>
                          </div>
                         <?php endforeach; ?>
                          
                          
                      </aside>