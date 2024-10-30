<?php

if (!defined('ABSPATH'))
  exit;

add_action( 'wpcf7_init', 'OCCF7RS_add_form_tag_rating', 10, 0 );


	function OCCF7RS_add_form_tag_rating() {
		wpcf7_add_form_tag( array( 'rating', 'rating*' ),'OCCF7RS_rating_form_tag_handler', array( 'name-attr' => true) );
	}

	function OCCF7RS_rating_form_tag_handler( $tag ) {
		ob_start();
		$atts = array();
		$atts['maxsize'] = $tag->get_option( 'maxsize' )[0];
		$atts['icon'] = $tag->get_option( 'icon' )[0];
		$atts['step'] = $tag->get_option( 'step' )[0];
		$atts['reset'] = $tag->get_option( 'reset' )[0];
		$atts['title'] = $tag->get_option( 'title' )[0];


		$maxsize = $atts['maxsize'];
		$icon = $atts['icon'];
		$step = $atts['step'];
		$reset = $atts['reset'];
		$title = $atts['title'];


		if ("icon_1" === $icon) {
    		?>
    		<div class="rating_stars">
    			<p><?php echo $title; ?></p>
    			<input type="hidden" value="" name="<?php echo $tag->name; ?>" id="<?php echo $tag->name; ?>" step="<?php echo $step;?>" > 
				<div class="rateit" data-rateit-backingfld="#<?php echo $tag->name; ?>" data-rateit-resetable="<?php echo $reset;?>"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="<?php echo $maxsize;?>" data-rateit-mode="font" >
				</div>
			</div>
    		<?php
		} 

		elseif ("icon_2" === $icon) {
		    ?>
    		<div class="rating_stars">
    			<p><?php echo $title; ?></p>
    			<input type="hidden" value="" name="<?php echo $tag->name; ?>" id="<?php echo $tag->name; ?>" step="<?php echo $step;?>" > 
				<div class="rateit" data-rateit-backingfld="#<?php echo $tag->name; ?>" data-rateit-resetable="<?php echo $reset;?>"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="<?php echo $maxsize;?>" data-rateit-icon="@" data-rateit-mode="font" >
				</div>
			</div>
		    <?php
		} 


		elseif ("icon_3" === $icon) {
		    ?>
		    <style>
		    .wpcf7 p {
    			margin-top: 0px;
			}
		    </style>
		    <div class="rating_stars">
		    	<p><?php echo $title; ?></p>
		    	<input type="hidden" min="0" max="7"  name="<?php echo $tag->name; ?>" value="" step="1" id="<?php echo $tag->name; ?>">
				<div class="rateit" data-rateit-backingfld="#<?php echo $tag->name; ?>" data-rateit-max="<?php echo $maxsize;?>"></div>
			</div>
		    <?php
		} 

		else {
		    ?>
		    <div class="rating_stars">
		    	<p><?php echo $title; ?></p>
		    	<input type="hidden" min="0" max="7"  name="<?php echo $tag->name; ?>" value="" step="1" id="<?php echo $tag->name; ?>">
				<div class="rateit" data-rateit-backingfld="#<?php echo $tag->name; ?>" data-rateit-max="<?php echo $maxsize;?>"></div>
			</div>
		    <?php
		}

		return $code = ob_get_clean();
	}


  
add_action( 'wpcf7_admin_init', 'OCCF7RS_add_tag_generator_rating', 18, 0 );

	function OCCF7RS_add_tag_generator_rating() {
		$tag_generator = WPCF7_TagGenerator::get_instance();
		$tag_generator->add( 'rating', __( 'rating', 'contact-form-7' ),
			'OCCF7RS_tag_generator_rating' );
	}
	function OCCF7RS_rating_validation_filter( $result, $tag ) {

	
	}



  
add_filter( 'wpcf7_validate_tel*', 'OCCF7RS_text_validation_filter', 10, 2 );

	function OCCF7RS_text_validation_filter( $result, $tag ) {
		
	}


	function OCCF7RS_tag_generator_rating( $contact_form, $args = '' ) {
		$args = wp_parse_args( $args, array() );
		$wpcf7_contact_form = WPCF7_ContactForm::get_current();
		$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
		$type = 'rating';

		?>
		<div class="control-box">
			<fieldset>
				<table>
					<tbody>

						<tr>
							<th scope="row"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></th>
							<td>
								<fieldset>
								<legend class="screen-reader-text"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></legend>
								<label><input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'contact-form-7' ) ); ?></label>
								</fieldset>
							</td>
						</tr>

						<tr>
							<th scope="row">
								<label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>">
									<?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?>
								</label>
							</th>
							<td>
								<input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" />
							</td>
						</tr>

						<tr>
							<th scope="row">
								<label for="<?php echo esc_attr( $args['content'] . '-title' ); ?>">
									<?php echo esc_html( __( 'Title', 'contact-form-7' ) ); ?>
								</label>
							</th>
							<td>
								<input type="text" name="title" class="title option" id="<?php echo esc_attr( $args['content'] . '-title' ); ?>" />
							</td>
						</tr>



						<tr>
							<th scope="row">
								<label for="<?php echo esc_attr( $args['content'] . '-maxsize' ); ?>">
									<?php echo esc_html( __( 'Max Star', 'contact-form-7' ) ); ?>
								</label>
							</th>
							<td>
								<input type="number" name="maxsize" class="maxsize option" id="<?php echo esc_attr( $args['content'] . '-maxsize' ); ?>" />
							</td>
						</tr>




						<tr>
							<th>
								<label for="<?php echo esc_attr( $args['content'] . '-icon' ); ?>">
									<?php echo esc_html( __( 'Icon', 'contact-form-7' ) ); ?>
								</label>
							</th>
							<td>
								<label>
									<input type="radio" name="icon" value="icon_1" class="option" id="<?php echo esc_attr( $args['content'] . '-cion1' ); ?>" /> <?php echo esc_html( __( '★', 'contact-form-7' ) ); ?>
								</label>
								<label>
									<input type="radio" name="icon" value="icon_2" class="option" id="<?php echo esc_attr( $args['content'] . '-cion2' ); ?>"/> <?php echo esc_html( __( '@', 'contact-form-7' ) ); ?>
								</label>
								<label>
									<input type="radio" name="icon" value="icon_3" class="option" id="<?php echo esc_attr( $args['content'] . '-cion3' ); ?>"/>
									<?php  
									echo '<img src="'.plugins_url('/rating/scripts/star1.gif').'">';
									?>
								</label>
							</td>
						</tr>



						<tr>
							<th>
								<label for="<?php echo esc_attr( $args['content'] . '-step' ); ?>">
									<?php echo esc_html( __( 'step', 'contact-form-7' ) ); ?>
								</label>
							</th>
							<td>
								<input type="number" name="step" class="maxsize option" id="<?php echo esc_attr( $args['content'] . '-step' ); ?>" />
							</td>
						</tr>


						<tr>
							<th scope="row">
								<?php echo esc_html( __( 'Rateit Reset', 'contact-form-7' ) ); ?>
							</th>
							<td>
								<label>
									<input type="checkbox" name="reset:true"  class="option"  /> <?php echo esc_html( __( 'Required field', 'contact-form-7' ) ); ?>
								</label>
							</td>
						</tr>

					

					</tbody>	
				</table>
			</fieldset>
		</div>
		<div class="insert-box">
			<input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()"/>
			<div class="submitbox">
			<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
			</div>
			<br class="clear" />

			<p class="description mail-tag"><label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" /></label></p>
		</div>
		<?php
	}
