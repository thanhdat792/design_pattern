<?php
	class StockItem {

	    private $quantity;
	    private $status;

	    public function __construct($quantity, $status){
	        $this->quantity = $quantity;
	        $this->status   = $status;
	    }
	    public function getQuantity(){
	        return $this->quantity;
	    }
	    public function getStatus(){
	        return $this->status;
	    }
	}

	class Product {
	    private $stockItem;
	    private $code;

	    public function __construct($code, StockItem $stockItem){
	        $this->stockItem   = $stockItem;
	        $this->code        = $code;
	    }
	    public function getStockItem(){
	        return $this->stockItem;
	    }
	    public function getCode(){
	        return $this->code;
	    }
	}

	$stockItem = new StockItem(50, "Áo Dài");
	$product = new Product("101010", $stockItem);
	print_r($product->getStockItem());

/*
- aaaa
- Dependency Inversion: Đây là một nguyên lý để thiết kế và viết code.
- Inversion of Control: Đây là một design pattern được tạo ra để code có thể tuân thủ nguyên lý Dependency Inversion. Có nhiều cách hiện thực pattern này: ServiceLocator, Event, Delegate, … Dependency Injection là một trong các cách đó.
- Dependency Injection: Đây là một cách để hiện thực Inversion of Control Pattern.Các module phụ thuộc (dependency) sẽ được inject vào module cấp cao.
*/

/* có 3 cách để triển khai Dependency Injection

----> Constructor Injection : truyền dependency vào class khác thông qua hàm construct
	class Product {
	    private $stockItem;
	    private $code;

	    public function __construct($code, StockItem $stockItem){
	        $this->stockItem   = $stockItem;
	        $this->code        = $code;
	    }

	    public function getStockItem(){
	        return $this->stockItem;
	    }

	    public function getCode(){
	        return $this->code;
	    }
	}

----> Setter Injection : truyền dependency vào class khác thông qua hàm set
	class Product {
	    private $stockItem;
	    private $code;

	    public function __construct($code){
	        $this->code        = $code;
	    }
	    public function getStockItem(){
	        return $this->stockItem;
	    }
	    public function getCode(){
	        return $this->code;
	    }
	    public function setStockItem(StockItem $stockItem){
	        $this->stockItem = $stockItem;
	    }
	}

	$stockItem = new StockItem(50, "Áo Dài");
	$product = new Product("101010");
	$product->setStockItem($stockItem);
	print_r($product->getStockItem());

----> Interface Injection : truyền dependency vào class khác thông qua interface 
	interface ProductInterface {
	    public function getStockItem();
	    public function setStockItem(StockItem $stockItem);
	} 
