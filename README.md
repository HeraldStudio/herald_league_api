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
<li>getmore 获取更多的10条记录
<li>getactivity 获取10条活动信息
<li>getmoreactivitycomment 获取更多评论信息
<li>getactivitycomment 获取5条评论信息
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
<tr><td>ISUPTODATE</td><td>当前显示信息已是最新</td></tr>
<tr><td>NOACTIVITYCANGET</td><td>没有更多活动信息</td></tr>
<tr><td>PARAERROR</td><td>评论操作缺少参数</td></tr>
</table>
###4.参数设置说明
<table>
<tr><td>刷新操作</td><td>command selectoperate lastactivityid</td></tr>
<tr><td>获取更多操作</td><td>command selectoperate lastactivityid</td></tr>
<tr><td>获取10条最新活动信息</td><td>command selectoperate</td></tr>
<tr><td>获取关注社团操作</td><td>command selectoperate userid</td></tr>
<tr><td>获取关注活动操作</td><td>command selectoperate userid</td></tr>
<tr><td>获取活动详细信息</td><td>command selectoperate activityid</td></tr>
<tr><td>获取特定社团活动</td><td>command selectoperate leagueid</td></tr>
<tr><td>获取社团空间信息</td><td>command selectoperate leagueid</td></tr>
<tr><td>关注社团操作</td><td>command userid leagueid</td></tr>
<tr><td>关注活动操作</td><td>command userid activityid</td></tr>
<tr><td>投票操作</td><td>command userid voteid itemid</td></tr>
<tr><td>评论操作</td><td>command senderid sendertype receiveid receivetype</td></tr>
<tr><td>获取活动评论信息</td><td>command selectoperate activityid</td></tr>
<tr><td>获取更多活动评论信息</td><td>command selectoperate activityid lastcommentid</td></tr>
</table>
(注:回复操作添加commentid 内容post一个content字段)
#####部分参数解释
<table>
<tr><td>voteid</td><td>表示投票的id</td></tr>
<tr><td>itemid</td><td>表示用户选中选项的id</td></tr>
<tr><td>senderid</td><td>表示评论或回复信息的发布者的id</td></tr>
<tr><td>sendertype</td><td>表示评论或者回复信息发布者的类型 1表示普通用户 2表示社团用户</td></tr>
<tr><td>receiverid</td><td>表示评论或者回复信息的接受者的id</td></tr>
<tr><td>receivertype</td><td>表示评论或者回复信息的接受者的类型 1表示普通用户 2表示社团用户 3表示活动</td></tr>
<tr><td>commentid</td><td>表示回复所对应的评论的id</td></tr>
<tr><td>lastactivityid</td><td>表示当前用户查看的最新活动的id</td></tr>
<table>
##二,返回数据说明
###1. 活动列表页面:
 * {'id':'1','name':'acti_name','league_id':'1','start_time':'2013-06-08 00',
'end_time':'2013-06-01 00','introduction':'test','release_time':'2013-06-18 00','place':'',"isvote":true,
'post_add':'','league_info':{'league_name':'herald','avatar_address':''}}

###2. 图片URL
 * 头像`http://herald.seu.edu.cn/herald_league/Uploads/LeagueAvatar/m_s_avatar_address`
 * 活动小图`http://herald.seu.edu.cn/herald_league/Uploads/ActivityPost/m_s_post_add`
 * 活动中图`http://herald.seu.edu.cn/herald_league/Uploads/ActivityPost/m_m_post_add`
 * 活动大图`http://herald.seu.edu.cn/herald_league/Uploads/ActivityPost/m_l_post_add`

###3. 普通活动详情页面:
 * {'introduction':'test','post_add':'test','comment':[{'content':'222','comment_time':'2013-06-30 12:00:54'
,'comment_id':'1','sender':'1'}],'comment_num':''}

###4. 更多留言、评论
 * [{'content':'222','comment_time':'2013-06-30 12:00:54','comment_id':'1','sender':'1'}]

###5. 社团简介
 * {"introduce":"club intro",'comment_num':'10','comment':[{'content':'222','comment_time':'2013-06-30 12:00:54',
 'comment_id':'1','sender':'1'}],"class":"1","email":"herald@gmail.com","phone":"1585022222","place":"p"}

##三,API更新说明
1.刷新操作需要补充添加参数lastactivityid

2.活动信息返回中字段intro表示活动简介信息，包含活动开始时间和活动介绍的部分文字

3.返回ISUPTODATE表示活动信息以更新到最新

4.获取更多操作`URL_/herald_league_api/index.php/command/select/selectoperate/getmore/lastactivityid/2`

5.返回NOACTIVITYCANGET表示已无根多信息可跟新了

6.`URL_/herald_league_api/index.php/command/select/selectoperate/getactivity` 获取10条活动信息

7.`/herald_league_api/index.php/command/select/selectoperate/getactivitycomment/activityid/1`获取活动评论信息

8.`/herald_league_api/index.php/command/select/selectoperate/getmoreactivitycomment/activityid/1/lastcommentid/8`获取更
多评论信息（活动评论）

9.api文档更新，修复了关注社团参数bug

更新时间2013/08/13














