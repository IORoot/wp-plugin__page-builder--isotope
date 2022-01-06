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

v1.1.0 - 06/01/2022 - Added all taxonomies into the cells so filtering works for any taxonomy.

v1.0.0 - 01/01/2022 - Working Isotope instance.