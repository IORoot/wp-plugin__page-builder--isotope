# Metafizzy ISOTOPE

ACF-Based panels to allow you to create shortcodes for isotope grids.

Used on the articles dashboard.

# Example Javascript

This example will initiate sorting with upper/lowercase normalised.

```javascript
var elem = document.querySelector('.tutorials .isotope-grid');
    
var iso = new Isotope( elem, {
	itemSelector: '.grid-item',
	layoutMode: 'fitRows',
	getSortData: {
		title: function( itemElem ) {
		  var title = itemElem.querySelector('.title').innerText;
		  return title.toLowerCase();
		},
		unixdate: '[data-unixdate]'
	}
});
```

## Changelog

v1.1.4 - 14/03/2022

Added a modifier on taxonomies to only return a single one. `{{filters:syllabus_category:0}}`

Ordered the taxonomy filter to return the parent first and child after in the return array.

Added the `{{admin}}...{{/admin}}` moustache to only display cell content if you're an admin.

Added an `{{field:admin}}` modifier to only display post / meta field if user is and admin.

Added an "Admin" tab and toggle for filters to be only for administrators.

v1.1.3 - 27/02/2022 

Removed the window.addEventListener (enqueue.php) from the inline JS.

Added searchbox to filters.

Fixed numerical classes to have the filter name prefixed onto it. This means all numerical classes (that are invalid) will now have the filter name added on the front. i.e. The class .9 will actually be .award_level9 if the filter-group is called 'award_level'. This also means that the cell will require that inside too. 
	`<div class="award_level award_level{{award_level}} hidden">{{award_level}}</div>`

v1.1.2 - 23/02/2022 - Filter selects are organised alphabetically. Help explains about sorts & filters in the cell.

v1.1.1 - 11/01/2022 - Add {{loop_index}} as a new field for the cell.

v1.1.0 - 06/01/2022 - Added all taxonomies into the cells so filtering works for any taxonomy.

v1.0.0 - 01/01/2022 - Working Isotope instance.