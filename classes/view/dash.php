<?php

$all = get_option($this->plugin_name, array() );
//print_r($_GET);

?>


<div class="ui fluid container" style="margin:10px;">


<div class="ui items">
  <div class="item">
    <div class="ui tiny image">
    <a href="http://thewpfox.com"><img src="<?php echo WPFOX_PLUGIN_IMG ;?>wpfox_logo.png" width="80" height="80" alt="Thewpfox.com"></a>
    </div>
    <div class="middle aligned content">
      <div class="header">
     <h2> <?php echo __('WPFOX Info box rotator','wpfox-infobox-rotator'); ?> <h2>
      
      </div>
      <div class="description">
        <p> Version : <?php echo $this->_version; ?></p>
      </div>
    </div>
  </div>
</div>

<div class="ui two column divided grid">
    <div class="row">
    <div class="eleven wide column">
<h4 class="ui dividing header"> <?php echo __('Preview','wpfox-infobox-rotator'); ?></h4>
	
<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                  $this->admin_notice();            
            } ?>

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

    <form class="ui form" method="post" action="options.php" enctype="multipart/form-data" id="save-text">

        <?php settings_fields($this->plugin_name.'_group'); ?>
     <div class="field">
     <h4 class="ui dividing header"> <?php echo __('Text content','wpfox-infobox-rotator'); ?></h4>
    <div class="ui pointing below label">
      <?php echo __('First text','wpfox-infobox-rotator'); ?>
    </div>
    
    <div class="ui left action input with-icon">
  <button type="button"  class="ui teal labeled primary icon button icon-picker" data-target="#icon_picker_icon1" <?php echo $all['icon1']; ?>>
  <i class="<?php echo $all['icon1']; ?>"></i>
  <?php echo __('First text icon','wpfox-infobox-rotator'); ?>
  </button>
  <input type="text" name="<?php echo $this->plugin_name ; ?>[text1]" placeholder=" <?php echo __('First text','wpfox-infobox-rotator'); ?>" value="<?php echo $all['text1'] ;  ?>">
  <input  type="hidden" id="icon_picker_icon1" name="<?php echo $this->plugin_name ; ?>[icon1]" value="<?php echo esc_attr($all['icon1']); ?>"/>
</div>

    <div class="ui divider"></div>
    <div class="field">
    
    <div class="ui pointing below label">
    <?php echo __('Second text','wpfox-infobox-rotator'); ?>
    </div>
    <div class="ui left action input with-icon">
  <button type="button" class="ui teal labeled primary icon button icon-picker"  data-target="#icon_picker_icon2" <?php echo $all['icon2'] ;  ?>>
  <i class="<?php echo $all['icon2']; ?>"></i>
  <?php echo __('Second text icon','wpfox-infobox-rotator'); ?>
  </button>
  <input type="text" name="<?php echo $this->plugin_name ; ?>[text2]" placeholder=" <?php echo __('Second text','wpfox-infobox-rotator'); ?>" value="<?php echo $all['text2'] ;  ?>">
  <input  type="hidden" id="icon_picker_icon2" name="<?php echo $this->plugin_name ; ?>[icon2]" value="<?php  echo esc_attr($all['icon2'] );  ?>"/>
</div>
    </div>
    <div class="ui divider"></div>
    <div class="field">
    
    <div class="ui pointing below label">
    <?php echo __('Third text','wpfox-infobox-rotator'); ?>
    </div>
    <div class="ui left action input with-icon">
  <button type="button" class="ui teal labeled primary icon button icon-picker" data-target="#icon_picker_icon3" <?php echo $all['icon3'] ; ?>>
  <i class="<?php echo $all['icon3']; ?>"></i>
  <?php echo __('Third text icon','wpfox-infobox-rotator'); ?>
  </button>
  <input type="text" name="<?php echo $this->plugin_name ; ?>[text3]" placeholder="<?php echo __('Third text','wpfox-infobox-rotator'); ?>" value="<?php echo $all['text3'] ;  ?>">
  <input  type="hidden" id="icon_picker_icon3" name="<?php echo $this->plugin_name ; ?>[icon3]" value="<?php echo esc_attr($all['icon3'] );  ?>"/>
</div>
    </div>
    <h4 class="ui dividing header"><?php echo __( 'Size and alignement','wpfox-infobox-rotator'); ?></h4>
    <div class="fields">
    <div class="field six wide">
    <div class="ui pointing below label">
    <?php echo __( 'Font size','wpfox-infobox-rotator'); ?>
    </div>
    <div class="ui right labeled input">
  <input type="number" name="<?php echo $this->plugin_name ; ?>[font_size]" placeholder="" value="<?php echo $all['font_size'] ;  ?>">
  <div class="ui basic label">
    px
  </div>
</div>
</div>
<div class="field six wide">
  <div class="ui pointing below label">
  <?php echo __( 'Icon size','wpfox-infobox-rotator'); ?>
    </div>
    <div class="ui right labeled input">
  <input type="number" name="<?php echo $this->plugin_name ; ?>[icon_size]" placeholder="" value="<?php echo $all['icon_size'] ;  ?>">
  <div class="ui basic label">
   px
  </div>
</div>
</div> 
<div class="field six wide ">
  <div class="ui pointing below label">
  <?php echo __( 'Text alignment','wpfox-infobox-rotator'); ?>
    </div>
    <select class="ui dropdown" name="<?php echo $this->plugin_name ; ?>[text_align]">
                  <option <?php if ($all['text_align']== 'left' ) echo 'selected' ; ?> value="left">Left</option>
                  <option <?php if ($all['text_align']== 'center' ) echo 'selected' ; ?> value="center">Center</option>
                  <option <?php if ($all['text_align']== 'right' ) echo 'selected' ; ?> value="right">Right</option>
</select>
</div>

</div>

    <h4 class="ui dividing header"><?php echo __( 'Font and colors','wpfox-infobox-rotator'); ?></h4>
    <div class="fields">
    <div class="field five wide">
    <div class="ui pointing below  label">
    <?php echo __( 'Background color','wpfox-infobox-rotator'); ?>
    </div>
    <input class="color-field" type="text" name="<?php echo $this->plugin_name ; ?>[bg_color]" value="<?php echo $all['bg_color'] ;  ?>">
    </div>
    <div class="field five wide ">
    <div class="ui pointing below label">
    <?php echo __( 'Text color','wpfox-infobox-rotator'); ?>
    </div>
    <input class="color-field" type="text" name="<?php echo $this->plugin_name ; ?>[text_color]" value="<?php echo $all['text_color'] ;  ?>">
    </div>
    <div class="field five wide">
    <div class="ui pointing below label">
    <?php echo __( 'Font','wpfox-infobox-rotator'); ?>
    </div>
    <input id="font" type="text" name="<?php echo $this->plugin_name ; ?>[text_font]" value="<?php echo $all['text_font'] ;  ?>">
    </div>
    
    <div class="field five wide">
    <div class="ui pointing below label">
    <?php echo __( 'Animations','wpfox-infobox-rotator'); ?>
    </div>
    <select class="ui dropdown" name="<?php echo $this->plugin_name ; ?>[animation]">
    
                  <option <?php if ($all['animation']== 'basic' ) echo 'selected' ; ?>  value="basic">Basic</option>
                  <option <?php if ($all['animation']== 'fade' ) echo 'selected' ; ?> value="fade">Fade</option>
            
</select>
    </div>
    </div>
    <h4 class="ui dividing header"><?php echo __( 'Save changes','wpfox-infobox-rotator'); ?></h4>
    <div class="field">
        <button type="submit" name="submit" form="save-text" id="submit" class="ui labeled icon primary button"><?php echo __( 'Save changes','wpfox-infobox-rotator'); ?>
        <i class="save icon"></i></button>

        </div>
    </form>

</div>
</div>
<div class=" four wide column" >
<h4 class="ui dividing header"><?php echo __( 'FAQ','wpfox-infobox-rotator'); ?></h4>
<div class="ui orange  segment">
  <div class="ui orange  accordion">
    <div class="active title">
      <i class="dropdown icon"></i>
      What is a InfoBox rotator?
    </div>
    <div class="active content ">
      <p>Woocommerce InfoBox rotatr is infobox widget rotator on the single product page , see <a href="https://thewpfox.com/product/infobox-demo/" target="_blank">demo</a> for example </p>
    </div>
    <div class="title">
      <i class="dropdown icon"></i>
     Is InfoBox rotator free ?
    </div>
    <div class="content">
      <p> YES, Enjoy it ;)</p>
    </div>
    <div class="title">
      <i class="dropdown icon"></i>
      I need support ?
    </div>
    <div class="content">
      <p>please visit <a href="https://thewpfox.com/contact-us" target="_blank">The wpfox</a></p>
    </div>
  </div>
</div>
    </div>
</div>
</div>
</div>


<script>
jQuery(document).ready(function($) {
     $('.color-field').wpColorPicker();
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
    $('#font').fontselect({
   systemFonts: false,
   placeholderSearch: 'Type to search...',
   lookahead: 4
})
.on('change', function() {
   applyFont(this.value);
});
function applyFont(font) {
		font = font.replace(/\+/g, ' ');
		font = font.split(':');
		var fontFamily = font[0];
		var fontWeight = font[1] || 400;
		$('.wpfox-info').css({fontFamily:"'"+fontFamily+"'", fontWeight:fontWeight});
	}
  $('.ui.dropdown')
  .dropdown()
;
$('.ui.accordion')
  .accordion()
;
setTimeout(function() {
    $('.message').fadeOut("slow");
}, 2000); 
});
</script>
