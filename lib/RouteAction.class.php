<?php
/**
 *
 *@copyright Powered By  HeraldStudio SEU
 *@author GuoGengrui <tairyguo@gmail.com>
 *@version 1.0.0
 *@filename RouteAction.class.php
 *
 * */
require_once 'ActivityModel.class.php';

class RouteAction{
	private $paraResult;
	public function main(){
		$requestUrl = $_SERVER["REQUEST_URI"];
		$parameter = explode('index.php', $requestUrl);
		$parameter = $parameter[1];
		$paraItem = explode('/', $parameter);
		$paraResult = array();
		for( $i = 1; isset($paraItem[$i]); $i++ ){
			$this -> paraResult[$paraItem[$i]] = $paraItem[++$i];
		}
		//print_r($paraResult);
		$this -> resolveCommand();
	}
	public function resolveCommand(){
		$RefreshObj = new ActivityModel();
		switch($this -> paraResult['command']){
		case 'select':
			$this -> selectOperate();
			break;
		case 'attentionleague':
			echo $RefreshObj -> attentionLeague($this -> paraResult['userid'], $this -> paraResult['leagueid']);
			break;
		case 'attentionactivity':
			echo $RefreshObj -> attentionactivity($this -> paraResult['userid'], $this -> paraResult['activityid']);
			break;
		case 'comment':
			echo "pinglun";
			break;
		case 'vote':
			echo "toupiao";
			break;
		default:
			echo "error";
			break;
		}
	}
	public function selectOperate(){
		$RefreshObj = new ActivityModel();	
		switch($this -> paraResult['selecoperate']){
		case 'refresh':
			echo $RefreshObj -> refresh();
			break;
		case 'getattentionleague':
			echo $RefreshObj -> getAttentionLeague($this -> paraResult['userid']);
			break;
		case 'getattentionactivity':
			echo $RefreshObj -> getAttentionActivity($this -> paraResult['userid']);
			break;
		case 'activitydetail':
			echo json_encode($RefreshObj -> getActivityInfo($this -> paraResult['activityid']));
			break;
		case 'getleagueactivity':
			echo $RefreshObj -> getLeagueActivity($this -> paraResult['leagueid']);
			break;
		case 'leaguezone':
			echo json_encode($RefreshObj -> getLeagueInfo($this -> paraResult['leagueid']));
			break;
		default: 
			echo "error";
			break;
		}
	}
























}