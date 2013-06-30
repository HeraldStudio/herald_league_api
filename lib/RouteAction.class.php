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
		for( $i = 1; isset($paraItem[$i+1]); $i++ ){
			$this -> paraResult[$paraItem[$i]] = $paraItem[++$i];
		}
		$this -> resolveCommand();
	}
	public function resolveCommand(){
		switch($this -> paraResult['command']){
		case 'select':
			$this -> selectOperate();
			break;
		case 'attentionleague':
			if(!isset($this -> paraResult['userid'])){
				echo "USERIDERROR";
				return;
			}
			if(!isset($this -> paraResult['leagueid'])){
				echo "LEAGUEIDERROR";
				return;
			}
			echo $this -> RefreshObj -> attentionLeague($this -> paraResult['userid'], $this -> paraResult['leagueid']);
			break;
		case 'attentionactivity':
			if(!isset($this -> paraResult['userid'])){
				echo "USERIDERROR";
				return;
			}
			if(!isset($this -> paraResult['activityid'])){
				echo "ACTIVITYIDERROR";
				return;
			}
			echo $this -> RefreshObj -> attentionactivity($this -> paraResult['userid'], $this -> paraResult['activityid']);
			break;
		case 'comment':
			if(!isset($this -> paraResult['senderid'])){
				echo "SENDERIDERROR";
				return;
			}
			echo $this -> RefreshObj -> addComment($this -> paraResult['senderid'], $this -> paraResult['sendertype'] , $this -> paraResult['receiveid'], $this -> paraResult['receivetype'], $_POST['content'], isset($this -> paraResult['commentid'])?$this -> paraResult['commentid'] : 0);
			break;
		case 'vote':
			if(!isset($this -> paraResult['voteid'])){
				echo "VOTEIDERROR";
				return;
			}
			if(!isset($this -> paraResult['userid'])){
				echo "USERIDERROR";
				return;
			}
			if(!isset($this -> paraResult['itemid'])){
				echo "ITENIDERROE";
				return;
			}
			echo $this -> RefreshObj -> vote($this -> paraResult['voteid'], $this -> paraResult['userid'],$this -> paraResult['userip'], $this -> paraResult['itemid']);
			break;
		default:
			echo "COMMANDERROR";
			break;
		}
	}
	public function selectOperate(){
		switch($this -> paraResult['selectoperate']){
		case 'refresh':
			echo $this -> RefreshObj -> refresh();
			break;
		case 'getattentionleague':
			if(!isset($this -> paraResult['userid'])){
				echo "USERIDERROR";
				return;
			}
			echo $this -> RefreshObj -> getAttentionLeague($this -> paraResult['userid']);
			break;
		case 'getattentionactivity':
			if(!isset($this -> paraResult['userid'])){
				echo "USERIDERROR";
				return;
			}
			echo $this -> RefreshObj -> getAttentionActivity($this -> paraResult['userid']);
			break;
		case 'activitydetail':
			if(!isset($this -> paraResult['activityid'])){
				echo "ACTIVITYIDERROR";
				return;
			}
			echo json_encode($this -> RefreshObj -> getActivityInfo($this -> paraResult['activityid']));
			break;
		case 'getleagueactivity':
			if(!isset($this -> paraResult['leagueid'])){
				echo "LEAGUEIDERROR";
				return;
			}
			echo $this -> RefreshObj -> getLeagueActivity($this -> paraResult['leagueid']);
			break;
		case 'leaguezone':
			if(!isset($this -> paraResult['leagueid'])){
				echo "LEAGUEIDERROR";
				return;
			}
			echo json_encode($this -> RefreshObj -> getLeagueInfo($this -> paraResult['leagueid']));
			break;
		default: 
			echo "SELECTPARAERROR";
			break;
		}
	}
























}
