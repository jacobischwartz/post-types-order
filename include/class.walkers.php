<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Post_Types_Order_Walker extends Walker {

	// @codingStandardsIgnoreStarts - Scope modifier is not defined.
	var $db_fields = array(
		'parent' => 'post_parent',
		'id'     => 'ID',
	);
	// @codingStandardsIgnoreEnd


	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='children'>\n";
	}


	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}


	public function start_el( &$output, $page, $depth = 0, $args = array(), $id = 0 ) {
		if ( $depth ) {
			$indent = str_repeat( "\t", $depth );
		} else {
			$indent = '';
		}

		// @codingStandardsIgnoreStarts
		// phpcs: WordPress.PHP.DontExtract.extract_extract:
		// Description: extract() usage is highly discouraged, due to the complexity and
		//              unintended issues it might cause.
		// Action taken: Did not take any action.
		extract( $args, EXTR_SKIP );
		// @coding StandardsIgnoreEnd

		$item_details = apply_filters( 'the_title', $page->post_title, $page->ID );
		$item_details = apply_filters( 'cpto/interface_itme_data', $item_details, $page );

		$output .= $indent . '<li id="item_' . $page->ID . '"><span>' . $item_details . '</span>';
	}


	public function end_el( &$output, $page, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}
}
