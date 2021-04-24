<?php
global $aRedux_vars;

get_header()
?>
<div class="row">
    <?php
    do_shortcode("[single_layout type='leftImg' postId=" . $post->ID . "]") ?>
</div>
<?php
if (comments_open()) {
    # code...
    comments_template();
}
?>
<?php get_footer() ?>