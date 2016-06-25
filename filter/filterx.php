<?php
   function isimg($str)
   {
	   if (preg_match('/^http[s]?:\/\/[\w\.]*\/[\w\.]*\.(jpg|png|gif)$/',$str))
	   {return false;}
	   else
	   {return true;}
   }
   
   function ismp3($str)
   {
	   if (preg_match('/^http[s]?:\/\/[\w\.]*\/[\w\.]*\.(mp3|wma|aac|flac)$/',$str))
	   {return false;}
	   else
	   {return true;}
   }
   
   function isurl($str)
   {
	   if (preg_match('/^[a-zA-z]+:\/\/[^\s]*$/',$str))
	   {return false;}
	   else
	   {return true;}
   }
   
      function isint($str)
   {
	   if (is_int($str))
	   {return false;}
	   else
	   {return true;}
   }
   
   function fw($str)
    { 
      $sqlfw=array("'","\"","<",">","%3C","%3E","\\","\$","?","%",",","=","\u003d","&#61;","&#60","&#62","&#60;&#115;&#99;&#114;&#105;&#112;&#116;&#62;","&#60;&#47;&#115;&#99;&#114;&#105;&#112;&#116;&#62;","%27","<script>","</script>");
      //$str=htmlspecialchars($str);

       //echo $str; 

      foreach ($sqlfw as $value)
       {
	      $str=str_replace($value,"",$str);  
        }

      return $str;
     }

    /** 特殊字符转义
    * @param  String $str 源字符串
    * @return String
    */
     function rqstr($str){
        $conversions = array(
            "^" => "\^", 
            "[" => "\[", 
            "." => "\.", 
            "$" => "\$", 
            "{" => "\{", 
            "*" => "\*", 
            "(" => "\(", 
            "\\" => "\\\\", 
            "/" => "\/", 
            "+" => "\+", 
            ")" => "\)", 
            "|" => "\|", 
            "?" => "\?", 
            "<" => "\<", 
            ">" => "\>" 
        );
        return strtr($str, $conversions);
    }


?>