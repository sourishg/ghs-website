<?php

    session_start();

    class GHS {
        
        protected $_mysql;
        protected $_query;
        protected $_data = array();

        function __construct($host, $username, $password, $db) {
            $this->_mysql = mysql_connect($host, $username, $password);
            mysql_select_db($db, $this->_mysql);
        }
        function query($sql) {
            $this->_data = NULL;
            $this->_query = mysql_query($sql);
            return $this->_query;
        }
        function fetch($query) {
            while ($row = mysql_fetch_assoc($query)) {
                $this->_data[] = $row;
            }
            return $this->_data;
        }
        function num_rows($sql) {
            return mysql_num_rows($sql);
        }
        function secure_login($username, $password) {
            $sql = $this->query("SELECT * FROM users WHERE `username` = '$username'");
            if ($this->num_rows($sql) == 0) {
                return false;
            } else {
                $info = $this->fetch($sql);
                foreach ($info as $data) {
                    $check_p = $data['password'];
                }
                if ($check_p != $password) {
                    return false;
                } else {
                    return true;
                }
            }
        }
        function createPermalink($string) {
            $string = strtolower($string);
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            $string = preg_replace("/[\s-]+/", " ", $string);
            $string = preg_replace("/[\s_]/", "-", $string);
            return $string;
        }
        function getNameOfMainLink($id) {
            $sql = mysql_query("SELECT name FROM main_links WHERE id = '$id'");
            $row = mysql_fetch_assoc($sql);
            return stripslashes($row['name']);
        }
        function getMidFromSid($sid) {
            $sql = mysql_query("SELECT mid FROM sub_links WHERE id = '$sid'");
            $row = mysql_fetch_assoc($sql);
            return $row['mid'];
        }
        function getContentId($mid, $sid) {
            $sql = mysql_query("SELECT id FROM content WHERE mid = '$mid' AND sid = '$sid'");
            $row = mysql_fetch_assoc($sql);
            return $row['id'];
        }
        function getSubLinkTitle($sid) {
            $sql = mysql_query("SELECT name FROM sub_links WHERE id = '$sid'");
            $row = mysql_fetch_assoc($sql);
            return stripslashes($row['name']);
        }
        function getImgLink($id) {
            $sql = mysql_query("SELECT link FROM images WHERE id = '$id'");
            $row = mysql_fetch_assoc($sql);
            return stripslashes($row['link']);
        }
        function getImgTitle($id) {
            $sql = mysql_query("SELECT title FROM images WHERE id = '$id'");
            $row = mysql_fetch_assoc($sql);
            if (!trim($row['title'])) {
                return 0;
            } else {
                return stripslashes($row['title']);
            }
        }
    }
?>
