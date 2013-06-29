<?php
/**
 *
 *@copyright Powered by HeraldStudio SEU
 *@author GuoGengrui <tairyguo@gmail.com>
 *@version 1.0.0
 *@filename ActivityModel.class.php
 * 
 * */

require_once 'DbConnectModel.class.php';
define('MESSAGE_NUM', 10);

class ActivityModel{
	function __construct(){
		DbConnectModel::startConnect();
	}
	function __destruct(){
		DbConnectModel::closeConnect();
	}
	/**
	 *
	 *这个函数完成刷新活动内容 获取10条最新活动
	 *
	 *@return json 返回活动信息
	 *
	 * */
	public function refresh(){
		$sql = "select * from `lg_activity_info` order by `release_time` desc limit ".MESSAGE_NUM."";
		$query = mysql_query($sql) or die(mysql_error());
		$result = array();
		while($rs = mysql_fetch_array($query, MYSQL_ASSOC)){
			$rs['league_info'] = $this -> getLeagueInfo($rs['league_id']);
			array_push($result, $rs);
		}
		return json_encode($result);
	}
	/**
	 *
	 *这个函数返回一个指定id的活动
	 *
	 *@return array 返回查询信息
	 *
	 *
	 * */
	public function getActivityInfo($activityid){
		$sql = "select * from `lg_activity_info` where `id`='".$activityid."'";
		$query = mysql_query($sql);
		$result = array();
		while($rs = mysql_fetch_array($query, MYSQL_ASSOC)){
			$rs['league_info'] = $this -> getLeagueInfo($rs['league_id']);
			array_push($result,$rs);
		}
		return $result;
	}
	/**
	 *
	 *获取社团信息
	 *
	 *
	 *@return array 返回制定id的社团信息
	 *
	 * */
	public function getLeagueInfo($leagueid){
		$sql = "select * from `lg_league_info` where `uid`='".$leagueid."' limit 1";
		$query = mysql_query($sql) or die(mysql_error());
		$rs = mysql_fetch_array($query, MYSQL_ASSOC);
		return $rs;
	}
	/**
	 *
	 *获取社团列表
	 *
	 *@return json 返回社团信息
	 *
	 *
	 * */
	public function getLeagueList(){
		$sql = "select * from `lg_league_info`";
		$query = mysql_query($sql);
		$rs = mysql_fetch_array($query, MYSQL_ASSOC);
		return json_encode($rs);
	}
	/**
	 *
	 *获取关注的社团
	 *
	 *
	 *@return json
	 *
	 * */
	public function getAttentionLeague($userid){
		$sql = "select * from `lg_attention_league` where `user_id`='".$userid."'";
		$query = mysql_query($sql);
		$result = array();
		while($rs = mysql_fetch_array($query)){
			$rs['league_info'] = $this -> getLeagueInfo($rs['league_id']);
			array_push($result, $rs);
		}
		return json_encode($result);
	}
	/**
	 *
	 *获取我关注的活动
	 *
	 *
	 *@return json
	 *
	 * */
	public function getAttentionActivity($userid){
		$sql = "select * from `lg_attention_activity` where `user_id`='".$userid."'";
		$query = mysql_query($sql);
		$result = array();
		while($rs = mysql_fetch_array($query)){
			$rs['activity_info'] = $this -> getActivityInfo($rs['activity_id']);
			array_push($result, $rs);
		}
		return json_encode($result);
	}


















}
