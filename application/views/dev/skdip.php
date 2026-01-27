<!DOCTYPE html>
<html lang="en">


<head>
    <title>DIP KAB. SUMEDANG - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <link href="<?= base_url() ?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>assets/vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css" />

</head>

<body>



    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
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
                        <li>Informasi Publik</li>
                    </ul>
                    <h2>SK DIP</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="blog-single">
            <div class="container">
                <!-- PDF Viewer Container -->
                <div id="pdf-viewer"
                    style="width: 100%; background: #525659; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); position: relative;">
                    <div id="pdf-controls"
                        style="background: #323639; padding: 15px; text-align: center; border-bottom: 1px solid #000; flex-wrap: wrap; display: flex; justify-content: center; align-items: center; gap: 5px;">
                        <div style="display: inline-block; margin: 5px;"><button id="prev-page"
                                class="btn btn-sm btn-light" style="margin: 0 5px;"><i class="fa fa-chevron-left"></i>
                                <span class="d-none d-sm-inline">Previous</span></button><span
                                style="color: white; margin: 0 10px; font-weight: 500; font-size: 14px;"><span
                                    id="page-num"></span> / <span id="page-count"></span></span><button id="next-page"
                                class="btn btn-sm btn-light" style="margin: 0 5px;"><span
                                    class="d-none d-sm-inline">Next</span> <i class="fa fa-chevron-right"></i></button>
                        </div>
                        <span style="color: #666; margin: 0 5px;">|</span>
                        <div style="display: inline-block; margin: 5px;"><button id="zoom-out"
                                class="btn btn-sm btn-light" style="margin: 0 3px;" title="Zoom Out"><i
                                    class="fa fa-search-minus"></i></button><button id="fit-width"
                                class="btn btn-sm btn-info" style="margin: 0 3px;" title="Fit to Width"><i
                                    class="fa fa-arrows-h"></i></button><button id="zoom-in"
                                class="btn btn-sm btn-light" style="margin: 0 3px;" title="Zoom In"><i
                                    class="fa fa-search-plus"></i></button><span
                                style="color: white; margin: 0 10px; font-size: 13px;" id="zoom-level">100%</span></div>
                        <span style="color: #666; margin: 0 5px;">|</span>
                        <div style="display: inline-block; margin: 5px;"><button id="fullscreen-btn"
                                class="btn btn-sm btn-warning" style="margin: 0 3px;" title="Fullscreen"><i
                                    class="fa fa-expand"></i> <span
                                    class="d-none d-lg-inline">Fullscreen</span></button><a
                                href="<?= base_url(); ?>upload/product/DIP%20Tahun%202024.pdf"
                                download="DIP_Tahun_2024.pdf" class="btn btn-sm btn-success" style="margin: 0 5px;"><i
                                    class="fa fa-download"></i> <span class="d-none d-sm-inline">Download</span></a>
                        </div>
                    </div>
                    <div id="pdf-container" class="pdf-container-responsive"
                        style="overflow: auto; text-align: center; padding: 20px; background: #525659; scroll-behavior: smooth;">
                    </div>
                </div>
                <div id="loading" style="text-align: center; padding: 60px; background: #f8f9fa; border-radius: 8px;"><i
                        class="fa fa-spinner fa-spin fa-3x" style="color: #007bff;"></i>
                    <p style="margin-top: 20px; color: #666; font-size: 16px;">Memuat dokumen PDF...</p>
                </div>
            </div>
        </section>
        <style>
            .pdf-container-responsive {
                max-height: 800px
            }

            @media (min-width:768px) {
                .pdf-container-responsive {
                    max-height: 1000px
                }
            }

            @media (min-width:1200px) {
                .pdf-container-responsive {
                    max-height: 1200px
                }
            }

            #pdf-viewer.fullscreen {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 9999;
                border-radius: 0;
                max-width: 100%
            }

            #pdf-viewer.fullscreen .pdf-container-responsive {
                max-height: calc(100vh - 60px);
                height: calc(100vh - 60px)
            }

            canvas {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        <script>var pdfjsLib = window['pdfjs-dist/build/pdf']; pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js'; var pdfDoc = null, pageNum = 1, pageRendering = false, pageNumPending = null, scale = window.innerWidth >= 1200 ? 1.5 : (window.innerWidth >= 768 ? 1.3 : 1.2), canvas = document.createElement('canvas'), ctx = canvas.getContext('2d'), containerWidth = 0, isFullscreen = false; var url = '<?= base_url(); ?>upload/product/DIP Tahun 2024.pdf'; document.getElementById('loading').style.display = 'block'; document.getElementById('pdf-viewer').style.display = 'none'; function updateZoomDisplay() { var percentage = Math.round(scale * 100); document.getElementById('zoom-level').textContent = percentage + '%' } pdfjsLib.getDocument(url).promise.then(function (pdfDoc_) { pdfDoc = pdfDoc_; document.getElementById('page-count').textContent = pdfDoc.numPages; document.getElementById('loading').style.display = 'none'; document.getElementById('pdf-viewer').style.display = 'block'; containerWidth = document.getElementById('pdf-container').offsetWidth - 40; updateZoomDisplay(); renderPage(pageNum) }).catch(function (error) { console.error('Error loading PDF:', error); document.getElementById('loading').innerHTML = '<i class="fa fa-exclamation-triangle fa-3x" style="color: #dc3545;"></i><p style="color: #dc3545; margin-top: 20px; font-size: 16px;">Gagal memuat PDF.</p><a href="<?= base_url(); ?>upload/product/DIP Tahun 2024.pdf" download class="btn btn-primary" style="margin-top: 15px;"><i class="fa fa-download"></i> Download Dokumen</a>' }); function renderPage(num) { pageRendering = true; pdfDoc.getPage(num).then(function (page) { var viewport = page.getViewport({ scale: scale }); canvas.height = viewport.height; canvas.width = viewport.width; canvas.style.maxWidth = '100%'; canvas.style.height = 'auto'; canvas.style.boxShadow = '0 2px 8px rgba(0,0,0,0.3)'; var renderContext = { canvasContext: ctx, viewport: viewport }; var renderTask = page.render(renderContext); renderTask.promise.then(function () { pageRendering = false; if (pageNumPending !== null) { renderPage(pageNumPending); pageNumPending = null } }) }); document.getElementById('page-num').textContent = num; var container = document.getElementById('pdf-container'); container.innerHTML = ''; container.appendChild(canvas); updateZoomDisplay() } function queueRenderPage(num) { if (pageRendering) { pageNumPending = num } else { renderPage(num) } } document.getElementById('prev-page').addEventListener('click', function () { if (pageNum <= 1) return; pageNum--; queueRenderPage(pageNum) }); document.getElementById('next-page').addEventListener('click', function () { if (pageNum >= pdfDoc.numPages) return; pageNum++; queueRenderPage(pageNum) }); document.getElementById('zoom-in').addEventListener('click', function () { if (scale >= 3.0) return; scale += 0.2; queueRenderPage(pageNum) }); document.getElementById('zoom-out').addEventListener('click', function () { if (scale <= 0.5) return; scale -= 0.2; queueRenderPage(pageNum) }); document.getElementById('fit-width').addEventListener('click', function () { if (!pdfDoc) return; pdfDoc.getPage(pageNum).then(function (page) { var viewport = page.getViewport({ scale: 1.0 }); var containerWidth = document.getElementById('pdf-container').offsetWidth - 40; scale = containerWidth / viewport.width; scale = Math.max(0.5, Math.min(3.0, scale)); queueRenderPage(pageNum) }) }); document.getElementById('fullscreen-btn').addEventListener('click', function () { var viewer = document.getElementById('pdf-viewer'); if (!isFullscreen) { if (viewer.requestFullscreen) { viewer.requestFullscreen() } else if (viewer.webkitRequestFullscreen) { viewer.webkitRequestFullscreen() } else if (viewer.msRequestFullscreen) { viewer.msRequestFullscreen() } else if (viewer.mozRequestFullScreen) { viewer.mozRequestFullScreen() } } else { if (document.exitFullscreen) { document.exitFullscreen() } else if (document.webkitExitFullscreen) { document.webkitExitFullscreen() } else if (document.msExitFullscreen) { document.msExitFullscreen() } else if (document.mozCancelFullScreen) { document.mozCancelFullScreen() } } }); document.addEventListener('fullscreenchange', handleFullscreenChange); document.addEventListener('webkitfullscreenchange', handleFullscreenChange); document.addEventListener('mozfullscreenchange', handleFullscreenChange); document.addEventListener('MSFullscreenChange', handleFullscreenChange); function handleFullscreenChange() { var btn = document.getElementById('fullscreen-btn'); var viewer = document.getElementById('pdf-viewer'); if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) { viewer.classList.add('fullscreen'); btn.innerHTML = '<i class="fa fa-compress"></i> <span class="d-none d-lg-inline">Exit Fullscreen</span>'; btn.classList.remove('btn-warning'); btn.classList.add('btn-danger'); isFullscreen = true; setTimeout(function () { queueRenderPage(pageNum) }, 200) } else { viewer.classList.remove('fullscreen'); btn.innerHTML = '<i class="fa fa-expand"></i> <span class="d-none d-lg-inline">Fullscreen</span>'; btn.classList.remove('btn-danger'); btn.classList.add('btn-warning'); isFullscreen = false; setTimeout(function () { queueRenderPage(pageNum) }, 200) } } document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && isFullscreen) { document.getElementById('fullscreen-btn').click(); return } if (e.key === 'ArrowLeft' && pageNum > 1) { pageNum--; queueRenderPage(pageNum) } else if (e.key === 'ArrowRight' && pageNum < pdfDoc.numPages) { pageNum++; queueRenderPage(pageNum) } else if (e.key === '+' || e.key === '=') { if (scale < 3.0) { scale += 0.2; queueRenderPage(pageNum) } } else if (e.key === '-') { if (scale > 0.5) { scale -= 0.2; queueRenderPage(pageNum) } } else if (e.key === 'f' || e.key === 'F') { document.getElementById('fullscreen-btn').click() } })</script>

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

    <script src="<?= base_url() ?>inverse/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>inverse/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>inverse/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>inverse/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>inverse/js/custom.min.js"></script>
    <script src="<?= base_url() ?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="<?= base_url() ?>assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <!-- Removed deprecated Flash-based export: buttons.flash.min.js -->
    <script src="<?= base_url() ?>assets/vendor/jszip/js/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/pdfmake/js/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/pdfmake/js/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <!--Style Switcher -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


</html>
