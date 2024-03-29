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
                            <a href="<?= base_url('Login/logout') ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="message-box message-box-success animated fadeIn" data-sound="alert" id="message-success">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> <span class="response-status"></span></div>
                    <div class="mb-content">
                        <p class="response-message"></p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="message-box message-box-error animated fadeIn" data-sound="fail" id="message-danger">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> <span class="response-status"></span></div>
                    <div class="mb-content">
                        <p class="response-message"></p>                    
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
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
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/bootstrap/bootstrap.min.js')?>"></script>        
        <!-- START THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/icheck/icheck.min.js')?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/fileinput/fileinput.min.js') ?>"></script>  
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/scrolltotop/scrolltopcontrol.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/plugins/owl/owl.carousel.min.js') ?>"></script>  
        <script type='text/javascript' src="<?= base_url('assets/js/plugins/noty/jquery.noty.js') ?>"></script>

        <script type='text/javascript' src="<?= base_url('assets/js/plugins/noty/layouts/topRight.js')?>"></script>      
        <script type='text/javascript' src="<?= base_url('assets/js/plugins/noty/themes/default.js') ?>"></script>


        <script src="https://maps.googleapis.com/maps/api/js"></script>
       <!--  <script type="text/javascript">
            $(function() {
                $('.money').inputmask('decimal', { 
                    prefix: " Rp ",
                    groupSeparator: ".",
                    placeholder: "0",
                    numericInput: true,
                    autoGroup: !0,
                    digits: 0,
                    removeMaskOnSubmit: true,
                    autoUnmask: true,
                });
            });
        </script> -->