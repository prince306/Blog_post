<?php
class HomeController {
    public $result;
    public $totalPage;
    public function __construct() {
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = $_POST['search'];
            $this->result = fn_search($search);
        } else {
            $this->result = fn_showHomeContent();
        }
       $this->total_pages=fn_pagination();
    }
}
