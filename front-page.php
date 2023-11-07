<?php get_header() ?>

<!--hero section start-->
<section class="hero" id="hero">
    <div class="hero__wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12 order-2 order-lg-1">
                    <?php
                    $services = new WP_Query(array(
                        'post_type' => 'banner',
                        'posts_per_page' => 1, // You can adjust this based on your needs
                    ));

                    if ($services->have_posts()) {
                        while ($services->have_posts()) {
                            $services->the_post();

                            // Retrieve ACF fields
                            $service_title = get_field('banner_title');
                            $service_content = get_field('banner_content');
                            $service_image = get_field('banner_image');
                            $phone_number = get_field('phone_number'); // Add this line to retrieve phone number
                            $whatsapp_link = get_field('whatsapp_link'); // Add this line to retrieve WhatsApp link
                            ?>

                            <h1 class="main-heading color-black"><?php echo $service_title; ?></h1>
                            <p class="paragraph"><?php echo $service_content; ?></p>

                            <div class="download-buttons">
                                <a href="tel:<?php echo $phone_number; ?>" class="google-play">
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <div class="button-content">
                                        <h6><span><?php echo $phone_number; ?></span></h6>
                                    </div>
                                </a>
                                <a href="<?php echo $whatsapp_link; ?>" class="apple-store">
                                    <i class="fab fa-whatsapp"></i>
                                    <div class="button-content">
                                        <h6><span>Chat with US</span></h6>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <div class="col-xl-6 col-lg-12 order-1 order-lg-2 center_itm">
                    <div class="questions-img hero-img">
                        <?php
                        if ($service_image) {
                            echo '<img src="' . $service_image['url'] . '" alt="' . $service_image['alt'] . '">';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--hero section end-->

<!--message section start-->
<section class="clients-sec custom_padding_t" id="feedback">
    <div class="container">
        <?php
        $director_message = new WP_Query(array(
            'post_type' => 'statement',
            'posts_per_page' => 1, // You can adjust this based on your needs
        ));

        if ($director_message->have_posts()) {
            while ($director_message->have_posts()) {
                $director_message->the_post();

                // Retrieve ACF fields
                $director_image = get_field('statement_image');
                $director_name = get_field('statement_name');
                $director_position = get_field('statement_position');
                $director_message_content = get_field('statement_message_content');
                ?>

                <h2 class="section-heading color-black"><?php the_title(); ?></h2>
                <div class="testimonial__wrapper">
                    <div class="mesasge_wrapper">
                        <div class="image message_image">
                            <?php
                            if ($director_image) {
                                echo '<img src="' . $director_image['url'] . '" alt="' . $director_image['alt'] . '" height="180px">';
                            }
                            ?>
                        </div>
                        <div class="mesasge">
                            <div class="testimonial__wrapper">
                                <p><?php echo $director_message_content; ?></p>
                                <h4><?php echo $director_name; ?><br><?php echo $director_position; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </div>
</section>

<!--message section end-->


<!--feature section start-->
<section class="feature" id="services">
    <div class="container">
        <h2 class="section-heading color-black">Get surprised by amazing services.</h2>
        <div class="row">
            <?php
            $service_features = new WP_Query(array(
                'post_type' => 'service_features',
                'posts_per_page' => -1, // Retrieve all posts of the custom post type
            ));

            if ($service_features->have_posts()) {
                $counter = 1; // Initialize the counter
                while ($service_features->have_posts()) {
                    $service_features->the_post();

                    // Retrieve ACF fields
                    $feature_title = get_field('feature_title');
                    $feature_description = get_field('feature_description');
                    $feature_image = get_field('feature_image'); // ACF field for the Font Awesome icon class
                     
                    ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="feature__box feature__box--<?php echo $counter; ?>">
                            <div class="icon icon-<?php echo $counter; ?>">
                                <i ><img src="<?php echo $feature_image['url']; ?>" alt="<?php echo $feature_image['alt']; ?>" height="120px"></i>
                            </div>
                            <div class="feature__box__wrapper">
                                <div class="feature__box--content">
                                    <h3><?php echo $feature_title; ?></h3>
                                    <p class="paragraph dark"><?php echo $feature_description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++; // Increment the counter
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</section>


<!--feature section end-->

<!--gallery section start-->
<section class="gallery_section custom_padding_t" id="fancy_gallery">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Capturing Joy: <br> Our Event Showcase.</h2>
    <div class="container">
      <div class="row myFancyGallery justify-content-center">

        <?php
        $custom_images_query = new WP_Query(array(
          'post_type' => 'custom_images',
          'posts_per_page' => -1,
        ));

        if ($custom_images_query->have_posts()) {
          while ($custom_images_query->have_posts()) {
            $custom_images_query->the_post();

            $gallery_images = get_post_meta(get_the_ID(), 'custom_images_gallery_images', true);

            if (!empty($gallery_images)) {
              foreach ($gallery_images as $image_url) {
        ?>

                <div class="col-lg-2 col-md-3 col-4 gallery_item fancy_item">
                  <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery">
                    <div class="blog__single-image gallery_item_image">
                      <img src="<?php echo esc_url($image_url); ?>" alt="">
                    </div>
                  </a>
                </div>

        <?php
              }
            }
          }
        }
        wp_reset_postdata();

        ?>

      </div>
    </div>
  </div>
</section>
<!--gallery section end-->

<!--pricing section start-->
<section class="pricing" id="pricing">
    <div class="pricing__wrapper">
        <h2 class="section-heading color-black">Easy pricing plans for your needs.</h2>
        <div class="container">
            <div class="row">
                <?php
                $pricing_plans = new WP_Query(array(
                    'post_type' => 'pricing_plan',
                    'posts_per_page' => -1, // Retrieve all posts of the custom post type
                ));

                if ($pricing_plans->have_posts()) {
                    while ($pricing_plans->have_posts()) {
                        $pricing_plans->the_post();

                        // Retrieve ACF fields
                        $plan_name = get_field('plan_name');
                        $plan_price = get_field('plan_price');
                        $icon_class = get_field('plan_icon'); // ACF field for the Font Awesome icon class
                        $plan_details = get_field('plan_details'); // ACF field for the plan details

                        ?>

                        <div class="col-lg-4">
                            <div class="pricing__single pricing__single-2 ?>">
                                <div class="icon">
                                    <i><img src="<?php echo $icon_class['url']; ?>" alt="img" height="80px"></i>
                                </div>
                                <h4><?php echo $plan_name; ?></h4>
                                <h3><?php echo $plan_price; ?></h3>
                                <div class="list">
                                    <ul>
                                        <?php
                                        // Split plan details into separate lines (assuming each detail is a line)
                                        $plan_details_lines = explode("\n", $plan_details);

                                        foreach ($plan_details_lines as $detail) {
                                            echo "<li>$detail</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <a href="https://api.whatsapp.com/send?phone=9852063249" class="button">
                                    <span>GET PACKAGE <i class="fad fa-long-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
</section>


<!--pricing section end-->

<!--video gallery section start-->
<!--video gallery section start-->

<section class="gallery_section custom_padding_tb feature" id="video">
  <div class="blog__content">
    <h2 class="w-100 section-heading color-black text-center">Capturing the moments <br>mesmerizing gallery.</h2>
    <div class="container">
      <div class="row">

        <?php
        $video_gallery_query = new WP_Query(array(
          'post_type' => 'gallery_item',
          'posts_per_page' => -1,
        ));

        while ($video_gallery_query->have_posts()) : $video_gallery_query->the_post();

          $post_content = get_the_content();
          $pattern = '/src=["\']([^"\']+)["\']/';
          preg_match_all($pattern, $post_content, $matches);

          if (!empty($matches[1])) {
            foreach ($matches[1] as $video_src) {
        ?>

              <div class="col-lg-4 col-md-6 col-12 gallery_item">
                <iframe src="<?php echo esc_url($video_src); ?>" loading="lazy"></iframe>
              </div>

        <?php
            }
          }
        endwhile;

        wp_reset_postdata();
        ?>

      </div>
    </div>
  </div>
</section>

<!--video gallery section end-->

<!--team section start-->
<section class="gallery_section custom_padding_tb" id="team">
    <div class="blog__content">
        <h2 class="w-100 section-heading color-black text-center">Meet Our Expert <br> Event Team.</h2>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                $team_members = new WP_Query(array(
                    'post_type' => 'team_members', // Replace with your custom post type name
                    'posts_per_page' => -1,
                ));

                if ($team_members->have_posts()) {
                    while ($team_members->have_posts()) {
                        $team_members->the_post();
                        $team_member_name = get_field('team_member_name'); // Replace with your ACF field name
                        $team_member_title = get_field('team_member_title'); // Replace with your ACF field name
                        $team_member_image = get_field('team_member_image'); // Replace with your ACF field name
                                             
                ?>
                <div class="col-lg-4 col-md-6 gallery_item">
                    <a>
                        <div class="blog__single blog__single--1">
                            <div class="blog__single-image">
                                <img src="<?php echo $team_member_image['url']; ?>" alt="<?php echo $team_member_image['alt']; ?>">
                            </div>
                            <div class="blog__single-info team_item_info">
                                <h3><?php echo $team_member_name; ?></h3>
                                <span><?php echo $team_member_title; ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                }

                // Reset the post data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<!--team section end-->

<!--newsletter section start-->
<section class="newsletter newsletter-2" id="contact">
    <div class="newsletter__wrapper">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-lg-8">
                    <div class="newsletter__info pb-5 mb-5">
                        <h2 class="section-heading color-black">Get in touch with us today.</h2>
                        <div class="comment_form">
                            <div>
                                <input type="text" placeholder="Name *" class="input-field">
                                <input type="text" placeholder="Email *" class="input-field">
                                <input type="text" placeholder="Website" class="input-field">
                            </div>
                            <div>
                                <textarea placeholder="Write message *" class="input-field"></textarea>
                                <button class="button"><span>SEND <i class="fad fa-long-arrow-right"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newsletter__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img/contactus.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--newsletter section end-->
<?php get_footer() ?>