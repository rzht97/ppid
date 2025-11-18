    <!-- jquery -->
    <script src="<?php echo base_url('js/jquery-1.12.1.min.js')?>"></script>
    <!-- popper js -->
    <script src="<?php echo base_url('js/popper.min.js')?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
    <!-- easing js -->
    <script src="<?php echo base_url('js/jquery.magnific-popup.js')?>"></script>
    <!-- particles js -->
    <script src="<?php echo base_url('js/owl.carousel.min.js')?>"></script>
    <script src="<?php echo base_url('js/jquery.nice-select.min.js')?>"></script>
    <!-- slick js -->
    <script src="<?php echo base_url('js/slick.min.js')?>"></script>
    <script src="<?php echo base_url('js/jquery.counterup.min.js')?>"></script>
    <script src="<?php echo base_url('js/waypoints.min.js')?>"></script>
    <script src="<?php echo base_url('js/contact.js')?>"></script>
    <script src="<?php echo base_url('js/jquery.ajaxchimp.min.js')?>"></script>
    <script src="<?php echo base_url('js/jquery.form.js')?>"></script>
    <script src="<?php echo base_url('js/jquery.validate.min.js')?>"></script>
    <script src="<?php echo base_url('js/mail-script.js')?>"></script>
    <!-- custom js -->
    <script src="<?php echo base_url('js/custom.js')?>"></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>
        $(document).ready(function() {

            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

        });
    </script>