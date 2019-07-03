<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    MASTER DATA LOKAL
<div class="pull-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_addmaster"><span class="fa fa-plus"></span> Add New Item</a></div>
  </h1>
</section>
    <!-- Main content -->
<section class="content">
	<!-- ==================================================== LOKAL ==================================================== -->
	<div class="container-fluid">

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
		<div class="box">  
			<div class="box-body">
				
	            <table id="master_lokal" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
	              <thead class="text-primary">
	                <tr>
	                  <th class="th-sm" hidden> ID </th>
	                  <th class="th-sm"> No </th>
	                  <th class="th-sm"> Nama Barang </th>
	                  <th class="th-sm"> Satuan </th>
	                  <th class="th-sm"> Aksi </th>
	                </tr>
	              </thead>
	              <tbody id="show_master_lokal">

	              </tbody>
	            </table>

			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
		<div class="box">  
			<div class="box-body">
				
	            <table id="master_import" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
	              <thead class="text-primary">
	                <tr>
	                  <th class="th-sm" hidden> ID </th>
	                  <th class="th-sm"> No </th>
	                  <th class="th-sm"> Nama Barang </th>
	                  <th class="th-sm"> Satuan </th>
	                  <th class="th-sm"> Aksi </th>
	                </tr>
	              </thead>
	              <tbody id="show_master_import">

	              </tbody>
	            </table>

			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	
	</div>

<!-- form new master lokal -->
	<form id="formnewmaster">
		<div class="modal fade" id="Modal_addmaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Item Local</h4>
						<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="form-group col-lg-12">
									<div class="col-md-12">
										<label>Asal Komponen</label>
										<select class="form-control" name="jenis" id="jenis">
											<option disabled selected hidden>Pilih Asal Komponen</option>
											<option value="master_import">Import</option>
											<option value="master_lokal">Lokal</option>
										</select>
									</div>
									<div class="col-md-12">
										<label>Nama Item</label>
										<input type="text" id="nama_brg" name="nama_brg" class="form-control" placeholder="Masukkan Item" style="width: 100%" required>
									</div>
									<div class="col-md-12">
										<label>Satuan</label>
										<input type="text" id="satuan" name="satuan" class="form-control" placeholder="Masukkan Satuan Lokal" style="width: 100%" required>
									</div>
									<div class="col-md-12">
										<label>Minimum Pack</label>
										<input type="number" id="min_pack" name="min_pack" class="form-control" placeholder="Masukkan Min. Lokal" style="width: 100%" required>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</form>
	<!-- form new master lokal -->
	<form id="formupdatelokal">
		<div class="modal fade" id="Modal_updatemasterlokal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="max-width: 70%">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Item Local</h4>
						<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="form-group col-lg-12 row">
									<div class="col-4">
										<label>Item</label>
										<input type="text" id="nama_brg_lokal_up" name="nama_brg_lokal_up" class="form-control" placeholder="Masukkan Item" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Satuan Lokal</label>
										<input type="text" id="satuan_lokal_up" name="satuan_lokal_up" class="form-control" placeholder="Masukkan Satuan Lokal" style="width: 100%" required>
									</div>
									<div class="col-4">
										<label>Minimum Pack</label>
										<input type="number" id="min_pack_lokal_up" name="min_pack_lokal_up" class="form-control" placeholder="Masukkan Min. Lokal" style="width: 100%" required>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="hidden" id="id_brg_lokal_up" name="id_brg_lokal_up" value="">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</form>

</section>
    <!-- /.content