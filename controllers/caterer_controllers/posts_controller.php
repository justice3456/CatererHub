<?php
include("../../classes/caterer_classes/posts_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function create_post_controller($post_text, $image_path, $video_path) {
    $post = new posts();
    $post->create_post("$post_text", "$image_path", "$video_path");
    return true;
}

function retrieve_posts_controller () {
    $post = new posts();
    return $post->retrieve_all_posts();
}

// function edit_ad_controller ($title, $description,$image_path, $ad_id) {
//     $ad = new ads();
//     $ad->edit_ad("$title", "$description", "$image_path","$ad_id");
//     return true;
// }

function delete_ad_controller ($ad_id) {
    $post = new posts();
    $post->delete_ad("$ad_id");
    return true;
}

?>