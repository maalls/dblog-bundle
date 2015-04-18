<?php

namespace Maalls\DBLogBundle\Twig;
 

class TimeagoExtension extends \Twig_Extension
{
    
    public function __construct()
    {

        
    }
 
    public function getName()
    {
        return 'timeago_extension';
    }
 
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('ago', array($this, 'getTimeAgo')),
            
        );
    }

    public function getTimeAgo(\Datetime $date) {

        $time = time() - $date->getTimestamp(); 

        $units = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        $aMap = array("year" => "a", "month" => "a", "week" => "a", "day" => "a", "hour" => "an", "minute" => "a", "second" => "a");

        foreach ($units as $unit => $label) {
        
            if ($time < $unit) continue;
        
            $numberOfUnits = floor($time / $unit);
            $a = $aMap[$label];

            return ($label == 'second')? 'a few seconds ago' : 
               (($numberOfUnits>1) ? $numberOfUnits : $a)
               .' '.$label.(($numberOfUnits>1) ? 's' : '').' ago';

        }

    }

}
 