<?php
	/*  Facade Pattern
		- Loại :  Structural Design Pattern (xử lý cấu trúc đối tượng)
		- Mục đích : Khi sử dụng 1 chức năng thay vì gọi nhiều phương thức từ nhiều class khác nhau 
		ta sẽ nhóm chúng lại vào 1 phương thức trong 1 class
	*/
	class OrderFacade {
        private product;
        public function __construct($productId) {
            $this->product = Product::find($productId);
        }
        public function generateOrder() {
            if ($this->checkQuantity()) {
                $this->addToCart();
                $this->calulateShipping();
                $this->applyDiscount();
                $this->placeOrder();
            }
        }
        private function addToCart () {
            $cart = new Cart();
            $cart->addItem($this->product);
        }
        private function checkQuantity() {
            return $this->product->count() != 0 ? true : false;
        }
        private function calulateShipping() {
            $shipping = new ShippingCharge($this->product);
            $shipping->calculateCharge();
        }
        private function applyDiscount() {
            $discount = new Discount();
            $discount->applyDiscount($this->product);
        }
        private function placeOrder() {
            $order = new Order();
            $order->generateOrder();
        }
    }
    // gọi 
    $productId = $_GET['productId'];
	$order = new OrderFacade($productId);
	$order->generateOrder()