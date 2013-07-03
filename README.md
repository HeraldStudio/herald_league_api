#先声活动信息平台API说明
##一、调用说明
###1.URL说明
访问url:`http://herald.seu.edu.cn/herald_league_api/index.php/para1/value1/para2/value2`

下载图片url:`http://herald.seu.edu.cn/herald_league/Uploads/`

一个参数名对应一个参数值后面以斜线分开。
###2.参数说明
<table>
<tr><th>参数名</th><th>含义</th><th>可用选项</th></tr>
<tr>
<td>command</td>
<td>请求的命令名称</td>
<td>
<ol>
<li>select查询数据操作，获取活动，社团，用户，留言，投票等信息使用该命令。
<li>attentionleague关注社团操作
<li>attentionactivity关注活动操作
<li>comment 留言回复操作
<li>vote 投票操作
</ol>
</td>
</tr>
<tr>
<td>selectoperate</td>
<td>查询操作的子操作</td>
<td>
<ol>
<li>refresh 刷新10条记录
<li>getattentionleague 获取用户关注社团的信息
<li>getattentionactivity 获取用户关注活动的信息
<li>activitydetail 获取活动详细信息
<li>getleagueactivity 获取指定社团发布的活动
<li>leaguezone 获取社团空间信息
</ol>
</td>
</tr>
<tr>
<td>userid</td>
<td>用户一卡通号</td>
<td></td>
<tr/>
<tr>
<td>leagueid</td>
<td>社团id</td>
<td></td>
</tr>
<tr>
<td>activityid</td>
<td>活动id</td>
<td></td>
</tr>
<tr>
<td>receiveid</td>
<td>评论接受者id</td>
<td></td>
</tr>
<tr>
<td>receivetype</td>
<td>评论接受者type</td>
<td></td>
</tr>
<tr>
<td>answerid</td>
<td>回复对应的评论id</td>
<td></td>
</tr>
<tr>
<td>voteid</td>
<td>投票id</td>
<td></td>
</tr>
<tr>
<td>itemid</td>
<td>投票选项id</td>
<td></td>
</tr>
</table>
		 
###3.返回信息说明
<table>
<tr><td>COMMANDERROR</td><td>cmmand参数传递错误</td></tr>
<tr><td>SELECTPARAERROR</td><td>selectoperate参数传递错误</td></tr>
<tr><td>USERIDERROR</td><td>参数中未传递userid</td></tr>
<tr><td>LEAGUEIDERROR</td><td>参数中为传递leagueid</td></tr>
<tr><td>ACTIVITYIDERROT</td><td>参数中未传递activityid</td></tr>
<tr><td>VOTEIDERROR</td><td>参数中未传递voteid</td></tr>
<tr><td>ITRMIDERROR</td><td>参数中未传递itemid</td></tr>
<tr><td>ATTENTIONLEAGUESUCCESS</td><td>关注社团成功</td></tr>
<tr><td>ATTENTIONACTIVITYSUCCESS</td><td>关注活动成功</td></tr>
<tr><td>VOTESUCCESS</td><td>投票成功</td></tr>
<tr><td>ALREADYVOTE</td><td>已投过票</td></tr>
<tr><td>ADDCOMMENTSUCCESS</td><td>评论／回复成功</td></tr>
</table>
###4.参数设置说明
<table>
<tr><td>刷新操作</td><td>command selectoperate</td></tr>
<tr><td>获取关注社团操作</td><td>command selectoperate userid</td></tr>
<tr><td>获取关注活动操作</td><td>command selectoperate userid</td></tr>
<tr><td>获取活动详细信息</td><td>command selectoperate activityid</td></tr>
<tr><td>获取特定社团活动</td><td>command selectoperate leagueid</td></tr>
<tr><td>获取社团空间信息</td><td>command selectoperate leagueid</td></tr>
<tr><td>关注社团操作</td><td>command selectoperate userid leagueid</td></tr>
<tr><td>关注活动操作</td><td>command selectoperate userid activityid</td></tr>
<tr><td>投票操作</td><td>command selectoperate userid voteid itemid</td></tr>
<tr><td>评论操作</td><td>command selectoperate senderid sendertype receiveid receivetype</td></tr> 
</table>
(注:回复操作添加commentid 内容post一个content字段)
#####部分参数解释
<table>
<tr><td>voteid</td><td>表示投票的id</td></tr>
<tr><td>itemid</td><td>表示用户选中选项的id</td></tr>
<tr><td>senderid</td><td>表示评论或回复信息的发布者的id</td></tr>
<tr><td>sendertype</td><td>表示评论或者回复信息发布者的类型 1表示普通用户 2表示社团用户</td></tr>
<tr><td>receiverid</td><td>表示评论或者回复信息的接受者的id</td></tr>
<tr><td>receivertype</td><td>表示评论或者回复信息的接受者的类型 1表示普通用户 2表示社团用户 3表示相册 4表示照片</td></tr>
<tr><td>commentid</td><td>表示回复所对应的评论的id</td></tr>
<table>














