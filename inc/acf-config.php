<?php
add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register homepage hero block.
        acf_register_block_type(array(
            'name'              => 'home-slider',
            'title'             => __('Home Slider'),
            'description'       => __('A custom hero block.'),
            'render_template'   => 'template-parts/blocks/home-slider.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
        ));
		// register graudation cta block.
		acf_register_block_type(array(
				'name'              => 'countdown-cta',
				'title'             => __('Countdown CTA'),
				'description'       => __('A custom countdown timer with a call to action block.'),
				'render_template'   => 'template-parts/blocks/countdown-cta.php',
		'category'          => 'formatting',
		'icon' 				=> 'hourglass',
		'align'				=> 'full',
  		));
			// register request info block.
			acf_register_block_type(array(
					'name'              => 'cta-img-text',
					'title'             => __('Image, CTA and Text Slot'),
					'description'       => __('Image, text and button CTA for the homepage'),
					'render_template'   => 'template-parts/blocks/cta-img-text.php',
			'category'          => 'formatting',
			'icon' 				=> '<svg><path d="M17 3H7c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm.5 6c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5V5c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v4zm-8-1.2h5V6.2h-5v1.6zM17 13H7c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zm.5 6c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5v-4c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v4zm-8-1.2h5v-1.5h-5v1.5z"></path></svg>',
			'align'				=> 'full',

		));
		// register your experience block.
		acf_register_block_type(array(
				'name'              => 'carousel',
				'title'             => __('Carousel'),
				'description'       => __('Carousel Block'),
				'render_template'   => 'template-parts/blocks/carousel.php',
		'category'          => 'formatting',
		'icon' 				=> '<svg><path d="M19 3H5c-.6 0-1 .4-1 1v7c0 .5.4 1 1 1h14c.5 0 1-.4 1-1V4c0-.6-.4-1-1-1zM5.5 10.5v-.4l1.8-1.3 1.3.8c.3.2.7.2.9-.1L11 8.1l2.4 2.4H5.5zm13 0h-2.9l-4-4c-.3-.3-.8-.3-1.1 0L8.9 8l-1.2-.8c-.3-.2-.6-.2-.9 0l-1.3 1V4.5h13v6zM4 20h9v-1.5H4V20zm0-4h16v-1.5H4V16z"></path></svg>',
		'align'				=> 'full',

	));
	// register future career block.
	acf_register_block_type(array(
			'name'              => 'program-categories',
			'title'             => __('Program Categories'),
			'description'       => __('Featured academics for homepage. Majors repeater with cta and copy block, stats repeater at bottom'),
			'render_template'   => 'template-parts/blocks/program-categories.php',
	'category'          => 'formatting',
	'icon' 				=> 'welcome-learn-more',
	'align'				=> 'full',

));
		acf_register_block_type(array(
				'name'              => 'footer-address',
				'title'             => __('Footer Address'),
				'description'       => __('A footer address block.'),
				'render_template'   => 'template-parts/blocks/footer-address.php',
		'category'          => 'formatting',
		'icon' 				=> '<svg><path d="M4 20h16v-1.5H4V20zm0-4.8h16v-1.5H4v1.5zm0-6.4v1.5h16V8.8H4zM16 4H4v1.5h12V4z"></path></svg>',
		'align'				=> 'full',

	));
	acf_register_block_type(array(
			'name'              => 'cta-full-width-image',
			'title'             => __('CTA Full Width Image'),
			'description'       => __('A next steps block.'),
			'render_template'   => 'template-parts/blocks/cta-full-width-image.php',
	'category'          => 'formatting',
	'icon' 				=> '<svg><path d="m7 6.5 4 2.5-4 2.5z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="m5 3c-1.10457 0-2 .89543-2 2v14c0 1.1046.89543 2 2 2h14c1.1046 0 2-.8954 2-2v-14c0-1.10457-.8954-2-2-2zm14 1.5h-14c-.27614 0-.5.22386-.5.5v10.7072l3.62953-2.6465c.25108-.1831.58905-.1924.84981-.0234l2.92666 1.8969 3.5712-3.4719c.2911-.2831.7545-.2831 1.0456 0l2.9772 2.8945v-9.3568c0-.27614-.2239-.5-.5-.5zm-14.5 14.5v-1.4364l4.09643-2.987 2.99567 1.9417c.2936.1903.6798.1523.9307-.0917l3.4772-3.3806 3.4772 3.3806.0228-.0234v2.5968c0 .2761-.2239.5-.5.5h-14c-.27614 0-.5-.2239-.5-.5z"></path></svg>',
	'align'				=> 'full',

));
acf_register_block_type(array(
		'name'              => 'hero-banner',
		'title'             => __('Hero Banner'),
		'description'       => __('A hero banner for landing pages'),
		'render_template'   => 'template-parts/blocks/hero-banner.php',
'category'          => 'formatting',
'icon' 				=> '<svg><path d="m7 6.5 4 2.5-4 2.5z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="m5 3c-1.10457 0-2 .89543-2 2v14c0 1.1046.89543 2 2 2h14c1.1046 0 2-.8954 2-2v-14c0-1.10457-.8954-2-2-2zm14 1.5h-14c-.27614 0-.5.22386-.5.5v10.7072l3.62953-2.6465c.25108-.1831.58905-.1924.84981-.0234l2.92666 1.8969 3.5712-3.4719c.2911-.2831.7545-.2831 1.0456 0l2.9772 2.8945v-9.3568c0-.27614-.2239-.5-.5-.5zm-14.5 14.5v-1.4364l4.09643-2.987 2.99567 1.9417c.2936.1903.6798.1523.9307-.0917l3.4772-3.3806 3.4772 3.3806.0228-.0234v2.5968c0 .2761-.2239.5-.5.5h-14c-.27614 0-.5-.2239-.5-.5z"></path></svg>',
'align'				=> 'full',

));
acf_register_block_type(array(
		'name'              => 'accordion',
		'title'             => __('Accordion'),
		'description'       => __('An Accordion'),
		'render_template'   => 'template-parts/blocks/accordion.php',
'category'          => 'formatting',
'icon' 				=> '<svg><path d="M17.5 4v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V4H8v5a.5.5 0 0 0 .5.5h7A.5.5 0 0 0 16 9V4h1.5Zm0 16v-5a2 2 0 0 0-2-2h-7a2 2 0 0 0-2 2v5H8v-5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v5h1.5Z"></path></svg>',
'align'				=> 'full',

));
acf_register_block_type(array(
		'name'              => 'gallery',
		'title'             => __('Gallery (KWALL)'),
		'description'       => __('A gallery w/ thumbnails'),
		'render_template'   => 'template-parts/blocks/gallery.php',
'category'          => 'formatting',
'icon' 				=> '<svg><path d="M16.375 4.5H4.625a.125.125 0 0 0-.125.125v8.254l2.859-1.54a.75.75 0 0 1 .68-.016l2.384 1.142 2.89-2.074a.75.75 0 0 1 .874 0l2.313 1.66V4.625a.125.125 0 0 0-.125-.125Zm.125 9.398-2.75-1.975-2.813 2.02a.75.75 0 0 1-.76.067l-2.444-1.17L4.5 14.583v1.792c0 .069.056.125.125.125h11.75a.125.125 0 0 0 .125-.125v-2.477ZM4.625 3C3.728 3 3 3.728 3 4.625v11.75C3 17.273 3.728 18 4.625 18h11.75c.898 0 1.625-.727 1.625-1.625V4.625C18 3.728 17.273 3 16.375 3H4.625ZM20 8v11c0 .69-.31 1-.999 1H6v1.5h13.001c1.52 0 2.499-.982 2.499-2.5V8H20Z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>',
'align'				=> 'full',

));
			}
		}

        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Theme Options',
                'icon_url' => 'dashicons-art',
            ));
        }