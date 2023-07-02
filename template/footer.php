<div class="container is-fluid" style="border-top: 1px solid hsl(0deg, 0%, 86%);">
        <footer class="footer p-0 pt-4 has-background-white">
            <div class="content has-text-left is-underlined is-inline-flex">
                <p>Developped</strong> by <a href="https://techack.id">TecHack.ID</a></p>
            </div>
			<div class="content has-text-left is-inline-flex is-pulled-right">
				<p>&copy; <?= date('Y'); ?><strong> - <a href="<?= "/"; ?>"><strong>WACO</strong></a></p>
			</div>
        </footer>
    </div>

    <script>
        $(document).ready(function() {
            var socket = io.connect("http://localhost:8001/", {
                transports: ['websocket', 'polling', 'flashsocket'],
            });
            
			// console.log(socket);

            $('.add-client-btn').click(function() {
                var clientId = $('#client-id').val();
				var clientDescription = $('#client-description').val();
				if (clientId) {
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
				}
            });

            socket.on('init', function(data, time) {
				$('.client-container .client').not(':first').remove();
				$(`.client.${clientClass} .logs`).prepend($('<li style="list-style: none;">').text(data.time + ' ~ ' + data.text));
				console.log(data);
				for (var i = 0; i < data.length; i++) {
					var session = data[i];
					var clientId = session.id;
					var clientDescription = session.description;

                    var clientClass = 'client-' + clientId;
                    var template = $('.client').first().clone().removeClass('hide').addClass(clientClass);

					template.find('.title').html(clientId + '/' + session.user);
					template.find('.description').html(clientDescription);
					$('.client-container').append(template);

					template.find("[title]").attr('title', clientId);

					console.log($(`.client.client-${clientId} .pic`));

					if (session.ready) {
						$(`.client.client-${session.id} .pic`).attr('src', session.pic);
						$(`.client.client-${session.id} .pic`).show();
						$(`.client.${clientClass} .logs`).prepend($('<li style="list-style: none;">').text(time + ' ~ Whatsapp is ready!'));
					} else {
						$(`.client.${clientClass} .logs`).prepend($('<li style="list-style: none;">').text(time + ' ~ Connecting...'));
					}
				}

				// $('.exit').on("click", function(e) {
				// 	var id = $(this).attr("title");
				// 	socket.emit('exit', {id: id});
				// });
			});

			socket.on('remove-session', function(id) {
				$(`.client.client-${id}`).remove();
			});

			socket.on('message', function(data) {
				const text = 'QR Code received, scan please!';
				const elements = Array.from(document.querySelectorAll(`.client.client-${data.id} .logs li`));
				const qrElement = elements.find(el => {
					return el.textContent.toLowerCase().includes(text.toLowerCase());
				});
				if (qrElement) {
					qrElement.remove()
				}
				$(`.client.client-${data.id} .logs`).prepend($('<li style="list-style: none;">').text(data.time + ' ~ ' + data.text));

				// $(`.client.client-${data.id} .logs`).children().each((i, e) => {
				// 	// seen.push(data.text);
				// 	// console.log(e.textContent);
				// 	if (e.textContent.search('QR Code received, scan please!')) {
				// 		console.log(e);
				// 		$(`.client.client-${data.id} .logs`).prepend($('<li style="list-style: none;">').text(data.time + ' ~ ' + data.text));
				// 	} else {
				// 		$(`.client.client-${data.id} .logs`).prepend($('<li style="list-style: none;">').text(data.time + ' ~ ' + data.text));
				// 	}
				// });
				// $(`.client.client-${data.id} .logs`).prepend($('<li style="list-style: none;">').text(data.time + ' ~ ' + data.text));
				// $(`.client.client-${data.id} .logs`).children().each((i, e) => {
				// 	// seen.push(data.text);
				// 	console.log(e.textContent);
				// 	if (e.textContent.search('QR Code received, scan please!')) {
				// 	}
				// });
				// uniq = [...new Set(seen)];
				// console.log(uniq);
				
				// uniq.forEach((e) => {
				// 	console.log(e);
				// 	// $(`.client.client-${data.id}`).remove();
				// 	$(`.client.client-${data.id} .logs`).html($('<li>').text(e));
				// })
			});

			socket.on('qr', function(data) {
				$(`.client.client-${data.id} .qrcode`).attr('src', data.src);
				$(`.client.client-${data.id} .qrcode`).show();
				// console.log('qr' + data);
			});

			socket.on('ready', function(data) {
				$(`.client.client-${data.id} .qrcode`).hide();
			});

			socket.on('authenticated', function(data) {
				$(`.client.client-${data.id} .qrcode`).hide();
			}); 
        });


    </script>
</body>
</html>