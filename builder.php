<?php
    /*  Facade Pattern
        - Loại : Creational Design Pattern
        - Cách dùng :   đối tượng được khởi tạo từng phần thông qua hàm setter 
        - Thành phần :  + Builder : khai báo phương thức tạo đối tượng
                        + ConcreteBuilder : implements hoặc kế thừa Builder 
                          để triển khi chi tiết các phương thức tạo đối tượng
                        + Product : đối tượng cần tạo
                        + Director/ Client gọi đến ConcreteBuilder để khởi tạo đối tượng

    */

// Builder 
interface Builder {
    public function setAccountNumber($accountNumber);
    public function setOwner($owner);
    public function setBranch($branch);
    public function setBalance($balance);
    public function build();
}
// ConcreteBuilder
class BankAccountBuilder implements Builder{
    private $accountNumber;
    private $owner;
    private $branch;
    private $balance;

    public function setAccountNumber($accountNumber){
        $this->accountNumber = $accountNumber;
        return $this;
    }
    public function setOwner($owner){
        $this->owner = $owner;
        return $this;
    } 
    public function setBranch($branch){
        $this->branch = $branch;
        return $this;
    }
    public function setBalance($balance){
        $this->balance = $balance;
        return $this;
    }
    public function build(){
        return new BankAccount($this->accountNumber, $this->owner, $this->branch, $this->balance);
    }
}
// Product 
class BankAccount {
    private $accountNumber;
    private $owner;
    private $branch;
    private $balance;

    public function __construct($accountNumber, $owner, $branch, $balance){
        $this->accountNumber = $accountNumber;
        $this->owner = $owner;
        $this->branch = $branch;
        $this->balance = $balance;
    }
    public function getAccountNumber(){
        return $this->accountNumber;
    }
    public function getOwner(){
        return $this->owner;
    }
    public function getBranch(){    
        return $this->branch;
    }
    public function getBalance(){
        return $this->balance;
    }
    public function showInfo(){
		print_r($this);
    }
}
// Director/ Client
$bankAccount = new BankAccountBuilder();
$bankAccount = $bankAccount->setOwner("Nguyen Thanh Dat")->setBalance(100.00)->setAccountNumber(11020071)->build();
$bankAccount->showInfo();