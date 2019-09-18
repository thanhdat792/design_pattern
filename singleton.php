<?php
  /*  Singleton pattern
    - Loại pattern : Creational Design Pattern      
    - Áp dụng : Khi muốn một lớp chỉ có một thể hiện (instance) duy nhất (Ví dụ lớp quản lý kết nối CSDL chỉ cần tạo duy nhất 1 đối tượng dùng chung cho toàn bộ website)
    - Thành phần :  
        + 1 biến static _instance (mức truy cập private) dùng để kiểm tra xem một instance của class đã được tạo ra hay chưa
        + hàm getInstance trả về instance của class (kiểm tra biến _instance nếu chưa tồn tại thì sẽ tạo ra 1 instance và trả về instance đó)
  */
  class ConnectDb {
    private static $instance = null;
    private $conn;
    
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'timeline';
    // gọi $obj = new ConnectDb(); sẽ bị lỗi
    private function __construct() {
     
    }
    
    public static function getInstance() {
      if (!self::$instance) {
        self::$instance = new ConnectDb();
      }
      return self::$instance;
    }

    public function getConnection() {
      $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbName) or die ('Không thể kết nối tới database');
      return $this->conn;
    }
  }

  $instance1 = ConnectDb::getInstance();
  $conn1 = $instance1->getConnection();
  var_dump($conn1);

  $instance2 = clone $instance1;
  $conn2 = $instance2->getConnection();
  var_dump($conn2);
?>