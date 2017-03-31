<?php
namespace App\Model\Generators;

class GeoLocator extends \Yandex\Geo\Api {

    protected $_version = '1.x';
    protected $_filters = array();
    protected $_response;

    public function load(array $options = []) {
        $apiUrl = sprintf('https://geocode-maps.yandex.ru/%s/?%s', $this->_version, http_build_query($this->_filters));
		$data = file_get_contents($apiUrl);
        $data = json_decode($data, true);
        if (empty($data)) {
            $msg = sprintf('Can\'t load data by url: %s', $apiUrl);
            throw new \Yandex\Geo\Exception($msg);
        }

        $this->_response = new \Yandex\Geo\Response($data);

        return $this;
    }


}
