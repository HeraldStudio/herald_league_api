#先声活动信息平台API说明
##一、调用说明
###1.URL说明
访问url：http://herald.seu.edu.cn/herald_league_api/index.php/para1/value1/para2/value2
一个参数名对应一个参数值后面以斜线分开。
###2.参数说明
参数名                        含义
command                  请求的命令名称，可用选项：
                           1.select查询数据操作，获取活动，社团，用户，留言，投票等信息使用该命令。
			   2.attentionleague关注社团操作
			   3.attentionactivity关注活动操作
                           4.comment 留言回复操作
                           5.vote 投票操作
selectoperate            查询操作的子操作，可用选项：
			   1.refresh 刷新10条记录
			   2.getattentionleague 获取用户关注社团的信息
		 	   3.getattentionactivity 获取用户关注活动的信息
			   4.activitydetail 获取活动详细信息
                           5.getleagueactivity 获取指定社团发布的活动
			   6.leaguezone 获取社团空间信息
userid                   用户一卡通号
leagueid 		 社团id
activityid   		 活动id
receiveid  		 评论接受者id
receivetype    		 评论接受者type
answerid     		 回复对应的评论id
voteid  		 投票id
itemid 			 投票选项id
###3.返回信息说明
COMMANDERROR     	 cmmand参数传递错误
SELECTPARAERROR          selectoperate参数传递错误
USERIDERROR 		 参数中未传递userid
LEAGUEIDERROR  		 参数中为传递leagueid
ACTIVITYIDERROT          参数中未传递activityid
VOTEIDERROR              参数中未传递voteid
ITRMIDERROR              参数中未传递itemid
ATTENTIONLEAGUESUCCESS   关注社团成功
ATTENTIONACTIVITYSUCCESS 关注活动成功
VOTESUCCESS              投票成功
ALREADYVOTE              已投过票
ADDCOMMENTSUCCESS        评论／回复成功
###4.参数设置说明
刷新操作                 command selectoperate
获取关注社团操作         command selectoperate userid
获取关注活动操作         command selectoperate userid
获取活动详细信息         command selectoperate activityid
获取特定社团活动         command selectoperate leagueid
获取社团空间信息         command selectoperate leagueid
关注社团操作             command selectoperate userid leagueid
关注活动操作 		 command selectoperate userid activityid
投票操作 	         command selectoperate userid voteid itemid
评论操作                 command selectoperate senderid sendertype receiveid receivetype (注:回复操作添加commentid 内容post一个content字段)
部分参数解释
voteid 表示投票的id
itemid 表示用户选中选项的id
senderid 表示评论或回复信息的发布者的id
sendertype 表示评论或者回复信息发布者的类型 1表示普通用户 2表示社团用户
receiverid 表示评论或者回复信息的接受者的id
receivertype 表示评论或者回复信息的接受者的类型 1表示普通用户 2表示社团用户 3表示相册 4表示照片
commentid 表示回复所对应的评论的id














