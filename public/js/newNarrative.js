$('.add').click(function() {
	console.log("a")
	$(".box").append("<input type='text' name='answer[]' class='col-md-12 col-xs-12 new'>");
});
$('.delete').click(function() {
	console.log("a")
	$(".new").remove();
});