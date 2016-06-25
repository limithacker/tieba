<?php
  session_start();
  require ($_SERVER['DOCUMENT_ROOT']."/header.php");
  require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
  require ($_SERVER['DOCUMENT_ROOT']."/filter/kses.php");
  
  $listnum=30;
  $page=fw(isset($_GET["page"])?$_GET["page"]:1);
  $listsqlnum=($page-1)*$listnum.",".$listnum;
  $tiebox="";
  
  $res=mysql_query("select (SELECT COUNT(*) from rties where tid=b.tid) as 'rnum',a.uid,a.uname,b.tid,b.time,b.title,b.ttxt from users a,ties b where a.uid=b.uid ORDER BY b.tid DESC LIMIT {$listsqlnum}");
    while ($uis=mysql_fetch_assoc($res))
    {
		//echo date('Y-m-d H:i:s')."  ".date('Y-m-d',strtotime($uis['time']));
		if (date('Y-m-d')==date('Y-m-d',strtotime($uis['time'])))
		{ $thetime=date('H:i',strtotime($uis['time'])); }
		else
		{ $thetime=date('m-d',strtotime($uis['time']));}
		
		$ttitle=stripslashes($uis['title']);
		$ttxt=ffw2(stripslashes($uis['ttxt']));
		
		$tiebox.="<div class=\"tie\">
		<span class=\"t1\">{$uis['rnum']}</span>
		<span class=\"t2\"><a class=\"tie_title\" href=\"/tie.php?tid={$uis['tid']}\">{$uis['title']}</a></span>
		<a href=\"javascript:;\" class=\"t3\">{$uis['uname']}</a>
		<span class=\"t4\">{$thetime}</span>
		<div class=\"t5\">{$ttxt}</div>
		</div>";
		
	}

//fy start	
  $res2=mysql_query("select COUNT(*) as fyanum from ties");
  while ($uis2=mysql_fetch_assoc($res2))
  {
	  $fyanum=$uis2['fyanum']; 
  }
  $fyaend=ceil($fyanum/$listnum);
  if ($page-4>=1){$fystart=$page-4;}else{$fystart=1;}
  if ($page+4<=$fyaend){$fyend=$page+4;}else{$fyend=$fyaend;}
  for ($i=$fystart;$i<=$fyend;$i++)
  {
	  if ($i==$page)
	  {$fyhtml.="<a href=\"javascript:;\" class=\"hover\">{$i}</a>";}
	  else
      {$fyhtml.="<a href=\"index.php?page={$i}\">{$i}</a>";}
	  
  }
  
//fyend

  require ($_SERVER['DOCUMENT_ROOT']."/html/index.html");
?>