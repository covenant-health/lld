<?php
// function to prevent certain html tags
// from being stripped out of the editor
// on save in a multisite installation
function allowed_multisite_tags( $multisite_tags ) {

	$multisite_tags[ 'audio' ] = array(
		'autoplay'  => true,
		'controls'  => true,
		'loop'      => true,
		'muted'     => true,
		'preload'   => true,
		'src'       => true
	);

	$multisite_tags[ 'button' ] = array(
		'autofocus'       => true,
		'class'           => true,
		'disabled'        => true,
		'form'            => true,
		'formaction'      => true,
		'formenctype'     => true,
		'formmethod'      => true,
		'formnovalidate'  => true,
		'formtarget'      => true,
		'name'            => true,
		'type'            => true,
		'value'           => true
	);

	$multisite_tags[ 'embed' ] = array(
		'class'   => true,
		'height'  => true,
		'src'     => true,
		'style'   => true,
		'type'    => true,
		'width'   => true
	);

	$multisite_tags[ 'form' ] = array(
		'accept'      => true,
		'action'      => true,
		'autcomplete' => true,
		'method'      => true,
		'name'        => true,
		'target'      => true
	);

	$multisite_tags[ 'fieldset' ] = array(
		'disabled'  => true,
		'form'      => true,
		'name'      => true
	);

	$multisite_tags[ 'iframe' ] = array(
		'allowfullscreen' => true,
		'frameborder'     => true,
		'height'          => true,
		'name'            => true,
		'src'             => true,
		'style'           => true,
		'width'           => true
	);

	$multisite_tags[ 'input' ] = array(
		'accept'          => true,
		'autocomplete'    => true,
		'autofocus'       => true,
		'class'           => true,
		'disabled'        => true,
		'form'            => true,
		'formaction'      => true,
		'formenctype'     => true,
		'formmethod'      => true,
		'formnovalidate'  => true,
		'formtarget'      => true,
		'height'          => true,
		'id'              => true,
		'list'            => true,
		'max'             => true,
		'maxlength'       => true,
		'min'             => true,
		'multiple'        => true,
		'name'            => true,
		'pattern'         => true,
		'placeholder'     => true,
		'readonly'        => true,
		'required'        => true,
		'size'            => true,
		'src'             => true,
		'step'            => true,
		'type'            => true,
		'value'           => true,
		'width'           => true
	);

	$multisite_tags[ 'label' ] = array(
		'for'   => true,
		'form'  => true
	);

	$multisite_tags[ 'legend' ] = array(
		'align' => true
	);

	$multisite_tags[ 'object' ] = array(
		'data'    => true,
		'form'    => true,
		'height'  => true,
		'name'    => true,
		'type'    => true,
		'width'   => true
	);

	$multisite_tags[ 'optgroup' ] = array(
		'disabled'  => true,
		'label'     => true
	);

	$multisite_tags[ 'option' ] = array(
		'disabled'  => true,
		'label'     => true,
		'selected'  => true,
		'value'     => true
	);

	$multisite_tags[ 'param' ] = array(
		'name'      => true,
		'type'      => true,
		'value'     => true,
		'valuetype' => true
	);

	$multisite_tags[ 'select' ] = array(
		'autofocus' => true,
		'disabled'  => true,
		'form'      => true,
		'multiple'  => true,
		'name'      => true,
		'required'  => true,
		'size'      => true
	);

	$multisite_tags[ 'script' ] = array(
		'async'   => true,
		'charset' => true,
		'defer'   => true,
		'src'     => true,
		'type'    => true
	);

	$multisite_tags[ 'textarea' ] = array(
		'autofocus'   => true,
		'cols'        => true,
		'dirname'     => true,
		'disabled'    => true,
		'form'        => true,
		'maxlength'   => true,
		'name'        => true,
		'placeholder' => true,
		'readonly'    => true,
		'required'    => true,
		'rows'        => true,
		'wrap'        => true
	);

	$multisite_tags[ 'video' ] = array(
		'autoplay'  => true,
		'controls'  => true,
		'height'    => true,
		'loop'      => true,
		'muted'     => true,
		'poster'    => true,
		'preload'   => true,
		'src'       => true,
		'width'     => true
	);

	return $multisite_tags;

}
add_filter( 'wp_kses_allowed_html', 'allowed_multisite_tags', 1 );