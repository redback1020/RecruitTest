<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/2/25
 * Time: 17:45
 */
namespace MyGreeter;
use TestUnit\MyGreeter_Client_Test;

class GreeterUnitTest extends \PHPUnit_Extensions_PhptTestSuite {

    public function __construct(){
        $this->addTestSuite(MyGreeter_Client_Test::class);
    }

    public static function suite() {
        return new self();
    }

}

