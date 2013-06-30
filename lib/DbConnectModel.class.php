<?php
/**
 *
 *@copyrighe Powered by HeraldStudio SEU
 *@author GuoGengrui <tairyguo@gmail.com>
 *@todo 连接数据库
 *@version 1.0.0
 *@filename DbConnectModel.class.php
 * 
 * */
class DbConnectModel{
	private static $conn;
	public static function startConnect(){
		self::$conn = mysql_connect("localhost", "root", "ggr940110,.");
		mysql_select_db("herald_league");
		mysql_query("set names utf8");
	}
	public static function closeConnect(){
		mysql_close(self::$conn);
	}
}
