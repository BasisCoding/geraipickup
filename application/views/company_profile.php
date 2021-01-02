            <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: black;">
                                    <div class="profile-image">
                                        <img class="logo" src="" alt="Logo">
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name" style="color: #07B378; font-weight: bold"></div>
                                        <div class="profile-data-title" style="color: #07B378;"></div>
                                    </div>
                                    <div class="profile-controls">
                                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                    </div>                                    
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-info btn-rounded btn-block btn-email"><span class="fa fa-envelope"></span> Email</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary btn-rounded btn-block btn-telepon"><span class="fa fa-phone-square"></span> Telepon</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">
                                    <div href="#" class="list-group-item">
                                        <span class="fa fa-bar-chart-o"></span> Pimpinan 
                                        <span class="badge badge-primary nama_direktur">Tantyo Nugroho</span>
                                    </div>
                                    <div href="#" class="list-group-item">
                                        <span class="fa fa-users"></span> Jumlah Karyawan 
                                        <span class="badge badge-primary jumlah_karyawan">18</span>
                                    </div>                                
                                    <div href="#" class="list-group-item">
                                        <span class="fa fa-envelope"></span> Email 
                                        <span class="badge badge-primary email"></span>
                                    </div>
                                    <div href="#" class="list-group-item">
                                        <span class="fa fa-phone-square"></span> Telepon 
                                        <span class="badge badge-primary telepon"></span>
                                    </div>
                                    <div href="#" class="list-group-item">
                                        <span class="fa fa-info-circle"></span> Status 
                                        <span class="badge badge-primary status"></span>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="panel panel-colorful">
                                <div class="panel-body">
                                    <h2>Profil Perusahaan</h2>
                                    <p>Silahkan isi sesuai ddengan data yang benar dan dapat di pertanggung jawabkan.</p>
                                    <form id="form-profile" enctype="multipart/form-data" method="POST">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Perusahaan</label>
                                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="ex : PT. BasisCoding Indonesia">
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Perusahaan</label>
                                                <input type="text" class="form-control" name="jenis_perusahaan" placeholder="ex : Distributor">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Direktur</label>
                                                <input type="text" class="form-control" name="nama_direktur" placeholder="ex : Ahmad Fatoni">
                                            </div>     
                                            <div class="form-group">
                                                <label>Status Perusahaan</label>
                                                <select name="status" class="form-control">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="Swasta">Swasta</option>
                                                    <option value="Negeri">Negeri</option>
                                                </select>
                                            </div>    
                                            <div class="form-group">
                                                <label>Tanggal Pendirian</label>
                                                <input name="tgl_pendirian" type="date" class="form-control">
                                            </div>        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Karyawan</label>
                                                <input type="number" name="jumlah_karyawan" class="form-control" placeholder="ex : 20">
                                            </div> 
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="pt...@....com">
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="number" name="telepon" class="form-control" placeholder="0254 ......">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" placeholder="Jalan Raya ....."></textarea>
                                            </div>   
                                            <div class="form-group">
                                                <label>Logo Perusahaan</label><br/>
                                                <input type="file" id="file-simple" name="logo">
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-footer"> 
                                    <button class="btn btn-warning pull-right" id="btn-ubah">Ubah</button>
                                    <button class="btn btn-danger pull-right" style="display: none;" id="btn-cancel">Cancel</button>
                                    <button class="btn btn-success pull-right" style="display: none;" id="btn-form-profile" type="submit" form="form-profile">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                </div>
            <!-- END PAGE CONTENT WRAPPER -->
             <div class="message-box message-box-success animated fadeIn" data-sound="alert" id="message-success">
                <div class="mb-container">
                    <div class="mb-middle">
                        <div class="mb-title"><span class="fa fa-check"></span> SUKSES</div>
                        <div class="mb-content">
                            <p>Data berhasil di simpan, browser ini akan reload dalam waktu 5 detik.</p>
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
                            <p>Data gagal disimpan, Silahkan coba kembali.</p>                    
                        </div>
                        <div class="mb-footer">
                            <button class="btn btn-info btn-lg pull-right mb-control-close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end danger with sound -->