<?php
use Ponzoblocks\Blocks as Blocks;

/*
*
* Allow these blocks + ponzoblocks
*/
function pb_allowedblocks(){
    // allowed core blocks
    $allowed_blocks = array( 
        'core/block',
        'core/template',
        /*
        'core/columns',
        'core/image',
        'core/text'
        */
    );
    //add them to allowed blocks
    foreach((array) Blocks::getBlocks() as $block){
        //with acf prefix
        array_push( $allowed_blocks, 'acf/'.$block['slug']);
    }
    return $allowed_blocks;
}
/*
*
* Register the blocks as ponzoblocks
*/
function pb_registerblocks()
{
    if (function_exists('acf_register_block')) {
        // Register the hero block.
        foreach (Blocks::getBlocks() as $block) {
            $blockname = $block['name'];
            $block = array(
                'name' => $blockname,
                'block' => $blockname,
                'slug' => $blockname,
                'title' => __($block['title'], 'pb'),
                'description' => __($block['description'], 'pb'),
                'render_callback' => 'pb_blockrender',
                'category' => 'ponzoblocks',
                'icon' => $block['icon'],
                'keywords' => array($block),
                /*
                'supports' => array(
                    'jsx' => true,
                    'mode' => false,
                ),
                */
            );
            acf_register_block_type($block);
        }
    }
}


/*
*
* Render with timber
*/
function pb_blockrender( $block, $content = '', $is_preview = false, $post_id = 0 ) {

    $blockname = $block['slug'];
    // overwrite data with get_fields
    $block['data'] = get_fields();
    $block['is_preview'] = $is_preview;
    // unique block identifier
    echo '<div id="'.$block['id'].'">';
    if( file_exists(STYLESHEETPATH . "/blocks/{$blockname}.php") ) {
		include( STYLESHEETPATH . "/blocks/{$blockname}.php" );
	}
    echo '</div>';
    // script hook within block to mount vue component
    Ponzoblocks::isPreview($block);
}
// allowed blocktypes
add_filter('allowed_block_types', 'pb_allowedblocks');
add_action('acf/init','pb_registerblocks');