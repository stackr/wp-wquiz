<?php
class WQuiz_Widget extends WP_Widget {
	public function WQuiz_Widget(){

		$this->defaults['title'] = __('WQuiz Widget','hotpack');
		
		$widget_ops = array('classname'=>'wquiz_widget','description'=>__('사이드바에 WQuiz를 보여줍니다.','hotpack'));

		// widget control settings
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'wquiz_widget' );

		// create the widget
		parent::__construct('wquiz_widget',$this->defaults['title'],$widget_ops,$control_ops);
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'WQuiz', 'hotpack' );
		}
		$short_url = $instance['short_url'];
		$nonce = wp_create_nonce('st-token');
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'short_url' ); ?>"><?php _e( 'Share Address:','hotpack' ); ?></label> 
		<input class="widefat wquiz_short_url" id="<?php echo $this->get_field_id( 'short_url' ); ?>" name="<?php echo $this->get_field_name( 'short_url' ); ?>" type="text" value="<?php echo esc_attr( $short_url ); ?>" />
		</p>
		<?php
	}
	public function widget( $args, $instance ){
		global $stweather;
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
			$short_url = explode('s/',$instance['short_url']);
			$wquiz_id = isset($short_url[1]) ? $short_url[1] : 1;
		?>
		<div class="wquiz_widget">
			<div class="wq-embed" id="wq_<?php echo $wquiz_id;?>"></div>
<script type="text/javascript">
    var _wquiz = _wquiz || [];
    _wquiz.push({
        type: "iframe",
        auto: "1",
        domain: "wquiz.com/s/",
        id: "<?php echo $wquiz_id;?>",
        placeholder: "wq_<?php echo $wquiz_id;?>",
        widget:"1"
    });
    (function(d,c,j){if(!document.getElementById(j)){var wq=d.createElement(c),s;wq.id=j;wq.src=('https:'==document.location.protocol)?'https://wquiz.com/wquiz.min.js':'http://wquiz.com/wquiz.min.js';s=document.getElementsByTagName(c)[0];s.parentNode.insertBefore(wq,s)}}(document,'script','wq-embed'));
</script>
		</div>
		<?php
		echo $after_widget;
	}
}
?>