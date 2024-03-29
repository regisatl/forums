<?php
session_start();
require('actions/questions/showMessagesAction.php');
require('actions/questions/postReponseAction.php');
require('actions/questions/showAllReponsesAction.php');
?>

<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body class="mt-3 mb-3">
	<?php include('includes/navbar.php'); ?>
	<div class="container pt-5">
		<?php

		if (isset($questionDate)) {
			?>
			<section class="show-content mb-3">

				<h3>
					<?= $questionTitre; ?>
				</h3>
				<p>
					<?= $questionDescription; ?>
				</p>
				<p>
					<?= $questionContenu; ?>
				</p>
				<small><em>
						<?='<a href="profile.php?id=' . $questionIdAuteur . '">' . $questionEmailAuteur . '</a> &nbsp' . $questionDate; ?>
					</em></small>
			</section>

			<section class="show-answers">
				<?php

				while ($reponse = $getAllReponses->fetch()) {
					?>
					<div class="card mb-3">
						<div class="card-header">
							<a href="profile.php?id= <?= $reponse['idAuteur']; ?>"><?= $reponse['emailAuteur']; ?></a>
						</div>
						<div class="card-body">
							<blockquote class="blockquote mb-1">
								<p>
									<?= $reponse['reponse']; ?>
								</p>
							</blockquote>
						</div>
						<footer class="blockquote-footer ms-3 mt-2">
							<cite title="Date d'envoi du message">  Publié le 
								<?= date("d-m-Y"); ?>
							</cite>
						</footer>
					</div>
					<?php
				}
				?>
				<form class="form-group" method="POST">
					<div class="mb-3">
						<label for="text" class="form-label"><strong>Réponse:</strong></label>
						<textarea type="text" class="form-control" name="reponse" placeholder=""
							required=""></textarea>
						<br>
						<button class="btn btn-primary bg-gradient fw-bold py-3 w-100" type="submit"
							name="valider">Envoyer</button>
					</div>
				</form>
			</section>
			<?php
		}

		?>


	</div>

	<?php include('includes/footer.php'); ?>

</body>

</html>