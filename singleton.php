<?php
  /*  Singleton pattern
    - Loại pattern : Creational Design Pattern      
    - Áp dụng : Khi muốn một lớp chỉ có một thể hiện (instance) duy nhất (Ví dụ lớp quản lý kết nối CSDL chỉ cần tạo duy nhất 1 đối tượng dùng chung cho toàn bộ website)
    - Thành phần :  
        + 1 biến static _instance (mức truy cập private) dùng để kiểm tra xem một instance của class đã được tạo ra hay chưa
        + hàm getInstance trả về instance của class (kiểm tra biến _instance nếu chưa tồn tại thì sẽ tạo ra 1 instance và trả về instance đó)
  */
  class Config {
    static private $_instance = NULL;
    private $_settings = array();
    // Phương thức này trả về một thực thể của class
    static function getInstance() {
      if (self::$_instance == NULL) {
        self::$_instance = new Config();
      }
      return self::$_instance;
    }

    // Phương thức này thiết lập cấu hình
    function set($index, $value) {
      $this->_settings[$index] = $value;
    }

    // Phương thức này lấy thiết lập cấu hình
    function get($index) {
      return $this->_settings[$index];
    }
  }
  // Tạo một đối tượng Config
  $config = Config::getInstance();

  // Thiết lập các giá trị trong thuộc tính cấu hình
  $config->set('database_connected', 'true');

  // In giá trị cấu hình
  echo '<p>$config["database_connected"]: ' . $config->get('database_connected') . '</p>';

  // Tạo một đối tượng thứ hai
  $test = Config::getInstance();
  echo '<p>$test["database_connected"]: ' . $test->get('database_connected') . '</p>';

  // Xóa các đối tượng sau khi sử dụng
  unset($config, $test);
?>