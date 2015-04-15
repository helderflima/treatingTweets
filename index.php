<?php
include "twitteroauth/twitteroauth.php";

//Dados de tokem da aplicação
$consumer = "BrCvw5kD6lytCkBCJnH7AELZ1";
$consumersecret = "s3sSALNvL6kbFAwLTWx9KaQL83kh3S1tvoL70GVLs3Le3DYZDb";
$accesstoken = "73686572-Fm7YOqxdrMP5wLvDRPKJnnMh5S6jGp2kU78sJlRya";
$accesstokensecret = "v0zyfcOQ25xEHC1zERd5cay1vlJlTMh0azPpDPUJqixfz";

$twitter = new TwitterOAuth($consumer, $consumersecret, $accesstoken, $accesstokensecret);



?>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Tratando Tweets</title>
</head>
<body>
	<form action="" method="post">
		<label>Buscar: </label><input type="text" name="keyword"/>

	</form>
	<?php
	//Consome o serviço "GET search/tweets" do Twitter, que retorna um JSON. Na variável $_POST['keyword'], o "keyword" é o parâmentro que busca que vai ser usado. 
	if ( isset($_POST['keyword'])){
	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=100');	
	foreach ($tweets as $tweet) {
		foreach ($tweet as $t) {
			if (!empty($t->text)){	
			echo var_dump($t->text).'<br/>';

				} else {

					echo "Digite algo para buscar!";
				}
			} 
		}
			
	}
	?>
</body>
</html>