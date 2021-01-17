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

window.onload=(function() {

    (function(){
        var grids = document.querySelector('.isotope');
        isotope_filtering(grids);
        isotope_sorting(grids);
    }());




    function isotope_sorting(isotope_element) {
        var grid_element = isotope_element.querySelector('.isotope-grid');
        var iso = Isotope.data( grid_element );
        iso.updateSortData({
            name: '.title'
        });
        return;
    }
    
    function isotope_filtering(isotope_element) {

        var filters = {};
        var grid_element = isotope_element.querySelector('.isotope-grid');
        var iso = Isotope.data( grid_element );
        var select_elements = isotope_element.querySelectorAll('select');
        
        for(i=0; i<select_elements.length; i++) {
            addEventListenerToSelectElement(select_elements, i)
        }   

        function addEventListenerToSelectElement(select_elements, i){

            select_elements[i].addEventListener('change', function(event) {  

                var selectElement = getSelectedOption(event.target);
                var selectGroup = fizzyUIUtils.getParent( event.target, '.filter' );
                var dataFilterGroup = selectGroup.dataset.filterGroup;

                if (dataFilterGroup == 'less' || dataFilterGroup == 'greater'  || dataFilterGroup == 'equal' ) { 
                    
                    var optionValue = getOptionValue();

                    if (!isNaN(optionValue)){  
                        filterByDate();
                        return false;
                    }
                }

                filterByClass();



                function filterByClass(){
                    filters[dataFilterGroup] = selectElement.value;
                    iso.arrange({
                        filter: concatValues(concatFilterList(filters))
                    });  
                    return false;
                }



                function filterByDate(){
                    iso.arrange({
                        filter: function( itemElem ) {
                            var cell_time = parseInt( itemElem.dataset.unixdate, 10);
                            if (getDataFilterGroup() == 'less'){ return cell_time < getOptionValue(); }
                            if (getDataFilterGroup() == 'greater'){ return cell_time > getOptionValue(); }
                            if (getDataFilterGroup() == 'equal'){ return cell_time == getOptionValue(); }
                        }
                    });
                    return false;
                }

                function getDataFilterGroup(){
                    return dataFilterGroup;
                }

                function getOptionValue(){
                    return parseInt( selectElement.value, 10);
                }

            });   

        }

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

        function concatFilterList( filters ){

            var $filter_list = [];

            for (var group in filters) {         
                $filter_list.push(filters[group])
            }

            return $filter_list;
        }

        function concatValues( obj ) {
            var value = '';
            for ( var prop in obj ) {
                value += obj[ prop ];
            }
    
            return value;
        }

    };

});


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