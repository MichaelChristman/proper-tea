<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="team-member-content-wrap">
            <header class="entry-header">
                <div class="team-member-archive-thumb-wrap">
                            <?php the_post_thumbnail(); ?>

                </div><!--.listing-archive-thumb--->

                

            </header><!-- .entry-header -->
            
            <div class="team-member-details">
                
                <?php if(!is_front_page() ) : ?>

                    <div class ="archive-team-position" >
                        <?php 
                        the_title( '<h2 class="entry-title">', '</h2>' ); 

                        $member_position = get_post_meta( get_the_ID() , '_rpmcpt_team_position' , true );

                        echo '<p class = "member-position">'. $member_position .'</p>';

                        ?>

                        <div class="team-member-learn-more-wrap">
                            <button>Learn More</button>
                        </div><!--team-member-learn-more-wrap-->
                    </div><!--.archive-team-position -->


                <?php
                endif; ?>

                <?php if(!is_front_page() ) : ?>


                    <div class="entry-content">
                            <?php
                                    the_content( sprintf(
                                            /* translators: %s: Name of current post. */
                                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'proper-tea' ), array( 'span' => array( 'class' => array() ) ) ),
                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    ) );

                                    wp_link_pages( array(
                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'proper-tea' ),
                                            'after'  => '</div>',
                                    ) );
                            ?>
                    </div><!-- .entry-content -->

                    <div class="team-member-learn-less-wrap">
                        <button>X</button>
                    </div><!--team-member-learn-less-wrap-->
                <?php
                endif; ?>
                
            </div><!--.team-member-details-->
            

            <footer class="entry-footer">
                    <?php proper_tea_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        <div><!--.team-member-content-wrap-->
</article><!-- #post-## -->
