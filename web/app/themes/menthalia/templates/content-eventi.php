<?php
use \Menthalia as Menthalia;
$detect = new Mobile_Detect;
use Roots\Sage\Extras;

?><div class="inner">	<?php
echo Extras\back_link();
if($detect->is_mobile()){

Menthalia\ajax_load_more('eventi');

}else{
while (have_posts()) : the_post();
 get_template_part('repeaters/eventi'); 
 endwhile;
}
?>
</div>