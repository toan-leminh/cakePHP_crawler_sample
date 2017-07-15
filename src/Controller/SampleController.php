<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use PHPHtmlParser\Dom;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class SampleController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function index()
    {
        $bookList = [];
        $amazonUrl = "https://www.amazon.co.jp/gp/search/ref=sr_adv_b/?";
        if($this->request->is(['post', 'put'])){
            $dom = new Dom();
            $data = $this->request->data();

            $queryData = [
                'field-isbn' => $data['isbn'],
                'field-title' => $data['title'],
                'field-author' => $data['author'],
                'search-alias' => 'stripbooks',
                'field-dateyear' => '2020'
            ];

            $amazonUrl .= http_build_query($queryData);

            $dom->load($amazonUrl);
            $contents = $dom->find('.s-result-item');
            foreach ($contents as $content){
                $book = [];
                $title = $content->find('.s-access-title');
                if($title){
                    $book['title'] = $title[0]->innerHtml;
                }else{
                    $book['title'] = '';
                }
                $price = $content->find('.a-color-price');
                if($price){
                    $book['price'] = trim($price[0]->innerHtml, " ￥ " );
                }else{
                    $book['price'] = '';
                }
                $book['isbn'] =$content->getAttribute('data-asin');
                $bookList[] = $book;
            }
        }
        $this->set(compact('bookList'));
    }
}
