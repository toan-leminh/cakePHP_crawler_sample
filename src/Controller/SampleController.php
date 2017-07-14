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

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
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
        $amazonUrl = "https://www.amazon.co.jp/gp/search/ref=sr_adv_b/?page_nav_name=本・コミック・雑誌&__mk_ja_JP=カタカナ&unfiltered=1&search-alias=stripbooks&node=&field-title=__title__&field-author=__author__&field-keywords=&field-isbn=__isbn__&field-publisher=&x-genre=&field-binding_browse-bin=&x-age=&field-dateyear=2020&field-datemod=0&field-dateop=before&field-price=&field-pct-off=&emi=&sort=relevance-rank&Adv-Srch-Books-Submit.x=31&Adv-Srch-Books-Submit.y=5";
        if($this->request->is(['post', 'put'])){
            $dom = new Dom();
            $data = $this->request->data();

            $url = str_replace('__title__', $data['title'], $amazonUrl);
            $url = str_replace('__isbn__', $data['isbn'], $url);
            $url = str_replace('__author__', $data['author'], $url);

            debug($url);

            $dom->loadFromUrl($url);

            $contents = $dom->find('.s-result-list');
            foreach ($contents as $content){
                $html = $content->find('.s-access-title')->innerHtml;
                print_r($html);
            }
        }
    }
}
