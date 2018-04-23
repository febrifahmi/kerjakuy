$(document).ready(function(){
	loadProvinsi('#oriprovince');
	loadProvinsi('#desprovince');
	$('#oriprovince').change(function(){
		alert('yussan');
	});
	$('#desprovince').change(function(){
		alert('yussan');
	});
});
function loadProvinsi(id){
	$('#oricity').hide();
	$('#descity').hide();
	$(id).html('loading...');
	$.ajax({
		url:'process.php?act=showprovince',
		dataType:'json',
		success:function(response){
			$(id).html('');
			province = '';
			$.each(response['rajaongkir']['results'], function(i,n){
				province = '<option 
				value="'n['province_id']">'+n['province']+'</option>';
				province = province + '';
				$(id).append(province);
			});
		},
		error:function(){
			$(id).html('ERROR');
		}
	});
}