<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

// MYSQL
class MyDB
{
    var $dblogin = "denicgogolev5"; // ВАШ ЛОГИН К БАЗЕ ДАННЫХ
    var $dbpass = "mama1981"; // ВАШ ПАРОЛЬ К БАЗЕ ДАННЫХ
    var $db = "mysite"; // НАЗВАНИЕ БАЗЫ ДЛЯ САЙТА
    var $dbhost="mysql.denicgogolev5.myjino.ru";

    var $link;
    var $query;
    var $err;
    var $result;
    var $data;
    var $fetch;

    function connect() {
        $this->link = mysql_connect($this->dbhost, $this->dblogin, $this->dbpass);
        mysql_select_db($this->db);
        mysql_query('SET NAMES utf8');
    }

    function close() {
        mysql_close($this->link);
    }

    function run($query) {
        $this->query = $query;
        $this->result = mysql_query($this->query, $this->link);
        $this->err = mysql_error();
    }
    function row() {
        $this->data = mysql_fetch_assoc($this->result);
    }
    function fetch() {
        while ($this->data = mysql_fetch_assoc($this->result)) {
            $this->fetch = $this->data;
            return $this->fetch;
        }
    }
    function stop() {
        unset($this->data);
        unset($this->result);
        unset($this->fetch);
        unset($this->err);
        unset($this->query);
    }
}