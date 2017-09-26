<!doctype html>
<html>
	<head>
		<title>Php Assignment 8</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
		<style>
			.main
			{
				width:100%;
				height:550px;
			}
		</style>
	</head>
	<body>
		<?php 
				$ch=curl_init();
				curl_setopt($ch,CURLOPT_URL,"www.ucertify.com");
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
				$content=curl_exec($ch);
				$myf=fopen('ucertify.txt',"a");
				fwrite($myf,$content);
				fclose($myf);
		?>
		<form name="php_form" id="php_form" action="#" method="post">
			<input type="text" name="tag_name" id="tag_name" placeholder="Tag"/>
			<input type="submit" name="submit_btn" id="submit_btn" value="Set Tag"/>
		</form>
		<button type="button" class="btn btn-primary btn-lg" name="show_btn" id="show_btn" data-toggle="modal" data-target="#myModal">
		  Get Text b/w Tag
		</button>
		<a href="<?php echo curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);?>" class="btn btn-danger btn-lg" target="main">Show curl data</a>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Text</h4>
			  </div>
			  <div class="modal-body">
				<?php
					$tag=$_POST['tag_name'];
					$ex='/[<](.*?)/';
					$ex2="!<".$tag.">(.*?)</".$tag.">!";
					$dom= new domDocument;
					libxml_use_internal_errors(TRUE);
					$dom->loadHTML($content);
					libxml_clear_errors();
					$dom->preserveWhiteSpace=false;
					$dom->recover = true;
					$dom->strictErrorChecking = false;
					$data=$dom->getElementsByTagname($tag);
					$out=array();
					foreach($data as $i)
					{
						array_push($out,$i);
					}
					if($tag=='p')
					{
						preg_match_all("!<p>(.*?)</p>!",$content,$m);
						foreach($m as $dd)
						{
							foreach($dd as $ma)
							{
								echo $ma;
							}
						}
					}
					else
					{
						foreach($out as $d)
						{
							
							$match=preg_replace($ex,'&lt;',$dom->saveHTML($d));
							echo $match;
						}
					}
				?>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<div>
			<iframe src="" id="main" name="main" class="main"></iframe>
		</div>
		<pre>
			<code>
				&lt;?php 
					$ch=curl_init();
					curl_setopt($ch,CURLOPT_URL,"www.ucertify.com");
					curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
					$content=curl_exec($ch);
					$myf=fopen('ucertify.html',"a");
					fwrite($myf,$content);
					fclose($myf);
				?>
				&lt;?php
					$tag=$_POST['tag_name'];
					$ex='/[&lt;](.*?)/';
					$dom= new domDocument;
					@$dom->loadHTML($content);
					$dom->preserveWhiteSpace=false;
					$dom->recover = true;
					$dom->strictErrorChecking = false;
					$data=$dom->getElementsByTagname($tag);
					$out=array();
					foreach($data as $i)
					{
						array_push($out,$i);
					}
					foreach($out as $d)
					{
						
						$match=preg_replace($ex,'&lt;',$dom->saveHTML($d));
						echo $match;
					}
				?>
				&lt;?php 
					if($tag!="")
					{
					echo $content;
					}
				?>
			</code>
		</pre>
	</body>
</html>