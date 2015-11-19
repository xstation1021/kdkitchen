var previous = null;
var current = null;
var clickCounter = 0;
var maxNumber = 0;
function initialNumberSort(){
	var number = 1;
	$.each($('select.sortorder'), function(){
		$(this).closest('td').next('td').html(number);
		$(this).val(number++);
	});
}

function sort(changedDropDown){
	var number = 1;
	$.each($('select.sortorder') ,function() {
		if($(this).val() > maxNumber){
			maxNumber = $(this).val();
		}
	});

	$.each($('select.sortorder') ,function() {

		if($(this).is(changedDropDown) == false){
			if($(this).val() == current){

				if(previous - current > 0){
					number++;
				}
				$(this).val(number);
				$(this).closest('td').next('td').html(number);
				if(current - previous > 0){
					number++;
				}
			}else {

				$(this).val(number);
				$(this).closest('td').next('td').html(number);
			}
			number++;
		}     	 
	});
}
function clickHiddenTh(){
	$("#sortTrigger").trigger("click");
}


$(document).ready(function(){

	var table = $('#sorttable').stupidtable();
	initialNumberSort();
	$.each($('select.sortorder') ,function() {
		if($(this).val() > maxNumber){
			maxNumber = $(this).val();
		}
	});

	table.bind('aftertablesort', function (event, data) {

		if(clickCounter % 2 != 0){
			$("#sortTrigger").trigger("click");
		}
		clickCounter++;
	});

	$("select.sortorder").on('focus', function () {
		previous = this.value;
	}).change(function() {
		current = $(this).val();
		$(this).closest('td').next('td').html(current);
		sort($(this));
		clickHiddenTh();
	});

});