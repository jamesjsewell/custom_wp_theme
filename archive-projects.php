<?php get_header(); ?>
<div class="container pt-5 pb-5">
    <h2 class="text-center mb-3">Projects</h2>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="card mb-3">
                <div class="card-body">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Read more</a>
                </div>
            </div>


    <?php endwhile;
    endif; ?>
</div>
<?php get_footer(); ?>