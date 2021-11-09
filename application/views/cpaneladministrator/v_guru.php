        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Terapis & Guru</h1> <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
                                <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($this->session->flashdata('alert')) { ?>
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Gagal</strong> <?php echo $this->session->flashdata('alert'); ?>
                                        </div>
                                    <?php } ?>

                                    <?php if ($this->session->flashdata('sukses')) { ?>
                                        <div class="alert alert-success alert-dismissible " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <span>Data Terapis & Guru Berhasil</span> <?php echo $this->session->flashdata('sukses'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="card-box table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Photo</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Tempat/Tgl Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($data->result_array() as $i) :
                                                    $no++;
                                                    $id = $i['guru_id'];
                                                    $nip = $i['guru_nip'];
                                                    $nama = $i['guru_nama'];
                                                    $jenkel = $i['guru_jenkel'];
                                                    $tmp_lahir = $i['guru_tmp_lahir'];
                                                    $tgl_lahir = $i['guru_tgl_lahir'];
                                                    $photo = $i['guru_photo'];

                                                ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <?php if (empty($photo)) : ?>
                                                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                                                        <?php else : ?>
                                                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                                                        <?php endif; ?>
                                                        <td><?php echo $nip; ?></td>
                                                        <td><?php echo $nama; ?></td>
                                                        <td><?php echo $tmp_lahir . ', ' . $tgl_lahir; ?></td>
                                                        <?php if ($jenkel == 'L') : ?>
                                                            <td>Laki-Laki</td>
                                                        <?php else : ?>
                                                            <td>Perempuan</td>
                                                        <?php endif; ?>
                                                        <td style="text-align:center;">
                                                            <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>">Ubah</a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal tambah -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Terapis & Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'cpaneladministrator/simpan_guru' ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mt-2 control-label">NIP</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnip" class="form-control" id="inputUserName" placeholder="NIP" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mt-2 control-label">Nama</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mt-2 control-label">Jenis Kelamin</label>
                                <div class="col-sm-7 mt-2">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                        <label for="inlineRadio1"> Laki-Laki </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                        <label for="inlineRadio2"> Perempuan </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->

                            <!-- Date range -->
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mt-2 control-label">Tempat Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xtmp_lahir" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mt-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" name="xtgl_lahir" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 mt-2 control-label">Foto</label>
                                <div class=" input-group col-sm-7">
                                    <input class="form-control" type="file" name="filefoto" required />
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal edit -->
        <?php foreach ($data->result_array() as $i) :
            $id = $i['guru_id'];
            $nip = $i['guru_nip'];
            $nama = $i['guru_nama'];
            $jenkel = $i['guru_jenkel'];
            $tmp_lahir = $i['guru_tmp_lahir'];
            $tgl_lahir = $i['guru_tgl_lahir'];
            $photo = $i['guru_photo'];
        ?>
            <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Terapis & Guru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/update_guru' ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                                    <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                                    <label for="inputUserName" class="col-sm-4 mt-2 control-label">NIP</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $nip; ?>" name="xnip" class="form-control" id="inputUserName" placeholder="NIP" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 mt-2 control-label">Nama</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $nama; ?>" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 mt-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-7 mt-2">
                                        <?php if ($jenkel == 'L') : ?>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        <?php else : ?>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- /.form group -->

                                <!-- Date range -->
                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 mt-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="xtmp_lahir" value="<?php echo $tmp_lahir; ?>" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 mt-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $tgl_lahir ?>" name="xtgl_lahir" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputUserName" class="col-sm-4 mt-2 control-label">Foto</label>
                                    <div class=" input-group col-sm-7">
                                        <input class="form-control" type="file" name="filefoto" required />
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-info btn-flat" id="simpan">Ubah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <!-- hapus guru -->
        <?php foreach ($data->result_array() as $i) :
            $id = $i['guru_id'];
            $nip = $i['guru_nip'];
            $nama = $i['guru_nama'];
            $jenkel = $i['guru_jenkel'];
            $tmp_lahir = $i['guru_tmp_lahir'];
            $tgl_lahir = $i['guru_tgl_lahir'];
            $mapel = $i['guru_mapel'];
            $photo = $i['guru_photo'];
        ?>
            <!--Modal Hapus Pengguna-->
            <div class="modal fade" id="ModalHapus<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Terapis & Guru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'cpaneladministrator/hapus_guru' ?>" method="post">
                                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                                <p>Apakah Anda yakin mau menghapus <b> <?php echo $nama; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger btn-flat" id="simpan">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>