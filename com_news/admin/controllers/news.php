<?php
/**
 * Created by PhpStorm.
 * User: rufel
 * Date: 02.05.2018
 * Time: 14:20
 */
defined('_JEXEC') or exit();

class NewsControllerNews extends JControllerAdmin {

	public  function getModel($name = 'Item', $prefix = 'NewsModel', $config = array()) {
		return parent::getModel($name, $prefix, $config);
	}
}