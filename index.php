<?php 

session_start();
if (!isset($_SESSION['auth']) && !$_SESSION['auth']) {
	header("Location: auth.php");
}
include("template/header.php"); ?>

<div class="container is-fluid mt-4 mb-4">
	<div class="columns">
		<div class="column">
			<span class="title has-font-bold">
				<i class="fa fa-terminal" aria-hidden="true"></i>
			</span>
		</div>
	</div>
	<div class="columns">
		<div class="column is-full-mobile is-half-tablet is-half-desktop is-half-widescreen is-half-fullhd">
			<div class="field">
				<label class="label">ID</label>
				<div class="control">
					<input class="input is-success" type="text" id="client-id">
				</div>
				<p class="help is-success">This username is available</p>
			</div>

			<div class="field">
				<label class="label">Description</label>
				<div class="control">
					<textarea class="textarea" placeholder="Textarea" rows="3" id="client-description"></textarea>
				</div>
			</div>

			<div class="field is-grouped">
				<div class="control">
					<button class="button is-link add-client-btn">Add</button>
				</div>
			</div>
		</div>
	<div class="column is-full-mobile is-half-tablet is-half-desktop is-half-widescreen is-half-fullhd">
		<div class="client-container">
			<div class="client hide">
				<h3 class="title"></h3>
				<p class="description"></p>
				<img src="" alt="QR Code" id="qrcode">
				<h3>Logs:</h3>
				<ul class="logs"></ul>
			</div>
		</div>
	</div>
	</div>
</div>

<?php include("template/footer.php"); ?>