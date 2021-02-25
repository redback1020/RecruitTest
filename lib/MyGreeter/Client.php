<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/2/25
 * Time: 17:25
 */

namespace MyGreeter;

class Client{

    protected $dateTimeObject;

    public function __construct()
    {
        //set default timezone
        try{
            $time_zone_name = date_default_timezone_get();
            if( $time_zone_name  !== 'Asia/Shanghai'){
                $time_zone_name =  'Asia/Shanghai';
            }

            $this->dateTimeObject =  new \DateTime(null, new \DateTimeZone( $time_zone_name));

        }catch (\Exception $e){}

    }

    /*
        "Good morning" if it is after 12am and just before 12pm
        "Good afternoon" if it is after 12pm and just before 6pm
        "Good evening" if it is after 6pm and just before 12am
    */
    public function getGreeting(){
        $return_message = '';

        if($this->dateTimeObject instanceof \DateTime){
            $current_hour = $this->dateTimeObject->format('G');

            switch( $current_hour ) {
                case $current_hour >= 0 && $current_hour <= 11:
                    $return_message = 'Good morning';
                    break;
                case $current_hour >= 12 && $current_hour < 18:
                    $return_message = 'Good afternoon';
                    break;
                case $current_hour >= 18 && $current_hour <= 24:
                    $return_message = 'Good evening';
                    break;
                default:;
            }
        }

        return $return_message;
    }
}
