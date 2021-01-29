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