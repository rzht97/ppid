<!doctype html>
<html lang="zxx">


<?php $this->load->view("publik/_partials/head.php") ?>


<!-- Custom fonts for this template-->
<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">







<body>

    <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
    <!-- banner part start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <img src="<?php echo base_url('img/ppid/ppidlogo2.png') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h2> DAFTAR INFORMASI PUBLIK </h2>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="<?php echo site_url('publik/overview/inpub') ?>" method="post">

                <div class="row">
                    <div class="col-md-4">
                        <label>Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="Berkala">Berkala</option>
                            <option value="Setiap Saat">Setiap Saat</option>
                            <option value="Serta Merta">Serta Merta</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Informasi </th>
                            <th>Ringkasan Isi Informasi</th>
                            <th>Pejabat Yang Menguasai Informasi</th>
                            <th>Penanggungjawab Pembuatan/Penerbitan Informasi</th>
                            <th>Waktu Pembuatan/Penerbitan Informasi</th>
                            <th>Jenis Informasi</th>
							<th>Bentuk Informasi</th>
                            <th>Jangka Waktu Penyimpanan</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dokumen as $dok_kec) : ?>
                            <tr>
                                <td width="150">
                                    <?php echo $dok_kec->judul ?>
                                </td>
                                <td>
                                    <?php if ($dok_kec->description == 'https://') { ?><a href="<?php echo $dok_kec->description ?>"><?php echo $dok_kec->description ?></a>
                                    <?php } else; { ?>
                                        <?php echo $dok_kec->description ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo $dok_kec->pejabat ?>
                                </td>
                                <td>
                                    <?php echo $dok_kec->pjinformasi ?>
                                </td>
                                <td>
                                    <?php echo $dok_kec->tanggal ?>
                                </td>
                                <td>
                                    <?php echo $dok_kec->kategori ?>
                                </td>
								<td>
									<?php echo $dok_kec->bentukinfo?>
								</td>
                                <td>
                                    <?php echo $dok_kec->jangkawaktu ?>
                                </td>
                                <td>
                                    <?php if ($dok_kec->image == "Belum Tersedia") { ?>
                                        <a href="<?php echo $dok_kec->sumberdata; ?>"><?php echo $dok_kec->sumberdata ?></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url() . 'index.php/publik/overview/download/' . $dok_kec->id; ?>" class="fas fa-download"><span class="glyphicon glyphicon-download-alt">download</span></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- akhir menu   -->
    <!--::footer_part end::-->
    <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
    <?php $this->load->view("publik/_partials/js.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
    <?php $this->load->view("admin/_partials/newpartials/js.php") ?>
</body>

</html>