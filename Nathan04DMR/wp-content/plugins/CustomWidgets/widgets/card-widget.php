<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Card_Widget extends \Elementor\Widget_Base { 
  

	public function get_name() {
		return 'card';
	}


	public function get_title() {
		return esc_html__( 'Cool Card', 'Custom-Widgets' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

    public function get_custom_help_url() {
        return 'https://www.youtube.com/watch?v=31g0YE61PLQ';
    }
    

	public function get_categories() {
		return [ 'general' ];
	}


	public function get_keywords() {
		return [ 'card', 'service', 'highlight', 'custom', 'cool' ];
	}


	protected function register_controls() { 
		// our control function code goes here.

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'Custom-Widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Card title', 'Custom-Widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your card title here', 'Custom-Widgets' ),
			]
		);


		$this->add_control(
			'card_description',
			[
				'label' => esc_html__( 'Card Description', 'Custom-Widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'placeholder' => esc_html__( 'Your card description here', 'Custom-Widgets' ),
			]
		);	

		$this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'Custom-Widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'title_options',
            [
                'label' => esc_html__( 'Title Options', 'Custom-Widgets' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'Custom-Widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00FFFF',
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} h3',
            ]
        );
        
        $this->add_control(
            'description_options',
            [
                'label' => esc_html__( 'Description Options', 'Custom-Widgets' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );      
    
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'Custom-Widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF00FF',
                'selectors' => [
                    '{{WRAPPER}} .card__description' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .card__description',
            ]
        ); 

        $this->end_controls_section();	
	}

    

	protected function render() { 

		
		$settings = $this->get_settings_for_display();


		$card_title = $settings['card_title'];
		$card_description = $settings['card_description'];

		?>

        <div class="card">
            <h3 class="card_title"><?php echo $card_title;  ?></h3>
            <p class= "card__description"><?php echo $card_description;  ?></p>
        </div>

        <?php
		

	}						


}