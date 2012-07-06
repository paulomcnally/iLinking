var ss={};
ss.ajax_url=function(f){return "ajax/"+f+".php";}

ss.reg=function(){
	var name = $("#name");
	var nick = $("#nick");
	var email = $("#email");
	var password = $("#password");
	var register = $("#register");
	if( name.val() == "" ) { show.error( 'Escriba su nombre completo.', sw_timeHide ); name.focus(); return false; }
	if( nick.val() == "" ) { show.error( 'Escriba su nombre de usuario.', sw_timeHide ); nick.focus(); return false; }
	if( email.val() == "" ) { show.error( 'Escriba su direcci&oacute;n de correo electr&oacute;nico.', sw_timeHide ); email.focus(); return false; }
	if( password.val() == "" ) { show.error( 'Escriba una contrase&ntilde;a.', sw_timeHide ); password.focus(); return false; }
	register.hide();
	name.attr("disabled","disabled");
	nick.attr("disabled","disabled");
	email.attr("disabled","disabled");
	password.attr("disabled","disabled");
	$.ajax({
		type:"POST",
		url:ss.ajax_url('singup'),
		dataType:"json",
		data:"name="+name.val()+"&nick="+nick.val()+"&email="+email.val()+"&password="+password.val(),
		success:function(json)
			{
			if( json.status )
				{
				show.exito("Bienvenido",sw_timeHide);
				window.location = "phone.php";
				}
				else
					{
					show.error(json.msg,sw_timeHide);
					register.show();
					name.removeAttr("disabled");
					nick.removeAttr("disabled");
					email.removeAttr("disabled");
					password.removeAttr("disabled");
					}
			}
	});
}

ss.phone=function(){
	var mobile = $("#mobile");
	var add = $("#add");
	if( mobile.val() == "" ) { show.error( 'No ha ingresado un n&uacute;mero celular v&aacute;lido.', sw_timeHide ); mobile.focus(); return false; }
	mobile.attr("disabled","disabled");
	add.hide();
	$.ajax({
		type:"POST",
		url:ss.ajax_url('phone'),
		dataType:"json",
		data:"mobile="+mobile.val(),
		success:function(json)
			{
			if( json.status )
				{
				show.exito("Agregado!",sw_timeHide);
				window.location = "social.php";
				}
				else
					{
					show.error(json.msg,sw_timeHide);
					add.show();
					mobile.removeAttr("disabled");
					}
			}
		});
	}

ss.login=function()
	{
	var email = $("#email");
	var password = $("#password");
	var login = $("#login");
	if( email.val() == "" ) { show.error( 'Escria su direcci&oacute;n de correo electr&oacute;nico.', sw_timeHide); email.focus(); return false; }
	if( password.val() == "" ) { show.error( 'Escria su contrase&ntilde;a.', sw_timeHide); password.focus(); return false; }
	email.attr("disabled","disabled");
	password.attr("disabled","disabled");
	login.hide();
	$.ajax({
		type:"POST",
		url:ss.ajax_url('login'),
		dataType:"json",
		data:"email="+email.val()+"&password="+password.val(),
		success:function(json)
			{
			if( json.status )
				{
				show.exito("Bienvenido!",sw_timeHide);
				window.location = "index.php";
				}
				else
					{
					show.error(json.msg,sw_timeHide);
					email.removeAttr("disabled");
					password.removeAttr("disabled");
					login.show();
					password.val("");
					}
			}
		});
	}

ss.ls=function()
	{
	$.ajax({
		type:"GET",
		url:ss.ajax_url('last.sms'),
		success:function(html)
			{
			$("#ls_co").html(html);
			}
		});
	}