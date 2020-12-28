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

            $.ajax({
                url: '<?= site_url() ?>/Users/C_cart/token',
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

    </body>

    </html>