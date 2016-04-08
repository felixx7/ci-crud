        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="col-lg-8"> 
                    <?php $uri = $this->uri->segment(2); ?>

                    <?php if ($uri == 'edit_biodata'){ ?>
                        <form action="<?=base_url();?>home/edit_biodata_proses/<?=$biodata['id'];?>" method="post"> 
                    <?php } else { ?>
                        <form action="<?=base_url();?>home/tambah_biodata" method="post"> 
                    <?php } ?>

                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value='<?php if ($uri == 'edit_biodata'){ echo $biodata['nama'];}?> '>
                        <br/>
                        <label>Kelamin</label>
                            <select name="kelamin" class="form-control">
                                <option value="">-- Pilih Kelamin --</option>
                                <option value="L" <?php if (($uri == 'edit_biodata') && ($biodata['kelamin'] == 'L')){ echo 'selected'; }?>>Laki-laki</option>
                                <option value="P" <?php if (($uri == 'edit_biodata') && ($biodata['kelamin'] == 'P')){ echo 'selected'; }?>>Perempuan</option>
                            </select>
                        <br/>

                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" style="height:200px;"><?php if ($uri == 'edit_biodata'){ echo $biodata['alamat'];}?></textarea>
                        <br/>

                    <?php if ($uri == 'edit_biodata'){ ?>
                        <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>  
                        <div class="pull-right">&nbsp;</div>
                        <button class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit Biodata</button>
                    <?php } else { ?>
                        <button class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</button><br/><br/>
                    <?php } ?>
                        
                    </form>

                    <?php if ($uri == ''){ ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px">No.</th>
                                    <th>Nama</th>
                                    <th>Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                           
                                <?php $no=1;
                                    foreach($biodata as $tampil){  ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$tampil['nama'];?></td>
                                        <td><?=$tampil['kelamin'];?></td>
                                        <td><?=$tampil['alamat'];?></td>
                                        <td>
                                            <a href="<?=base_url();?>home/edit_biodata/<?=$tampil['id'];?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                            <a href='#' data-toggle='modal' data-target='#delete-<?=$tampil['id']; ?>' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <div class='modal fade' id='delete-<?=$tampil['id']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                    <h4 class='modal-title' id='myModalLabel'>Hapus Barang</h4>
                                                </div>
                                                <div class='modal-body'>
                                                    <p>Hapus <b><?=$tampil['nama']; ?></b> ?</p>
                                                    <a href='<?=base_url();?>home/delete_biodata/<?=$tampil['id'];?>' class='btn btn-sm btn-danger'>Yes</a>
                                                    <button type='button' class='btn btn-sm btn-default' data-dismiss='modal'>Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>           
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->