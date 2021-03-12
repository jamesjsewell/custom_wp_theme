example hosted here: http://23.96.29.152/

this theme allows a wordpress admin to manage tasks and projects from the wordpress dashboard, and for users to browse the projects and tasks on the live site.
this is based around using the Advanced Custom Fields plugin with custom post types.

using mix to compile sass. if there are issues with scss image urls, may need to use `mix.options({processCssUrls: false})` in the webpack.mix.js file

`npx mix --production` to make a prod css/js build
`npx mix watch` for css/js development

wordpress plugins are required to utilize this theme:
- [`ACF`](https://wordpress.org/plugins/advanced-custom-fields/) a plugin for adding fields to wordpress posts in the dashboard
- [`ACF post-2post`](https://wordpress.org/plugins/post-2-post-for-acf/) for making acf associations bidirectional for different post types, ie projects and tasks

Youtube tutorials I followed:
- [`scss/js compiler tutorial`](https://www.youtube.com/watch?v=7Nu3n-aQ9Hs)
- [`base theme tutorial`](https://www.youtube.com/watch?v=pFMgAWkrk8o&t=640s)

Other resources i used:
- [`bootstrap navmenu`](https://github.com/wp-bootstrap/wp-bootstrap-navwalker)
- [`bootstrap navmenu for bootstrap v5`](https://github.com/wp-bootstrap/wp-bootstrap-navwalker/issues/499)