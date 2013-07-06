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
		if(isset($parameter[1])){
			$parameter = $parameter[1];
			$paraItem = explode('/', $parameter);
			$paraResult = array();
			for( $i = 1; isset($paraItem[$i]) && isset($paraItem[$i+1]); $i++ ){
				$this -> paraResult[$paraItem[$i]] = $paraItem[++$i];
		}
		$this -> resolveCommand();
		}else{
			echo "COMMANDERROR";
		}
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
			if(!isset($this -> paraResult['senderid']) || !isset($this -> paraResult['sendertype']) || !isset($this -> paraResult['receiverid']) || !isset($this -> paraResult['receivertype'])){
				echo "PARAERROR";
				return;
			}
			echo $this -> RefreshObj -> addComment($this -> paraResult['senderid'], $this -> paraResult['sendertype'] , $this -> paraResult['receiverid'], $this -> paraResult['receivertype'], $_POST['content'], isset($this -> paraResult['commentid'])?$this -> paraResult['commentid'] : 0);
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
			if(!isset($this -> paraResult['lastactivityid'])){
				echo "LASTACTIVITYIDERROR";
				return;
			}
			echo $this -> RefreshObj -> refresh($this -> paraResult['lastactivityid']);
			break;
		case 'getmore':
			if(!isset($this -> paraResult['lastactivityid'])){
				echo "LASTACTIVITYIDERROR";
				return;
			}
			echo $this -> RefreshObj -> getmore($this -> paraResult['lastactivityid']);
			break;
		case 'getactivity':
			echo $this -> RefreshObj -> getActivity();
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
		case 'getactivitycomment':
			if(!isset($this -> paraResult['activityid'])){
				echo "ACTIVITYIDERROR";
				return;
			}
			echo $this -> RefreshObj -> getactivitycomment($this -> paraResult['activityid']);
			break;
		case 'getmoreactivitycomment':
			if(!isset($this -> paraResult['activityid']) || !isset($this -> paraResult['lastcommentid'])){
				echo "PARAERROR";
				return;
			}
			echo $this -> RefreshObj -> getMoreComment($this -> paraResult['activityid'], $this -> paraResult['lastcommentid']);
			break;
		default: 
			echo "SELECTPARAERROR";
			break;
		}
	}
























}
