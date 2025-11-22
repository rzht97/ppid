<?php
// FIX CRITICAL: SQL Injection - gunakan query builder dengan prepared statement
$nama = $this->input->post('nama', TRUE); // XSS filter enabled
$this->db->where('nama', $nama);
$detail = $this->db->get('permohonan')->result();
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
                            <?php echo html_escape($data->tanggal) ?>
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
                                <?php echo html_escape($data->tanggaljawab) ?>
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
                            <?php echo html_escape($data->rincian) ?>
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
                            <?php echo html_escape($data->tujuan) ?>
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
                            <?php echo html_escape($data->caraperoleh) ?>
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
                            <?php echo html_escape($data->caradapat) ?>
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
                        <?php echo html_escape($data->status) ?>
                    </button>
                <?php elseif ($data->status == 'Sedang Diproses') : ?>
                    <button class="btn btn-block btn-info disabled">
                        <?php echo html_escape($data->status) ?>
                    </button>
                <?php else : ?>
                    <button class="btn btn-block btn-success disabled">
                        <?php echo html_escape($data->status) ?>
                    </button>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Jawaban :</label>
            <div class="col-md-9">
                <p class="form-control-static">
                    <?php echo html_escape($data->jawab) ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
?>