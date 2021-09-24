<?php

/**
 * Template Name: Corporate Responsiblity Home
**/

get_header('corporate-responsibility');

while(have_posts() ):the_post();

?>

<!-- page content starts -->

    <div class="main_cls_banner">
        <div class="banner_bg">
            <div class="section-spacing">
                <div class="container_inner">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="banner_title">
                                <h1><?php the_field('page_custom_title'); ?></h1>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="banner_text">
                                <span class="banner_text_line"></span>
                               <?php the_field('page_custom_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( have_rows('home_slides') ){ ?>
            <div class="banner__slider">
                <div class="container_inner">
                    <div class="sustainability-home-slider stick-dots">

                        <?php 
                            $count = 1;
                            while( have_rows('home_slides') ) : the_row();
                                $cta = get_sub_field('slide_link');
                                $cta_url = $cta['url'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self';
                                $aria_label = get_sub_field('slide_link_aria_label');
                        ?>
                        <div class="slide slide_two slide_<?php echo $count; ?>">
                            <div class="slide__img">
                                <?php if(get_sub_field('slide_link')){ ?>
                                <a class="ctabtn" href="<?php echo $cta_url; ?>" aria-label="<?php echo $aria_label; ?>"  target="<?php echo $link_target; ?>" >
                                <?php } ?>

                                    <?php echo wp_get_attachment_image(get_sub_field('slide_desktop_image'), 'Full', '', array('class'=>'desktop-img')); ?>
                                    
                                    <?php echo wp_get_attachment_image(get_sub_field('slide_mobile_image'), 'Full', '', array('class'=>'mobile-img')); ?>
                                <?php if(get_sub_field('slide_link')){ ?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php $count++; endwhile; ?>

                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    
    <?php if(get_field('home_richtext')){ ?>
	<div class="home_overview_section">
	    <div class="container_inner">
		  <div class="home_rich_center">
		    <?php the_field('home_richtext'); ?>
		   </div>
		</div>
	</div>
	 <?php } ?>
	
    <?php if( have_rows('leader_messages') ): ?>
    <div class="leader_cls_main home_leader_outer">
        
        <?php if(get_field('leader_messages_title')){ ?>
        <div class="section_heading">
            <div class="container_inner">
                <h2><?php the_field('leader_messages_title'); ?></h2>
            </div>
        </div>
        <?php } ?>

        <?php
            $count_rows = count(get_field('leader_messages'));
            $count = 1;
            while( have_rows('leader_messages') ) : the_row();
                if($count%2 == 0){
                    $row_class = 'row-reverse';
                }else{
                    $row_class = '';
                }

                if($count == $count_rows){
                    $last_element = ' last_row';
                }
        ?>
        <div class="leader_msg_row <?php echo $last_element; ?>">
            <div class="container_inner">
                <div class="flex_dly <?php echo $row_class; ?>">
                    <div class="flex_cell">
                        <div class="img_container">
        				    <?php if(get_sub_field('leader_message_video_url')){ ?>
                            <a class="video-popup" href="<?php the_sub_field('leader_message_video_url'); ?>?autoplay=1">
        					<?php } ?>
                            
                                <?php echo wp_get_attachment_image(get_sub_field('leader_image'), 'Full', '', array('class' => 'desktop-img')); ?>
                                <?php echo wp_get_attachment_image(get_sub_field('leader_mobile_image'), 'Full', '', array('class' => 'mobile-img')); ?>
                            <?php if(get_sub_field('leader_message_video_url')){?>
                            </a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="flex_cell flex_cell_content">
                        <div class="leader_inner_text">
                            <div class="leader_text_main">
                                <div class="leader_text">
                                    <?php the_sub_field('leader_message_content'); ?>
                                </div>
                                <div class="leader_links">
                                    <?php 
                                        if(get_sub_field('leader_message_cta_url')){
                                            $cta = get_sub_field('leader_message_cta_url');
    										$link_target = $cta['target'] ? $cta['target'] : '_self';
                                    ?>
                                    <a href="<?php echo $cta['url'];?>" class="link-text link-arrow " target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php the_sub_field('leader_message_cta_aria_label'); ?>">
                                        <?php echo $cta['title']; ?>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $count++; endwhile; ?>
    </div>
    <?php endif; ?>

    <?php if( have_rows('sustainability_approach_grid') ): ?>
    <div class="home-susta_outer susta_cls_main gray-bg section-spacing">
        <div class="container_inner">
            <div class="row">
                <?php if(get_field('sustainability_approach_title') || get_field('sustainability_approach_description')){ ?>
                <div class="col-lg-12">
                    <?php if(get_field('sustainability_approach_title')){ ?>
                    <div class="section_heading">
                        <h2><?php the_field('sustainability_approach_title'); ?></h2>
                    </div>
                    <?php } ?>

                    <?php if(get_field('sustainability_approach_description')){ ?>
                    <div class="section_text">
                        <?php the_field('sustainability_approach_description'); ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>

                <?php 
                    while( have_rows('sustainability_approach_grid') ) : the_row();
                        $cta = get_sub_field('sustainability_grid_link');
						$link_target = $cta['target'] ? $cta['target'] : '_self';
                ?>
                <div class="col-md-4 home_susta_cls-col">
                    <div class="susta_card_main">
                        <a href="<?php echo $cta['url']; ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php the_sub_field('grid_link_aria_label'); ?>">
                            <div class="susta_card_img">
                                <?php echo wp_get_attachment_image(get_sub_field('sustainability_approach_grid_image'), 'Full', '', array('class'=>'desktop-img')); ?>
                                <?php echo wp_get_attachment_image(get_sub_field('sustainability_approach_mobile_image'), 'Full', '', array('class'=>'mobile-img')); ?>
                            </div>
                            <div class="susta_card_text">
                                <p><?php the_sub_field('sustainability_approach_grid_title'); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="home-pandemic-outer pandic_cls_main section-spacing">
        <div class="container_inner">
            <div class="gray-bg">
                <?php $img_path = wp_get_attachment_image_url(get_field('pandemic_block_image'), 'Full', '', array('class' => 'desktop-img')); ?>
                <div class="pandic_cls-wrap bg_img_mob" style="background: url(<?php echo $img_path; ?>);">
                    <div class="pandemic-content py_80">
                        <div class="pandemic-content-wrap">
                            <div class="section_heading">
                                <h2><?php the_field('pandemic_block_title'); ?></h2>
                            </div>
                            <div class="section_text">
                                <p><?php the_field('pandemic_block_description'); ?></p>
                            </div>
                            <?php 
                                if(get_field('pandemic_block_cta_url')){
                                    $cta = get_field('pandemic_block_cta_url');
									$link_target = $cta['target'] ? $cta['target'] : '_self';
                            ?>
                            <div class="btn_learn">
                                <a href="<?php echo $cta['url']; ?>" target="<?php echo esc_attr( $link_target ); ?>"  class="cstm_button" aria-label="<?php the_field('pandemic_block_cta_aria_label'); ?>">
                                    <span><?php echo $cta['title']; ?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="pandic_cls-img-sec">
                        <div class="pandic_img">
                            <?php echo wp_get_attachment_image(get_field('pandemic_block_mobile_image'), 'Full', '', array('class' => 'mobile-img')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(have_rows('responsibility_sectors')): ?>
    <div class="categories_cls_main home_people_planet-outer section-spacing">
        <div class="container_inner">
            <div class="row">
                <?php 
                    $count = 1;
                    while( have_rows('responsibility_sectors') ) : the_row();
                        if($count == 2){
                            $color_class = 'planet';
							$section_class ='planet_section_link';
                        }elseif($count == 3){
                            $color_class = 'product';
							$section_class ='product_section_link';
                        }else{
                            $color_class = '';
							$section_class ='people_section_link';
                        }
                ?>
                <div class="col-md-4 pr_10">
                    <div class="categories_people <?php echo $color_class; ?>">
                        <div class="box_cls_categ">
                            <h3><?php the_sub_field('responsibility_sector_title'); ?></h3>
                            <?php 
                                if(get_sub_field('responsibility_sector_video_url')){
                                    $vdo_url = get_sub_field('responsibility_sector_video_url');
                                    $vdo_aria_label = get_sub_field('responsibility_sector_video_aria_label');
                            ?>
                            <a class="video-popup" href="<?php echo $vdo_url; ?>" aria-label="<?php echo $vdo_aria_label; ?>">
                                <img src="<?php echo get_theme_file_uri( 'img/sustainability-2021-images/small-play.svg' ); ?>" alt="play icon">
                            </a>
                            <?php } ?>
                        </div>
                        <div class="categories_people_text">
                            <?php the_sub_field('responsibility_sector_description'); ?>
                        </div>

                        <?php 
                            if( have_rows('responsibility_sector_links') ):
                                while( have_rows('responsibility_sector_links') ) : the_row();
                                    $cta = get_sub_field('responsibility_link_url');
									$link_target = $cta['target'] ? $cta['target'] : '_self';
                        ?>
                        <div class="categories_faq">
                            <a class="<?php echo $section_class; ?>" href="<?php echo $cta['url']; ?>" target="<?php echo esc_attr( $link_target ); ?>"  aria-label="<?php the_sub_field('responsibility_link_aria-label'); ?>">
                                <?php echo $cta['title']; ?> <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        <?php 
                            endwhile;
                            endif;
                        ?>
                    </div>
                </div>
                <?php $count++; endwhile; ?>

            </div>
            <div class="border-full"></div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( have_rows('sustainability_sectors') ): ?>
    <div class="home_Fiscal_Sustainability-outer fiscal-corporate-outer highlight_cls_main section-spacing">
        <div class="container_inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_heading">
                        <h2><?php the_field('sustainability_highlights_section_title'); ?></h2>
                    </div>
                </div>
            </div>
            <?php
                $count = 1;
                while( have_rows('sustainability_sectors') ) : the_row();
                    if($count == 2){
                        $rowClass = 'green_box';
                    }elseif($count == 3){
                        $rowClass = 'blue_box';
                    }else{
                        $rowClass = '';
                    }

                    $countClass = 'highlights_row_'.$count;
            ?>
            <div class="border-btm home_highlights_row <?php echo $countClass; ?>">
                <div class="row <?php echo $rowClass; ?>">
                    <div class="col-lg-3">
                        <div class="fiscal-corporate-icon">
                            <?php echo wp_get_attachment_image(get_sub_field('sustainability_sector_icon'), 'Full'); ?>
                        </div>
                        <div class="fiscal-corporate-text">
                            <h2><?php the_sub_field('sustainability_sector_title'); ?></h2>
                            <p><strong><?php the_sub_field('sustainability_sector_description'); ?></strong></p>
                        </div>
                    </div>
                    <div class="col-lg-9 home_Fiscal_Sus_right">
                        <?php if( have_rows('sustainability_highlights_grid') ):?>
                        <div class="row fiscal-corporate-sec-row">
                            <?php while( have_rows('sustainability_highlights_grid') ) : the_row(); ?>
                            <div class="fiscal-corporate-sec-col col-lg-4 col-md-4 col-6">
                                <div class="fiscal-corporate-box">
                                    <p><strong><?php the_sub_field('sustainability_highlights_grid_title'); ?></strong></p>
                                    <h2><?php the_sub_field('sustainability_highlights_grid_stat'); ?></h2>
                                    <p><?php the_sub_field('ssustainability_highlights_grid_description'); ?></p>
                                    <div class="overlay">
                                        <div class="overlay_text">
                                            <p><?php the_sub_field('sustainability_highlights_grid_info'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $count++; endwhile; ?>

        </div>
    </div>
    <?php endif; ?>

    <?php if(get_field('sobeys_cta_content')){ ?>
    <div class="home-about-us about_cls_main gray-bg section-spacing">
        <div class="container_inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about_cls_inner">
                        <div class="about_img">
                            <?php echo wp_get_attachment_image(get_field('sobeys_cta_icon'), 'Full'); ?>
                        </div>
                        <div class="about_text">
                            <h2><?php the_field('sobeys_cta_content'); ?></h2>
                        </div>
                        <?php 
                            $cta = get_field('sobeys_cta_url');
                            $link_target = $cta['target'] ? $cta['target'] : '_self';
                        ?>
                        <div class="btn_learn">
                            <a href="<?php echo $cta['url']; ?>" class="cstm_button" aria-label="<?php the_field('sobeys_cta_aria_label'); ?>" target="<?php echo $link_target; ?>"><span><?php echo $cta['title']; ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if( have_rows('recent_updates_grid') ){ ?>
    <div class="home-recent-updates-section section-spacing">
        <div class="container_inner">
            <?php if(get_field('recent_updates_section_title')){ ?>
            <div class="section_heading">
                <h2><?php the_field('recent_updates_section_title'); ?></h2>
            </div>
            <?php } ?>
            <div class="home-recent-updates-grid">
                <div class="row">
                    <?php 
                        while( have_rows('recent_updates_grid') ) : the_row();
                            $cta = get_sub_field('recent_updates_grid_link');
                            $cta_url = $cta['url'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self';
                            $aria_label = get_sub_field('recent_updates_grid_link_aria_label');
                    ?>
                    <div class="home-recent-updates-grid-col col-md-3 col-sm-6 col-12">
                        <a href="<?php echo $cta_url; ?>" target="<?php echo $link_target; ?>" aria-label="<?php echo $aria_label; ?>">
                            <?php echo wp_get_attachment_image(get_sub_field('recent_updates_grid_image'), 'Full'); ?>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php if(get_field('recent_updates_cta_text')){ ?>
            <div class="recent-updates-cta-bar">
                <div class="cst-CTA-bar green-bar">
                    <?php the_field('recent_updates_cta_text'); ?>
                    <?php
                        if(get_field('recent_updates_cta_link')){
                        $cta = get_field('recent_updates_cta_link');
                        $cta_url = $cta['url'];
                        $cta_text = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self';
                        $aria_label = get_field('recent_updates_cta_link_aria_label');
                    ?>
                    
                    <a class="cstm_button info-button" href="<?php echo $cta_url; ?>" aria-label="<?php echo $aria_label; ?>" target="<?php echo $link_target; ?>">
                        <span><?php echo $cta_text; ?></span>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

<?php
endwhile;
get_footer('corporate-responsibility');
?>