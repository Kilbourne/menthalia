<?php
/**
 * Template Name: Test
*/
?>
<?php 
function filter_where( $where = '' ) {
	// articoli dal 1 marzo al 15 marzo 2010
	$where .= " AND post_date >= '2010-03-01' AND post_date < '2014-12-31'";
	return $where;
}

add_filter( 'posts_where', 'filter_where' );
$attachments=get_posts(['post_type'=>'attachment','posts_per_page'=>-1,'post_mime_type' => 'image','order'=>'ASC','suppress_filters' => FALSE ] );
remove_filter( 'posts_where', 'filter_where' );

$not_linked=[];
foreach ($attachments as $key => $image) {

	if(!$image->post_parent) $not_linked[]=$image->ID;	
}
$posts=get_posts(['post_type'=>'post','posts_per_page'=>-1] );
foreach ($posts as $key => $post) {
	$image=get_field('immagine_in_evidenza',$post->ID);
	var_dump($image);
	$index=array_search($image,$not_linked);
	if($index !== FALSE )
	array_splice($not_linked,$index , 1);
}
var_dump(count($not_linked));
foreach ($not_linked as $key => $value) {
	if ( false === wp_delete_attachment( $value) ) {
		var_dump('Can\'t delete:'.get_permalink($value ),get_post($value)->post_date.'<br/>');
	}else{
		var_dump('Deleted:'.get_permalink($value ),get_post($value)->post_date.'<br/>');
	}
	

}
 ?>