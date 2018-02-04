<?php

class circle{
    const pi=3.141;

    public function area($radius){
        return self::pi*($radius*$radius);
    }
}


/*class circle{
    const pi = 3.141;
    public function Area ($radius){
        return self::pi*($radius*$radius);
    }
}

$circle=new circle;
echo $circle->Area(100);   */
$circle=new circle;
echo $circle->area(5);
?>

