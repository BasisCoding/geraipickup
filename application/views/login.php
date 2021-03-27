<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login Page Gerai PickUp</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url('assets/css/theme-default.css') ?>"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Selamat Datang</strong>, Silahkan Login</div>
                    <form class="form-horizontal" id="form-login" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control form-control-select" name="level">
                                <option value="admin">Administrator</option>
                                <option value="kurir">Kurir</option>
                                <option value="gerai">Gerai</option>
                                <option value="pimpinan">Pimpinan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-6 pull-right">
                            <button class="btn btn-info btn-block" id="btn-login">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2020 GPickUp
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        

        <div class="message-box message-box-success animated fadeIn" data-sound="alert" id="message-success">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> SUKSES</div>
                    <div class="mb-content">
                        <p>Selamat Anda berhasil login ke dalam aplikasi ini, silahkan tunggu 15 detik untuk beralih ke dashboard aplikasi.</p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-info btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="message-danger">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> GAGAL</div>
                    <div class="mb-content">
                        <p>Login Gagal, Silahkan coba kembali.</p>                    
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-info btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end danger with sound -->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= base_url('assets/audio/alert.mp3') ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url('assets/audio/fail.mp3') ?>" preload="auto"></audio>
        <!-- END PRELOADS -->

        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/bootstrap/bootstrap.min.js') ?>"></script>        
        <!-- END PLUGINS -->


        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script> 

        <script type="text/javascript">
            $(document).ready(function() {
                $('#form-login').on('submit', function() {
                    
                    $.ajax({
                        url: '<?= site_url('Login/proses_login') ?>',
                        type: 'POST',
                        dataType:'JSON',
                        data: $(this).serialize(),
                        beforeSend: function()
                        { 
                            $("#btn-login").attr('disabled', '');
                            $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span>   Sending ...');
                        },
                        success:function(response) {
                            if (response.status == 'success') {
                                $('.message-box-success').addClass('open');
                                playAudio('alert');
                            }else{
                                $('.message-box-danger').addClass('open');
                                playAudio('fail');
                            }
                            setTimeout(function(){ 
                              window.location.href = response.redirect;
                            }, 1500);
                        }
                    });

                    return false;
                });
            });
        </script>
    </body>
</html>






