<?php
use \Menthalia as Menthalia;
$detect = new Mobile_Detect;
?><div class="inner">	<?php
if($detect->is_mobile()){

Menthalia\ajax_load_more('eventi');

}else{
while (have_posts()) : the_post();
 get_template_part('repeaters/eventi'); 
 endwhile;
}
?>
</div>