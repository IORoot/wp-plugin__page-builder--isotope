/*                                                                              
*   ┌─────────────────────────────────────────────────────────────────────────┐ 
*   │                                                                         │░
*   │                                                                         │░
*   │                         Combinations of Selects                         │░
*   │                                                                         │░
*   │                                                                         │░
*   └─────────────────────────────────────────────────────────────────────────┘░
*    ░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
*/                                                                                                                                                         



/*
Example Isotope setup
init Isotope
*/
window.onload=(function() {


    var isotope_element = document.querySelector('.test-iso');


    //Immediate anonymous function
    (function() {

        /**
         * 
         * This will hold the contents of all the filters selected.
         * 
         */
        var filters = {};

        
        /**
         * div.isotope.test-iso
         *      div.filter
         *          select.test-iso-tutorial_tags      
         *              option.option 
         * 
         *      div.isotope-grid                        <------
         */
        var grid_element = isotope_element.querySelector('.isotope-grid');

        /**
         * div.isotope.test-iso
         *      div.filter
         *          select.test-iso-tutorial_tags      <------
         *              option.option 
         * 
         *      div.isotope-grid                        
         */
        var select_elements = isotope_element.querySelectorAll('select');

        /**
         * div.isotope.test-iso
         *      div.filter
         *          select.test-iso-tutorial_tags      
         *              option.option 
         * 
         *      div.isotope-grid                        <------
         */   
        var iso = Isotope.data( grid_element );
        

        /**
         * Loop through all of the selects.
         */
        for(i=0; i<select_elements.length; i++) {
            addEventListenerToSelectElement(select_elements, i)
        }   


        /**
         * For each select, add an event listener on it.
         * 
         * @param {*} select_elements 
         * @param {*} i 
         */
        function addEventListenerToSelectElement(select_elements, i){

            // add change event to each select
            select_elements[i].addEventListener('change', function(event) {  

                /**
                 * The 'event.target' is the name of the select element.
                 * e.g. select.test-isotope-tutorial-tags
                 * 
                 * div.isotope.test-iso
                 *      div.filter
                 *          select.test-iso-tutorial_tags      <------
                 *              option.option 
                 * 
                 *      div.isotope-grid
                 */
                var selectElement = getSelectedOption(event.target);

                
                /**
                 * This will be the 'data-filter-group="tutorial_tags"' element
                 * of the parent div.
                 * 
                 * div.isotope.test-iso
                 *      div.filter                             <------
                 *          select.test-iso-tutorial_tags      
                 *              option.option 
                 * 
                 *      div.isotope-grid
                 */
                var selectGroup = fizzyUIUtils.getParent( event.target, '.filter' );

                /**
                 * 
                 * Add the selected option to the filters array.
                 * 
                 * e.g.
                 * filters['tutorial_tags'] = 'vaulting'
                 * 
                 */
                filters[selectGroup.dataset.filterGroup] = selectElement.value;

                var filter_array = concatFilterList(filters);

                var selector = concatValues(filter_array);

                // console.log('current filter is: ' + selector);

                iso.arrange({
                    filter: selector
                });    


            });   

        }


        /**
         * Return the option value that has
         * been picked in the select box.
         * 
         * @param {*} sel 
         */
        function getSelectedOption(sel) {
            var opt;
            for ( var i = 0, len = sel.options.length; i < len; i++ ) {
                opt = sel.options[i];
                if ( opt.selected === true ) {
                    break;
                }
            }
            return opt;
        }


        /**
         * Create an array of all the selected
         * options picked.
         * 
         * @param {*} filters 
         */
        function concatFilterList( filters ){

            var $filter_list = [];

            for (var group in filters) {         
                $filter_list.push(filters[group])
            }

            return $filter_list;
        }
    
    
        /**
         * Create a single line of options
         * for the filter.
         * 
         * @param {*} obj 
         */
        function concatValues( obj ) {
            var value = '';
            for ( var prop in obj ) {
                value += obj[ prop ];
            }
    
            return value;
        }



    }(isotope_element));




});


// window.onload=(function() {



//     var $grid = document.querySelector('.grid');

//     var iso = Isotope.data( $grid );

//     // Update the totals.
//     document.getElementById('results-total').innerHTML = iso.getFilteredItemElements().length;

//     // if blocks are replaced with images
//     imagesLoaded( $grid ).on( 'progress', function() {
//         iso.layout();
//     });


//     // Filter
//     (function() {

//         // get references to select list and display text box
//         var $selectFilters = document.querySelectorAll('.filters select'),
//         $resultsTotal = document.getElementById('results-total'),
//         filters = {};

//         // get selected option
//         function getSelectedOption(sel) {
//             var opt;
//             for ( var i = 0, len = sel.options.length; i < len; i++ ) {
//                 opt = sel.options[i];
//                 if ( opt.selected === true ) {
//                     break;
//                 }
//             }
//             return opt;
//         }

//         // loop all selects
//         for(i=0; i<$selectFilters.length; i++) {

//             // add change event to each select
//             $selectFilters[i].addEventListener('change', function(event) {  
            
//                 // get option form select event
//                 var opt = getSelectedOption(event.target);
                
//                 // get the data filter group then the value
//                 var selectGroup = fizzyUIUtils.getParent( event.target, '.filter' );
//                 filters[selectGroup.dataset.filterGroup] = opt.value;

//                 var isoFilters = [];
//                 for (var group in filters) {         
//                     isoFilters.push(filters[group])
//                 }

//                 var selector = concatValues(isoFilters);
                
//                 iso.arrange({
//                     filter: selector
//                 });    

//                 var total = iso.getFilteredItemElements();
                
//                 $resultsTotal.innerHTML = total.length;

//                 return false;

//             });    

//         }   

//     }());


//     function concatValues( obj ) {
//         var value = '';
//         for ( var prop in obj ) {
//             value += obj[ prop ];
//         }

//         console.log(value);

//         return value;
//     }

// });


// vanilla JS
// var iso = new Isotope( '.grid', {
//     itemSelector: '.cell',
//     layoutMode: 'fitRows'
// });


/*                                                                              
*   ┌─────────────────────────────────────────────────────────────────────────┐ 
*   │                                                                         │░
*   │                                                                         │░
*   │                             Single Buttons                              │░
*   │                                                                         │░
*   │                                                                         │░
*   └─────────────────────────────────────────────────────────────────────────┘░
*    ░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
*/                                                                              

//  { "itemSelector": ".cell", "layoutMode": "fitRows" }

// // bind filter button click
// var filtersElem = document.querySelector('.filters-button-group');
// filtersElem.addEventListener( 'click', function( event ) {
//     // only work with buttons
//     if ( !matchesSelector( event.target, 'button' ) ) {  return; }

//     var filterValue = event.target.getAttribute('data-filter');
//     iso.arrange({ filter: filterValue });
// });

// // change is-checked class on buttons
// var buttonGroups = document.querySelectorAll('.button-group');
// for ( var i=0, len = buttonGroups.length; i < len; i++ ) {
//     var buttonGroup = buttonGroups[i];
//     radioButtonGroup( buttonGroup );
// }

// function radioButtonGroup( buttonGroup ) {
//     buttonGroup.addEventListener( 'click', function( event ) {
//         // only work with buttons
//         if ( !matchesSelector( event.target, 'button' ) ) {
//             return;
//         }
//         buttonGroup.querySelector('.is-checked').classList.remove('is-checked');
//         event.target.classList.add('is-checked');
//     });
// }






/*                                                                              
*   ┌─────────────────────────────────────────────────────────────────────────┐ 
*   │                                                                         │░
*   │                                                                         │░
*   │                         Combinations of Buttons                         │░
*   │                                                                         │░
*   │                                                                         │░
*   └─────────────────────────────────────────────────────────────────────────┘░
*    ░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
*/                                                                                                                                                         

// // store filter for each group
// var filters = {};

// var filtersElem = document.querySelector('.filters');

// filtersElem.addEventListener( 'click', function( event ) {
//     // check for only button clicks
//     var isButton = event.target.classList.contains('button');
//     if ( !isButton ) {
//     return;
// }

// var buttonGroup = fizzyUIUtils.getParent( event.target, '.button-group' );
// var filterGroup = buttonGroup.getAttribute('data-filter-group');
// // set filter for group
// filters[ filterGroup ] = event.target.getAttribute('data-filter');
//     // combine filters
//     var filterValue = concatValues( filters );
//     // set filter for Isotope
//     iso.arrange({ filter: filterValue });
// });

// // change is-checked class on buttons
// var buttonGroups = document.querySelectorAll('.button-group');

// for ( var i=0; i < buttonGroups.length; i++ ) {
//     var buttonGroup = buttonGroups[i];
//     var onButtonGroupClick = getOnButtonGroupClick( buttonGroup );
//     buttonGroup.addEventListener( 'click', onButtonGroupClick );
// }

// function getOnButtonGroupClick( buttonGroup ) {
//     return function( event ) {
//     // check for only button clicks
//     var isButton = event.target.classList.contains('button');
//     if ( !isButton ) {
//         return;
//     }
//     var checkedButton = buttonGroup.querySelector('.is-checked');
//     checkedButton.classList.remove('is-checked')
//     event.target.classList.add('is-checked');
//     }
// }

// // flatten object by concatting values
// function concatValues( obj ) {
//     var value = '';
//     for ( var prop in obj ) {
//         value += obj[ prop ];
//     }
//     return value;
// }