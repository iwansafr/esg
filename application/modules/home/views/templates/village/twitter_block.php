<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['twitter_widget']))
{
	?>
	<a class="twitter-timeline" href="https://twitter.com/<?php echo $home['twitter_widget']['content'] ?>" data-height="350">Tweets by <?php echo $home['twitter_widget']['content'] ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	<?php
}