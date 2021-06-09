<?php

namespace BlockCommon;

/**
 * Reduce a list of blocks and their inner blocks to a flat
 * list of all blocks.
 *
 * @param array $blocks A list of WordPress blocks.
 * @return array A flattened list of WordPress blocks.
 */
function flatten_blocks( $blocks ) {
	$flattened_blocks = array();

	foreach ( $blocks as $block ) {
		$flattened_blocks[] = $block;

		if ( 0 < count( $block['innerBlocks'] ) ) {
			$inner_blocks = flatten_blocks( $block['innerBlocks'] );

			$flattened_blocks = array_merge( $flattened_blocks, $inner_blocks );
		}
	}

	return $flattened_blocks;
}
