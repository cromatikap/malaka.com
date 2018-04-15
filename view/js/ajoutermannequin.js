var parameters = {
	form: "form#add",
	action: "ajoutermannequin.ajax.php",
	success: "#success",
	error: "#error",
	errorClass: "wrong"	//class html de mise en surbriance du champs où il y a l'erreur
};

$(document).ready(function(){
	/* paramétrage du loader d'image */
	var i = 0;
	Dropzone.autoDiscover = false;
	$("div#my-awesome-dropzone").dropzone({ 
		url: "../dropzone.ajax.php",
		method: "post",
		parallelUploads: 1,
		maxFilesize: 2.5,
		uploadMultiple: "multiple",
		maxFiles: 5,
		acceptedFiles: "image/*",
		addRemoveLinks: true,
		success: function(r){
			if(r.xhr.response != "error")
				$(parameters.form).append("<input type='hidden' name='file"+(i++)+"' value='"+r.xhr.response+"' />");
		},
		dragstart: function(e){
			alert(1);
		}
	});


});