	<!-- jQuery 3.7.1 (LOCAL - SECURITY UPDATE: Fixed CVE-2015-9251, CVE-2019-11358, CVE-2020-11022, CVE-2020-11023) -->
	<script src="<?= base_url()?>assets/vendor/jquery/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/jarallax/jarallax.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/odometer/odometer.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/swiper/swiper.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/wnumb/wNumb.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/wow/wow.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/isotope/isotope.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/countdown/countdown.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/twentytwenty/twentytwenty.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/twentytwenty/jquery.event.move.js"></script>
    <script src="<?= base_url() ?>newestassets/vendors/bxslider/js/jquery.bxslider.min.js"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM&loading=async" async defer></script>


    <!-- template js -->
    <script src="<?= base_url() ?>newestassets/js/aivons.js"></script>
    <script>
        // Accessibility and ARIA enhancements for accrodion
        (function($){
            $(document).ready(function(){
                // Set button roles and default aria-expanded according to current state
                $('.accrodion-grp .accrodion-title').attr({role: 'button', tabindex: 0});
                $('.accrodion-grp .accrodion').each(function(){
                    var btn = $(this).find('.accrodion-title');
                    var expanded = $(this).hasClass('active') ? 'true' : 'false';
                    btn.attr('aria-expanded', expanded);
                });

                // Update aria-expanded on click/keypress (space/enter)
                $('.accrodion-grp .accrodion-title').on('click keypress', function(e){
                    if (e.type === 'keypress' && e.key !== ' ' && e.key !== 'Enter') return;
                    var parent = $(this).parent();
                    var isActive = parent.hasClass('active');
                    // If not active, it will be activated by existing aivons.js handler
                    // We toggle the aria-expanded based on the expected state
                    var willBeExpanded = !isActive;
                    // mark this as true, others false
                    parent.siblings('.accrodion').find('.accrodion-title').attr('aria-expanded','false');
                    $(this).attr('aria-expanded', willBeExpanded ? 'true' : 'false');
                });
            });
        })(jQuery);
    </script>

    <!-- color switcher language -->
    <script src="<?= base_url()?>assets/vendor/js-cookie/js/js.cookie.min.js"></script>
    <script src="<?= base_url() ?>newestassets/js/jQuery.style.switcher.min.js"></script>
    <script src="<?= base_url() ?>newestassets/js/lang.js"></script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="<?= base_url() ?>newestassets/js/color-switcher.js"></script>

	<!-- REMOVED: Duplicate jQuery 3.2.1 slim (already loaded 3.7.1 above) -->
	<!-- REMOVED: Duplicate Bootstrap (already loaded bootstrap.bundle.min.js above) -->
	<!-- REMOVED: Admin-only scripts (charts, datatables) - not needed for public pages -->