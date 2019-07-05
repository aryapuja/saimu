<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Input Data Komponen Packing Lokal</h1>
</section>
    <!-- Main content -->
<section class="content">

	<div class="container-fluid">
	
	<div class="form-group">
	<form id="addKomponenLokal">
	 	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data</h3>
            </div>
            <div class="box-body">
              <div class="row input-header">
                <div class="col-xs-3 form-group">
                	<label>Item</label>
                  <select class="form-control" name="itemlokal[]" id="itemlokal" required>
                  		<option>Pilih</option>
                  </select>
                </div>
                <div class="col-xs-3 form-group">
                	<label>Satuan</label>
                  <input type="text" class="form-control" name="satuanlokal[]" id="satuanlokal" placeholder="Masukkan Satuan" required>
                </div>
                <div class="col-xs-3 form-group">
                	<label>Min. Pack</label>
                  <input type="number" class="form-control" name="minpacklokal[]" id="minpacklokal" placeholder="Masukkan Min. Pack" required>
                </div>
                <div class="col-xs-3 form-group">
                	<label>Supplier</label>
                  <input type="text" class="form-control" name="supplierlokal[]" id="supplierlokal" placeholder="Masukkan Supplier" required>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3 form-group">
                	<label>AVG Usage/Day</label>
                  <input type="number" class="form-control" name="avgusagelokal[]" id="avgusagelokal" placeholder="Masukkan Avg Usage (day)" required>
                </div>
                <div class="col-xs-3 form-group">
                	<label>STO DAILY</label>
                  <input type="number" class="form-control" name="stodailylokal[]" id="stodailylokal" placeholder="Masukkan Sto Daily" required>
                </div>
                <div class="col-xs-3 form-group">
                	<label>USAGE DAILY</label>
                  <input type="number" class="form-control" name="usagedailylokal[]" id="usagedailylokal" placeholder="Masukkan Usage Daily" required>
                </div>
                <div class="col-xs-3 form-group">
                	<label>INCOMING DAILY</label>
                  <input type="number" class="form-control" name="incomingdailylokal[]" id="incomingdailylokal" placeholder="Masukkan Incoming Daily" required>
                </div>
              </div>
            
                <div class="input-field">
                            	
                </div>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer">
            	<button type="button" class="btn btn-primary"  name="add" id="add">Tambah Data Form</button>
				<button type="submit" id="submit" class="btn btn-success ">Input Data</button>
            </div>
          </div>
		</form>
		</div>

		<!-- form tambah -->
		<div id="input-container" style="display: none;">
		<div class="row input-header" style="margin-top: 1rem">
		<div class="box-header with-border" id="rows">
		  	<h3 class="box-title">Input Data</h3>
			<button type="button" name="remove" id="" class="btn btn-xs btn-danger btn_remove"><span class="fa fa-remove"></span></button>
        </div>
			<div class="col-xs-3 form-group">
				<label>Item</label>
                	<select class="form-control" name="itemlokal[]" id="itemlokal" required>
                 		<option>Pilih</option>
					</select>
            </div>
            <div class="col-xs-3 form-group">
            	<label>Satuan</label>
            	<input type="text" class="form-control" name="satuanlokal[]" id="satuanlokal" placeholder="Masukkan Satuan" required>
            </div>
            <div class="col-xs-3 form-group">
            	<label>Min. Pack</label>
              	<input type="number" class="form-control" name="minpacklokal[]" id="minpacklokal" placeholder="Masukkan Min. Pack" required>
            </div>
            <div class="col-xs-3 form-group">
            	<label>Supplier</label>
              	<input type="text" class="form-control" name="supplierlokal[]" id="supplierlokal" placeholder="Masukkan Supplier" required>
            </div>
    
            <div class="col-xs-3 form-group">
            	<label>AVG Usage/Day</label>
            	<input type="number" class="form-control" name="avgusagelokal[]" id="avgusagelokal" placeholder="Masukkan Avg Usage (day)" required>
            </div>
            <div class="col-xs-3 form-group">
            	<label>STO DAILY</label>
              	<input type="number" class="form-control" name="stodailylokal[]" id="stodailylokal" placeholder="Masukkan Sto Daily" required>
            </div>
            <div class="col-xs-3 form-group">
            	<label>USAGE DAILY</label>
              	<input type="number" class="form-control" name="usagedailylokal[]" id="usagedailylokal" placeholder="Masukkan Usage Daily" required>
            </div>
            <div class="col-xs-3 form-group">
            	<label>INCOMING DAILY</label>
              	<input type="number" class="form-control" name="incomingdailylokal[]" id="incomingdailylokal" placeholder="Masukkan Incoming Daily" required>
            </div>
		</div>
		</div>

	</div>

</section>


	<!-- content