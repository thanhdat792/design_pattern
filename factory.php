<?php
    /*  Factory pattern
        - Loại pattern : Creational Design Pattern      
        - Áp dụng : khi muốn tạo ra nhiều đối tượng từ nhiều class khác nhau (dựa vào type param). 
    */

    /*
        Abstract Factory : giống như Factory cha dùng để tạo ra nhiều Factory con khác
    */    

    interface Shape {
        function draw();
    }

    class Circle implements Shape {
        public function draw() {
            echo "Draw circle";
        }
    }

    class Square implements Shape {
        public function draw() {
            echo "Draw square";
        }
    }

    class ShapeFactory {
        // Factory Method
        public function getShape($type) {
            switch ($type) {
                case 'square':
                    return new Square;
                    break;
                case 'circle':
                    return new Circle;
                    break;
                default:
                    return null;
                    break;
            }
        }
    }

    $factory = new ShapeFactory();
    // hình tròn Shape::CIRCLE
    $shapeCircle = $factory->getShape('circle');
    $shapeCircle->draw();
    
?>