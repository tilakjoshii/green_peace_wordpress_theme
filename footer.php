<!--footer start-->
<?php
$footer_query = new WP_Query(array(
    'post_type' => 'footer',
    'posts_per_page' => -1, // Assuming you only have one footer content post
));

if ($footer_query->have_posts()) :
    while ($footer_query->have_posts()) : $footer_query->the_post();
?>
        <footer class="footer" id="footer">
            <div class="footer__wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer__info">
                                <div class="footer__info--logo">
                              <?php  $feature_image = get_field('logo');?>
                                    <img src="<?php echo $feature_image['url']; ?>" alt="image" height="120px">
                                
                                    
                                </div>
                                <div class="footer__info--content">
                                    <p class="paragraph dark"><?php the_field('paragraph'); ?></p>
                                    <div class="social">
                                        <ul>
                                            <li class="facebook"><a href="<?php the_field('facebook_url'); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="youtube"><a href="<?php the_field('youtube_url'); ?>"><i class="fab fa-youtube"></i></a></li>
                                            <li class="twitter"><a href="<?php the_field('tiktok_url'); ?>"><i class="fab fa-tiktok"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="footer__content-wrapper">
                                <div class="footer__list">
                                    <ul>
                                        <li>Our Location in Map</li>
                                        <li >
                                          <div width="60" height="50"><?php the_field('map_embed_code'); ?></div>  
                                        </li>
                                    </ul>
                                </div>
                                <div class="download-buttons">
                                    <h5>Download</h5>
                                    <a href="tel:<?php the_field('phone_number'); ?>" class="google-play">
                                        <i class="fa-solid fa-phone-volume"></i>
                                        <div class="button-content">
                                            <h6><span><?php the_field('phone_number'); ?></span></h6>
                                        </div>
                                    </a>
                                    <a href="<?php the_field('whatsapp_url'); ?>" class="apple-store">
                                        <i class="fab fa-whatsapp"></i>
                                        <div class="button-content">
                                            <h6><span>Chat with US</span></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<?php
    endwhile;
endif;
wp_reset_postdata();
?>

<!--footer end-->

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/popper-1.16.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script>
    $(window).on('load', function() {
        $("body").addClass("loaded");
    });
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ytdefer.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>


<!-- for gallery fancybox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('[data-fancybox="gallery"]').fancybox({
        buttons: [
            "share",
            "download",
            //   "zoom",
            "slideShow",
            "fullscreen",
            "thumbs",
            "close"
        ],
    });
</script>

<script>
    $(document).ready(function() {
        $('.header__nav li').on('click', function() {
            $('.header__nav').css('right', '100%');
            return 0;
        });
    });
    $(document).ready(function() {
        $('.header__bars').on('click', function() {
            $('.header__nav').css('right', '0%');
            return 0;
        });
    });
</script>

</body>
<?php wp_footer() ?>

</html>