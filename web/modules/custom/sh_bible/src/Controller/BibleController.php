<?php

namespace Drupal\sh_bible\Controller;

use Drupal\Core\Controller\ControllerBase;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

/**
 * Class BibleController.
 */
class BibleController extends ControllerBase
{

    /**
     * Render.
     *
     * @return array
     *   Return Hello string.
     * @throws \MongoDB\Driver\Exception\Exception
     */
    public function render()
    {

        //Database::setActiveConnection('mongo');

        $uri = "mongodb://shimon:1234@localhost:27017/sefaria";
        $manager = new Manager($uri);
        $query = new Query(
            [
                'title' => 'Genesis',
                'versionTitle' =>"Tanach with Ta'amei Hamikra",
                'language' => 'he'
            ]
        );
        $cursor = $manager->executeQuery('sefaria.texts', $query);
        header("Content-type: application/json; charset=utf-8");
        header('Content-Encoding: UTF-8');

        $json = json_encode($cursor->toArray(),JSON_UNESCAPED_UNICODE);

        echo $json;
        die;
    }

}
