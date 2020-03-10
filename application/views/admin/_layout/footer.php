		<footer class="main-footer">
			<div class="container">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.13
			</div>
			<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
			reserved.
			</div>
			<!-- /.container -->
		</footer>
		</div>
		<!-- ./wrapper -->

		<!-- jQuery 3 -->
		<script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?=base_url('assets/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Select2 -->
		<script src="<?=base_url('assets/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?=base_url('assets/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?=base_url('assets/')?>bower_components/fastclick/lib/fastclick.js"></script>
		<!-- DataTables -->
		<script src="<?=base_url('assets/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?=base_url('assets/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- InputMask -->
		<script src="<?=base_url('assets/')?>plugins/input-mask/jquery.inputmask.js"></script>
		<script src="<?=base_url('assets/')?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="<?=base_url('assets/')?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- date-range-picker -->
		<script src="<?=base_url('assets/')?>bower_components/moment/min/moment.min.js"></script>
		<script src="<?=base_url('assets/')?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- bootstrap datepicker -->
		<script src="<?=base_url('assets/')?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- bootstrap color picker -->
		<script src="<?=base_url('assets/')?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<!-- bootstrap time picker -->
		<script src="<?=base_url('assets/')?>plugins/timepicker/bootstrap-timepicker.min.js"></script>

		<!-- AdminLTE App -->
		<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?=base_url('assets/')?>dist/js/demo.js"></script>
		<!-- page script -->

		<!-- iCheck 1.0.1 -->
		<script src="<?=base_url('assets/')?>/plugins/iCheck/icheck.min.js"></script>

		<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script> -->
		<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

		<script src="<?=base_url('assets/')?>dist/js/main.js"></script>

		<!-- <script src="<?=base_url()?>/upup.min.js"></script>
		<script>
			UpUp.start({
			'content-url': 'offline.html',
			'assets': ['/img/logo.png', '/css/style.css', 'headlines.json']
			});
		</script> -->

		<script>						
			function urlBase64ToUint8Array(base64String) {
				const padding = '='.repeat((4 - base64String.length % 4) % 4);
				const base64 = (base64String + padding)
					.replace(/-/g, '+')
					.replace(/_/g, '/');
				const rawData = window.atob(base64);
				const outputArray = new Uint8Array(rawData.length);
				for (let i = 0; i < rawData.length; ++i) {
					outputArray[i] = rawData.charCodeAt(i);
				}
				return outputArray;
			}

			if (!('serviceWorker' in navigator)) {
				console.log("Service worker tidak didukung browser ini.");
			} else {
				registerServiceWorker();
				requestPermission();
			}
			
			// Register service worker
			function registerServiceWorker() {
				return navigator.serviceWorker.register('<?=base_url()?>sw.js')
					.then(function (registration) {
						console.log('Registrasi service worker berhasil.');
						return registration;
					})
					.catch(function (err) {
						console.error('Registrasi service worker gagal.', err);
					});
			}

			function requestPermission() {
				if ('Notification' in window) {
					Notification.requestPermission().then(function (result) {
						if (result === "denied") {
							console.log("Fitur notifikasi tidak diijinkan.");
							return;
						} else if (result === "default") {
							console.error("Pengguna menutup kotak dialog permintaan ijin.");
							return;
						}
						
						if (('PushManager' in window)) {
							navigator.serviceWorker.getRegistration().then(function(registration) {
								registration.pushManager.subscribe({
									userVisibleOnly: true,
									applicationServerKey: urlBase64ToUint8Array("BBM3ZhbZ9j0Og57QieQ0dT6MjU5U4sVZcsc5j4dSWTlC3WvFp3Db1GBvwNcyAFfRn9VpiTuYUgcoFDSJYFYGkvo")
								}).then(function(subscribe) {
									console.log('Berhasil melakukan subscribe dengan endpoint: ', subscribe.endpoint);
									console.log('Berhasil melakukan subscribe dengan p256dh key: ', btoa(String.fromCharCode.apply(
										null, new Uint8Array(subscribe.getKey('p256dh')))));
									console.log('Berhasil melakukan subscribe dengan auth key: ', btoa(String.fromCharCode.apply(
										null, new Uint8Array(subscribe.getKey('auth')))));
									$.ajax({
										url: "<?=base_url();?>Auth/subscription_check",
										method: "POST",
										dataType: "JSON",
										success: function(data) {
											var sub_status = '';
											var sub_value = data[0].subscription;
											if (sub_value == '1') {
												return push_sendSubscriptionToServer(subscribe, 'PUT');
											} else {
												return push_sendSubscriptionToServer(subscribe, 'POST');
											}
										}
									});
								}).catch(function(e) {
									console.error('Tidak dapat melakukan subscribe ', e.message);
								});
							});
						}
					});
				}
			}
			
			function push_sendSubscriptionToServer(subscribe, method) {
				const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];

				return fetch('<?=base_url()?>push_subscription.php', {
					method,
					body: JSON.stringify({
						username : '<?php echo $this->session->userdata('username'); ?>',
						endpoint: subscribe.endpoint,
						publicKey: btoa(String.fromCharCode.apply(null, new Uint8Array(subscribe.getKey('p256dh')))),
						authToken: btoa(String.fromCharCode.apply(null, new Uint8Array(subscribe.getKey('auth')))),
						contentEncoding,
					}),
				}).then(() => subscribe);
			}
		</script>

		<script>
			$('#example1').DataTable({
					'responsive'  : true,
					'ordering'    : false,
				})
			$('#example2').DataTable({
					'responsive'  : true,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
			})

			//Initialize Select2 Elements
			// $('.select2').select2()

			//Datemask dd/mm/yyyy
			$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
			//Datemask2 mm/dd/yyyy
			$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
			//Money Euro
			$('[data-mask]').inputmask()

			//Date range picker
			$('#reservation').daterangepicker()

			//Date range picker with time picker
			$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})

			//Date range as a button
			$('#daterange-btn').daterangepicker(
			{
				ranges   : {
				'Today'       : [moment(), moment()],
				'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month'  : [moment().startOf('month'), moment().endOf('month')],
				'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate  : moment()
			},
			function (start, end) {
				$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
			}
			)

			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass   : 'iradio_minimal-blue'
			})
			//Red color scheme for iCheck
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass   : 'iradio_minimal-red'
			})
			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass   : 'iradio_flat-green'
			})

			//Date picker
			$('#datepicker').datepicker({
			autoclose: true
			})

			//Date picker
			$('#datepicker1').datepicker({
			autoclose: true
			})

			//Timepicker
			$('.timepicker').timepicker({
			showInputs: false
			})
		</script>

		<!-- <script>
			const sendPushButton = document.querySelector('#send-push-button');
			if (!sendPushButton) {
				return;
			}

			sendPushButton.addEventListener('click', () =>
				navigator.serviceWorker.ready
				.then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
				.then(subscription => {
					if (!subscription) {
					alert('Please enable push notifications');
					return;
					}

					const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];
					const jsonSubscription = subscription.toJSON();
					fetch('send_push_notification.php', {
					method: 'POST',
					body: JSON.stringify(Object.assign(jsonSubscription, { contentEncoding })),
					});
				})
			);
		</script> -->
	</body>
</html>
