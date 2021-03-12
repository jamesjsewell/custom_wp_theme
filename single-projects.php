<?php
$tasks = get_field('tasks');
$project = get_field('project');
$priority = get_field('priority');
$status = get_field('status');
$startedAt = get_field('started_at');
$completedAt = get_field('completed_at');

get_header(); ?>

<div class="single-project-view container pt-5 pb-5">

    <div class="task-summary mb-2">


        <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-secondary">Project</div>
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
        </div>


    </div>

    <?php

    $tasks = get_field("tasks-projects");
    $pendingTasks = '';
    $inProgressTasks = '';
    $inReviewTasks = '';
    $finishedTasks = '';

    foreach ((array) $tasks as &$task) {
        $taskTitle = substr($task->post_title, 0, 20).'...';
        $taskExcerpt = substr(get_the_excerpt($task), 0, 50);
        $taskPermalink = get_the_permalink($task->ID);
        $status = get_field('status', $task->ID);
        $taskPriority = '<br/>' . get_field('priority', $task->ID);
        $taskStart = null;
        $taskEnd = null;

        // if (get_field('started_at', $task->ID)) {
        //     $taskStart = '<div> start: ' . get_field('started_at', $task->ID) . '</div>';
        // }

        // if (get_field('completed_at', $task->ID)) {
        //     $taskEnd = '<div> end: &nbsp' . get_field('completed_at', $task->ID) . '</div>';
        // }

        // ADD TO CARD: 
        // <div class='card-footer bg-transparent border-secondary'>
        //     <span>{$taskStart}</span>
        //     <span>{$taskEnd}</span>
        // </div>

        $renderedTask = "
            <div class='card mb-3'>
                <div class='card-header'>
                    <a href='{$taskPermalink}'>{$taskTitle}</a>
                </div>
                <div class='card-body'>
                <div>{$taskExcerpt}...</div>
                <div>{$taskPriority} priority</div>
                </div>
            </div>
            ";

        switch ($status) {
            case 'pending':
                $pendingTasks .= $renderedTask;
                break;
            case 'in progress':
                $inProgressTasks .= $renderedTask;
                break;
            case 'in review':
                $inReviewTasks .= $renderedTask;
                break;
            case 'complete':
                $finishedTasks .= $renderedTask;
                break;
        }
    }

    echo "<div class='container mb-3'>
        <div class='row'>
            <div class='col-md m-1 border rounded-lg bg-secondary'>
                <p class='p-2 text-white'>Pending</p>
                {$pendingTasks}
            </div>
            <div class='col-md m-1 border rounded-lg bg-secondary'>
                <p class='p-2 text-white'>In Progress</p>
                {$inProgressTasks}
            </div>
            <div class='col-md m-1 border rounded-lg bg-secondary'>
                <p class='p-2 text-white'>In Review</p>
                {$inReviewTasks}
            </div>
            <div class='col-md m-1 border rounded-lg bg-secondary'>
                <p class='p-2 text-white'>Complete</p>
                {$finishedTasks}
            </div>
        </div>
    </div>"; ?>

    <div style="text-align:center"><?php the_content(); ?></div>

</div>

<?php get_footer(); ?>