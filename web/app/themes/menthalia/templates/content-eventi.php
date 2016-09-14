<?php
use \Menthalia as Menthalia;
$detect = new Mobile_Detect;
use Roots\Sage\Extras;

?><div class="inner">	<?php
echo Extras\back_link();
var_dump($detect->isMobile());
if($detect->isMobile()){

Menthalia\ajax_load_more('eventi',5,2,4);

}else{
while (have_posts()) : the_post();
 get_template_part('repeaters/eventi'); 
 endwhile;
}
?>
</div>