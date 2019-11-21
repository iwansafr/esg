<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['twitter_widget']['content'])): ?>
	<h4>Twitter</h4>
	<div class="fslider customjs testimonial twitter-scroll twitter-feed" data-username="envato" data-count="2" data-animation="slide" data-arrows="false">
		<a class="twitter-timeline" href="https://twitter.com/<?php echo @$home['twitter_widget']['content'] ?>" data-height="350">Tweets by <?php echo @$home['twitter_widget']['content'] ?></a> 
		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>	
<?php endif ?>
