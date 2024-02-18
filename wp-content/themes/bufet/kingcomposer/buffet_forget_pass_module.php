<?php

extract( $atts );

$wrap_class  = apply_filters( 'kc-el-class', $atts );
$class_title = array( 'blooom_spacer' );

if( !empty( $extra_class ) )
	$wrap_class[] = $extra_class;

?>


<div class="registration-module">
<div class="login-module register-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-page-content-table">
                    <div class="blog-table-cell">
            <span class="anchor" id="formRegister"></span>

            <!-- form card register -->
            <div class="card card-outline-secondary">


				<?php
					global $user_ID, $user_identity;

						if (!$user_ID) {

			                $register = isset( $_GET['register'] ) ? $_GET['register'] : '' ;
			                $user_login = isset( $user_login ) ? $user_login : '' ;
			                $user_email = isset( $user_email ) ? $user_email : '' ;
                            $reset = isset( $_GET['reset'] ) ? $_GET['reset'] : '';
                            $redirect_url = esc_url( $_SERVER['REQUEST_URI'] );
			    ?>


                    <div class="card-header">
                        <h3 class="mb-0"><?php esc_html_e('Reset your password', 'bufet'); ?></h3>
                    </div>
                    <div class="card-body">

                    <form class="form" role="form" autocomplete="off" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" method="post">
                        <div class="form-group">
                            <label for="inputName"><?php echo esc_attr( $email_label ); ?></label>
                            <input type="text" class="form-control" id="inputName" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" placeholder="<?php echo esc_attr( $email_placeholder ); ?>" required="">
                        </div>


                        <div class="form-group">
                            <div class="faq-button">

                                <button  type="submit" name="user-submit" class="pricing-btn blue-btn about-btn" href=""><?php echo esc_html( $submit_btn_value ); ?></button >
								<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_url ); ?>" />
								<input type="hidden" name="user-cookie" value="1" />

                            </div>

                        </div>
                    </form>


        		<?php } else { ?>

                    <div class="card-header">
                        <h3 class="mb-0"><?php printf('You are already logged in as <i>%s</i>', esc_html( $user_identity )); ?></h3>
                    </div>
                    <div class="card-body">

        			<div class="user-logged-in">
        				<div class="user-icon">
        					<?php global $userdata; echo get_avatar($userdata->ID, 80); ?>
        				</div>
        				<div class="user-info">
        					<h3><?php echo esc_html__('Welcome, ', 'bufet') . esc_html( $user_identity ); ?></h3>
        					<p><?php esc_html_e('You&rsquo;re logged in as ', 'bufet') ?> <strong><?php echo esc_html( $user_identity ); ?></strong></p>

        				</div>
        				<p>
        					<a href="<?php echo wp_logout_url('index.php'); ?>"><?php esc_html_e('Log out', 'bufet'); ?></a> |
        					<?php if (current_user_can('manage_options')) {
        						echo '<a href="' . admin_url() . '">' . esc_html__('Admin', 'bufet') . '</a>'; } else {
        						echo '<a href="' . admin_url() . 'profile.php">' . esc_html__('Profile', 'bufet') . '</a>'; }
        					?>
        				</p>
        			</div>

        		<?php } ?>

                </div>
            </div>
            <!-- /form card register -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
