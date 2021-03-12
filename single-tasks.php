<?php
$project = get_field('tasks-projects');
$project_permalink = get_permalink($project->ID);
$priority = get_field('priority');
$status = get_field('status');
$startedAt = get_field('started_at');
$completedAt = get_field('completed_at');

get_header(); ?>

<div class="single-task-view container pt-5 pb-5">

    <div class="task-summary mb-5">


        <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-secondary">Task</div>
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>

                <div class="status-and-priority">
                    <div><?php echo $priority; ?> priority</div>
                    <div><?php echo $status; ?></div>
                </div>

                <?php
                if ($startedAt || $completedAt)
                    echo '<br/>';
                if ($startedAt)
                    echo 'start: ' . $startedAt . '<br/>';
                if ($completedAt)
                    echo 'end: ' . $completedAt;
                ?>
            </div>
            <div class="card-footer bg-transparent border-secondary">

                <a href="<?php echo $project_permalink; ?>"><?php echo get_the_title($project->ID); ?></a>

            </div>
        </div>


    </div>

    <div style="text-align:center"><?php the_content(); ?></div>
</div>
<?php get_footer(); ?>