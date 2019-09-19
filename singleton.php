<?php
  /*  Singleton pattern
    - Loại pattern : Creational Design Pattern      
    - Áp dụng : Khi muốn một lớp chỉ có một thể hiện (instance) duy nhất (Ví dụ lớp quản lý kết nối CSDL chỉ cần tạo duy nhất 1 đối tượng dùng chung cho toàn bộ website)
    - Thành phần :  
        + 1 biến static _instance (mức truy cập private) dùng để kiểm tra xem một instance của class đã được tạo ra hay chưa
        + hàm getInstance trả về instance của class (kiểm tra biến _instance nếu chưa tồn tại thì sẽ tạo ra 1 instance và trả về instance đó)
  */
  class connectDb {
    private static $_instance = null;
    private $_connect;
    private function __construct() {
      $this->_connect = mysqli_connect('localhost','root','','fb') or die('cannot connect mysql');
    }
    public static function getInstance() {
      if (!self::$_instance) {
        self::$_instance = new connectDb();
      }
      return self::$_instance;
    }
    public function getConnectDb() {
      return $this->_connect;
    }
  }

  $obj = connectDb::getInstance();
  $connect = $obj-> getConnectDb();
  print_r($connect);

  $obj1 = connectDb::getInstance();
  $connect1 = $obj1-> getConnectDb();
  print_r($connect1);
?>