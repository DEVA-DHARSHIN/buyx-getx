<?php
namespace BuyXGetX;

class BuyXGetX {
    public function init() {
        if(is_admin()){
            $this->load_admin();
        }else {
            $this->load_frontend();
        }
    }
    private function load_admin(){
        require_once plugin_dir_path(__FILE__). 'admin/Admin.php';
        new Admin();
    }

    private function load_frontend(){
        require_once plugin_dir_path(__FILE__). 'frontend/Frontend.php';
        new Frontend();
    }
}
