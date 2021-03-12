example hosted here: http://23.96.29.152/

this theme allows a wordpress admin to manage tasks and projects from the wordpress dashboard, and for users to browse the projects and tasks on the live site.
this is based around using the Advanced Custom Fields plugin with custom post types.

using mix to compile sass. if there are issues with scss image urls, may need to use `mix.options({processCssUrls: false})` in the webpack.mix.js file

`npx mix --production` to make a prod css/js build
`npx mix watch` for css/js development

wordpress plugins are required to utilize this theme:
- [`ACF`](https://wordpress.org/plugins/advanced-custom-fields/) a plugin for adding fields to wordpress posts in the dashboard
- [`ACF post-2post`](https://wordpress.org/plugins/post-2-post-for-acf/) for making acf associations bidirectional for different post types, ie projects and tasks

----

basics of setting up ACF relations, watch this [`tutorial`](https://www.youtube.com/watch?v=rGYb7sPA4Bw) you'll be able to use the task and projects custom post
types i defined in the functions.php file. 

setting up the ACF field groups and fields: (the field name for Tasks and Projects has to be the same for the bidirectional relationship to work, `tasks-projects`)

I made three field groups in ACF, I chose to call them "Select Project", "Select Tasks", "Status". 
- "Status" field group, under the location section, set a rule for post type equals Tasks OR Projects. the fields are as follows:
    - label set to Status, field name set to `status`. field type "select" with choices: `pending, in progress, in review, complete`. choices must be new line and not comma separated. Default value set to `pending`
    - label Priority, field name `priority`. field type "select" with choices: `low, medium, high`. choices must be new line and not comma separated. Default value set to `low`
    - label Started At, field name `started_at`. field type "Date time picker"
    - label Completed At, field name `completed_at` field type "Date time picker"
- for "Select Project" field group, name the field label "Project" and field name `tasks-projects`. Choose field type "Post Object" under the "Relational" category. "Filter by post type" option set to Project, allow null option set to true. Under the "location" section, add a rule for post type is equal to Task
- for "Select Task" field group, name the field label "Tasks" and field name `tasks-projects`. Choose field type "Relationship" under the "Relational" category. "Filter by post type" option set to Task. Under the "location" section, add a rule for post type is equal to Project

fields used in `single-projects.php`
- $tasks = get_field("tasks-projects");
- $status = get_field('status', $task->ID);
- $taskPriority = get_field('priority', $task->ID);

fields used in `single-tasks.php`
- $project = get_field('tasks-projects');
- $priority = get_field('priority');
- $status = get_field('status');
- $startedAt = get_field('started_at');
- $completedAt = get_field('completed_at');

----


more Youtube tutorials I followed:
- [`scss/js compiler tutorial`](https://www.youtube.com/watch?v=7Nu3n-aQ9Hs)
- [`base theme tutorial`](https://www.youtube.com/watch?v=pFMgAWkrk8o&t=640s)

Other resources i used:
- [`bootstrap navmenu`](https://github.com/wp-bootstrap/wp-bootstrap-navwalker)
- [`bootstrap navmenu for bootstrap v5`](https://github.com/wp-bootstrap/wp-bootstrap-navwalker/issues/499)