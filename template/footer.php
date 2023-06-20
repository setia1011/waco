<div class="container is-fluid">
        <footer class="footer p-0 pt-4">
            <div class="content has-text-left">
                <p>
                <strong>WACO</strong> by <a href="https://techack.id">TecHack.ID</a>
                </p>
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function() {
            var socket = io.connect("http://localhost:8001/", {
                transports: ['websocket', 'polling', 'flashsocket'],
            });
            
			console.log(socket);

            $('.add-client-btn').click(function() {
                var clientId = $('#client-id').val();
				var clientDescription = $('#client-description').val();

                var clientClass = 'client-' + clientId;
                var template = $('.client').first().clone().removeClass('hide').addClass(clientClass);
                template.find('.title').html(clientId);
                template.find('.description').html(clientDescription);
                template.find('.logs').append($('<li>').text('Connecting...'));
                $('.client-container').append(template);

                socket.emit('create-session', {
                    id: clientId,
                    description: clientDescription
                });
            });

            socket.on('init', function(data) {
				$('.client-container .client').not(':first').remove();
				// console.log(data);
				for (var i = 0; i < data.length; i++) {
					var session = data[i];

					var clientId = session.id;
					var clientDescription = session.description;

                    var clientClass = 'client-' + clientId;
                    var template = $('.client').first().clone().removeClass('hide').addClass(clientClass);

					template.find('.title').html(clientId);
					template.find('.description').html(clientDescription);
					$('.client-container').append(template);

					if (session.ready) {
						$(`.client.${clientClass} .logs`).prepend($('<li>').text('Whatsapp is ready!'));
					} else {
						$(`.client.${clientClass} .logs`).prepend($('<li>').text('Connecting...'));
					}
				}
			});

			socket.on('remove-session', function(id) {
				$(`.client.client-${id}`).remove();
			});

			socket.on('message', function(data) {
				var seen = [];
				$(`.client.client-${data.id} .logs`).prepend($('<li>').text(data.text));
				$(`.client.client-${data.id} .logs`).children().each((i, e) => {
					seen.push(data.text);
				});
				uniq = [...new Set(seen)];
				
				uniq.forEach((e) => {
					console.log(e);
					// $(`.client.client-${data.id}`).remove();
					$(`.client.client-${data.id} .logs`).html($('<li>').text(e));
				})
			});

			socket.on('qr', function(data) {
				$(`.client.client-${data.id} #qrcode`).attr('src', data.src);
				$(`.client.client-${data.id} #qrcode`).show();
			});

			socket.on('ready', function(data) {
				$(`.client.client-${data.id} #qrcode`).hide();
			});

			socket.on('authenticated', function(data) {
				$(`.client.client-${data.id} #qrcode`).hide();
			}); 
        });


    </script>
</body>
</html>