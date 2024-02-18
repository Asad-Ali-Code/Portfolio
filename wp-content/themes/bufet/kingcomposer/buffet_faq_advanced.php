<?php

    extract( $atts );

    //custom class
	$wrap_class  = apply_filters( 'kc-el-class', $atts );

	if( ! empty( $extra_class ) ) {
		$wrap_class[] = $extra_class;
	}
?>

<div class="<?php echo esc_attr( implode( ' ', $wrap_class ) ); ?>">


    <div class="faq-area-advanced">
            <div class="tabs animated-slide-2  ">
                <ul class="nav nav-tabs" role="tablist">
                    <?php
                        $count = 1;
                        foreach( $tabs as $tab ) :

                        if($count == 1) :
                            printf(
                                '<li role="presentation" class="active"><a href="#%s" aria-controls="%s" role="tab" data-toggle="tab">%s</a></li>',
                                strtolower($tab->tab_title),
                                strtolower($tab->tab_title),
                                $tab->tab_title
                            );
                        else :
                            printf(
                                '<li role="presentation"><a href="#%s" aria-controls="%s" role="tab" data-toggle="tab">%s</a></li>',
                                strtolower($tab->tab_title),
                                strtolower($tab->tab_title),
                                $tab->tab_title
                            );
                        endif;

                        $count++;
                    endforeach; ?>
                </ul>
                <div class="tab-content">

                    <?php
                        $count = 1;
                        foreach( $tabs as $tab ) :

                        if($count == 1) :
                            printf(
                                '<div role="tabpanel" class="tab-pane fade active in" id="%s">',
                                strtolower($tab->tab_title)
                            );
                        else :
                            printf(
                                '<div role="tabpanel" class="tab-pane fade" id="%s">',
                                strtolower($tab->tab_title),
                                strtolower($tab->tab_title),
                                $tab->tab_title
                            );
                        endif;

                        echo do_shortcode($tab->tab_content);

                        echo '</div>';

                        $count++;
                    endforeach; ?>

                </div>
            </div>
    </div>

</div>
