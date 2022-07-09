
<div id="top"></div>

<div align="center">

<img src="https://svg-rewriter.sachinraja.workers.dev/?url=https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2F%40mdi%2Fsvg%406.7.96%2Fsvg%2Ftable-large.svg&fill=%239A3412&width=200px&height=200px" style="width:200px;"/>

<h3 align="center">Page-Builder Metafizzy Isotope</h3>

<p align="center">
    This is Metafizzy Isotope built for the custom Page-Builder project.
</p>    
</div>

##  1. <a name='TableofContents'></a>Table of Contents


* 1. [Table of Contents](#TableofContents)
* 2. [About The Project](#AboutTheProject)
	* 2.1. [Built With](#BuiltWith)
	* 2.2. [Installation](#Installation)
* 3. [Usage](#Usage)
	* 3.1. [Isotope](#Isotope)
	* 3.2. [WP_Query](#WP_Query)
	* 3.3. [Javascript](#Javascript)
	* 3.4. [Filters](#Filters)
		* 3.4.1. [Taxonomies](#Taxonomies)
		* 3.4.2. [Post / Meta Fields](#PostMetaFields)
		* 3.4.3. [Dates](#Dates)
		* 3.4.4. [Display as Button](#DisplayasButton)
		* 3.4.5. [Display as Select Box](#DisplayasSelectBox)
	* 3.5. [Sorting](#Sorting)
		* 3.5.1. [Sort Options](#SortOptions)
		* 3.5.2. [Sorting Classes](#SortingClasses)
		* 3.5.3. [ Sorting Direction (ASC/DESC)](#SortingDirectionASCDESC)
	* 3.6. [Cells](#Cells)
		* 3.6.1. [{{Moustaches}} List Reference.](#MoustachesListReference.)
	* 3.7. [CSS](#CSS)
		* 3.7.1. [Notes on CSS.](#NotesonCSS.)
* 4. [Customising](#Customising)
* 5. [Troubleshooting](#Troubleshooting)
* 6. [Contributing](#Contributing)
* 7. [License](#License)
* 8. [Contact](#Contact)
* 9. [Changelog](#Changelog)



##  2. <a name='AboutTheProject'></a>About The Project

![Output](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/isotope-output.png?raw=true)

ACF Pro-Based panels for wordpress to allow you build [metafizzy isotope](https://isotope.metafizzy.co/) grids. See their website for more details on use.

<p align="right">(<a href="#top">back to top</a>)</p>


###  2.1. <a name='BuiltWith'></a>Built With

This project was built with the following frameworks, technologies and software.

* [Isotope](https://isotope.metafizzy.co/)
* [Page-Builder](https://github.com/IORoot/wp-plugin__page-builder)
* [Tailwind](https://tailwindcss.com/)
* [ACF](https://advancedcustomfields.com/)
* [PHP](https://php.net/)
* [Wordpress](https://wordpress.org/)

<p align="right">(<a href="#top">back to top</a>)</p>


###  2.2. <a name='Installation'></a>Installation


These are the steps to get up and running with this plugin.

1. Clone the repo into your wordpress plugin folder
    ```bash
    git clone https://github.com/IORoot/wp-plugin__page-builder--isotope ./wp-content/plugins/page-builder-isotope
    ```
1. Activate the plugin.

> Note: This plugin requires the page-builder plugin to work [https://github.com/IORoot/wp-plugin__page-builder](https://github.com/IORoot/wp-plugin__page-builder)

> Note: This also requires ACF Pro to work.

<p align="right">(<a href="#top">back to top</a>)</p>

##  3. <a name='Usage'></a>Usage

Isotope is excellent at filtering and sorting grid layouts. This Plugin helps to integrate Isotope into the Page-Builder.

Once the plugin is activated, it will be available through the page-builder as an "organism" to include into the page.

The organism has seven tabs with multiple sub-tabs to use:

###  3.1. <a name='Isotope'></a>Isotope

The main page for the isotope plugin.

![Isotope](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/isotope.png?raw=true)

- Title. The identifier for this instance.

- Classes. Any class names you wish to give to the top-level container.

###  3.2. <a name='WP_Query'></a>WP_Query

Define the query to get results from the database. The results as rendered as 'cells' within the grid.

![WP_Query](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/wp_query.png?raw=true)

- Query Type. Post or Taxonomy.

You can select whether you want to run a `WP_Query` search or a `WP_Term_Query` search. If you want to retrieve posts/pages then the normal query is fine. 
However, if you wish to return taxonomies (Perhaps you wish to display all the sub-categories in a top-level one.) then use the `WP_Term_Query` instead.

- Post / Taxonomy Query. 

This is where you supply an array for the query. Please see the documentation for formatting.

[https://developer.wordpress.org/reference/classes/wp_query/](https://developer.wordpress.org/reference/classes/wp_query/) or [https://developer.wordpress.org/reference/classes/WP_Term_Query/__construct/](https://developer.wordpress.org/reference/classes/WP_Term_Query/__construct/)

A taxonomy example to display all the contents from two categories, excluding some.

```php
[
    'taxonomy' => ['tutorial_category', 'demonstration_category'],
	'exclude' => [ '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19' ],  # Hide the top-level categories
]
```

A post example:

```php
[
    'post_type' => ['tutorial','demonstration','blog'],
    'post_status' => 'publish',
	'orderby' => 'rand',
    'order' => 'ASC',
    'numberposts' => 12,
]
```

###  3.3. <a name='Javascript'></a>Javascript

The javascript tab is used to instantiate the Isotope instance however you wish.

![javascript](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/javascript.png?raw=true)

For an example:

```javascript
var elem = document.querySelector('.all-series .isotope-grid');

var iso = new Isotope( elem, {
	itemSelector: '.grid-item',
	layoutMode: 'fitRows',
});
```
This picks the class to attach the Isotope functionality to and then defines the configuration.

###  3.4. <a name='Filters'></a>Filters

Once you have your results from the database are being shown you may wish to display buttons / drop-downs at the top of the grid to allow filtering.

The filter section gives you the ability to add different types of filters. 

> Note : You NEED to add the filtered words into each cell also. See the [Cells](#Cells) section for more details.

- Show Filters. Toggle filters on or off to be displayed.

- Filters Classes. Classes to add to the wrapping class="filters" container.

####  3.4.1. <a name='Taxonomies'></a>Taxonomies

Use taxonomies to filter the posts. Use either buttons or dropdowns. The term query will create the list of buttons/dropdowns to display. Each option will filter on a class by the same name. I.e. “Balancing” will filter on a class called “.balancing” which will match any grid-item that has that as a class.
By default, all grid-items have their own taxonomies and can be filtered on.

![filters-taxonomies](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/filters-taxonomies.png?raw=true)

- All Label. Words to use for the 'All' selection. When you wish to select all options at the same time - what word or phrase should identify that option.

- Taxonomy Slug. This is a data-attribute "data-filter-group" that is used in the Javascript to identify the filters. This should be the same as the category slug.

- Taxonomy. Arguments to the `get_terms()` function. Can be a slug or array. This generates the list of taxonomy options to be displayed. 

For example:

```php
[
    'taxonomy' => 'tutorial_category',
	'count' => true,
	'hide_empty' => false,
	'parent' => 0,
]
```
This will display a list of taxonomies from the `tutorial_category` with their counts, even if they're empty.

See the [WP_Term_Query](https://developer.wordpress.org/reference/classes/WP_Term_Query/__construct/) for more details on how to construct this.

####  3.4.2. <a name='PostMetaFields'></a>Post / Meta Fields 

Use any post / meta field to create a list of options. Remember to add the `{{FIELD}}` into the cell template.

![filters-postmeta-fields](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/filters-postmeta-fields.png?raw=true)

- Post or Meta Field. This will be sanitized when used as a class selector. 
- All Label. Words to use for the 'All' selection.

When you add a post/meta field as a filter, Isotope will search for that particular field you select.

An Example:

Let's say you have three posts in the isotope results. Each has the `post_title` of:
1. "Post One Title"
2. "The Title for the Second Post"
3. "The third post title"

Now, you pick `post_title` as the field to filter on. The filter will now list ALL three of those `post_titles` as a potential filter.

However, even though the filter will be listed, it won't actually filter the isotope grid *unless* you add the `{{post_title}}` moustache brackets into the cells.

Isotope searches each cell for that particular filter string and will display only the matches. So unless the cell has it, it won't filter.

> Note : You MUST add the `{{FIELD}}` into the cell.

####  3.4.3. <a name='Dates'></a>Dates 

Filter by the `published_date` of the post. This filter is designed to give you options for different time-frames.

![filters-date](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/filters-date.png?raw=true)

- Date Operator. Do you want the options you supply to be Less than, Greater than or equal to the `published_date`.

- All Label. Words to use for the 'All' selection.

- Date Option. (row)

	- PHP DateTime value. Include for filtering by posts (newer, greater or equal to) 1 day, 1 week, 300 seconds, or any other PHP DateTime amount. You must include the `{{unixtime}}` filter in the cell wrapper.

	- Label. What to display to represent this date value.

An Example:

Lets say today is 1pm on the 1st of February 2022. You have three posts with the following published_dates:

1. 2pm on 1st January 2022. (1 month ago)
2. 2pm on 27th January 2022. (1 week ago)
3. 2pm on 31st January 2022. (1 day ago)

Now, you could add an date filter that has a `Newer than` operator.

You can add the following three rows:

1. PHP DateTime Value =  "-1 day". Label = "Posts from the last day."
2. PHP DateTime Value =  "-1 week". Label = "Posts from the last week."
3. PHP DateTime Value =  "-1 month". Label = "Posts from the last month."

The filter "Posts from the last day" will now accurately show only post number 3 published 2pm on 31st January 2022. (1 day ago).
The second filter will show both post 2 (1 week ago) and post 3 (1 day ago).
The third filter will show all posts.

> Note : `{{unixtime}}`MUST be added into the cell template for the date filter to work.

> Note : By default, all grid items have a `data-unixtime=”0123456789″` attribute that can be filtered on.

####  3.4.4. <a name='DisplayasButton'></a>Display as Button

Any filter can be displayed as individual buttons for every potential option. This is usually suitable for things with a low number of options.

![filters-display-buttons](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/filters-display-buttons.png?raw=true)

- Render Type: Buttons.

- Button Classes.
	- Filter Classes. Add any class names to the (individual) wrapper.
	- Button Classes. Add these classes to all buttons.

Buttons are rendered with the `[BUTTON_CLASSES]`.

```html
<div class="filters [FILTERS_CLASSES]">

	<div class="filter [FILTER_CLASSES]" data-filter-group="[TAXONOMY_SLUG]">

			<button class="[BUTTON_CLASSES]" value="">[ALL_LABEL]</button>
			<button class="[BUTTON_CLASSES]" value=".balancing">Balancing</button>

	</div>

</div>
```


####  3.4.5. <a name='DisplayasSelectBox'></a>Display as Select Box

You can alternatively display the filter options within a selectbox. This is usually prefered when ther are more than four or five options.

![filters-display-selects](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/filters-display-selects.png?raw=true)

- Render Type : Select Box

- Select Classes
	- Filter Classes. Add any class names to the (individual) wrapper.
	- Select Classes. Add any class names to the `<select>` tag.
	- Option Classes. Add any class names to all `<option>` tags.

The dropdown select options are render like this:

```html
<div class="filters [FILTERS_CLASSES]">

	<div class="filter [FILTER_CLASSES]" data-filter-group="[TAXONOMY_SLUG]">

	<select class="tutorials-tutorial_category [SELECT_CLASSES]">
		<option class="option [OPTION_CLASSES]" value="">[ALL_LABEL]</option>
		<option class="option [OPTION_CLASSES]" value=".balancing">Balancing</option>
		<option class="option [OPTION_CLASSES]" value=".climbing">Climbing</option>
		<option class="option [OPTION_CLASSES]" value=".coaching">Coaching</option>
	</select>

	</div>

</div>
```


###  3.5. <a name='Sorting'></a>Sorting

Sorting allows you to display an option in a special select box that organises the grid in a particular order.

For the sorting to work, there are three steps :

1. The Isotope Javascript needs to register the classes / data-attributes you wish to sort on.
When creating the isotope object, define the “getSortData” property.
Here's an example:

```javascript
<javascript>

	var elem = document.querySelector('.isotope-grid');

	var iso = new Isotope( elem, {
		itemSelector: '.grid-item',
		layoutMode: 'fitRows',
		getSortData: {
			title: '.title',
			unixdate: '[data-unixdate]'
		}
	});
</javascript>
```
This indicates that you wish to sort on the element with the class `.title` and the element with the data property of `[data-unixdate]`.


2. Add those classes / data-attributes into the grid-item cell template.
By default, every grid-item wrapper DIV has the `taxonomy` classes and a `data-unixdate` attribute that you can use.
For additional fields, add in classes to sort on. For example:

```html
<div class="title text-white text-md max-h-8 leading-4 mb-1 truncate">{{post_title}} </div>
```

3. Add the sorting options.

![sorting](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/sorting.png?raw=true)

- Sorting. Yes / No. Toggle the sorting select-box on or off.


####  3.5.1. <a name='SortOptions'></a>Sort Options

The sorting options describe the options listed in the select box.

![sorting-options](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/sorting-options.png?raw=true)

- Sortings (row)
	- Value. The `class` or `data-attribute` isotope is looking for in a cell.
	- Label. What the selectbox option should say.

These are added into each option for the select drop-down.

```html
<div class="sorting">
	<select class="">
		<option class="" value="[OPTION_VALUE_1]">[OPTION_TITLE_1]</option>
		<option class="" value="[OPTION_VALUE_2]">[OPTION_TITLE_2]</option>
	</select>
</div>
```



####  3.5.2. <a name='SortingClasses'></a>Sorting Classes

These are additional class names to add to each part of the sorting select box.

![sorting-classes](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/sorting-classes.png?raw=true)

- Wrapper Claases.
- Select Classes.
- Options Classes.

These classes are added into the output code at various positions:

```html
<div class="sorting [WRAPPER_CLASSES]">
	<select class="[SELECT_CLASSES]">
		<option class="[OPTION_CLASSES]" value="title">Title</option>
		<option class="[OPTION_CLASSES]" value="unixdate">Date</option>
	</select>
</div>
```


####  3.5.3. <a name='SortingDirectionASCDESC'></a> Sorting Direction (ASC/DESC)

Should there be an Ascending / Descending button to reeverse the sort order.

![sorting-order](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/sorting-order.png?raw=true)

- Show Reverse Order. Yes / No. Toggle whether to render a button or not.
- Input Classes.
- Label text.
- Label Classes.

By enabling the ASC/DESC switch, you will insert a new input of type `checkbox`, with a label associated with it, nested within the sorting DIV.

```html
<div class="sorting ">
	<select class="">
		<option class="" value="title">Title</option>
		<option class="" value="unixdate">Date</option>
	</select>

	<!-- ORDER DIRECTION-->
	<input class="[INPUT_CLASSES]" type="checkbox" id="reverse" name="reverse" checked="">
	<label class="[LABEL_CLASSES]" for="reverse">[LABEL_TEXT]</label>

</div>
```


###  3.6. <a name='Cells'></a>Cells

The cell is how each result of the query is rendered. This is the template to use when outputing each item.

![cells](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/cells.png?raw=true)

- Grid-item Classes. These class names are given to every cell item in the grid.

- Cell Template. The template is an HTML description of how each item should be output.

Example 1 - Simple Image and title template

This template renders a link to each post with the post's title and thumbnail image in it. Notice the `title` class on the post_title - this is so it's filterable later.
```html
<a class="flex overflow-hidden rounded-2xl text-night bg-gray-100 hover:text-white" href="{{post_permalink}}">
	<div class="title text-sm md:text-md max-h-8 leading-4 mb-1">{{post_title}}</div>	
	<div class="w-1/3 h-20 bg-gray-200 bg-no-repeat bg-contain md:bg-cover bg-center lazyload" data-bg="{{image_url:thumbnail}}"></div>
</a>
```

Example 2. Complex template with regexes.

This example uses the `preg_replace` modifier to replace words for others.

```html
<a class="flex overflow-hidden rounded-2xl text-night bg-gray-100 hover:text-white hover:{{taxonomy:preg_replace,/tutorial_category/i,bg-green-600}}" href="{{post_permalink}}">
	<div class="flex-1 w-2/3 flex flex-col justify-center px-3 md:px-4">
		<div class="title text-sm md:text-md max-h-8 leading-4 mb-1">{{name}}</div>
		<div class="text-xs font-thin hidden md:visible">{{count}} Videos.</div>
		<div class="text-xs text-white capitalize px-1 self-start mt-1 rounded-2xl px-2">{{taxonomy:preg_replace,/_category/i,}}</div>
	</div>
	<div class="w-1/3 h-20 bg-gray-200 bg-no-repeat bg-contain md:bg-cover bg-center lazyload" data-bg="{{image_url:thumbnail}}"></div>
</a>
```

####  3.6.1. <a name='MoustachesListReference.'></a>{{Moustaches}} List Reference.

Below is a list of the avaialbe {{moustaches}} yyou can use in the cell template.

##### Generic Moustaches

- Any POST field. e.g. `{{post_title}}`.
- Any META field. e.g. `{{rank_math_description}}`.

##### Custom Moustaches

- `{{filters:TAXONOMY}}`. This will return a string of all the terms the post has in that taxonomy. Use for filters by placing it into the item/cell outer wrapper container.

- `{{filters:taxonomies}}`. Same as the above, but will add ALL terms from ALL taxonomies for that post.

- `{{image_url:SIZE}}`. This will output the URL of the featured image for the post in the SIZE specified. (small, medium, large, original, thumbnail, etc...)

- `{{time_ago}}`. This will convert the published date into a human readable time.

- `{{post_permalink}}`. A URL Escaped permalink to the post.

- `{{youtube_video_link}}`. Using just the video code, will return a full URL to the youtube video.

- `{{date:PHP_DATETIME}}`. Use any PHP DATETIME Format to convert the published date.

- `{{datetime:FIELD, PHP_DATETIME}}`. Use any PHP DATETIME Format to convert the specified field.

- `{{unixdate}}`. This requires a little more detail. The “youngerthan” filters will look for a `data-unixtime""` parameter on the cell wrapper. So include this mounstache as the value. So it will become: data-unixtime"{{unixtime}}" to be filterable.

##### Modifiers on Post / Meta moustaches

The modifiers allow you to alter the default output of the field.

- `:sanitize`. 
Use the `{{post_title:sanitize}}` secondary argument to use to sanitize the field. This is useful if you want to pair a filter, like `post_title` , which has its value automatically sanitized to a class in the cell. Works on both post fields and meta fields.

- `:slice,[SEPARATOR],[COUNT]`.
e.g. `{{post_title:slice, - ,1}}` Where the 1 can be any number. Will explode the field with the first argument " - ", then remove the number of results specified by the second argument (The first in this example).

- `:preg_replace,[REGEX],[REPLACEMENT]`
e.g. `{{post_content:preg_replace,/hello/i,goodbye}}`. Use preg_replace to remove or replace text.



###  3.7. <a name='CSS'></a>CSS

Add additional CSS in an inline `<style>` tag above the isotope grid.

![css](https://github.com/IORoot/wp-plugin__page-builder--isotope/blob/master/files/docs/css.png?raw=true)

####  3.7.1. <a name='NotesonCSS.'></a>Notes on CSS.

- Buttons
For buttons, selecting each one will give it a class of `on`. Use that for styling the currently selected button.

- Checkbox Labels

For the label of a checkbox (when using ASC/DESC for instance.) Use the following to style the checkbox label:

```css
input[type=checkbox]#reverse:checked + label { 
	color:#242424; 
	background-color:#11998E; 
} 

input[type=checkbox]#reverse + label:before { 
	content:"ASC" 
} 

input[type=checkbox]#reverse:checked + label:before { 
	content:"DESC" 
}
```



##  4. <a name='Customising'></a>Customising

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

##  5. <a name='Troubleshooting'></a>Troubleshooting

None.

<p align="right">(<a href="#top">back to top</a>)</p>


##  6. <a name='Contributing'></a>Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue.
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



##  7. <a name='License'></a>License

Distributed under the MIT License.

MIT License

Copyright (c) 2022 Andy Pearson

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

<p align="right">(<a href="#top">back to top</a>)</p>



##  8. <a name='Contact'></a>Contact

Author Link: [https://github.com/IORoot](https://github.com/IORoot)

<p align="right">(<a href="#top">back to top</a>)</p>


##  9. <a name='Changelog'></a>Changelog

- v1.1.4 - 14/03/2022

Added a modifier on taxonomies to only return a single one. `{{filters:syllabus_category:0}}`

Ordered the taxonomy filter to return the parent first and child after in the return array.

Added the `{{admin}}...{{/admin}}` moustache to only display cell content if you're an admin.

Added an `{{field:admin}}` modifier to only display post / meta field if user is and admin.

Added an "Admin" tab and toggle for filters to be only for administrators.

- v1.1.3 - 27/02/2022 

Removed the window.addEventListener (enqueue.php) from the inline JS.

Added searchbox to filters.

Fixed numerical classes to have the filter name prefixed onto it. 
This means all numerical classes (that are invalid) will now have the filter name added on the front. 
i.e. The class .9 will actually be .award_level9 if the filter-group is called 'award_level'. 
This also means that the cell will require that inside too. 

	`<div class="award_level award_level{{award_level}} hidden">{{award_level}}</div>`

- v1.1.2 - 23/02/2022 - Filter selects are organised alphabetically. Help explains about sorts & filters in the cell.

- v1.1.1 - 11/01/2022 - Add {{loop_index}} as a new field for the cell.

- v1.1.0 - 06/01/2022 - Added all taxonomies into the cells so filtering works for any taxonomy.

- v1.0.0 - 01/01/2022 - Working Isotope instance.
