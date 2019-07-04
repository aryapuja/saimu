<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/demo.js"></script>
<!-- DataTable -->
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		$('.sidebar-menu').tree();
    	showMasterLokal();   //pemanggilan fungsi tampil lokal.
    	showMasterImport();   //pemanggilan fungsi tampil lokal.


    //fungsi tampil barang
    function showMasterLokal(){
    	$.ajax({
    		type  : 'POST',
    		url   : '<?php echo base_url()?>index.php/ksokp_controller/getDataLokal',
    		async : false,
    		dataType : 'json',
    		success : function(data){
    			var html = '';
    			var i;
    			for(i=0; i<data.length; i++){
    				var ii = i+1;
    				html += '<tr>'+
    				'<td hidden>'+data[i].id_brg_lokal+'</td>'+
    				'<td>'+ii+'</td>'+
    				'<td>'+data[i].nama_brg_lokal+'</td>'+
    				'<td>'+data[i].min_pack_lokal+'</td>'+
    				'<td>'+data[i].satuan_lokal+'</td>'+
    				'<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit_mlokal" data-id_mlokal="'+data[i].id_brg_lokal+'" data-brg_mlokal="'+data[i].nama_brg_lokal+'" data-satuan_mlokal="'+data[i].satuan_lokal+'" data-min_mlokal="'+data[i].min_pack_lokal+'"> <span class="fa fa-edit"></span> </a>'+ 
    				'     '+
    				'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_mlokal" data-id_mlokal="'+data[i].id_brg_lokal+'" data-brg_mlokal="'+data[i].nama_brg_lokal+'"> <span class="fa fa-remove"></span> </a>'+
    				'</td>'+
    				'</tr>';
    			}
    			$('master_lokal').DataTable().destroy();
    			$('master_lokal').find('tbody').empty();
    			$('#show_master_lokal').html(html);
    			$('#master_lokal').DataTable({
    				destroy		: true,
    				'paging'      : true,
    				'lengthChange': true,
    				'searching'   : true,
    				'ordering'    : true,
    				'info'        : true,
    				'autoWidth'   : true
    			});
    		}

    	});
    }

    function showMasterImport(){
    	$.ajax({
    		type  : 'POST',
    		url   : '<?php echo base_url()?>index.php/ksokp_controller/getDataImport',
    		async : false,
    		dataType : 'json',
    		success : function(data){
    			var html = '';
    			var i;
    			for(i=0; i<data.length; i++){
    				var ii = i+1;
    				html += '<tr>'+
    				'<td hidden>'+data[i].id_brg_import+'</td>'+
    				'<td>'+ii+'</td>'+
    				'<td>'+data[i].nama_brg_import+'</td>'+
    				'<td>'+data[i].min_pack_import+'</td>'+
    				'<td>'+data[i].satuan_import+'</td>'+
    				'<td>'+ '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit_mimport" data-id_mimport="'+data[i].id_brg_import+'" data-brg_mimport="'+data[i].nama_brg_import+'" data-satuan_mimport="'+data[i].satuan_import+'" data-min_mimport="'+data[i].min_pack_import+'"> <span class="fa fa-edit"></span> </a>'+ 
    				'     '+
    				'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_mimport" data-id_mimport="'+data[i].id_brg_import+'" data-brg_mimport="'+data[i].nama_brg_import+'"> <span class="fa fa-remove"></span> </a>'+
    				'</td>'+
    				'</tr>';
    			}
    			$('master_import').DataTable().destroy();
    			$('master_import').find('tbody').empty();
    			$('#show_master_import').html(html);
    			$('#master_import').DataTable({
    				destroy		: true,
    				'paging'      : true,
    				'lengthChange': true,
    				'searching'   : true,
    				'ordering'    : true,
    				'info'        : true,
    				'autoWidth'   : true
    			});
    		}

    	});
    }

    /* =================================== START ADD RECORD ===================================		*/
    //Save kegiatan baru
    $('#formnewmaster').submit(function(e){
    	e.preventDefault();
		// memasukkan data inputan ke variabel
		var jenis		= $('#jenis').val();
		var nama_brg	= $('#nama_brg').val();
		var satuan		= $('#satuan').val();
		var min_pack	= $('#min_pack').val();

		$.ajax({
			type : "POST",
			url  : "<?php echo site_url(); ?>/ksokp_controller/newDataMaster",
			dataType : "JSON",
			data : {
				jenis:jenis,
				nama_brg:nama_brg,
				satuan:satuan,
				min_pack:min_pack
			},

			success: function(){ 
				$('#Modal_addmaster').modal('hide'); 
                refresh();
            }
        });

		return false;
	});
    /*  =================================== END ADD RECORD ===================================		*/

    /*  =================================== START DELETE RECORD ===================================	*/
    //get data for delete record show prompt modal
    $('#master_lokal').on('click','.item_delete_mlokal',function(){
    	var id = $(this).data('id_mlokal');
    	var brg = $(this).data('brg_mlokal'); 

    	$('#Modal_delete_master_lokal').modal('show');
    	document.getElementById("msglokal").innerHTML='Komponen Lokal: "'+brg+'"';

    	$('[name="iddellokal"]').val(id);
    });

    //delete record to database
    $('#formdeletemasterlokal').submit(function(e){
    	e.preventDefault(); 
    	var id = $('#iddellokal').val();
    	var tabel = "master_lokal";

    	$.ajax({
    		type : "POST",
    		url  : "<?php echo site_url(); ?>/ksokp_controller/deleteMaster",
    		dataType : "JSON",
    		data : {id:id,tabel:tabel},
    		success: function(){
    			$('[name="iddellokal"]').val("");
    			$('#Modal_delete_master_lokal').modal('hide'); 
    			refresh();
    		}
    	});
    	return false;
    });

    $('#master_import').on('click','.item_delete_mimport',function(){
    	var id = $(this).data('id_mimport');
    	var brg = $(this).data('brg_mimport'); 

    	$('#Modal_delete_master_import').modal('show');
    	document.getElementById("msgimport").innerHTML='Komponen Import: "'+brg+'"';

    	$('[name="iddelimport"]').val(id);
    });

    //delete record to database
    $('#formdeletemasterimport').submit(function(e){
    	e.preventDefault(); 
    	var id = $('#iddelimport').val();
    	var tabel = "master_import";

    	$.ajax({
    		type : "POST",
    		url  : "<?php echo site_url(); ?>/ksokp_controller/deleteMaster",
    		dataType : "JSON",
    		data : {id:id,tabel:tabel},
    		success: function(){
    			$('[name="iddelimport"]').val("");
    			$('#Modal_delete_master_import').modal('hide'); 
    			refresh();
    		}
    	});
    	return false;
    });


    /*	=================================== END DELETE RECORD ===================================	*/

    /*  =================================== START UPDATE RECORD ===================================	*/

    $('#master_lokal').on('click','.item_edit_mlokal',function(){
    	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
    	var upid 		= $(this).data('id_mlokal');
    	var upbrg 		= $(this).data('brg_mlokal'); 
    	var upsatuan	= $(this).data('satuan_mlokal');
    	var upmin		= $(this).data('min_mlokal'); 

        // memasukkan data ke form updatean
        $('[name="id_brg_up_mlokal"]').val(upid);
        $('[name="nama_brg_up_mlokal"]').val(upbrg);
        $('[name="satuan_up_mlokal"]').val(upsatuan);
        $('[name="min_pack_up_mlokal"]').val(upmin);

        $('#Modal_update_master_lokal').modal('show');
    });
    
    //UPDATE record to database (submit button)
    $('#formupdatemasterlokal').submit(function(e){
    	e.preventDefault(); 
		// memasukkan data dari form update ke variabel untuk update db
		var up_id 		= $('#id_brg_up_mlokal').val();
		var up_brg 		= $('#nama_brg_up_mlokal').val();
		var up_satuan	= $('#satuan_up_mlokal').val();
		var up_min_pack	= $('#min_pack_up_mlokal').val();
		var tabel 		= "master_lokal";
		alert(up_id);
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url(); ?>/ksokp_controller/updateMaster",
			dataType : "JSON",
			data : { 
				id_brg_up:up_id,
				nama_brg_up:up_brg,
				satuan_up:up_satuan,
				min_pack_up:up_min_pack,
				tabel:tabel
			},

			success: function(data){
				$('#Modal_update_master_lokal').modal('hide'); 
				refresh();
			}
		});
		return false;
	});

    $('#master_import').on('click','.item_edit_mimport',function(){
		// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
		var upid 		= $(this).data('id_mimport');
		var upbrg 		= $(this).data('brg_mimport'); 
		var upsatuan	= $(this).data('satuan_mimport');
		var upmin		= $(this).data('min_mimport'); 

	    // memasukkan data ke form updatean
	    $('[name="id_brg_up_mimport"]').val(upid);
	    $('[name="nama_brg_up_mimport"]').val(upbrg);
	    $('[name="satuan_up_mimport"]').val(upsatuan);
	    $('[name="min_pack_up_mimport"]').val(upmin);

	    $('#Modal_update_master_import').modal('show');
	});

    //UPDATE record to database (submit button)
    $('#formupdatemasterimport').submit(function(e){
    	e.preventDefault(); 
		// memasukkan data dari form update ke variabel untuk update db
		var up_id 		= $('#id_brg_up_mimport').val();
		var up_brg 		= $('#nama_brg_up_mimport').val();
		var up_satuan	= $('#satuan_up_mimport').val();
		var up_min_pack	= $('#min_pack_up_mimport').val();
		var tabel 		= "master_import";
		
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url(); ?>/ksokp_controller/updateMaster",
			dataType : "JSON",
			data : { 
				id_brg_up:up_id,
				nama_brg_up:up_brg,
				satuan_up:up_satuan,
				min_pack_up:up_min_pack,
				tabel:tabel
			},

			success: function(data){
				$('#Modal_update_master_import').modal('hide'); 
				refresh();
			}
		});
		return false;
	});

    /*  =================================== START UPDATE RECORD ===================================	*/

    function refresh() {

    	$("#master_lokal").DataTable().destroy();
    	$("#master_lokal").find('tbody').empty();
    	$("#master_import").DataTable().destroy();
    	$("#master_import").find('tbody').empty();

    	document.getElementById('formnewmaster').reset();
		document.getElementById('formupdatemasterlokal').reset();
		document.getElementById('formupdatemasterimport').reset();
		document.getElementById('formdeletemasterlokal').reset();
		document.getElementById('formdeletemasterimport').reset();

		showMasterLokal();   //pemanggilan fungsi tampil lokal.
		showMasterImport();   //pemanggilan fungsi tampil lokal.   
	}

});

</script>
</body>