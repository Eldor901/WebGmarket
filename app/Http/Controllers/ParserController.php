<?php
/**
 * Created by PhpStorm.
 * User: msi gf
 * Date: 24.05.2019
 * Time: 9:26
 */

namespace App\Http\Controllers;
use App\Product;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Symfony\Component\DomCrawler\Crawler;


class ParserController
{

    public function getContentSportMaster(Request $request)
    {
        ini_set('max_execution_time', 280);
        for ($numPage  = 1; $numPage <= 4; $numPage++ ){
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $url = 'https://www.sportmaster.ru/catalog/zhenskaya_obuv/krossovki/?page='.$numPage;
            $res = $client->request('GET', $url);

            $html = '' . $res->getBody();
            $crawler = new Crawler($html);


            $products = $crawler->filter('.sm-category__item')->each(function (Crawler $node, $i) {
                $image = $node->filter('img')->attr('src');
                $title = $node->filter('h2')->text();
                $price = $node->filter('.sm-category__item-actual-price')->text() . 'P';

                if (!empty($image) and !empty($title) and !empty($price)) {

                    $product = [
                        'title' => $title,
                        'description' => 'самые лутшие' . ' ' . $title . 'Если нашли дешевле мы вернем ваши денги',
                        'image' => $image,
                        'price' => $price,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                        'isApproved' => '1'
                    ];

                    return $product;
                }
            });

            $file = fopen('sportMaster.csv', 'a') or die("Cannot find file.");
            if ($file) {
                foreach ($products as $product) {
                    $image_content = file_get_contents($product['image']);
                    $img_link = uniqid();
                    file_put_contents('storage/uploadSportmaster/' . $img_link . '.jpg', $image_content);
                    $product['image'] = 'uploadSportmaster/' . $img_link . '.jpg';
                    fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                    fputcsv($file, array($product['title'], $product['description'], $product['image'], $product['price'], $product['created_at'], $product['updated_at'], $product['isApproved']
                    ));
                }
            } else {
                echo "Cannot find file";
            }
            fclose($file);

            echo $numPage;
        }

        echo 'finished';
    }

}