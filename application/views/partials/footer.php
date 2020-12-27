        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= base_url('assets/audio/alert.mp3') ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url('assets/audio/fail.mp3') ?>" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery-ui.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/bootstrap/bootstrap.min.js') ?>"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/icheck/icheck.min.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/fileinput/fileinput.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/scrolltotop/scrolltopcontrol.js') ?>"></script>
        
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        
    <!-- END SCRIPTS -->    