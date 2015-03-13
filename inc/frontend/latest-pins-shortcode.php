<?php

//var_dump($attr);

$feed_url = isset($attr['feed_url']) ? $attr['feed_url'] : 'https://www.pinterest.com/pinterest';
$specific_board = isset($attr['specific_board']) ? $attr['specific_board'] : '';
if(isset($specific_board) && $specific_board !=''){
	$feed_url =$feed_url.'/'.$specific_board.'/rss';
}else{
	$feed_url = $feed_url.'/feed.rss';
}
$number_of_pins_to_show = isset($attr['feed_count']) ? $attr['feed_count'] : '4';
$caption_enabled= isset($attr['caption']) ? $attr['caption'] : '0';

$latest_pins = $this->apsp_pinterest_get_rss_feed($feed_url, $number_of_pins_to_show);

?>
		<ul id="apsp-pinterest-latest-pins" <?php if($caption_enabled == '1'){ ?> class='apsp-caption-enabled' <?php }else{ ?> class='apsp-caption-disabled clearfix' <?php } ?>>			
		<?php
			if(!empty( $latest_pins ) ){
				$count=0;
				foreach ( $latest_pins as $item ):
					$count++;
					$rss_pin_description = $item->get_description();			
					preg_match('/<img[^>]+>/i', $rss_pin_description, $pin_image); 
					$pin_caption = $this->trim_text( strip_tags( $rss_pin_description ), 400 );
					?>
				<li class="apsp-pinterest-latest-pin">
					<div class="apsp-pinterest-image">
						<a href="<?php echo esc_url( $item->get_permalink() ); ?>" target="_blank" title="<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>"><?php echo $pin_image[0];?></a>
						<?php if ( $caption_enabled =='1' ){?>
						<span class="apsp-pinterest-text"><?php echo strip_tags( $pin_caption ); ?></span>
						<?php  }?>
					</div>
				</li>
				<?php 
				/*
					if($caption_enabled == '1'){
						if($count % 2 =='0'){ ?>
							<div class='clearfix'></div>
						<?php
					}
					}else{
						if($count % 3 =='0'){ ?>
							<div class='clearfix'></div>
					   <?php
					    }
					}
					*/
				?>
				<?php endforeach; 
			}else{ ?>
				<li class="apsp-pinterest-latest-pin">
					No feeds available
				</li>

			<?php } ?>
		</ul>