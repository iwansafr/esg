<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php 
$taxonomy = !empty($content['taxonomy']) ? $content['taxonomy'] : @$content['cat'][0];
$header = $this->esg->get_config('header');
?>
<style>
    .breadcrumb_bg {
        background-image: url(<?php echo image_module('config/header',$header['image']) ?>);
        /*background-position: center;*/
        /*background-repeat: no-repeat;*/
        /*background-size: cover;*/
    }
</style>
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2><?php echo $taxonomy['title'] ?></h2>
                        <p>Home<span>-</span><?php echo $taxonomy['title'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>