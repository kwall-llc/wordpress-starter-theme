<?php




//====================================================================
// Add New Color Option in Existing Colors Section in Customizer
//====================================================================
 
function kwall_customizer_add_colorPicker( $wp_customize){
     
    // Add Settings 
 
     
    // Add Settings 
    $wp_customize->add_setting( 'secondary_color', array(
        'default-color' => '#04bfbf',
    ));
 
 
    $wp_customize->add_setting( 'primary_color', array(
        'default-color' => '#45ace0',                        
    ));
 
 
    // Add Controls
	 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label' => 'Primary Color',
        'section' => 'colors',
        'settings' => 'primary_color'
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
        'label' => 'Secondary Color',
        'section' => 'colors',
        'settings' => 'secondary_color'
 
    )));
 

 
}
 
add_action( 'customize_register', 'kwall_customizer_add_colorPicker' );

if (is_customize_preview()) {
	add_action('wp_head', function() {
		$compiler = new ScssPhp\ScssPhp\Compiler();
 
		$source_scss = get_stylesheet_directory() . '/assets/scss/styles.scss';
		$scssContents = file_get_contents($source_scss);
		$import_path = get_stylesheet_directory() . '/assets/scss';
		$compiler->addImportPath($import_path);
 
		$variables = [
			'$primary-1' => get_theme_mod('primary_color', '#002F63'),
			'$secondary-1' => get_theme_mod('secondary_color', '#00234A'),
		];
		$compiler->setVariables($variables);
 
		$css = $compiler->compile($scssContents);
		if (!empty($css) && is_string($css)) {
			echo '<style type="text/css">' . $css . '</style>';
		}
	});
}

add_action('customize_save_after', function() {
	$compiler = new ScssPhp\ScssPhp\Compiler();
 
    $source_scss = get_stylesheet_directory() . '/assets/scss/styles.scss';
    $scssContents = file_get_contents($source_scss);
    $import_path = get_stylesheet_directory() . '/assets/scss';
    $compiler->addImportPath($import_path);
	$target_css = get_stylesheet_directory() . '/assets/css/styles.css';
 
    $variables = [
        '$primary-1' => get_theme_mod('primary_color', '#002F63'),
        '$secondary-1' => get_theme_mod('secondary_color', '#00234A'),
    ];	
	$compiler->setVariables($variables);
 
	$css = $compiler->compile($scssContents);
	if (!empty($css) && is_string($css)) {
		file_put_contents($target_css, $css);
	}
});