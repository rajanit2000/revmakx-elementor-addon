<?php
/**
 * Elementor Image List Widget.
 *
 * Elementor widget that inserts customized image list.
 *
 * @since 1.0.0
 */

namespace revmakx\widget;

class ImageListWidget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Image List widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Image List Widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image List widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image List Widget', 'revmakx' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Image List widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Image List widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register Image List widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'revmakx' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'list',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_content',
		                'label' => __('List Content', 'revmakx'),
		                'type' => \Elementor\Controls_Manager::TEXT,
		                'default' => __('List Item', 'revmakx'),
		                'label_block' => true,
		                'dynamic' => [
		                    'active' => true,
		                ],
		            ],
		            [
						'name' => 'list_icon',
		                'label' => __('List Icon', 'revmakx'),
		                'type' => \Elementor\Controls_Manager::MEDIA,
		                'default' => [
		                    'url' => \Elementor\Utils::get_placeholder_image_src(),
		                ],
		                'label_block' => true,
		                'dynamic' => [
		                    'active' => true,
		                ],
		            ],
	            ],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Image List widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

	
		echo '<div class="oembed-elementor-widget">';
		
		echo '<ul>';

		foreach( $settings['list'] as $item ){
			echo '<li><img src="' .$item['list_icon']['url']. '" style="width:20px;" />' . $item['list_content'] . '</li>';
		}

		echo '</ul>';

		echo '</div>';

	}

}