<?php
$nama = $_POST['nama'];
$detail = $this->db->query("SELECT * FROM permohonan WHERE nama = '$nama'")->result();
?>
<?php foreach ($detail as $data) : ?>
    <div class="form-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Tanggal
                        Permohonan:</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <?php echo $data->tanggal ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php if ($data->tanggaljawab != '') : ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Permohonan
                            Selesai:</label>
                        <div class="col-md-9">
                            <p class="form-control-static">
                                <?php echo $data->tanggaljawab ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <h3 class="box-title">Permohonan</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Rincian
                        Informasi :</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <?php echo $data->rincian ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Tujuan
                        Penggunaan Informasi :</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <?php echo $data->tujuan ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Cara
                        Memperoleh Informasi :</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <?php echo $data->caraperoleh ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Cara
                        Mendapatkan Salinan Informasi
                        :</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            <?php echo $data->caradapat ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Status :</label>
            <div class="col-md-3">
                <?php if ($data->status == 'Menunggu Verifikasi') : ?>
                    <button class="btn btn-block btn-warning disabled">
                        <?php echo $data->status ?>
                    </button>
                <?php elseif ($data->status == 'Sedang Diproses') : ?>
                    <button class="btn btn-block btn-info disabled">
                        <?php echo $data->status ?>
                    </button>
                <?php else : ?>
                    <button class="btn btn-block btn-success disabled">
                        <?php echo $data->status ?>
                    </button>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Jawaban :</label>
            <div class="col-md-9">
                <p class="form-control-static">
                    <?php echo $data->jawab ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
?>