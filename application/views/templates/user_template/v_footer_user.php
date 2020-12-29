    <!--
        *** FOOTER ***
        _________________________________________________________
        -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-4">
                </div>
                <?php if (!$this->session->userdata('email')) : ?>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="mb-3">User section</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            <li><a href="<?= base_url('Use/Register') ?>">Regiter</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="col-lg-3 col-md-6">
                    </div>
                <?php endif; ?>
                <!-- /.col-lg-3-->
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-3">Anda bisa mencari kami di</h4>
                    <p><strong>Jl. Banywangi</strong><br>Dusun Pasar Alas<br>Desa Garahan<br>Kode pos 68184<br>Kota Jember<br>Jawa Timur <br><strong>Pro Coffee</strong></p>
                    <hr class="d-block d-md-none">
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-3">Sosial Media Kami</h4>
                    <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="#" class="twitter external"><i class="fa fa-twitter"></i></a><a href="#" class="instagram external"><i class="fa fa-instagram"></i></a><a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a><a href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
                </div>
            </div>
            <!-- /.row-->
        </div>
        <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->


    <!--
        *** COPYRIGHT ***
        _________________________________________________________
        -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-center text-lg-left">©<?= date('Y'); ?> HookwayDev & Procoffee </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/">Bootstrapious</a>
                        <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="<?= base_url('assets/vendor_user/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/vendor_user/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/vendor_user/'); ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url('assets/vendor_user/'); ?>vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/vendor_user/'); ?>vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="<?= base_url('assets/vendor_user/'); ?>js/front.js"></script>
    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            var id = $('#id_transaksi').val();
            var total_bayar = $('#total_pembayaran').val();
            var tanggal = $('#waktu_transaksi_input').val();

            $.ajax({
                type: "POST",
                url: '<?= site_url() ?>/Users/C_history_pembelian/token',
                data: {
                    id: id,
                    total_bayar: total_bayar,
                    tanggal: tanggal
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $('input').keyup(function() { // run anytime the value changes
            var firstValue = Number($('#first').val()); // get value of field
            var secondValue = Number($('#second').val()); // convert it to a float
            var thirdValue = Number($('#third').val());
            var fourthValue = Number($('#fourth').val());

            $('#total_expenses1').html(firstValue + secondValue + thirdValue + fourthValue); // add them and output it
            document.getElementById('total_expenses2').value = firstValue + secondValue + thirdValue + fourthValue;
            // add them and output it
        });
    </script>
    <script>
        // Menghitung total berat qty yg dibeli lurr
	$('#formMu').click(function(){
		var bil1 = parseInt($('#ratrat').val())
		var bil2 = parseInt($('#jumlah_beli').val())	

		var hasil = bil1 * bil2
		$('#berat_input').attr('value', hasil);
	})
    </script>

    </body>

    </html>