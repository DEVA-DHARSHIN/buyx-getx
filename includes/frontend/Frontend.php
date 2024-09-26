<?php

namespace BuyXGetX;

class Frontend{
    public function __construct(){
        add_action('woocommerce_before_calculate_totals',[$this, 'apply_buyx_getx_offer'], 10 , 1);
        add_action('woocommerce_cart_calculate_fees',[$this, 'adjust_cart_totals'],10 ,1);
    }

    public function apply_buyx_getx_offer($cart){
        if(is_admin() && !defined('DOING_AJAX')){
            return;
        }

        foreach($cart->get_cart() as $cart_item_key => $cart_item){
            $product_id = $cart_item['product_id'];
            $enabled= get_post_meta($product_id, '_buyx_getx_enabled',true);
            if($enabled === 'yes'){
                // $cart-> add_to_cart($product_id,1,0,[],[
                //     'buyx_getx_free' => true]
                $this->add_free_product_to_cart($cart,$product_id);
            }
        }
    }

    private function add_free_product_to_cart($cart,$product_id){
        $product_found=false;
        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            if (isset($cart_item['buyx_getx_free']) && $cart_item['product_id'] == $product_id) {
                $product_found = true;
                break;
            }
        }

        if(!$product_found){
            $cart_item_key = $cart->add_to_cart($product_id,1,0 , [] , ['buyx_getx_free' => true]);
            if($cart_item_key){
                $cart->get_cart()[$cart_item_key]['data']->set_price(0);
            }
        }

    }

    public function adjust_cart_totals($cart) {
        $discount = 0;

        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            if (isset($cart_item['buyx_getx_free']) && $cart_item['buyx_getx_free'] === true) {
                $discount += $cart_item['data']->get_regular_price();
            }
        }

        if ($discount > 0) {
            $cart->add_fee(__('Buy X Get X Discount', 'buyxgetx'), -$discount);
        }
    }



}