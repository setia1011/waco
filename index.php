<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
		<div class="column is-full-mobile is-half-tablet is-one-third-desktop is-one-third-widescreen is-one-third-fullhd">
			<div class="field">
				<label class="label">ID</label>
				<div class="control">
					<input class="input is-success" type="text" id="client-id">
				</div>
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
		<div class="column">
			<div class="field">
				<label class="label">...</label>
			</div>
			<!-- Clients -->
			<div class="client-container">
				<div class="client hide">
					<div class="card mb-2">
						<div class="card-content">
							#<span class="title is-size-5"></span>
							<hr>
							<img src="" alt="QR Code" class="qrcode" style="border: 1px solid hsl(0deg, 0%, 71%);">
							<img src="" alt="Pic" class="pic" style="border: 1px solid hsl(0deg, 0%, 71%); width: 278px; padding: 5px;">
						</div>
						<footer class="card-footer">
							<p class="card-footer-item is-block">
								<span class="logs"></span>
								<!-- <span class="description"></span> -->
							</p>
							<!-- <p class="card-footer-item is-block">
							<span class="button exit is-small is-danger is-outlined is-pulled-right" title="">
								<i class="fa-solid fa-arrow-right-from-bracket"></i>
							</span>
							</p> -->
						</footer>
					</div>

					<!-- <h3 class="title"></h3>
					<p class="description"></p>
					<img src="" alt="QR Code" id="qrcode">
					<h3>Logs:</h3>
					<ul class="logs"></ul> -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("template/footer.php"); ?>