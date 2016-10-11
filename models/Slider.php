<?php

class Slider
{
    public static function getSlider()
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM `slider`';

        $result = $db->query($sql);

        $i = 0;
        $sliderItem = array();

        while ($row = $result->fetch_assoc()) {
            $sliderItem[$i]['id'] = $row['id'];
            $sliderItem[$i]['title'] = $row['title'];
            $sliderItem[$i]['description'] = $row['description'];
            $i++;
        }
        return $sliderItem;
    }
}