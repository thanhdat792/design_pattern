<?php
// Builder 
interface Builder {
    public function setAccountNumber($accountNumber);
    public function setOwner($owner);
    public function setBranch($branch);
    public function setBalance($balance);
    public function setInterestRate($interestRate);
    public function build();
}
// ConcreteBuilder
class BankAccountBuilder implements Builder{
    private $accountNumber;
    private $owner;
    private $branch;
    private $balance;
    private $interestRate;

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
    public function setInterestRate($interestRate){
        $this->interestRate = $interestRate;
        return $this;
    }
    public function build(){
        return new BankAccount($this->accountNumber, $this->owner, $this->branch, $this->balance, $this->interestRate);
    }
}
// Product 
class BankAccount {
    private $accountNumber;
    private $owner;
    private $branch;
    private $balance;
    private $interestRate;

    public function __construct($accountNumber, $owner, $branch, $balance, $interestRate){
        $this->accountNumber = $accountNumber;
        $this->owner = $owner;
        $this->branch = $branch;
        $this->balance = $balance;
        $this->interestRate = $interestRate;
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
    public function getInterestRate(){
        return $this->interestRate;
    }
    public function showInfo(){
		print_r($this);
    }
}
// Director/ Client
$bankAccount = new BankAccountBuilder();
$bankAccount = $bankAccount->setOwner("Homer")->setBalance(100.00)->setInterestRate(2.5)->build();
$bankAccount->showInfo();