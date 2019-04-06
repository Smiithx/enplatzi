<?php
function add_role_traveler(){
    remove_role('traveler');
    add_role(
        'traveler',
        "Viajero",
        [
            'read' => true,
            'edit_posts' => true,
            'upload_files' => true,
            'publish_posts' => true,
            //'delete_posts' => true,
            'edit_published_posts' => true,
        ]
    );
}

// add role traveler
add_action("init","add_role_traveler");

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5ca0160977dc9',
        'title' => 'Viaje',
        'fields' => array(
            array(
                'key' => 'field_5ca01645c5146',
                'label' => 'Destino',
                'name' => 'destino',
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
                'key' => 'field_5ca016a7cfeec',
                'label' => 'Vacunas obligatorias',
                'name' => 'vacunas_obligatorias',
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
                'key' => 'field_5ca016b1cfeed',
                'label' => 'Vacunas recomendadas',
                'name' => 'vacunas_recomendadas',
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
                'key' => 'field_5ca016c0cfeee',
                'label' => 'Transporte local',
                'name' => 'transporte_local',
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
                'key' => 'field_5ca016c5cfeef',
                'label' => 'Peligrosidad',
                'name' => 'peligrosidad',
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
                    'baja' => 'Baja',
                    'media' => 'Media',
                    'alta' => 'Alta',
                    'muy alta' => 'Muy alta',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5ca0173ccfef0',
                'label' => 'Moneda local',
                'name' => 'moneda_local',
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
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'viaje',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;

add_action('rest_api_init', 'register_custom_fields');

function register_custom_fields()
{
    register_rest_field(
        'viaje',
        'destino',
        array(
            'get_callback' => 'show_fields'
        )
    );
    register_rest_field(
        'viaje',
        'vacunas_obligatorias',
        array(
            'get_callback' => 'show_fields'
        )
    );
    register_rest_field(
        'viaje',
        'vacunas_recomendadas',
        array(
            'get_callback' => 'show_fields'
        )
    );
    register_rest_field(
        'viaje',
        'transporte_local',
        array(
            'get_callback' => 'show_fields'
        )
    );
    register_rest_field(
        'viaje',
        'peligrosidad',
        array(
            'get_callback' => 'show_fields'
        )
    );
    register_rest_field(
        'viaje',
        'moneda_local',
        array(
            'get_callback' => 'show_fields'
        )
    );

}

function show_fields( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}