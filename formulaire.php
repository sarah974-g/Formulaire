<!DOCTYPE HTML>
<html>
<html lang="fr">
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		<style>
			body{
				background: #FFFFFF;
			}
			h1{
				color: #000000;
				text-align: center;
			}
			p{
				background: #FFFFFF;
				color: #000000;
				text-align: center;
				width: auto;
				height: auto;
			}
			
		</style>
		<body>
			<h1>Votre avis nous intéresse, partagez le nous.</h1>
			<p><span class="error"></span></p>
			<form method="post" action="/formulaire_avis/formulaire/traitement.php">

				<table cellpadding="5">
					<tr>
						<td style='text-align: center;color: black;'>*E-mail:</td>
						<td><input class="form-control" type="email" name="email" style="width: 400px"></td>
					</tr>
					<tr>
						<td style='text-align: center;color: black;'>Quels articles avez vous pris:</td>
						<td><input class="form-control" type="text" name="text" style="width: 400px"></td>
					</tr>
					<tr>
						<td style='text-align: center;color: black;'>Commentaire:</td>
						<td><textarea class="form-control" name="comment" rows="7" style="width: 600px"></textarea></td>
					</tr>
					<tr>
						<td colspan='2'><button class="btn btn-background" type="submit" name="envoyer" style="color: #FFFFFF; background-color: #149279; text-align: center;">Envoyer</button>
						</td>
					</tr>
				</table>
			</form>
		</body>
</html>