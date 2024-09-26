<?php

namespace BuyXGetX;

class Admin{
    public function __construct(){
        add_action('woocommerce_product_options_general_product_data',[$this,'add_custom_field']);
        add_action('woocommerce_process_product_meta',[$this,'save_custom_field']);
    }
    public function add_custom_field(){
        woocommerce_wp_checkbox([
            'id' => '_buyx_getx_enabled',
            'label' => __('Enable Buy X Get X offer','buyx-getx'),
            'desc_tip'=> true,
            'description'=> __('Enable Buy X Get x offer for this produict','buyx-getx')
        ]);
    }

    public function save_custom_field($post_id){
        //$post=get_post($post_id);
        $enabled= isset($_POST['_buyx_getx_enabled']) ? 'yes' : 'no' ;
        update_post_meta($post_id, '_buyx_getx_enabled',$enabled);
    }
    
}