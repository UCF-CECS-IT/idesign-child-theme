<?php
namespace IDESIGN\Theme;

define( 'IDESIGN_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once IDESIGN_THEME_DIR . 'includes/config.php';
include_once IDESIGN_THEME_DIR . 'includes/meta.php';

// Add other includes to this file as needed.
include_once IDESIGN_THEME_DIR . 'includes/breadcrumb.php';
include_once IDESIGN_THEME_DIR . 'includes/options.php';
include_once IDESIGN_THEME_DIR . 'includes/project-cpt.php';
