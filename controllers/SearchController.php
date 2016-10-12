<?php

class SearchController
{
    /**
     * @return bool
     */
    public function actionResult()
    {
        $title = '';
        $isFound = false;

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];

            switch (iconv_strlen($title, 'UTF-8')){
                case iconv_strlen($title, 'UTF-8') < 4 :
                    echo 'идиот!';
                    echo iconv_strlen($title, 'UTF-8');
                    break;
                case iconv_strlen($title, 'UTF-8') > 64 :
                    echo 'негодяй!';
                    echo iconv_strlen($title, 'UTF-8');
                    break;
                default :
                    $searchItem = Search::search($title);
                    $isFound = !! $searchItem;
            }
        }

        require_once ROOT.'/views/search/result.php';
        return true;
    }
}