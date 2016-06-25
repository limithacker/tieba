<?php
  session_start();
  require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
  require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
  require ($_SERVER['DOCUMENT_ROOT']."/config/global.set.php");
  require ($_SERVER['DOCUMENT_ROOT']."/header.php");
  require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
  
  if (isint($_GET["tid"]))
  {$tid=$_GET["tid"];}
  else
  {msg("参数错误","http://".$_SERVER['HTTP_HOST']."/index.php");}
  
  $page=fw(isset($_GET["page"])?$_GET["page"]:1);
  $listsqlnum=($page-1)*$listnum.",".$listnum;
  $lzhtml="";
  $rhtml="";
  
  //收藏状态查询
  if ($uid==null)
  {$colsel=2;}
  else
  {
     $resc=mysql_query("SELECT uid,tid FROM col WHERE uid={$uid} AND tid={$tid}");
     $uisc=mysql_fetch_assoc($resc);
	 if ($uisc==null)
	 {$colsel=0;}
	 else
	 {$colsel=1;}
  }

  $res=mysql_query("SELECT a.title,a.ttxt,a.time,b.uname,b.uheadshow,b.hst FROM ties a,users b WHERE tid={$tid} AND a.uid=b.uid");
  while ($uis=mysql_fetch_assoc($res))
  {
	 $title=$uis['title'];
	 $lztime=date('m-d H:i',strtotime($uis['time']));
	 $lztxt=stripslashes($uis['ttxt']);
	 $lheadshow=($uis['uheadshow']!=null)?$uis['uheadshow']:$noheadshow;
	 $thst=$uis['hst'];
	 //如果是第一页，就显示主贴内容
	 if ($page==1)
	 {$lzhtml="<div class=\"rtie\">
		<div class=\"rtiel\">
		<div></div>
		<img src=\"{$lheadshow}\" class=\"t{$thst}\"/>
		<span>{$uis['uname']}</span>
		</div>
		<div class=\"rtier\">
		  <div class=\"txt\">
			 {$lztxt}
		  </div>
		  <div class=\"time\">{$lztime}&nbsp;楼主</div>
		 </div>
		 <div class=\"cb\"></div>
	  </div>";}  
	  else
	  {$lzhtml="";}
  }
  
  
  $i=0;   //这页的第i层
  
  $res2=mysql_query("SELECT a.rid,a.rtxt,a.time,b.uname,b.uheadshow,b.hst FROM rties a,users b WHERE tid={$tid} AND a.uid=b.uid  ORDER BY a.rid LIMIT {$listsqlnum}");
  while ($uis2=mysql_fetch_assoc($res2))
  {
	   $i+=1;
	   $rtime=date('m-d H:i',strtotime($uis2['time']));
	   $rtxt=stripslashes($uis2['rtxt']);
	   $rheadshow=($uis2['uheadshow']!=null)?$uis2['uheadshow']:$noheadshow;
	   $thst=$uis2['hst'];
	   $lc=$listnum*($page-1)+$i;   //楼层
	    $rhtml.="<div class=\"rtie\"><a href=\"#{$lc}\" id=\"#{$lc}\"></a>
		<div class=\"rtiel\">
		<div></div>
		<img src=\"{$rheadshow}\" class=\"t{$thst}\"/>
		<span>{$uis2['uname']}</span>
		</div>
		<div class=\"rtier\">
		  <div class=\"txt\">
			 {$rtxt}
		  </div>
		  <div class=\"time\">{$rtime}&nbsp;{$lc}楼</div>
		 </div>
		 <div class=\"cb\"></div>
	  </div>";


  }
  
  //fy start	
  $res3=mysql_query("select COUNT(*) as fyanum from rties WHERE tid={$tid}");
  while ($uis3=mysql_fetch_assoc($res3))
  {
	  $fyanum=$uis3['fyanum']; 
  }
  $fyaend=ceil($fyanum/$listnum);
  if ($page-4>=1){$fystart=$page-4;}else{$fystart=1;}
  if ($page+4<=$fyaend){$fyend=$page+4;}else{$fyend=$fyaend;}
  for ($i=$fystart;$i<=$fyend;$i++)
  {
	  if ($i==$page)
	  {$fyhtml.="<a href=\"javascript:;\" class=\"hover\">{$i}</a>";}
	  else
      {$fyhtml.="<a href=\"tie.php?tid={$tid}&page={$i}\">{$i}</a>";}  
  }
  $fyhtml.="<a href=\"tie.php?tid={$tid}&page={$fyaend}\">尾页</a>";
  
//fyend

  require ($_SERVER['DOCUMENT_ROOT']."/html/tie.html");

?>