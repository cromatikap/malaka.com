$(document).ready(function() {

	/* traitement du formulaire */
	var parameters = {
		form: "form#connection",
		action: "login.ajax.php",
		success: "#success",
		error: "#error",
		errorClass: "wrong"	//class html de mise en surbriance du champs où il y a l'erreur
	};

	$(parameters.form).submit(function(event){
		event.preventDefault();

		//récupération des champs du formulaire
		var formData = new FormData($(this)[0]);

		$.post(parameters.action, $(parameters.form).serialize())
		.done(function(response){
			var champs = {};
			var success = true;
			console.log(response);
			response = $.parseJSON(response);

			//liste de tous les champs (input/textarea) du formulaire et mise à jour des erreurs
			$.each(response, function(tagName, value){
				//affiche ou non les erreurs en fonction de leur nom
				var errTag = $(parameters.error + " ." + tagName);
				//selectionne l'input (avec le name ou la class) concerné pour ajouter le style si l'erreur existe
				var input = $("[name='"+tagName+"'], ."+tagName+":not("+parameters.error+" ."+tagName+")")
				if(value){
					success = false;
					errTag.fadeIn();
					input.addClass(parameters.errorClass);
				}
				else{
					errTag.fadeOut();
					input.removeClass(parameters.errorClass);
				}				
			});

			//Dans le cas où aucune erreur n'a été relevée, on indique que le mail a été envoyé
			if(success){
				document.location.href = "admin/index.php";
			}
		});
	});
});