<?php 

require_once 'koneksi.php';

 ?>


<style type="text/css">
.td{
	font-size: 14px;
}
.th{
	font-size: 15px;
}
</style>

<h1 class="m-0 font-weight-bold text-primary" style="text-align: center;">Konsumen</h1>
    <div class="card shadow mb-4">
           <div class="card-header py-3">
              
                  </div>
                  <div class="card-body">
                            <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Telepon</th>
                                            <th>Bank</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                  
                         <?php
                         $no = 1;
						 $sql = mysqli_query($koneksi, "SELECT * FROM user");
						while($data = mysqli_fetch_assoc($sql)){
						?>
                                    <tbody>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['nama_usr']?></td>
                                            <td><?=$data['email']?></td>
                                            <td><?=$data['gender']?></td>
                                            <td><?=$data['telp']?></td>
                                            <td><?=$data['bank']?></td>

                             				 <td>
                             
                                      <a href="index.php?page=detail-konsumen&id=<?=$data['id_user']?>" class="btn btn-success btn-circle"><i class="fas fa-eye"></i></a>


                             				 </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>