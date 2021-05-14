$(document).on('click','#addbtn',function(e) {
		var data = $("#addition_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addNews').modal('hide');
						alert('You added new article!');
                        location.reload();
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var image=$(this).attr("data-image");
		var topic=$(this).attr("data-topic");
		var content=$(this).attr("data-content");
		var date=$(this).attr("data-date");
		var author=$(this).attr("data-author");
		$('#edit_id').val(id);
		$('#edit_image').val(image);
		$('#edit_topic').val(topic);
		$('#edit_content').val(content);
		$('#edit_date').val(date);
		$('#edit_author').val(author);
	});

	$(document).on('click','#update',function(e) {
		var data = $("#edition_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#changeNews').modal('hide');
						alert('Data updated successfully !');
                        location.reload();
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on("click", ".delete", function() {
		var id=$(this).attr("data-id");
		$('#delete_id').val(id);

	});
	$(document).on("click", "#delete", function() {
		$.ajax({
			url: "save.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#delete_id").val()
			},
			success: function(dataResult){
					$('#deleteNews').modal('hide');
					$("#"+dataResult).remove();

			}
		});
	});
	$(document).on("click", "#delete_selected", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-id'));
		});
		if(user.length <=0) {
			alert("Choose articles!");
		}
		else {
			WRN_PROFILE_DELETE = "Do you really want to delete - "+(user.length>1?"these":"this")+" data?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "save.php",
					cache:false,
					data:{
						type: 4,
						id : selected_values
					},
					success: function(response) {
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {
							$("#"+ids[i]).remove();
						}
					}
				});
			}
		}
	});
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#tickall").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;
				});
			} else{
				checkbox.each(function(){
					this.checked = false;
				});
			}
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#tickall").prop("checked", false);
			}
		});
	});
