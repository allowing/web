<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/12
 * Time: 21:20
 */

namespace allowing\web;


interface ResponseInterface
{
    const FORMAT_HTML = 'html';
    const FORMAT_JSON = 'json';
    const FORMAT_RAW = 'raw';

    public function setData($data);

    public function getData();

    public function setFormat($format);

    public function getFormat();

    public function send();
}