<?php get_header(); ?>
<div class="container pt-5 pb-5">
    <h1><?php the_title(); ?></h1>
    Welcome, view your <a href="<?php echo site_url('/projects'); ?>">projects</a> and <a href="<?php echo site_url('/tasks'); ?>">tasks</a>. Projects and tasks are created in the wordpress dashboard and managed with the advanced custom fields plugin.
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile;
    endif; ?>
</div>
<?php get_footer(); ?>