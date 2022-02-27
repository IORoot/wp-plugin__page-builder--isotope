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

v1.1.3 - 27/02/2022 - Removed the window.addEventListener (enqueue.php) from the inline JS.

v1.1.2 - 23/02/2022 - Filter selects are organised alphabetically. Help explains about sorts & filters in the cell.

v1.1.1 - 11/01/2022 - Add {{loop_index}} as a new field for the cell.

v1.1.0 - 06/01/2022 - Added all taxonomies into the cells so filtering works for any taxonomy.

v1.0.0 - 01/01/2022 - Working Isotope instance.