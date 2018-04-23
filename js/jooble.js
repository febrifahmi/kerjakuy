$(document).ready(function(){
	$('#hslpencarian').hide();
	showProvinsi('#province');
	// tampilkan kota setelah provinsi dipilih
	function showCity(idprovince,id){
		    $.ajax({
		        url:'proses.php?q=loadcity',
		        dataType:'json',
		        data:{province:idprovince},
		        success:function(response){
		            $(id).html('');
		            city = '';
		            $.each(response['rajaongkir']['results'], function(i,n)
		            {
		                city = '<option value="' + n['city_id'] + '">'+n['city_name']+'</option>';
		                city = city + '';
		                $(id).append(city);
		            });
		        },
		        error:function(){
		            $(id).html('ERROR');
		    	}
		});
	}
	// fungsi cari posisi di database jooble
	function posisiDicari(){
		var keyword = $("#jobkeyword").val();
		var namaprovinsi = $("#province option:selected").text();
		var namakota = $("#city option:selected").text();
		// send data to proses.php
		$.ajax({
			url: 'proses.php?q=getloker',
			type:'get',
			data:{keyword:keyword,namaprovinsi:namaprovinsi,namakota:namakota},
			success:function(response){
				// body...
				$("#hslcari").html(response);
			},
			error:function(){
				$("#hslcari").html('ERROR');
			}
		});
	}

	// penyesuaian onchange lokasi dan kata kunci

	$('#province').change(function(){
			$('#city').show();
            var idprovince = $('#province').val();
            showCity(idprovince,'#city');
    });

    // pencarian ketika tombol diklik 
    
    $('#btnsearch').click(function(){
    		$('#hslpencarian').show();
    		$('#hslcari').html('loading...');
            posisiDicari();
    });

});

function showProvinsi(id){
	$('#city').hide();
	$(id).html('loading...');
	$.ajax({
		url:'proses.php?q=loadprovince',
		dataType:'json',
		success:function(response){
			$(id).html('');
			province = '';
			$.each(response['rajaongkir']['results'], function(i,n)
			{
				province = '<option value= "' + n['province_id'] + '">'+ n['province'] + '</option>';
				province = province + '';
				$(id).append(province);
			});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});

}