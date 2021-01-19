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

/**
 * All of the grid slugs will be pushed to this array
 * so that the function below can then read it.
 */
let isotope_list = [];


window.addEventListener("load",function(event) {


    (function(){

        // Loop through all grids. Add event listeners to all selects in them.
        isotope_list.forEach(function(classname) {
            add_event_listener_to_filters_selects(document.querySelector(classname));
            add_event_listener_to_filters_buttons(document.querySelector(classname));
            add_event_listener_to_sorting_selects(document.querySelector(classname));
        });
    
    }());



    /**
     * Add event listeners to all of the .filters selects.
     * 
     * @param {*} isotope_classname 
     */
    function add_event_listener_to_filters_selects(isotope_classname) {

        var filters = {};
        var all_select_elements = isotope_classname.querySelectorAll('.filters select');
        var grid_element = isotope_classname.querySelector('.isotope-grid');
        var isotope_data = Isotope.data( grid_element );
        

        for(i=0; i<all_select_elements.length; i++) {
            addEventListenerToSelectElement(all_select_elements, i)
        }   


        function addEventListenerToSelectElement(all_select_elements, i){

            all_select_elements[i].addEventListener('change', function(event) {  

                var selectElement = getSelectedOption(event.target);
                var selectGroup = fizzyUIUtils.getParent( event.target, '.filter' );
                var dataFilterGroup = selectGroup.dataset.filterGroup;

                if (dataFilterGroup == 'less' || dataFilterGroup == 'greater'  || dataFilterGroup == 'equal' ) { 
                    filterByDate(dataFilterGroup, selectElement);
                    return false;
                }

                filterByClass(dataFilterGroup, selectElement);
            });   
        }


        function filterByClass(dataFilterGroup, selectElement){
            filters[dataFilterGroup] = selectElement.value;
            filterlist = concatFilterList(filters)

            isotope_data.arrange({
                filter: filterlist
            });  
            return false;
        }


        function filterByDate(dataFilterGroup, selectElement){

            var optionValue = parseInt( selectElement.value, 10);
            if (isNaN(optionValue)){  return false; }

            isotope_data.arrange({
                filter: function( itemElem ) {
                    var cell_time = parseInt( itemElem.dataset.unixdate, 10);
                    if (dataFilterGroup == 'less'){ return cell_time < optionValue }
                    if (dataFilterGroup == 'greater'){ return cell_time > optionValue }
                    if (dataFilterGroup == 'equal'){ return cell_time == optionValue }
                }
            });
            return false;
        }


        function concatFilterList( filters ){

            var $filter_list = [];
            var value = '';

            for (var group in filters) {         
                $filter_list.push(filters[group])
            }

            for ( var prop in $filter_list ) {
                value += $filter_list[ prop ];
            }
    
            return value;
        }

    };


    
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
     * Add event listeners to all of the .sorting selects.
     * 
     * @param {*} isotope_classname 
     */
    function add_event_listener_to_sorting_selects(isotope_classname) {

        let ascending = true;
        let sort_by = '';

        /** Select boxes */
        var grid_element = isotope_classname.querySelector('.isotope-grid');
        var isotope_data = Isotope.data( grid_element );
        var all_sorting_select_elements = isotope_classname.querySelectorAll('.sorting select');

        for(i=0; i<all_sorting_select_elements.length; i++) {
            addEventListenerToSortingElement(all_sorting_select_elements, i)
        }

        /** Reverse Checkbox */
        var sorting_reverse = isotope_classname.querySelector('.sorting input[name=reverse]');
        addEventListenerToReverseChecbox(sorting_reverse);


        /** Select options */
        function addEventListenerToSortingElement(all_sorting_select_elements, i){
            all_sorting_select_elements[i].addEventListener('change', function(event) {  
                option = getSelectedOption(event.target);
                sort_by = option.value;
                sort();
            });   
        }


        function sort(){
            isotope_data.arrange({
                sortBy: sort_by,
                sortAscending: ascending
            });
            return false;
        }

        function addEventListenerToReverseChecbox(sorting_reverse)
        {
            if (sorting_reverse === null){  return false; }

            sorting_reverse.addEventListener('change', function(event) {
                var checkbox = event.target;
                ascending = checkbox.checked;
                sort();
                return false;
            });
        }

    }


    function add_event_listener_to_filters_buttons(isotope_classname) {

        let filter_by = '';

        /** Select boxes */
        var grid_element = isotope_classname.querySelector('.isotope-grid');
        var isotope_data = Isotope.data( grid_element );
        var all_filter_buttons = isotope_classname.querySelectorAll('.filter button');

        for(i=0; i<all_filter_buttons.length; i++) {
            addEventListenerToButtons(all_filter_buttons, i)
        }

        /** Select options */
        function addEventListenerToButtons(all_filter_buttons, i){
            let all = all_filter_buttons;
            all_filter_buttons[i].addEventListener('click', function(event) {  
                button = event.target;
                filter_by = button.value;
                filter();
                clear_classes(all);
                add_class(button);
            });   
        }

        function filter(){
            isotope_data.arrange({
                filter: filter_by
            });  
            return false;
        }

        function add_class(item){
            item.classList.add("on");
        }

        function clear_classes(all_items){
            [].forEach.call(all_items, function(el) {
                el.classList.remove("on");
            });
        }

    }

},false);
