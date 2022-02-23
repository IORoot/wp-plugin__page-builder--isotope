<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5ffd803e128fe',
        'title' => 'Page Builder - Module - Isotope',
        'fields' => array(
            array(
                'key' => 'field_5ffd8072b6c3a',
                'label' => '<span class="mdi mdi-grid"></span> Isotope',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5ffd8091b6c3b',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ffd8097b6c3c',
                'label' => 'Classes',
                'name' => 'classes',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ffd825cb6c42',
                'label' => '<span class="mdi mdi-database"></span> WP_Query',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_6006978d19b06',
                'label' => 'Query Type',
                'name' => 'query_type',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'post' => 'Post',
                    'taxonomy' => 'Taxonomy',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5ffd827cb6c43',
                'label' => 'Post Query',
                'name' => 'wp_query',
                'type' => 'textarea',
                'instructions' => '<a href="https://developer.wordpress.org/reference/classes/wp_query" target=_blank>WP_Query</a>',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_6006978d19b06',
                            'operator' => '==',
                            'value' => 'post',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => 'ue__codemirror',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_600697cb19b07',
                'label' => 'Taxonomy Query',
                'name' => 'wp_term_query',
                'type' => 'textarea',
                'instructions' => '<a href="https://developer.wordpress.org/reference/classes/WP_Term_Query/__construct/" target=_blank>WP_Term_Query</a>',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_6006978d19b06',
                            'operator' => '==',
                            'value' => 'taxonomy',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => 'ue__codemirror',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_60040839810e2',
                'label' => '<span class="mdi mdi-language-javascript"></span> Javascript',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_60040851810e3',
                'label' => 'Javascript',
                'name' => 'javascript',
                'type' => 'textarea',
                'instructions' => 'Javascript to initialise and run the Isotope instance. This will be wrapped in a <code>window.onload=(function() { }</code> function.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => 'ue__codemirror',
                    'id' => '',
                ),
                'default_value' => 'var elem = document.querySelector(\'.test-iso .isotope-grid\');
    
    var iso = new Isotope( elem, {
        itemSelector: \'.grid-item\',
        layoutMode: \'fitRows\',
        getSortData: {
            title: \'.title\',
            unixdate: \'[data-unixdate]\'
        }
    });',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 12,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5ffd80cab6c3e',
                'label' => '<span class="mdi mdi-filter"></span> Filters',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5ffd81efb6c40',
                'label' => '<span class="mdi mdi-table-headers-eye"></span> Show Filters',
                'name' => 'render_filters',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '20',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_60015324211a0',
                'label' => 'Filters classes',
                'name' => 'filters_classes',
                'type' => 'text',
                'instructions' => 'Classes to add to the wrapping </code>class="filters"</code> DIV',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_60014e78aac81',
                'label' => 'Filters',
                'name' => 'filters',
                'type' => 'flexible_content',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layouts' => array(
                    'layout_60014e839019b' => array(
                        'key' => 'layout_60014e839019b',
                        'name' => 'filter_taxonomies',
                        'label' => '<span class="mdi mdi-shape-outline"></span> Taxonomies',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_6001538f8bdc4',
                                'label' => '<span class="mdi mdi-shape-outline"></span> Taxonomy',
                                'name' => '',
                                'type' => 'tab',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'placement' => 'left',
                                'endpoint' => 0,
                            ),
                            array(
                                'key' => 'field_60014ef9aac82',
                                'label' => '',
                                'name' => '',
                                'type' => 'message',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => 'Use taxonomies to filter the posts. Use either buttons or dropdowns. The term query will create the list of buttons/dropdowns to display. Each option will filter on a class by the same name. I.e. "Balancing" will filter on a class called ".balancing" which will match any grid-item that has that as a class.
    By default, all grid-items have their own taxonomies and can be filtered on.',
                                'new_lines' => 'wpautop',
                                'esc_html' => 0,
                            ),
                            array(
                                'key' => 'field_60068b1a8a122',
                                'label' => 'All Label',
                                'name' => 'all_label',
                                'type' => 'text',
                                'instructions' => 'Words to use for the \'All\' selection',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_6006b544a03b0',
                                'label' => 'Taxonomy Slug',
                                'name' => 'data_filter_group',
                                'type' => 'text',
                                'instructions' => 'This is a data-attribute "data-filter-group" that is used in the Javascript to identify the filters. This should be the same as the category slug.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_5ffeaec474518',
                                'label' => 'Taxonomy',
                                'name' => 'taxonomy',
                                'type' => 'textarea',
                                'instructions' => 'Args to <code>get_terms()</code>. Can be slug or array.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '100',
                                    'class' => 'ue__codemirror',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => 2,
                                'new_lines' => '',
                            ),
                            array(
                                'key' => 'field_600153a88bdc5',
                                'label' => '<span class="mdi mdi-printer-3d"></span> Display',
                                'name' => '',
                                'type' => 'tab',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'placement' => 'left',
                                'endpoint' => 0,
                            ),
                            array(
                                'key' => 'field_600153242119d',
                                'label' => '<span class="mdi mdi-form-select"></span> Filter Display',
                                'name' => 'filter_render',
                                'type' => 'group',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_600153242119e',
                                        'label' => '<span class="mdi mdi-printer-3d"></span> Render Type',
                                        'name' => 'render_type',
                                        'type' => 'select',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'choices' => array(
                                            'select' => 'Select Box',
                                            'button' => 'Buttons',
                                        ),
                                        'default_value' => false,
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                        'ui' => 0,
                                        'return_format' => 'value',
                                        'ajax' => 0,
                                        'placeholder' => '',
                                    ),
                                    array(
                                        'key' => 'field_600153242119f',
                                        'label' => 'Select Classes',
                                        'name' => 'select_classes',
                                        'type' => 'group',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_600153242119e',
                                                    'operator' => '==',
                                                    'value' => 'select',
                                                ),
                                            ),
                                        ),
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layout' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_60015324211a1',
                                                'label' => 'Filter classes',
                                                'name' => 'filter_classes',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_60015324211a2',
                                                'label' => 'Select classes',
                                                'name' => 'select_classes',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_60015324211a3',
                                                'label' => 'Option classes',
                                                'name' => 'option_classes',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_60015324211a4',
                                        'label' => 'Button Classes',
                                        'name' => 'button_classes',
                                        'type' => 'group',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_600153242119e',
                                                    'operator' => '==',
                                                    'value' => 'button',
                                                ),
                                            ),
                                        ),
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layout' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_60015324211a6',
                                                'label' => 'Filter classes',
                                                'name' => 'filter_classes',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_60015324211a7',
                                                'label' => 'Button classes',
                                                'name' => 'button_classes',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_600ffe8b91784',
                                        'label' => '',
                                        'name' => '',
                                        'type' => 'message',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'message' => 'The classes are for either select dropdowns or buttons. The following fields are inserted like this:
    
    <div class="filters [FILTERS_CLASSES]">
    
    <div class="filter [FILTER_CLASSES]" data-filter-group="[TAXONOMY_SLUG]">
            
    <select class="tutorials-tutorial_category [SELECT_CLASSES]">
                    <option class="option [OPTION_CLASSES]" value="">[ALL_LABEL]</option>
                    <option class="option [OPTION_CLASSES]" value=".balancing">Balancing</option>
                    <option class="option [OPTION_CLASSES]" value=".climbing">Climbing</option>
                    <option class="option [OPTION_CLASSES]" value=".coaching">Coaching</option>
    </select>
    
    </div>
    
    Buttons are rendered differently, with no [SELECT_CLASSES] or [OPTION_CLASSES], but [BUTTON_CLASSES] instead.
    
    <button class="[BUTTON_CLASSES]" value="">[ALL_LABEL]</button>
    <button class="[BUTTON_CLASSES]" value=".balancing">Balancing</button>',
                                        'new_lines' => 'wpautop',
                                        'esc_html' => 1,
                                    ),
                                ),
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_60014f1aaac83' => array(
                        'key' => 'layout_60014f1aaac83',
                        'name' => 'filter_postmeta',
                        'label' => '<span class="mdi mdi-focus-field"></span> Post / Meta Fields',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_600153f48bdc9',
                                'label' => '<span class="mdi mdi-focus-field"></span> Post / Meta Fields',
                                'name' => '',
                                'type' => 'tab',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'placement' => 'left',
                                'endpoint' => 0,
                            ),
                            array(
                                'key' => 'field_60014f56aac84',
                                'label' => '',
                                'name' => '',
                                'type' => 'message',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => 'Use any post / meta field to create a list of options. Remember to add the <code>{{FIELD}}</code> into the cell template.',
                                'new_lines' => 'wpautop',
                                'esc_html' => 0,
                            ),
                            array(
                                'key' => 'field_5ffff5a5baa03',
                                'label' => 'Post or Meta Field',
                                'name' => 'postmeta_field',
                                'type' => 'text',
                                'instructions' => 'This will be sanitized when used as a class selector.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '50',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60068c92f11a7',
                                'label' => 'All Label',
                                'name' => 'all_label',
                                'type' => 'text',
                                'instructions' => 'Words to use for the \'All\' selection',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '50',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_600153e78bdc7',
                                'label' => '<span class="mdi mdi-printer-3d"></span> Display',
                                'name' => '',
                                'type' => 'tab',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'placement' => 'left',
                                'endpoint' => 0,
                            ),
                            array(
                                'key' => 'field_6001531621192',
                                'label' => '<span class="mdi mdi-form-select"></span> Filter Display',
                                'name' => 'filter_render',
                                'type' => 'group',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_6001531621193',
                                        'label' => '<span class="mdi mdi-printer-3d"></span> Render Type',
                                        'name' => 'render_type',
                                        'type' => 'select',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'choices' => array(
                                            'select' => 'Select Box',
                                            'button' => 'Buttons',
                                        ),
                                        'default_value' => false,
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                        'ui' => 0,
                                        'return_format' => 'value',
                                        'ajax' => 0,
                                        'placeholder' => '',
                                    ),
                                    array(
                                        'key' => 'field_6001531621194',
                                        'label' => 'Select Classes',
                                        'name' => 'select_classes',
                                        'type' => 'group',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_6001531621193',
                                                    'operator' => '==',
                                                    'value' => 'select',
                                                ),
                                            ),
                                        ),
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layout' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_6001531721196',
                                                'label' => 'Filter classes',
                                                'name' => 'filter_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>class="filter"</code> DIVs',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_6001531721197',
                                                'label' => 'Select classes',
                                                'name' => 'select_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>select</code> tags',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_6001531721198',
                                                'label' => 'Option classes',
                                                'name' => 'option_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>option</code> tags',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_6001531721199',
                                        'label' => 'Button Classes',
                                        'name' => 'button_classes',
                                        'type' => 'group',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_6001531621193',
                                                    'operator' => '==',
                                                    'value' => 'button',
                                                ),
                                            ),
                                        ),
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layout' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_600153172119b',
                                                'label' => 'Filter classes',
                                                'name' => 'filter_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>class="filter"</code> DIVs',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_600153172119c',
                                                'label' => 'Button classes',
                                                'name' => 'button_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>button</code> tags',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_60014f6caac85' => array(
                        'key' => 'layout_60014f6caac85',
                        'name' => 'filter_date',
                        'label' => '<span class="mdi mdi-calendar-range"></span> Date Filter',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_600154058bdca',
                                'label' => '<span class="mdi mdi-calendar-range"></span> Date Filter',
                                'name' => '',
                                'type' => 'tab',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'placement' => 'left',
                                'endpoint' => 0,
                            ),
                            array(
                                'key' => 'field_60007a876466c',
                                'label' => 'Date Operator',
                                'name' => 'operator',
                                'type' => 'select',
                                'instructions' => 'Is <code>cell_date</code> <code>[<|>|=]</code> to selected option.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'choices' => array(
                                    'greater' => 'Newer Than',
                                    'less' => 'Older Than',
                                    'equal' => 'Equal to',
                                ),
                                'default_value' => false,
                                'allow_null' => 0,
                                'multiple' => 0,
                                'ui' => 0,
                                'return_format' => 'array',
                                'ajax' => 0,
                                'placeholder' => '',
                            ),
                            array(
                                'key' => 'field_60068cb0f11a8',
                                'label' => 'All Label',
                                'name' => 'all_label',
                                'type' => 'text',
                                'instructions' => 'Words to use for the \'All\' selection',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_600052cb89129',
                                'label' => 'Date Option',
                                'name' => 'date_fields',
                                'type' => 'repeater',
                                'instructions' => 'Include for filtering by posts newer than 1 day, 1 week, 300 seconds, or any other PHP DateTime amount. You must include the <code>{{unixtime}}</code> filter in the cell wrapper.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'collapsed' => '',
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'table',
                                'button_label' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_600052cc8912a',
                                        'label' => 'PHP DateTime value',
                                        'name' => 'date_field',
                                        'type' => 'text',
                                        'instructions' => 'Something like "-1 day". This value will filter anything newer than this value.',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '40',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_60006abf8be78',
                                        'label' => 'Label',
                                        'name' => 'label',
                                        'type' => 'text',
                                        'instructions' => 'The label to display.',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '40',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_600153ec8bdc8',
                                'label' => '<span class="mdi mdi-printer-3d"></span> Display',
                                'name' => '',
                                'type' => 'tab',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'placement' => 'left',
                                'endpoint' => 0,
                            ),
                            array(
                                'key' => 'field_600151c021189',
                                'label' => '<span class="mdi mdi-form-select"></span> Filter Display',
                                'name' => 'filter_render',
                                'type' => 'group',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_600151f52118a',
                                        'label' => '<span class="mdi mdi-printer-3d"></span> Render Type',
                                        'name' => 'render_type',
                                        'type' => 'select',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'choices' => array(
                                            'select' => 'Select Box',
                                            'button' => 'Buttons',
                                        ),
                                        'default_value' => false,
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                        'ui' => 0,
                                        'return_format' => 'value',
                                        'ajax' => 0,
                                        'placeholder' => '',
                                    ),
                                    array(
                                        'key' => 'field_600152672118b',
                                        'label' => 'Select Classes',
                                        'name' => 'select_classes',
                                        'type' => 'group',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_600151f52118a',
                                                    'operator' => '==',
                                                    'value' => 'select',
                                                ),
                                            ),
                                        ),
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layout' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_5fffec7b02ae4',
                                                'label' => 'Filter classes',
                                                'name' => 'filter_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>class="filter"</code> DIVs',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_5fffed7b79a63',
                                                'label' => 'Select classes',
                                                'name' => 'select_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>select</code> tags',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_5fffed9479a64',
                                                'label' => 'Option classes',
                                                'name' => 'option_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>option</code> tags',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_600152b52118d',
                                        'label' => 'Button Classes',
                                        'name' => 'button_classes',
                                        'type' => 'group',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_600151f52118a',
                                                    'operator' => '==',
                                                    'value' => 'button',
                                                ),
                                            ),
                                        ),
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layout' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_600152b52118f',
                                                'label' => 'Filter classes',
                                                'name' => 'filter_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>class="filter"</code> DIVs',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '50',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_600152b521191',
                                                'label' => 'Button classes',
                                                'name' => 'button_classes',
                                                'type' => 'text',
                                                'instructions' => 'Classes to add to all </code>button</code> tags',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_600f16c55c882',
                                'label' => '',
                                'name' => '',
                                'type' => 'message',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => 'By default, all grid items have a data-unixtime="0123456789" attribute that can be filtered on.',
                                'new_lines' => 'wpautop',
                                'esc_html' => 0,
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                ),
                'button_label' => 'Add Filter',
                'min' => '',
                'max' => '',
            ),
            array(
                'key' => 'field_6003104a86db0',
                'label' => '<span class="mdi mdi-sort-alphabetical-ascending"></span> Sorting',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_60054ed1a4166',
                'label' => '',
                'name' => 'sorting_group',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_60054ee2a4167',
                        'label' => '<span class="mdi mdi-sort"></span> Sorting',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'left',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_6003107286db1',
                        'label' => '<span class="mdi mdi-table-headers-eye"></span> Show Sorting',
                        'name' => 'render_sorting',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 1,
                        'ui' => 1,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ),
                    array(
                        'key' => 'field_600fc45772c20',
                        'label' => '',
                        'name' => '',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => 'For the sorting to work, there are three steps:
    
    1. The Isotope Javascript needs to register the classes / data-attributes you wish to sort on.
    When creating the isotope object, define the "getSortData" property.
    Here\'s an example:
    
    <javascript>
    var elem = document.querySelector(\'.tutorials .isotope-grid\');
    var iso = new Isotope( elem, {
        itemSelector: \'.grid-item\',
        layoutMode: \'fitRows\',
        getSortData: {
            title: \'.title\',
            unixdate: \'[data-unixdate]\'
        }
    });
    </javascript>
    
    
    2. Add those classes / data-attributes into the grid-item cell template.
    By default, every grid-item wrapper DIV has the taxonomy classes and a data-unixdate attribute that you can use.
    For additional fields, add in classes to sort on. For example:
    
    <div class="title text-white text-md max-h-8 leading-4 mb-1 truncate">{{post_title}} </div>
    <div class="date text-smoke text-xs font-thin"%3E {{filters:taxonomies}}</div>
    
    
    3. Add the sorting options. 
    Each value is the class / data-attribute.
    The name is what will be displayed in the dropdown box.',
                        'new_lines' => 'wpautop',
                        'esc_html' => 1,
                    ),
                    array(
                        'key' => 'field_60054f82a416a',
                        'label' => '<span class="mdi mdi-form-select"></span> Sort Options',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'left',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_6003fbe20f44f',
                        'label' => 'Sortings',
                        'name' => 'sortings',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'block',
                        'button_label' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_6003fcce0f450',
                                'label' => 'Value',
                                'name' => 'value',
                                'type' => 'text',
                                'instructions' => '.class or data-attribute',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '50',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60046f3890e37',
                                'label' => 'Label',
                                'name' => 'label',
                                'type' => 'text',
                                'instructions' => 'Label in the dropdown.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '50',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_600ffd6bb7a17',
                        'label' => '',
                        'name' => '',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '# Sorting Values and Labels
    
    
    These are added into each option for the select drop-down.
    
    <div class="sorting">
            <select class="">
                    <option class="" value="[OPTION_VALUE_1]">[OPTION_TITLE_1]</option>
                    <option class="" value="[OPTION_VALUE_2]">[OPTION_TITLE_2]</option>
            </select>
    </div>',
                        'new_lines' => 'wpautop',
                        'esc_html' => 1,
                    ),
                    array(
                        'key' => 'field_60054fb5a416b',
                        'label' => '<span class="mdi mdi-code-not-equal-variant"></span> Classes',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'left',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_60055055a416e',
                        'label' => 'Wrapper Classes',
                        'name' => 'sort_wrapper_classes',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_60055088a416f',
                        'label' => 'Select Classes',
                        'name' => 'sort_select_classes',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_6005509ba4170',
                        'label' => 'Options Classes',
                        'name' => 'sort_options_classes',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_600ffd03b7a16',
                        'label' => '',
                        'name' => '',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '# Sorting Classes
    
    
    These classes are added into the output code at various positions:
    
    
    <div class="sorting [WRAPPER_CLASSES]">
            <select class="[SELECT_CLASSES]">
                    <option class="[OPTION_CLASSES]" value="title">Title</option>
                    <option class="[OPTION_CLASSES]" value="unixdate">Date</option>
            </select>
    </div>',
                        'new_lines' => 'wpautop',
                        'esc_html' => 1,
                    ),
                    array(
                        'key' => 'field_60054f02a4168',
                        'label' => '<span class="mdi mdi-order-alphabetical-descending"></span> ASC / DESC',
                        'name' => '',
                        'type' => 'tab',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'placement' => 'left',
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_60054352001cf',
                        'label' => '<span class="mdi mdi-checkbox-marked"></span> Show Reverse Order',
                        'name' => 'render_reverse',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '40',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 1,
                        'ui' => 1,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ),
                    array(
                        'key' => 'field_60054fe4a416c',
                        'label' => 'Input Classes',
                        'name' => 'reverse_input_classes',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_6005564940c59',
                        'label' => 'Label Text',
                        'name' => 'reverse_label_text',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_6005502da416d',
                        'label' => 'Label Classes',
                        'name' => 'reverse_label_classes',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_600ff9eee16ac',
                        'label' => '',
                        'name' => '',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '# ASC/DESC structure
    
    
    By enabling the ASC/DESC switch, you will insert a new input of type \'checkbox\', with a label associated with it, nested within the sorting DIV.
    
    
    <div class="sorting ">
            <select class="">
                    <option class="" value="title">Title</option>
                    <option class="" value="unixdate">Date</option>
            </select>
    
            <input class="[INPUT_CLASSES]" type="checkbox" id="reverse" name="reverse" checked="">
            <label class="[LABEL_CLASSES]" for="reverse">[LABEL_TEXT]</label>
    
    </div>',
                        'new_lines' => 'wpautop',
                        'esc_html' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_5ffd89479efe5',
                'label' => '<span class="mdi mdi-square"></span> Cells',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_6001f869ab935',
                'label' => 'Grid-item classes',
                'name' => 'grid_item_classes',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ffd89749efe6',
                'label' => 'Cell Template',
                'name' => 'template',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => 'ue__codemirror',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5ffeac0c81c20',
                'label' => '<span class="mdi mdi-help-rhombus"></span> Help',
                'name' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5ffeac3481c22',
                'label' => 'Moustaches',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '<h1>Moustache List</h1>
    
    <h2>Generic Moustaches</h2>
    
    <ul>
            <li>Any POST field. e.g. <code>{{post_title}}</code>. </li>
            <li>Any META field. e.g. <code>{{rank_math_description}}</code>. Also has optional <code>{{rank_math_description:sanitize}}</code> argument. </li>
    </ul>
    
    
    <h2>Custom Moustaches</h2>
    <ul>
            <li><code>{{filters:TAXONOMY}}</code>. This will return a string of all the terms the post has in that taxonomy. Use for filters by placing it into the item/cell outer wrapper container.</li>
            <li><code>{{filters:taxonomies}}</code>. Same as the above, but will add ALL terms from ALL taxonomies for that post. </li>
            <li><code>{{image_url:SIZE}}</code>. This will output the URL of the featured image for the post in the SIZE specified.</li>
            <li><code>{{time_ago}}</code>. This will convert the published date into a human readable time.</li>
            <li><code>{{post_permalink}}</code>. A URL Escaped permalink to the post.</li>
            <li><code>{{youtube_video_link}}</code>. Using just the video code, will return a full URL to the youtube video.</li>
            <li><code>{{date:PHP_DATETIME}}</code>. Use any <a href="https://www.php.net/manual/en/datetime.format.php">PHP DATETIME </a>Format to convert the published date.</li>
            <li><code>{{datetime:FIELD, PHP_DATETIME}}</code>. Use any <a href="https://www.php.net/manual/en/datetime.format.php">PHP DATETIME </a>Format to convert the specified field.</li>
            <li><code>{{unixdate}}</code>. This requires a little more detail. The "youngerthan" filters will look for a <code>data-unixtime""</code> parameter on the cell wrapper. So include this mounstache as the value. So it will become: <code>data-unixtime"{{unixtime}}"</code> to be filterable. </li>
    </ul>
    
    <h1>Modifiers on PostMeta moustaches</h1>
    <ul>
            <li><code>:sanitize</code>. There is also an optional <code>{{post_title:sanitize}}</code> argument to use to sanitize the field. This is useful if you want to pair a filter, like \'post_field\' , which has its value automatically sanitized to a class in the cell. Works on both post fields and meta fields.</li>
            <li><code>:slice, - ,1</code>. Where the 1 can be any number. Will explode the field with the first argument, then remove the number of results specified by the second argument.</li>
            <li><code>:preg_replace,/hello/i,goodbye</code>.Use preg_replace to remove or replace text.</li>
    </ul>
    
    <h1>Filter DIVs</h1>
    <p>All filters need to be a class in a div within the cell. e.g.</p>
    <code>&lt;div class=&quot;filmed {{filmed}} &quot;&gt;&lt;/div&gt;</code>
    
    <h1>Sort DIVs</h1>
    <p>All sort fields need to be within the html tags as inner text to work. They WILL NOT work as just classes like the filters. e.g.</p>
    <code>&lt;div class=&quot;award_level {{award_level}} hidden&quot;&gt;{{award_level}}&lt;/div&gt;</code>
    ',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => 'field_5ffeac2981c21',
                'label' => '<span class="mdi mdi-help-rhombus"></span> Help End',
                'name' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 1,
            ),
            array(
                'key' => 'field_5ffd82a4b6c44',
                'label' => '<span class="mdi mdi-language-css3"></span> CSS',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5ffd82c0b6c45',
                'label' => 'Additional CSS',
                'name' => 'additional_css',
                'type' => 'textarea',
                'instructions' => '<h3>Notes</h3>
    <h4>Buttons</h4>
    <p>For buttons, selecting each one will give it a class of <code>on</code>. Use that for styling the currently selected button.</p>
    
    <h4>Checkbox Labels</h4>
    <p>For the label of a checkbox (when using for ASC/DESC for instance.) Use the following to style the checkbox label.</p>
    <code>
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
    </code>',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => 'ue__codemirror',
                    'id' => '',
                ),
                'default_value' => '<!-- Change background of ASC & DESC checkbox -->
    input[type=checkbox]#reverse:checked + label {
        background-color:#E86546;
    }
    input[type=checkbox]#reverse + label:before {
        content:"DESC "
    } 
    input[type=checkbox]#reverse:checked + label:before {
        content:"ASC "
    }',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => '',
    ));
    
    endif;