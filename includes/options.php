<?php

function register_customizer_sections( $wp_customize ) {
	$wp_customize->add_section(
		UCFWP_THEME_CUSTOMIZER_PREFIX . 'idesign',
		array(
			'title' => 'IDESIGN Settings'
		)
	);
}

add_action( 'customize_register', 'register_customizer_sections' );

function register_customizer_options( $wp_customize ) {

	$wp_customize->add_setting( 'idesign_logo', array(
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'idesign_logo_control', array(
        'label' => 'Upload Logo',
        'priority' => 20,
        'section' => UCFWP_THEME_CUSTOMIZER_PREFIX . 'idesign',
        'settings' => 'idesign_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));

	$wp_customize->add_setting( 'social_youtube', array(
		'transport' => 'refresh',
	));

	$wp_customize->add_control(
		'social_youtube',
		array(
			'type'        => 'text',
			'label'       => 'YouTube URL',
			'description' => 'URL that points to IDesign YouTube channel',
			'section'     => UCFWP_THEME_CUSTOMIZER_PREFIX . 'idesign'
		)
	);

	$wp_customize->add_setting( 'social_facebook', array(
		'transport' => 'refresh',
	));

	$wp_customize->add_control(
		'social_facebook',
		array(
			'type'        => 'text',
			'label'       => 'Facebook URL',
			'description' => 'URL that points to IDesign Facebook page',
			'section'     => UCFWP_THEME_CUSTOMIZER_PREFIX . 'idesign'
		)
	);

	$wp_customize->add_setting( 'social_twitter', array(
		'transport' => 'refresh',
	));

	$wp_customize->add_control(
		'social_twitter',
		array(
			'type'        => 'text',
			'label'       => 'Twitter URL',
			'description' => 'URL that points to IDesign Twitter page',
			'section'     => UCFWP_THEME_CUSTOMIZER_PREFIX . 'idesign'
		)
	);
}

add_action( 'customize_register', 'register_customizer_options' );
