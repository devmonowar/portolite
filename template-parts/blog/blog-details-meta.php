<?php
    $author_data = get_the_author_meta( 'description', get_query_var( 'author' ) );
    $author_name = get_the_author_meta( 'portolite_write_by');
    $facebook_url = get_the_author_meta( 'portolite_facebook' );
    $twitter_url = get_the_author_meta( 'portolite_twitter' );
    $linkedin_url = get_the_author_meta( 'portolite_linkedin' );
    $instagram_url = get_the_author_meta( 'portolite_instagram' );
    $portolite_url = get_the_author_meta( 'portolite_youtube' );
    $portolite_write_by = get_the_author_meta( 'portolite_write_by' );
    $author_bio_avatar_size = 180;


    $categories = get_the_terms( $post->ID, 'category' );
    $portolite_blog_date = get_theme_mod( 'portolite_blog_date', true );
    $portolite_blog_comments = get_theme_mod( 'portolite_blog_comments', true );
    $portolite_blog_author = get_theme_mod( 'portolite_blog_author', true );
    $portolite_blog_cat = get_theme_mod( 'portolite_blog_cat', false );
    $portolite_blog_view = get_theme_mod( 'portolite_blog_view', false );

?>


    <div class="postbox__meta-wrapper d-flex align-items-center flex-wrap">

        
        <?php if(!empty(get_author_posts_url( get_the_author_meta( 'ID' ) )) && !empty($portolite_blog_author)) : ?>
        <div class="postbox__meta-item mb-30 dd">
            <div class="postbox__meta-author d-flex align-items-center">
                <?php if(!empty(get_avatar(get_the_author_meta( 'user_email' ), $author_bio_avatar_size, '', '', [ 'class' => 'media-object img-circle' ]))) : ?>
                <div class="postbox__meta-author-thumb">
                    <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>">
                        <?php print get_avatar(get_avatar(get_the_author_meta( 'user_email' ), $author_bio_avatar_size, '', '', [ 'class' => 'media-object img-circle' ]) );?>
                    </a>
                </div>
                <?php endif; ?>
                <div class="postbox__meta-content">

                <span class="postbox__meta-type"><?php echo esc_html__( 'Author', 'portolite' ); ?></span>

                <p class="postbox__meta-name">
                    <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>">
                        <?php print get_the_author();?>
                    </a>
                </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ( !empty($portolite_blog_date) ): ?>
        <div class="postbox__meta-item mb-30">
            <div class="postbox__meta-content">
                <span class="postbox__meta-type"><?php echo esc_html__( 'Published', 'portolite' ); ?></span>
                <p class="postbox__meta-name"><?php the_time( get_option('date_format') ); ?></p>
            </div>
        </div>  
        <?php endif; ?>      

        <?php if ( !empty($portolite_blog_comments) ): ?>
        <div class="postbox__meta-item mb-30">
            <div class="postbox__meta-content">
                <span class="postbox__meta-type"><?php comments_number();?></span>
                <p class="postbox__meta-name"><a href="<?php comments_link();?>"><?php echo esc_html__( 'Join the Conversation', 'portolite' ); ?></a></p>
            </div>
        </div>
        <?php endif; ?>  


        <?php if(function_exists('getPostViews') && !empty($portolite_blog_view)) : ?>
        <div class="postbox__meta-item mb-30">
            <div class="postbox__meta-content">
                <span class="postbox__meta-type"><?php echo esc_html__( 'View', 'portolite' ); ?></span>
                <p class="postbox__meta-name">
                    <?php echo getPostViews(get_the_ID()); ?>
                    <?php echo esc_html__('Views', 'portolite'); ?>
                </p>
            </div>
        </div>
        <?php endif; ?>

    </div>


