<?php

class Search
{
    public function __construct()
    {
    }

    /**
     * @param $title
     * @return array
     */
    public static function search($title)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM `product` WHERE `title` LIKE ?";

        $title = '%' . $title . '%';

        $result = $db->prepare($sql);
        $result->bind_param('s', $title);
        $result->execute();
        $result = $result->get_result();

        $rows = [];
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
}