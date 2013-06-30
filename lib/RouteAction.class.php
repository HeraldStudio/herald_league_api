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
	private $RefreshObj;
	function __construct(){
		$this -> RefreshObj = new ActivityModel();
	}
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
		switch($this -> paraResult['command']){
		case 'select':
			$this -> selectOperate();
			break;
		case 'attentionleague':
			echo $this -> RefreshObj -> attentionLeague($this -> paraResult['userid'], $this -> paraResult['leagueid']);
			break;
		case 'attentionactivity':
			echo $this -> RefreshObj -> attentionactivity($this -> paraResult['userid'], $this -> paraResult['activityid']);
			break;
		case 'comment':
			echo $this -> RefreshObj -> addComment($this -> paraResult['userid'], $this -> paraResult['receiveid'], $this -> paraResult['receivetype'], $this -> paraResult['content'], isset($this -> paraResult['answer'])?$this -> paraResult['answer'] : 0);
			break;
		case 'vote':
			echo $this -> RefreshObj -> vote($this -> paraResult['voteid'], $this -> paraResult['userid'],$this -> paraResult['userip'], $this -> paraResult['itemid']);
			break;
		default:
			echo "error";
			break;
		}
	}
	public function selectOperate(){
		switch($this -> paraResult['selecoperate']){
		case 'refresh':
			echo $this -> RefreshObj -> refresh();
			break;
		case 'getattentionleague':
			echo $this -> RefreshObj -> getAttentionLeague($this -> paraResult['userid']);
			break;
		case 'getattentionactivity':
			echo $this -> RefreshObj -> getAttentionActivity($this -> paraResult['userid']);
			break;
		case 'activitydetail':
			echo json_encode($this -> RefreshObj -> getActivityInfo($this -> paraResult['activityid']));
			break;
		case 'getleagueactivity':
			echo $this -> RefreshObj -> getLeagueActivity($this -> paraResult['leagueid']);
			break;
		case 'leaguezone':
			echo json_encode($this -> RefreshObj -> getLeagueInfo($this -> paraResult['leagueid']));
			break;
		default: 
			echo "error";
			break;
		}
	}
























}
