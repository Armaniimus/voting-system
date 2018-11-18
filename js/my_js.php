<?php

require_once('../php/defined.php');
?>
var hostinstalldir='http://'+window.location.hostname+'<?php echo VOTING_SYSTEM_FOLDER;?>';

window.onload = function query() {
	const voteSystemSelectSubmit = document.querySelector('input[name="voteSystemSelectSubmit"]');
	voteSystemSelectSubmit.addEventListener('click', function() {
		const voteSystemSelect = document.querySelector('select[name="voteSystemSelect"]')
		if (!parseInt(voteSystemSelectSubmit.value)) {
			alert('Please, choose product');
			voteSystemSelect.focus();
			return false;
		}
		$(this).hide('fast');
		try{
			$(this).show('slow');
		}
		catch(err){}
		var tmp=parseInt($('input[name="radio1"]:checked').val());
		if (tmp==0){
			alert('Please, choose your vote');
			return false;
		}
		$.post(hostinstalldir+'php/voted.php',{'product':escape($('select[name="select1"]').val()),'vot':escape(tmp)},function(data){
		alert(data);
			var bla = escape($('select[name="select1"]').val());
			$('#sreda').empty();
			$('#sreda').load(hostinstalldir+'php/check.php?prodid='+bla);
		});
	});
}
