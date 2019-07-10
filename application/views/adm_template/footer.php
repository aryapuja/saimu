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
<script src="<?php echo base_url() ?>assets/sa/dist/sweetalert2.all.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/sweetalert2@8.js"></script> -->


<script>
	$(document).ready(function() {
		$('.sidebar-menu').tree();
    	showMasterLokal();   //pemanggilan fungsi tampil lokal.
    	showMasterImport(); 
        showKpLokal();  //pemanggilan fungsi tampil lokal.
        showKpImport();
        showKpLokalView();
        showKpImportView();


    	var i=1;  
	    $('#add').click(function(){  
	        i++;  
            $('#input-container').find('.input-header').attr('id','row'+i);
            $('#input-container').find('#itemlokal').attr('data-idtarget','row'+i);
            $('#input-container').find('#itemimport').attr('data-idtarget','row'+i);
	        $('#input-container').find('button[name="remove"]').attr('id',i);
	        var html = String($('#input-container').html()); 
	        $('.input-field').append(html);  
	   	});

	    $(document).on('click', '.btn_remove', function(){  
	        var button_id = $(this).attr("id");   
	        $('#row'+button_id+'').remove();  
	    });

	    
	    
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
    				destroy			: true,
    				'autoWidth'   	: true,
    				'paging'		: false,
    				'lengthChange'	: false,
    				'searching'   	: true,
    				'ordering'    	: true,
    				'info'        	: true
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
    				destroy			: true,
    				'autoWidth'   	: true,
    				'paging'		: false,
    				'lengthChange'	: false,
    				'searching'   	: true,
    				'ordering'    	: true,
    				'info'        	: true
    			});
    		}

    	});
    }

/* ==================================== START ADD MASTER ==================================== */
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
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menambahkan data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
				$('#Modal_addmaster').modal('hide'); 
                refresh();
            }
        });

		return false;
	});
/* ===================================== END ADD MASTER ==================================== */

/* ==================================== START DELETE MASTER ==================================== */

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
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menghapus data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
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
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menghapus data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
    			$('#Modal_delete_master_import').modal('hide'); 
    			refresh();
    		}
    	});
    	return false;
    });
/* ===================================== END DELETE MASTER ====================================	*/

/* ==================================== START UPDATE MASTER ==================================== */

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
    
    //UPDATE MASTER to database (submit button)
    $('#formupdatemasterlokal').submit(function(e){
    	e.preventDefault(); 
		// memasukkan data dari form update ke variabel untuk update db
		var up_id 		= $('#id_brg_up_mlokal').val();
		var up_brg 		= $('#nama_brg_up_mlokal').val();
		var up_satuan	= $('#satuan_up_mlokal').val();
		var up_min_pack	= $('#min_pack_up_mlokal').val();
		var tabel 		= "master_lokal";

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
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil memperbarui data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
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

    //UPDATE MASTER to database (submit button)
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
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil memperbarui data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
				$('#Modal_update_master_import').modal('hide'); 
				refresh();
			}
		});
		return false;
	});
/* ===================================== END UPDATE MASTER ==================================== */


/* ==================================== GET KP Lokal ==================================== */

    function showKpLokal(){
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/ksokp_controller/getKpLokal',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                
                for(i=0; i<data.length; i++){
                    var ii = i+1;
                    color = "";
                    if (data[i].status_lokal == "OK") {
                        color = "#00ff00";
                    }else if(data[i].status_lokal == "LESS STOCK"){
                        color = "#ffff00";
                    }else if(data[i].status_lokal == "OVER STOCK"){
                        color = "#ff0000";
                    }
                    html += '<tr>'+
                    '<td hidden>'+data[i].id_lokal+'</td>'+
                    '<td>'+ii+'</td>'+
                    '<td>'+data[i].nama_brg_lokal+'</td>'+
                    '<td>'+data[i].satuan_lokal+'</td>'+
                    '<td>'+data[i].supplier_lokal+'</td>'+
                    '<td>'+data[i].min_pack_lokal+'</td>'+
                    '<td>'+data[i].safety_stock_pcs_lokal+'</td>'+
                    '<td>'+data[i].safety_stock_day_lokal+'</td>'+
                    '<td>'+data[i].avg_usage_lokal+'</td>'+
                    '<td>'+data[i].sto_daily_lokal+'</td>'+
                    '<td>'+data[i].usage_daily_lokal+'</td>'+
                    '<td>'+data[i].incoming_daily_lokal+'</td>'+
                    '<td>'+data[i].bal_lokal+'</td>'+
                    '<td style="background-color:'+color+';"> <b>'+data[i].status_lokal+'</b></td>'+
                    '<td>'+data[i].date_inp_lokal+'</td>'+
                    '<td>'+data[i].date_upd_lokal+'</td>'+
                    '<td>'+ 
                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit_kplokal" data-id_kplokal="'+data[i].id_lokal+
                            '" data-brg_kplokal="'+data[i].nama_brg_lokal+
                            '" data-supplier_kplokal="'+data[i].supplier_lokal+
                            '" data-avg_usage_kplokal="'+data[i].avg_usage_lokal+
                            '" data-sto_daily_kplokal="'+data[i].sto_daily_lokal+
                            '" data-usage_daily_kplokal="'+data[i].usage_daily_lokal+
                            '" data-incoming_daily_kplokal="'+data[i].incoming_daily_lokal+
                            '" data-satuan_kplokal="'+data[i].satuan_lokal+
                            '" data-min_pack_kplokal="'+data[i].min_pack_lokal+
                            '" data-safety_stock_pcs_kplokal="'+data[i].safety_stock_pcs_lokal+
                            '" data-safety_stock_day_kplokal="'+data[i].safety_stock_day_lokal+
                            '" data-bal_kplokal="'+data[i].bal_lokal+
                            '" data-status_kplokal="'+data[i].status_lokal+
                            '" data-date_inp_kplokal="'+data[i].date_inp_lokal+
                            '"> <span class="fa fa-edit"></span> </a>'+ 
                            '     '+
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_kplokal" data-id_kplokal="'+data[i].id_lokal+
                            '" data-brg_kplokal="'+data[i].nama_brg_lokal+
                            '"> <span class="fa fa-remove"></span> </a>'+
                    '</td>'+
                    '</tr>';
                }
                $('kp_lokal').DataTable().destroy();
                $('kp_lokal').find('tbody').empty();
                $('#show_kp_lokal').html(html);
                $('#kp_lokal').DataTable({
                    destroy         : true,
                    'autoWidth'     : true,
                    'paging'        : true,
                    'lengthChange'  : true,
                    'searching'     : true,
                    'ordering'      : true,
                    'info'          : true,
                    'scrollX'       : true
                });
            }

        });
    }
/* ==================================== END KP Lokal ==================================== */

/* ==================================== GET KP Import ==================================== */

    function showKpImport(){
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/ksokp_controller/getKpimport',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                
                for(i=0; i<data.length; i++){
                    var ii = i+1;
                    color = "";
                    if (data[i].status_import == "OK") {
                        color = "#00ff00";
                    }else if(data[i].status_import == "LESS STOCK"){
                        color = "#ffff00";
                    }else if(data[i].status_import == "OVER STOCK"){
                        color = "#ff0000";
                    }
                    html += '<tr>'+
                    '<td hidden>'+data[i].id_import+'</td>'+
                    '<td>'+ii+'</td>'+
                    '<td>'+data[i].nama_brg_import+'</td>'+
                    '<td>'+data[i].satuan_import+'</td>'+
                    '<td>'+data[i].supplier_import+'</td>'+
                    '<td>'+data[i].min_pack_import+'</td>'+
                    '<td>'+data[i].safety_stock_pcs_import+'</td>'+
                    '<td>'+data[i].safety_stock_day_import+'</td>'+
                    '<td>'+data[i].avg_usage_import+'</td>'+
                    '<td>'+data[i].sto_daily_import+'</td>'+
                    '<td>'+data[i].usage_daily_import+'</td>'+
                    '<td>'+data[i].incoming_daily_import+'</td>'+
                    '<td>'+data[i].bal_import+'</td>'+
                    '<td style="background-color:'+color+';"> <b>'+data[i].status_import+'</b></td>'+
                    '<td>'+data[i].date_inp_import+'</td>'+
                    '<td>'+data[i].date_upd_import+'</td>'+
                    '<td>'+ 
                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit_kpimport" data-id_kpimport="'+data[i].id_import+
                            '" data-brg_kpimport="'+data[i].nama_brg_import+
                            '" data-supplier_kpimport="'+data[i].supplier_import+
                            '" data-avg_usage_kpimport="'+data[i].avg_usage_import+
                            '" data-sto_daily_kpimport="'+data[i].sto_daily_import+
                            '" data-usage_daily_kpimport="'+data[i].usage_daily_import+
                            '" data-incoming_daily_kpimport="'+data[i].incoming_daily_import+
                            '" data-satuan_kpimport="'+data[i].satuan_import+
                            '" data-min_pack_kpimport="'+data[i].min_pack_import+
                            '" data-safety_stock_pcs_kpimport="'+data[i].safety_stock_pcs_import+
                            '" data-safety_stock_day_kpimport="'+data[i].safety_stock_day_import+
                            '" data-bal_kpimport="'+data[i].bal_import+
                            '" data-status_kpimport="'+data[i].status_import+
                            '" data-date_inp_kpimport="'+data[i].date_inp_import+
                            '"> <span class="fa fa-edit"></span> </a>'+ 
                            '     '+
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_kpimport" data-id_kpimport="'+data[i].id_import+
                            '" data-brg_kpimport="'+data[i].nama_brg_import+
                            '"> <span class="fa fa-remove"></span> </a>'+
                    '</td>'+
                    '</tr>';
                }
                $('kp_import').DataTable().destroy();
                $('kp_import').find('tbody').empty();
                $('#show_kp_import').html(html);
                $('#kp_import').DataTable({
                    destroy         : true,
                    'autoWidth'     : true,
                    'paging'        : true,
                    'lengthChange'  : true,
                    'searching'     : true,
                    'ordering'      : true,
                    'info'          : true,
                    scrollX         : true
                });
            }

        });
    }
/* ==================================== GET KP Import ==================================== */
    

/* ==================================== START ADD KP ==================================== */
    $('#addKpLokal').submit(function(e){
        e.preventDefault();
        // memasukkan data inputan ke variabel
        var itemlokal           = $('#itemlokal').val();
        var satuanlokal         = $('#satuanlokal').val();
        var minpacklokal        = $('#minpacklokal').val();
        var supplierlokal       = $('#supplierlokal').val();
        var avgusagelokal       = $('#avgusagelokal').val();
        var stodailylokal       = $('#stodailylokal').val();
        var usagedailylokal     = $('#usagedailylokal').val();
        var incomingdailylokal  = $('#incomingdailylokal').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/ksokp_controller/insertDataLokal",
            dataType : "JSON",
            data : $('#addKpLokal').serialize(),

            success: function(data){ 
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menambahkan data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                document.getElementById('addKpLokal').reset();
                // window.location.replace("<?php echo base_url();?>/index.php/ksokp_controller/formDataLokal");
            }
        });

        return false;
    });


    $('#addKpImport').submit(function(e){
        e.preventDefault();
        // memasukkan data inputan ke variabel
        var itemimport           = $('#itemimport').val();
        var satuanimport         = $('#satuanimport').val();
        var minpackimport        = $('#minpackimport').val();
        var supplierimport       = $('#supplierimport').val();
        var avgusageimport       = $('#avgusageimport').val();
        var stodailyimport       = $('#stodailyimport').val();
        var usagedailyimport     = $('#usagedailyimport').val();
        var incomingdailyimport  = $('#incomingdailyimport').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/ksokp_controller/insertDataImport",
            dataType : "JSON",
            data : $('#addKpImport').serialize(),

            success: function(data){ 
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil menambahkan data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                document.getElementById('addKpImport').reset();
                // window.location.replace("<?php echo base_url();?>/index.php/ksokp_controller/formDataImport");
            }
        });

        return false;
    });
/*  ==================================== END ADD KP ==================================== */

/* ==================================== START DELETE KP =================================== */
    //get data for delete record show prompt modal
    $('#kp_lokal').on('click','.item_delete_kplokal',function(){
        var id = $(this).data('id_kplokal');
        var brg = $(this).data('brg_kplokal');
         

        $('#Modal_delete_kp_lokal').modal('show');
        document.getElementById("msgkplokal").innerHTML='Item: "'+id+'"';

        $('[name="deletekplokal"]').val(id);
    });

    //delete record to database
    $('#formdeletekplokal').submit(function(e){
                e.preventDefault(); 
        var id = $('#deletekplokal').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/ksokp_controller/deleteKpLokal",
            dataType : "JSON",
            data : {id:id},
            success: function(){
                $('[name="deletekplokal"]').val("");                       
                 Swal.fire({
                    type: 'success',
                    title: 'Berhasil menghapus data ',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#Modal_delete_kp_lokal').modal('hide');
                $("#kp_lokal").DataTable().destroy();
                $("#kp_lokal").find('tbody').empty();
                document.getElementById('formdeletekplokal').reset();
                showKpLokal();  
            }
        });
        return false;
    });

    //get data for delete record show prompt modal
    $('#kp_import').on('click','.item_delete_kpimport',function(){
        var id = $(this).data('id_kpimport');
        var brg = $(this).data('brg_kpimport');
         

        $('#Modal_delete_kp_import').modal('show');
        document.getElementById("msgkpimport").innerHTML='Item: "'+brg+'"';

        $('[name="iddelimport"]').val(id);
    });

    //delete record to database
    $('#formdeletekpimport').submit(function(e){
        e.preventDefault(); 
        var id = $('#iddelimport').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/ksokp_controller/deleteKpImport",
            dataType : "JSON",
            data : {id:id},
            success: function(){
                $('[name="iddelimport"]').val("");                       
                 Swal.fire({
                    type: 'success',
                    title: 'Berhasil menghapus data ',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#Modal_delete_kp_import').modal('hide');
                $("#kp_import").DataTable().destroy();
                $("#kp_import").find('tbody').empty();
                document.getElementById('formdeletekpimport').reset();
                showKpImport();
                
            }
        });
        return false;
    });
/* ===================================== END DELETE KP ==================================== */
  
/* ==================================== START UPDATE KP ==================================== */

    //UPDATE MASTER to database (submit button)
    $('#kp_lokal').on('click','.item_edit_kplokal',function(){
        // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
        var upid            = $(this).data('id_kplokal');
        var upbrg           = $(this).data('brg_kplokal'); 
        var upsatuan        = $(this).data('satuan_kplokal'); 
        var upminpack       = $(this).data('min_pack_kplokal');
        var upsafetypcs     = $(this).data('safety_stock_pcs_kplokal'); 
        var upsafetyday     = $(this).data('safety_stock_day_kplokal'); 
        var upbalance       = $(this).data('bal_kplokal'); 
        var upstatus        = $(this).data('status_kplokal'); 
        var update          = $(this).data('date_inp_kplokal'); 
        var upsupplier      = $(this).data('supplier_kplokal');
        var upavgusage      = $(this).data('avg_usage_kplokal'); 
        var upstodaily      = $(this).data('sto_daily_kplokal');
        var upusagedaily    = $(this).data('usage_daily_kplokal');
        var upincoming      = $(this).data('incoming_daily_kplokal');


        // memasukkan data ke form updatean
        $('[name="id_up_kplokal"]').val(upid);
        $('[name="nama_brg_up_kplokal"]').val(upbrg);
        $('[name="supplier_up_kplokal"]').val(upsupplier);
        $('[name="avg_usage_up_kplokal"]').val(upavgusage);
        $('[name="sto_daily_up_kplokal"]').val(upstodaily);
        $('[name="usage_daily_up_kplokal"]').val(upusagedaily);
        $('[name="incoming_up_kplokal"]').val(upincoming);
        $('[name="satuan_up_kplokal"]').val(upsatuan);
        $('[name="min_pack_up_kplokal"]').val(upminpack);
        $('[name="safetyday_up_kplokal"]').val(upsafetyday);
        $('[name="safetypcs_up_kplokal"]').val(upsafetypcs);
        $('[name="balance_up_kplokal"]').val(upbalance);
        $('[name="status_up_kplokal"]').val(upstatus);
        $('[name="date_up_kplokal"]').val(update);

        $('#Modal_update_kp_lokal').modal('show');
    });
    
    //UPDATE MASTER to database (submit button)
    $('#formupdatekplokal').submit(function(e){
        e.preventDefault(); 
        // memasukkan data dari form update ke variabel untuk update db
        var up_id               = $('#id_up_kplokal').val();
        var up_supplier         = $('#supplier_up_kplokal').val();
        var up_min_pack         = $('#min_pack_up_kplokal').val();
        var up_safety_stock_pcs = $('#safetypcs_up_kplokal').val();
        var up_safety_stock_day = $('#safetyday_up_kplokal').val();
        var up_avgusage         = $('#avg_usage_up_kplokal').val();
        var up_stodaily         = $('#sto_daily_up_kplokal').val();
        var up_usagedaily       = $('#usage_daily_up_kplokal').val();
        var up_incoming         = $('#incoming_up_kplokal').val();
        var tabel               = "komponen_lokal";

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/ksokp_controller/updateKpLokal",
            dataType : "JSON",
            data : { 
                id_lokal_up:up_id,
                supplier_lokal_up:up_supplier,
                min_pack_lokal_up:up_min_pack,
                safety_stock_pcs_lokal:up_safety_stock_pcs,
                safety_stock_day_lokal:up_safety_stock_day,
                avgusage_lokal_up:up_avgusage,
                stodaily_lokal_up:up_stodaily,
                usagedaily_lokal_up:up_usagedaily,
                incoming_lokal_up:up_incoming,
                tabel:tabel
            },

            success: function(data){
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil memperbarui data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                $('#Modal_update_kp_lokal').modal('hide'); 
                $("#kp_lokal").DataTable().destroy();
                $("#kp_lokal").find('tbody').empty();
                document.getElementById('formupdatekplokal').reset();
                showKpLokal();
            }
        });
        return false;
    });

    //UPDATE MASTER to database (submit button)
    $('#kp_import').on('click','.item_edit_kpimport',function(){
        // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
        var upid            = $(this).data('id_kpimport');
        var upbrg           = $(this).data('brg_kpimport'); 
        var upsatuan        = $(this).data('satuan_kpimport'); 
        var upminpack       = $(this).data('min_pack_kpimport');
        var upsafetypcs     = $(this).data('safety_stock_pcs_kpimport'); 
        var upsafetyday     = $(this).data('safety_stock_day_kpimport'); 
        var upbalance       = $(this).data('bal_kpimport'); 
        var upstatus        = $(this).data('status_kpimport'); 
        var update          = $(this).data('date_inp_kpimport'); 
        var upsupplier      = $(this).data('supplier_kpimport');
        var upavgusage      = $(this).data('avg_usage_kpimport'); 
        var upstodaily      = $(this).data('sto_daily_kpimport');
        var upusagedaily    = $(this).data('usage_daily_kpimport');
        var upincoming      = $(this).data('incoming_daily_kpimport');


        // memasukkan data ke form updatean
        $('[name="id_up_kpimport"]').val(upid);
        $('[name="nama_brg_up_kpimport"]').val(upbrg);
        $('[name="supplier_up_kpimport"]').val(upsupplier);
        $('[name="avg_usage_up_kpimport"]').val(upavgusage);
        $('[name="sto_daily_up_kpimport"]').val(upstodaily);
        $('[name="usage_daily_up_kpimport"]').val(upusagedaily);
        $('[name="incoming_up_kpimport"]').val(upincoming);
        $('[name="satuan_up_kpimport"]').val(upsatuan);
        $('[name="min_pack_up_kpimport"]').val(upminpack);
        $('[name="safetyday_up_kpimport"]').val(upsafetyday);
        $('[name="safetypcs_up_kpimport"]').val(upsafetypcs);
        $('[name="balance_up_kpimport"]').val(upbalance);
        $('[name="status_up_kpimport"]').val(upstatus);
        $('[name="date_up_kpimport"]').val(update);

        $('#Modal_update_kp_import').modal('show');
    });

    $('#formupdatekpimport').submit(function(e){
        e.preventDefault(); 
        // memasukkan data dari form update ke variabel untuk update db
        var up_id               = $('#id_up_kpimport').val();
        var up_supplier         = $('#supplier_up_kpimport').val();
        var up_min_pack         = $('#min_pack_up_kpimport').val();
        var up_safety_stock_pcs = $('#safetypcs_up_kpimport').val();
        var up_safety_stock_day = $('#safetyday_up_kpimport').val();
        var up_avgusage         = $('#avg_usage_up_kpimport').val();
        var up_stodaily         = $('#sto_daily_up_kpimport').val();
        var up_usagedaily       = $('#usage_daily_up_kpimport').val();
        var up_incoming         = $('#incoming_up_kpimport').val();
        var tabel               = "komponen_import";

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/ksokp_controller/updateKpImport",
            dataType : "JSON",
            data : { 
                id_import_up:up_id,
                supplier_import_up:up_supplier,
                min_pack_import_up:up_min_pack,
                safety_stock_pcs_import:up_safety_stock_pcs,
                safety_stock_day_import:up_safety_stock_day,
                avgusage_import_up:up_avgusage,
                stodaily_import_up:up_stodaily,
                usagedaily_import_up:up_usagedaily,
                incoming_import_up:up_incoming,
                tabel:tabel
            },

            success: function(data){
                Swal.fire({
                            type: 'success',
                            title: 'Berhasil memperbarui data ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                $('#Modal_update_kp_import').modal('hide'); 
                $("#kp_import").DataTable().destroy();
                $("#kp_import").find('tbody').empty();
                document.getElementById('formupdatekpimport').reset();
                showKpImport();
            }
        });
        return false;
    });
/* ===================================== END DELETE KP ==================================== */
/* ===================================== Show admin home ==================================== */

function showKpLokalView(){
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/ksokp_controller/getKpLokalView',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    var ii = i+1;
                    color = "";
                    if (data[i].status_lokal == "OK") {
                        color = "#00ff00";
                    }else if(data[i].status_lokal == "LESS STOCK"){
                        color = "#ffff00";
                    }else if(data[i].status_lokal == "OVER STOCK"){
                        color = "#ff0000";
                    }
                    html += '<tr>'+
                    '<td hidden>'+data[i].id_okal+'</td>'+
                    '<td>'+ii+'</td>'+
                    '<td>'+data[i].nama_brg_lokal+'</td>'+
                    '<td>'+data[i].satuan_lokal+'</td>'+
                    '<td>'+data[i].sto_daily_lokal+'</td>'+
                    '<td>'+data[i].usage_daily_lokal+'</td>'+
                    '<td>'+data[i].incoming_daily_lokal+'</td>'+
                    '<td>'+data[i].bal_lokal+'</td>'+
                    '<td style="background-color:'+color+';"> <b>'+data[i].status_lokal+'</b></td>'+
                    '</tr>';
                }
                $('view_kp_lokal').find('tbody').empty();
                $('#show_view_kp_lokal').html(html);
               
            }

        });
    }

    function showKpImportView(){
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/ksokp_controller/getKpImportView',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    var ii = i+1;
                    color = "";
                    if (data[i].status_import == "OK") {
                        color = "#00ff00";
                    }else if(data[i].status_import == "LESS STOCK"){
                        color = "#ffff00";
                    }else if(data[i].status_import == "OVER STOCK"){
                        color = "#ff0000";
                    }
                    html += '<tr>'+
                    '<td hidden>'+data[i].id_import+'</td>'+
                    '<td>'+ii+'</td>'+
                    '<td>'+data[i].nama_brg_import+'</td>'+
                    '<td>'+data[i].satuan_import+'</td>'+
                    '<td>'+data[i].sto_daily_import+'</td>'+
                    '<td>'+data[i].usage_daily_import+'</td>'+
                    '<td>'+data[i].incoming_daily_import+'</td>'+
                    '<td>'+data[i].bal_import+'</td>'+
                    '<td style="background-color:'+color+';"> <b>'+data[i].status_import+'</b></td>'+
                    '</tr>';
                }
                $('view_kp_import').find('tbody').empty();
                $('#show_view_kp_import').html(html);
               
            }

        });
    }

/* ==================================== OTHER FUNCTION ==================================== */
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

    
     function change_satuan(rowid) { 
        let satuan = $('#'+rowid).find('#itemlokal').find(':selected').data('satuan');
        let min = $('#'+rowid).find('#itemlokal').find(':selected').data('min');
        $('#'+rowid).find('#satuanlokal').val(satuan);
        $('#'+rowid).find('#minpacklokal').val(min);
    }

     function change_satuan2(rowid) { 
        let satuan = $('#'+rowid).find('#itemimport').find(':selected').data('satuan');
        let min = $('#'+rowid).find('#itemimport').find(':selected').data('min');
        $('#'+rowid).find('#satuanimport').val(satuan);
        $('#'+rowid).find('#minpackimport').val(min);
    } 
</script>
</body>