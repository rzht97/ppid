<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Permohonan - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php') ?>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right"></ul>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php') ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tambah Permohonan Informasi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?php echo site_url('admin/permohonan') ?>">Permohonan</a></li>
                            <li class="active">Tambah</li>
                        </ol>
                    </div>
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Form Tambah Permohonan Informasi</h3>
                            <p class="text-muted m-b-20">Isi semua field yang diperlukan untuk menambah permohonan baru</p>

                            <?php
                                // Read flashdata and target page
                                $success_msg = $this->session->flashdata('success');
                                $success_target = $this->session->flashdata('success_target');
                                $error_msg = $this->session->flashdata('error');
                                $error_target = $this->session->flashdata('error_target');
                                $validation_errors = validation_errors();

                                // Get current page URI
                                $current_uri = uri_string();

                                // Check if alert already shown this session
                                $alert_shown_key = '_alert_shown_' . md5($success_msg . $success_target);
                                $already_shown = $this->session->userdata($alert_shown_key);

                                // Only show alert if target matches current page AND not shown yet
                                $show_success = $success_msg && $success_target && ($success_target === $current_uri) && !$already_shown;
                                $show_error = $error_msg && $error_target && ($error_target === $current_uri);

                                // Mark as shown if displaying
                                if ($show_success) {
                                    $this->session->set_userdata($alert_shown_key, true);
                                }
                            ?>
                            <?php if($show_success): ?>
                                <div class="alert alert-success alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $success_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($show_error): ?>
                                <div class="alert alert-danger alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $error_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($validation_errors): ?>
                                <div class="alert alert-warning alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Validation Error!</h4>
                                    <?php echo $validation_errors; ?>
                                </div>
                            <?php endif; ?>

                            <form class="form-horizontal" action="<?php echo base_url("admin/permohonan/add") ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <!-- Data Pemohon -->
                                    <h4 class="m-t-30 m-b-20"><i class="fa fa-user"></i> Data Pemohon</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Nama <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?php echo set_value('nama'); ?>" required>
                                            <?php if(form_error('nama')): ?>
                                                <div class="text-danger"><?php echo form_error('nama'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Pekerjaan <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?>" name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" required>
                                            <?php if(form_error('pekerjaan')): ?>
                                                <div class="text-danger"><?php echo form_error('pekerjaan'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Alamat <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" value="<?php echo set_value('alamat'); ?>" required>
                                            <?php if(form_error('alamat')): ?>
                                                <div class="text-danger"><?php echo form_error('alamat'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Nomor HP <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('nohp') ? 'is-invalid' : '' ?>" name="nohp" value="<?php echo set_value('nohp'); ?>" required>
                                            <?php if(form_error('nohp')): ?>
                                                <div class="text-danger"><?php echo form_error('nohp'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Email <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?php echo set_value('email'); ?>" required>
                                            <?php if(form_error('email')): ?>
                                                <div class="text-danger"><?php echo form_error('email'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Upload Foto KTP <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <!-- Custom File Upload -->
                                            <div class="m-b-10">
                                                <div style="position: relative; display: inline-block; width: 100%;">
                                                    <input type="file" name="ktp" id="ktpInput" accept="image/jpeg,image/jpg,image/png,application/pdf" required style="display: none;">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="text" id="ktpFileName" class="form-control" placeholder="Belum ada file yang dipilih" readonly style="background-color: #fff; cursor: pointer;">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('ktpInput').click();" style="height: 34px;">
                                                                <i class="fa fa-folder-open"></i> Pilih File
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <button type="button" id="clearKtpBtn" class="btn btn-danger btn-sm" onclick="clearKtpFile()" style="margin-top: 8px; display: none;">
                                                    <i class="fa fa-times"></i> Hapus File
                                                </button>
                                            </div>
                                            <?php if(form_error('ktp')): ?>
                                                <div class="text-danger"><?php echo form_error('ktp'); ?></div>
                                            <?php endif; ?>
                                            <small class="text-muted">
                                                <i class="fa fa-info-circle"></i> Format: JPG, PNG, PDF (Maksimal 2MB)
                                            </small>

                                            <!-- Preview Container -->
                                            <div id="ktpPreviewContainer" class="m-t-15" style="display: none;">
                                                <div style="background-color: #f9f9f9; padding: 15px; border: 2px solid #e8e8e8; border-radius: 6px; text-align: center;">
                                                    <label class="m-b-10" style="display: block;"><strong>Preview KTP:</strong></label>
                                                    <img id="ktpPreview" src="" alt="Preview KTP" style="max-width: 100%; max-height: 400px; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                    <div id="pdfPreview" style="display: none;">
                                                        <i class="fa fa-file-pdf-o" style="font-size: 60px; color: #d9534f;"></i>
                                                        <p class="m-t-10" style="font-weight: bold;" id="pdfFileName"></p>
                                                        <p class="text-muted" style="margin: 5px 0;">File PDF telah dipilih</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Detail Permohonan -->
                                    <h4 class="m-t-40 m-b-20"><i class="fa fa-file-text"></i> Detail Permohonan</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Rincian Informasi yang Dibutuhkan <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control <?php echo form_error('rincian') ? 'is-invalid' : '' ?>" name="rincian" rows="5" required><?php echo set_value('rincian'); ?></textarea>
                                            <?php if(form_error('rincian')): ?>
                                                <div class="text-danger"><?php echo form_error('rincian'); ?></div>
                                            <?php endif; ?>
                                            <small class="text-muted m-t-5" style="display: block;">
                                                <i class="fa fa-info-circle"></i> Jelaskan informasi yang dibutuhkan sejelas mungkin
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Tujuan Penggunaan Informasi <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control <?php echo form_error('tujuan') ? 'is-invalid' : '' ?>" name="tujuan" rows="5" required><?php echo set_value('tujuan'); ?></textarea>
                                            <?php if(form_error('tujuan')): ?>
                                                <div class="text-danger"><?php echo form_error('tujuan'); ?></div>
                                            <?php endif; ?>
                                            <small class="text-muted m-t-5" style="display: block;">
                                                <i class="fa fa-info-circle"></i> Jelaskan untuk apa informasi tersebut akan digunakan
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Cara Memperoleh Informasi <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <select class="form-control <?php echo form_error('caraperoleh') ? 'is-invalid' : '' ?>" name="caraperoleh" required>
                                                <option value="">-- Pilih Cara Memperoleh Informasi --</option>
                                                <option value="Mendapat Salinan informasi (hardcopy/softcopy)" <?php echo set_select('caraperoleh', 'Mendapat Salinan informasi (hardcopy/softcopy)'); ?>>Mendapat Salinan informasi (hardcopy/softcopy)</option>
                                                <option value="Melihat/membaca/mendengarkan/mencatat" <?php echo set_select('caraperoleh', 'Melihat/membaca/mendengarkan/mencatat'); ?>>Melihat/membaca/mendengarkan/mencatat</option>
                                            </select>
                                            <?php if(form_error('caraperoleh')): ?>
                                                <div class="text-danger"><?php echo form_error('caraperoleh'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Cara Mendapatkan Salinan Informasi <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <select class="form-control <?php echo form_error('caradapat') ? 'is-invalid' : '' ?>" name="caradapat" required>
                                                <option value="">-- Pilih Cara Mendapatkan Salinan --</option>
                                                <option value="Mengambil Langsung" <?php echo set_select('caradapat', 'Mengambil Langsung'); ?>>Mengambil Langsung</option>
                                                <option value="Kurir" <?php echo set_select('caradapat', 'Kurir'); ?>>Kurir</option>
                                                <option value="Pos" <?php echo set_select('caradapat', 'Pos'); ?>>Pos</option>
                                                <option value="Faksimil" <?php echo set_select('caradapat', 'Faksimil'); ?>>Faksimil</option>
                                                <option value="E-mail" <?php echo set_select('caradapat', 'E-mail'); ?>>E-mail</option>
                                            </select>
                                            <?php if(form_error('caradapat')): ?>
                                                <div class="text-danger"><?php echo form_error('caradapat'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                <i class="fa fa-save"></i> Simpan Permohonan
                                            </button>
                                            <a href="<?php echo site_url('admin/permohonan') ?>" class="btn btn-default waves-effect waves-light">
                                                <i class="fa fa-times"></i> Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2022, Diskominfosanditik Kab. Sumedang as PPID </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('dev/admin/partials/js.php') ?>
</body>

<script>
    // Auto-close alerts after 5 seconds
    $(document).ready(function() {
        setTimeout(function() {
            $('.auto-close-alert').fadeOut('slow', function() {
                $(this).alert('close');
            });
        }, 5000); // 5000ms = 5 seconds
    });
</script>

<!-- KTP Preview Script -->
<script>
    // Function to handle KTP file upload preview
    document.getElementById('ktpInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const fileNameDisplay = document.getElementById('ktpFileName');
        const clearBtn = document.getElementById('clearKtpBtn');
        const previewContainer = document.getElementById('ktpPreviewContainer');
        const imagePreview = document.getElementById('ktpPreview');
        const pdfPreview = document.getElementById('pdfPreview');
        const pdfFileName = document.getElementById('pdfFileName');

        if (file) {
            // Validate file size (2MB = 2097152 bytes)
            if (file.size > 2097152) {
                alert('Ukuran file terlalu besar! Maksimal 2MB.');
                e.target.value = '';
                fileNameDisplay.value = '';
                clearBtn.style.display = 'none';
                previewContainer.style.display = 'none';
                return;
            }

            const fileType = file.type;
            const fileName = file.name;

            // Display file name
            fileNameDisplay.value = fileName;
            clearBtn.style.display = 'inline-block';

            // Show preview container
            previewContainer.style.display = 'block';

            // Check if file is an image
            if (fileType.match('image.*')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    pdfPreview.style.display = 'none';
                };

                reader.readAsDataURL(file);
            }
            // Check if file is PDF
            else if (fileType === 'application/pdf') {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'block';
                pdfFileName.textContent = fileName;
            }
            else {
                alert('Format file tidak didukung! Gunakan JPG, PNG, atau PDF.');
                e.target.value = '';
                fileNameDisplay.value = '';
                clearBtn.style.display = 'none';
                previewContainer.style.display = 'none';
            }
        } else {
            fileNameDisplay.value = '';
            clearBtn.style.display = 'none';
            previewContainer.style.display = 'none';
        }
    });

    // Function to clear file when "Hapus File" button is clicked
    function clearKtpFile() {
        const fileInput = document.getElementById('ktpInput');
        const fileNameDisplay = document.getElementById('ktpFileName');
        const clearBtn = document.getElementById('clearKtpBtn');
        const previewContainer = document.getElementById('ktpPreviewContainer');
        const imagePreview = document.getElementById('ktpPreview');

        // Clear file input
        fileInput.value = '';
        fileNameDisplay.value = '';
        clearBtn.style.display = 'none';

        // Clear preview
        previewContainer.style.display = 'none';
        imagePreview.src = '';

        return false;
    }

    // Make the text input clickable to trigger file selection
    document.getElementById('ktpFileName').addEventListener('click', function() {
        document.getElementById('ktpInput').click();
    });
</script>

<!-- Real-time Validation Script -->
<script>
$(document).ready(function() {
    // Real-time validation functions
    const validators = {
        nama: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Nama wajib diisi';
            }
            if (value.length < 3) {
                return 'Nama minimal 3 karakter';
            }
            if (value.length > 100) {
                return 'Nama maksimal 100 karakter';
            }
            return null;
        },

        alamat: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Alamat wajib diisi';
            }
            if (value.length < 5) {
                return 'Alamat minimal 5 karakter';
            }
            return null;
        },

        pekerjaan: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Pekerjaan wajib diisi';
            }
            return null;
        },

        nohp: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Nomor HP wajib diisi';
            }
            if (!/^\d+$/.test(value)) {
                return 'Nomor HP hanya boleh berisi angka';
            }
            if (value.length < 10) {
                return 'Nomor HP minimal 10 digit';
            }
            if (value.length > 15) {
                return 'Nomor HP maksimal 15 digit';
            }
            return null;
        },

        email: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Email wajib diisi';
            }
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                return 'Format email tidak valid';
            }
            return null;
        },

        rincian: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Rincian informasi wajib diisi';
            }
            if (value.length < 10) {
                return 'Rincian informasi minimal 10 karakter';
            }
            return null;
        },

        tujuan: function(value) {
            if (!value || value.trim().length === 0) {
                return 'Tujuan penggunaan informasi wajib diisi';
            }
            return null;
        },

        ktp: function(fileInput) {
            if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
                return 'File KTP wajib diupload';
            }
            return null;
        }
    };

    // Function to show error message
    function showError(fieldName, errorMessage) {
        const field = $('[name="' + fieldName + '"]');
        const parent = field.closest('.form-group');

        // Remove existing error
        parent.find('.validation-error').remove();
        field.removeClass('is-invalid').addClass('is-invalid');

        // Add new error message
        if (errorMessage) {
            const errorDiv = $('<div class="text-danger validation-error" style="margin-top: 5px;"></div>').text(errorMessage);
            field.closest('.col-md-12').append(errorDiv);
        }
    }

    // Function to clear error message
    function clearError(fieldName) {
        const field = $('[name="' + fieldName + '"]');
        const parent = field.closest('.form-group');

        parent.find('.validation-error').remove();
        field.removeClass('is-invalid');
    }

    // Function to validate a field
    function validateField(fieldName) {
        const field = $('[name="' + fieldName + '"]');
        let value;

        if (fieldName === 'ktp') {
            value = field[0];
        } else {
            value = field.val();
        }

        if (validators[fieldName]) {
            const error = validators[fieldName](value);
            if (error) {
                showError(fieldName, error);
                return false;
            } else {
                clearError(fieldName);
                return true;
            }
        }
        return true;
    }

    // Attach blur event listeners for text inputs
    $('input[name="nama"], input[name="alamat"], input[name="pekerjaan"], input[name="nohp"], input[name="email"]').on('blur', function() {
        validateField($(this).attr('name'));
    });

    // Attach blur event listeners for textareas
    $('textarea[name="rincian"], textarea[name="tujuan"]').on('blur', function() {
        validateField($(this).attr('name'));
    });

    // Attach change event for file input
    $('input[name="ktp"]').on('change', function() {
        validateField('ktp');
    });

    // Real-time input validation (while typing)
    $('input[name="nama"], input[name="alamat"], input[name="pekerjaan"], input[name="nohp"], input[name="email"]').on('input', function() {
        const fieldName = $(this).attr('name');
        // Clear error immediately when user starts typing
        clearError(fieldName);
    });

    $('textarea[name="rincian"], textarea[name="tujuan"]').on('input', function() {
        const fieldName = $(this).attr('name');
        clearError(fieldName);
    });

    // Validate all fields before form submission
    $('form').on('submit', function(e) {
        let isValid = true;

        // Validate all fields
        const fieldsToValidate = ['nama', 'alamat', 'pekerjaan', 'nohp', 'email', 'rincian', 'tujuan', 'ktp'];

        fieldsToValidate.forEach(function(fieldName) {
            if (!validateField(fieldName)) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();

            // Scroll to first error
            const firstError = $('.validation-error').first();
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }

            // Show alert
            alert('Mohon perbaiki kesalahan pada form sebelum menyimpan permohonan.');
        }
    });
});
</script>

</html>
