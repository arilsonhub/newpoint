/*
 * Script criado por Ronaldo Hoch
 * Newpoint escolas profissionalizantes
 * Connect System Consultoria
 */

jQuery(document).ready(function(){

	/*Fancy box para mostrar a imagem da notícia*/
	$("a.fancyimagem").fancybox();
	
	/*Animação do menu*/
	$("#iconbar li a").hover(function(){
		var iconName = $(this).children("img").attr("src");
		var origen = iconName.split(".jpg")[0];
		$(this).animate({ width: "140px" }, {queue:false, duration:"normal"} );
		$(this).children("span").animate({opacity: "show"}, "fast");
	}, function(){
		var iconName = $(this).children("img").attr("src");
		$(this).animate({ width: "24px" }, {queue:false, duration:"normal"} );
		$(this).children("span").animate({opacity: "hide"}, "fast");
	});
	
	//Máscara dos formulários
	$("#celular").mask("(99)9999-999?9");
	$("#telefone").mask("(99)9999-999?9");
	$("#telefone2").mask("(99)9999-999?9");
	$('.numeroTelefone').mask("(99)9999-9999?9")
	$("#cpf").mask("999.999.999-99");
	$(".data").mask("99/99/9999");
	$(".horario").mask("99:99:99");

	$.validator.addMethod('customphone', function (value, element) {
	    return this.optional(element) || /^\(?\d{2}\)?[\s-]?\d{4}-?\d{4}$/.test(value);
	}, "Digite um número válido");

	$.validator.addMethod('customphone2', function (value, element) {
	    value = value.replace("(","");
	    value = value.replace(")","");
	    value = value.replace(" ","");
	    value = value.replace("-","");
	    value = value.replace("_","");
	    console.log("value",value,value.length, value.length<8,value.length>8)
	    if(value.length>8){
	    	return true;
	    }else{
	    	return false;
	    }
	}, "Digite um número válido");

	$.validator.addMethod('custombirthdate', function (value, element) {
	    value = value.replace("/","");
	    value = value.replace("/","");
	    value = value.replace("_","");
	    if(value.length==8){
	    	return true;
	    }else{
	    	return false;
	    }
	}, "Digite uma data no formato dd/mm/aaaa");

	$.extend($.validator.messages, {
		required: "Este campo é requerido.",
		remote: "Por favor, corrija este campo.",
		email: "Por favor, forneça um endereço eletrônico válido.",
		url: "Por favor, forneça uma URL válida.",
		date: "Por favor, forneça uma data válida.",
		dateISO: "Por favor, forneça uma data válida (ISO).",
		number: "Por favor, forneça um número válido.",
		digits: "Por favor, forneça somente dígitos.",
		creditcard: "Por favor, forneça um cartão de crédito válido.",
		equalTo: "Por favor, forneça o mesmo valor novamente.",
		accept: "Por favor, forneça um valor com uma extensão válida.",
		maxlength: $.validator.format("Por favor, forneça não mais que {0} caracteres."),
		minlength: $.validator.format("Por favor, forneça ao menos {0} caracteres."),
		rangelength: $.validator.format("Por favor, forneça um valor entre {0} e {1} caracteres de comprimento."),
		range: $.validator.format("Por favor, forneça um valor entre {0} e {1}."),
		max: $.validator.format("Por favor, forneça um valor menor ou igual a {0}."),
		min: $.validator.format("Por favor, forneça um valor maior ou igual a {0}.")
	});

	$("form.validarForm").validate({});
});