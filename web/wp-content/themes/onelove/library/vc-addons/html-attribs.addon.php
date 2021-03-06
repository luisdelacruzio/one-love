<?php

function html_attrib_field() {
  $attributes = array(
    'type'        => 'textfield',
    'holder'      => 'div',
    'class'       => '',
    'heading'     => __('Extra Attributes','my-text-domain'),
    'param_name'  => 'extra_attribs',
    'description' => 'Adds additional html attributes to the tag',
  );
  vc_add_param('vc_column',$attributes);
  vc_add_param('vc_column_inner',$attributes);
  vc_add_param('action_card',$attributes);
}
add_action('vc_after_init','html_attrib_field');


function vc_foundation_equalize () {
  $attributes = array(
      'type'        => 'dropdown',
      'holder'      => 'div',
      'class'       => '',
      'heading'     => __('Equalize children?','my-text-domain'),
      'value'       => array(
        'Yes'         => 'true',
        'No'          => 'false',
        'Yes, by row' => 'trueByRow',
      ),
      'std'         => 'false',
      'param_name'  => 'equalize_children',
      'description' => 'Equalize any children with the data attribute (data-equalize-watch)',
    );
  $attribute_depend = array(
    'type'        => 'textfield',
    'holder'      => 'div',
    'class'       => '',
    'heading'     => __('Equalize Identifier','my-text-domain'),
    'param_name'  => 'equalize_id',
    'description' => 'Unique identifier for the group of elments that you want to target.(e.g data-equalize="[unique identifier]")',
    'dependency'  => array(
      'element' => 'equalize_children',
      'value'   => array(
        'true',
        'trueByRow'
      )
    )
  );
  vc_add_param('vc_column',$attributes);
  vc_add_param('vc_column',$attribute_depend);
}
add_action('vc_after_init','vc_foundation_equalize');


function add_card_flip() {
  $attrib = array(
    array(
      'type'        => 'checkbox',
      'heading'     => 'Flip Cards within column?',
      'param_name'  => 'flip_card',
      'value'       => '',
      'description' => 'If action card is used within colum, checking this will allow the card to perform a flip animation. NOTE: column ID is also required.'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Card Flip Direction',
      'param_name'  => 'card_flip_direction',
      'value'       => array(
        'Front'  => 'front',
        'Back'   => 'back',
        'Toggle' => 'toggle',
      ),
      'std'         => 'false',
      'description' => 'Select category display style.',
      'dependency'  => array(
        'element' => 'flip_card',
        'value'  => array(
          'true'
        )
      )
    )
  );
  vc_add_params('vc_column_inner',$attrib);
  vc_add_params('vc_column',$attrib);
}
add_action('vc_after_init','add_card_flip');
