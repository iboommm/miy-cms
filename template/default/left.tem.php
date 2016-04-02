<?php 
	require_once "class/config/class.setting.php";
    require_once "class/config/class.admin.php";
	require_once 'class/config/class.lang.php';

	$getLang = getLang();
	require 'lang/lang.'.$getLang.'.php';
?>
		<script src="js/explode.js"></script>
       <script>
       		function pausecomp(millis)
			 {
			  var date = new Date();
			  var curDate = null;
			  do { curDate = new Date(); }
			  while(curDate-date < millis);
			}
       		$.getJSON('genJSON/layout/YG5hbWVgIExJS0UgJ3NpZGVfbGVmdCc=', function(json, textStatus) {
       			$.ajaxSetup({'async': false});
       			var test = explode(",",json.layout[0].data);
       			var all = test.length;
       			$.each(test, function(input,val) {
       				 var id = btoa("`id` = " +  val);
       				$.getJSON('genJSON/module/' + id, function(data, textStatus) {
       					$('#dataLeft').append("<div class='col-lg-12 module-header'>" + data.module[0].name + "</div><div class='col-lg-12 module-content'>" + data.module[0].data + "</div>");
       				});

       			});
       		});
       </script>

       <div id="dataLeft">
       	
  
       </div>

				