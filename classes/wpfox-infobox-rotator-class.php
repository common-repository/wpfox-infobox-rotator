<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class WPFOX_INFOBOX_ROTATOR
{
    public $plugin_name = 'wpfox_infobox_rotator';
    public $_version   = '1.0.3';
    public $_token = 'wpfox';
     
    public function __construct()
    {
        //admin page
        register_activation_hook( WPFOX_PLUGIN_FILE, array($this,'wpfox_plugin_active'));
        register_activation_hook( WPFOX_PLUGIN_FILE, array($this,'wpfox_infobox_default_options' ));
        add_action('plugins_loaded', array($this,'wpfox_load_textdomain'));
        add_action('admin_menu', array( $this, 'register_text_rotator_menu' ), 999);
        add_action('admin_init', array($this,'register_wpfox_text_infobox'));
        add_action('admin_enqueue_scripts', array( $this, 'wpfox_register_admin_lib' ), 10, 1);
        //frontend
        add_action('wp_enqueue_scripts', array( $this, 'wpfox_frontend_style' ), 10, 1);
        add_action('wp_enqueue_scripts', array( $this, 'google_font' ), 10, 1);
        $this->assets_url = esc_url(trailingslashit(plugins_url('/view/', __FILE__)));
        add_action('woocommerce_after_add_to_cart_button', array($this,'print_infobox'));
      //  add_action( 'admin_notices', array($this,'sample_admin_notice__success') );
       
    }

public function wpfox_infobox_default_options(){
        $default = array(
            'text1'     => 'FREE SHIPPING & RETURN',
            'text2'   => 'MONEY BACK GUARANTEE',
            'text3'     => 'ONLINE SUPPORT 24/7',
            'icon1'   => 'fas fa-truck ',
            'icon2'     => 'fas fa-credit-card',
            'icon3'   => 'fas fa-headphones',
            'font_size'     => '18',
            'icon_size'   => '30',
            'text_align' => 'left',
            'bg_color'     => '#0E6EB8',
            'text_color'   => '#ffffff',
            'text_font' => 'ABeeZee',
            'animation' => 'fade'
        );
        update_option( $this->plugin_name, $default );
    }
   

    public function wpfox_load_textdomain() {
        load_plugin_textdomain( 'wpfox-infobox-rotator', false, dirname( WPFOX_BASENAME ) . '/lang' );
    }

    public function register_wpfox_text_infobox(){
        register_setting($this->plugin_name.'_group', $this->plugin_name.'');
    }
    

  
    public function register_text_rotator_menu()
    {
       // add_submenu_page( 'woocommerce', 'My Custom Submenu Page', 'My Custom Submenu Page', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
        add_submenu_page(
            'woocommerce',
            'Info box rotator',
            'Info box rotator',
            'manage_options',
            'wpfox_text_rotator',
            array( $this, 'wpfox_infobox_dash' )
         
        );
    }
  
    function wpfox_plugin_active(){
        $error='required <b>woocommerce</b> plugin.';	
        if ( !class_exists( 'WooCommerce' ) ) {
           die('Plugin NOT activated: ' . $error);
        }
    }
    public function wpfox_infobox_dash()
    {
        include_once 'view/dash.php';
    }

    public function wpfox_frontend_style()
    {
        /// fontawesome
        wp_register_style($this->_token . '-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', '', '5.13.0', 'all');
        wp_enqueue_style($this->_token .'-fontawesome');
        wp_register_style($this->_token . '-infobox-rotator',esc_url(WPFOX_PLUGIN_CSS). 'wpfox-infobox-rotator.css', array(), $this->_version);
        wp_enqueue_style($this->_token . '-infobox-rotator');
        wp_register_script($this->_token . '-rotator', esc_url(WPFOX_PLUGIN_JS).'jquery.quovolver.min.js', $this->_version);
        wp_enqueue_script($this->_token . '-rotator');
    } // End admin_enqueue_styles ()
    public function wpfox_register_admin_lib($hook)
    {

        if( $hook != 'woocommerce_page_wpfox_text_rotator') {
            return;
    }
        /// semantic UI
        wp_register_script($this->_token . '-semantic-js', esc_url(WPFOX_PLUGIN_LIB).'semantic/semantic.js', $this->_version);
        wp_enqueue_script($this->_token . '-semantic-js');
        wp_register_style($this->_token . '-semantic-css', esc_url(WPFOX_PLUGIN_LIB).'semantic/semantic.css', array(), $this->_version);
        wp_enqueue_style($this->_token . '-semantic-css');

        /// QUOVOLVER
        wp_register_script($this->_token . '-rotator', esc_url(WPFOX_PLUGIN_JS).'jquery.quovolver.min.js', $this->_version);
        wp_enqueue_script($this->_token . '-rotator');
        /// Wordpress Color picker
        wp_enqueue_style('wp-color-picker');

        /// google font picker
        wp_register_script($this->_token . '-font-picker-js', esc_url(WPFOX_PLUGIN_LIB).'font-picker/jquery.fontselect.min.js', $this->_version);
        wp_enqueue_script($this->_token . '-font-picker-js');
        wp_register_style($this->_token . '-font-picker-css', esc_url(WPFOX_PLUGIN_LIB).'font-picker/jquery.fontselect.min.css', array(), $this->_version);
        wp_enqueue_style($this->_token . '-font-picker-css');
        /// WPFOX Text Rotator styles
        wp_register_style($this->_token . '-admin-css', esc_url(WPFOX_PLUGIN_CSS).'wpfox-infobox-rotator.css', array(), $this->_version);
        wp_enqueue_style($this->_token . '-admin-css');
        /// fontawesome
        wp_register_style($this->_token . '-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', '', '5.13.0', 'all');
        wp_enqueue_style($this->_token .'-fontawesome');

        /// icon picker
        wp_register_script( $this->_token .'-icon-picker', esc_url(WPFOX_PLUGIN_JS).'icon-picker.js', '1.0' );
        wp_enqueue_script($this->_token . '-icon-picker');
        wp_register_style($this->_token . '-icon-picker-css', esc_url(WPFOX_PLUGIN_CSS).'icon-picker.css', array(), $this->_version);
        wp_enqueue_style($this->_token . '-icon-picker-css');
    }

    public function admin_notice() {
        ?>
  <div class="ui positive message">
  <div class="header">
   Settings are saved 
  </div>
  </div>
        <?php
    }
  

    public function google_font()
    {
        $all = get_option($this->plugin_name, array());
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family='.$all['text_font'].'&display=swap', false);
    }
    public function print_infobox()
    {
        $all = get_option($this->plugin_name, array()); ?>

    

<div class="quovolve" id="wpfox-infobox" style="background-color:<?php echo $all['bg_color']; ?>; height: auto;">
        <div class="wpfox-info" style="text-align: <?php echo $all['text_align']; ?>;font-size:<?php echo $all['font_size']; ?>px;font-family:<?php echo $all['text_font']; ?>; font-weight: 400; color: <?php echo $all['text_color']; ?>; display: block;">
                <div class="rotator-text"><i style="font-size: <?php echo $all['icon_size']; ?>px;" class="<?php echo $all['icon1']; ?>"></i><span><?php echo  $all['text1']; ?></span></div>
                <div class="clearfix"> </div>
    </div>
        <div class="wpfox-info" style="text-align:<?php echo $all['text_align']; ?>;font-size:<?php echo $all['font_size']; ?>px;font-family:<?php echo $all['text_font']; ?>; font-weight: 400; color:  <?php echo $all['text_color']; ?>; display: none;">
                <div class="rotator-text"><i style="font-size: <?php echo $all['icon_size']; ?>px;" class="<?php echo $all['icon2']; ?>"></i><span><?php echo $all['text2']; ?></span></div>
                <div class="clearfix"> </div>
    </div>
        <div class="wpfox-info" style="text-align:<?php echo $all['text_align']; ?>;font-size:<?php echo $all['font_size']; ?>px;font-family:<?php echo $all['text_font']; ?>; font-weight: 400;color:  <?php echo $all['text_color']; ?>; display: none;">
                <div class="rotator-text"><i style="font-size:<?php echo $all['icon_size']; ?>px;" class="<?php echo $all['icon3']; ?>"></i><span><?php echo $all['text3']; ?></span>            
              </div>
                <div class="clearfix"> </div>
    </div>
    
</div>

<script>
jQuery(document).ready(function($) {
    (function () {
        

        $('#wpfox-infobox').show().quovolver({
            children        : '.wpfox-info',
            transition :'<?php echo $all['animation']; ?>',
            equalHeight     : true,
            pauseOnHover    : false,
            autoPlaySpeed   : '4000',
            transitionSpeed : 300
        });
    })();
});
</script>
    
    
    <?php
    }
}


new WPFOX_INFOBOX_ROTATOR();


