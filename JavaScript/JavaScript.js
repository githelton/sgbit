// JavaScript Document
jQuery(function($){
			$("#cpf").mask('999.999.999-99');
			$("#fone").mask('(99) 99999-9999');
			
			$("#cep_colaborador").mask('99999-999');
			$("#cep_inst").mask('99999-999');
			$("#cep_nucleo").mask('99999-999');
			$("#cep_setor").mask('99999-999');
			$("#tel_fixo_colaborador").mask('9999-9999');
			$("#tel_fixo_inst").mask('9999-9999');
			$("#tel_fixo_nucleo").mask('9999-9999');
			$("#tel_fixo_setor").mask('9999-9999');
			$("#tel_fixo_sitio").mask('9999-9999');
			$("#fax_colaborador").mask('9999-9999');
			$("#fax_inst").mask('9999-9999');
			$("#fax_nucleo").mask('9999-9999');
			$("#fax_setor").mask('9999-9999');
			$("#fax_sitio").mask('9999-9999');
			$("#cel_colaborador").mask('9999-9999');
			$("#cel_inst").mask('9999-9999');
			$("#cel_nucleo").mask('9999-9999');
			$("#cel_setor").mask('9999-9999');
			$("#cel_sitio").mask('9999-9999');
			$("#cnpj_inst").mask('99.999.999/9999-99');
});

/*************************************************************/

function mostra_brasil(){
    document.getElementById('pt-br').style.visibility = "visible";
    document.getElementById('en-us').style.visibility = "hidden";
}

function mostra_eua(){
    document.getElementById('en-us').style.visibility = "visible";
    document.getElementById('pt-br').style.visibility = "hidden";
}

function nao_mostra(){
    document.getElementById('en-us').style.visibility = "hidden";
    document.getElementById('pt-br').style.visibility = "hidden";
}

/***************************************************************/

function horizontal() {
 
   var navItems = document.getElementById("menu_dropdown").getElementsByTagName("li");
   var selectedEffect = "blind";   
   var options = {};
    
   for (var i=0; i< navItems.length; i++) {
      if(navItems[i].className == "submenu")
      {
         if(navItems[i].getElementsByTagName('ul')[0] != null)
         {
            navItems[i].onmouseover=function() {this.getElementsByTagName('ul')[0].style.display="block";this.style.backgroundColor = "#f9f9f9";}
            navItems[i].onmouseout=function() {this.getElementsByTagName('ul')[0].style.display="none";this.style.backgroundColor = "#FFFFFF";
			}
         }
      }
   }
}

/***************************************************************/

var Slide = new Array();
var Vet_Slide = new Array();
var indSlide = 0;
var ultSlide = 0;

    var selectedEffect = "puff";   
    var options = {};

	function start_variables_Slide(param){
	    if (param != ""){
	       Vet_Slide = param.split(","); 
	       while (indSlide < Vet_Slide.length){
	            Slide[indSlide] = "images/Fotos/"+Vet_Slide[indSlide];
		        indSlide++;
	       }
	    }
	    
	    ultSlide = Slide.length - 1;
	}
	
	function MostraSlide(direcao){
	   indSlide = indSlide + direcao;
	   if(indSlide > ultSlide){indSlide = 0;};
	   if(indSlide < 0) {indSlide = ultSlide};	   
	   document.FigSlide.src = Slide[indSlide];
	   $( "#FigSlide" ).show( selectedEffect, options, 1000, "" );
	}

	var mySlideList1 = Slide;
	var mySlideShow1 = new SlideShow(mySlideList1, 'FigSlide', 10000, "mySlideShow1"); 

	function SlideShow(slideList, image, speed, name){
	    this.slideList = slideList;
	    this.image = image;
	    this.speed = speed;
	    this.name = name;
	    this.current = 0;
	    this.timer = 0;
	}
	SlideShow.prototype.play = SlideShow_play; 

	function SlideShow_play(){
	       with(this){
	             MostraSlide(1);
	             clearTimeout(timer);
	             timer = setTimeout(name+'.play()', speed);
	       }
	 }
 
/***************************************************************/

function troca_src_1(){
    document.getElementById("anterior").src = "images/back1.png";
    document.getElementById("proximo").src = "images/front.png";
}
 
function troca_src_2(){
    document.getElementById("anterior").src = "images/back.png";
    document.getElementById("proximo").src = "images/front1.png";
}

function limpa(){
    document.getElementById("anterior").src = "images/back.png";
    document.getElementById("proximo").src = "images/front.png";
}

/***************************************************************/

/******************************************************************/

function troca_src_1(){
    document.anterior.src = "images/back1.png";
    document.proximo.src = "images/front.png";
}
 
function troca_src_2(){
    document.anterior.src = "images/back.png";
    document.proximo.src = "images/front1.png";
}

function troca_src(id,img){
	document.getElementById(id).src = img;
}

function limpa(){
    document.anterior.src = "images/back.png";
    document.proximo.src = "images/front.png";
}

/******************************************************************/

function mostra(a,a1,a2,a3,b,b1,b2,b3){
   var aux = "#"+a;
   var selectedEffect = "blind";   
   var options = {};
   
   var c=document.getElementById(a);
   var c1=document.getElementById(a1);
   var c2=document.getElementById(a2);
   var c3=document.getElementById(a3);
   var d=document.getElementById(b);
   var d1=document.getElementById(b1);
   var d2=document.getElementById(b2);
   var d3=document.getElementById(b3);
   
   if(c.style.display=="none"){
      // run the effect
      $( aux ).show( selectedEffect, options, 0, "" ); 
      
	  c.style.display="";
	  d.src = "../images/minus.png";
	  
	  c1.style.display="none";
	  d1.src = "../images/plus.png";
	  
	  c2.style.display="none";
	  d2.src = "../images/plus.png";
	  
	  c3.style.display="none";
	  d3.src = "../images/plus.png"; 
   }
   else{
      // run the effect
      $( aux ).hide( selectedEffect, options, 0, "" );
	  c.style.display="none";
	  d.src = "../images/plus.png";
   }
}

function show(aux1, aux2){
    var aux = "#"+aux2;
    var selectedEffect = "blind";   
    var options = {};
    
	if (aux1 == 'y'){
		// run the effect
        $( aux ).show( selectedEffect, options, 0, "" );
		document.getElementById(aux2).style.display = "";
	}else{
	    $( aux ).hide( selectedEffect, options, 0, "" );
		document.getElementById(aux2).style.display = "none";
	}
}

function show2(aux1, aux2, aux3){
    
	if (aux1 == 'y'){
		document.getElementById(aux2).style.display = "";
		document.getElementById(aux3).style.display = "";
	}else{
		document.getElementById(aux2).style.display = "none";
		document.getElementById(aux3).style.display = "none";
	}
}


function habilitaFormCategoria(control){

	if (control == 0){
	    for (var i=1; i<=4; i++){
	    	document.getElementById("inv"+i).style.display = "";
	    }
	}else{
		if (control == 1){
		    for (var j=1; j<=4; j++){
				document.getElementById("inv"+j).style.display = "none";
			}
		}
    }
	
}

function habilitaFormCategoria_metadados(control){

	if (control == 0){
	    for (var i=1; i<=4; i++){
	    	document.getElementById("inv"+i).style.display = "";
	    }
	}
	
	if (control == 1){
	    for (var j=1; j<=4; j++){
			document.getElementById("inv"+j).style.display = "none";
		}
	}
	
}

function habilitaNovaInfraestrutura(control){

	if (control == 0){
	    document.getElementById("new_infra").style.display = "";
	}
	
	if (control == 1){
		document.getElementById("new_infra").style.display = "none";
	}
	
}

function validarCampoNumerico(campo, desc) {

  if (isNaN(parseFloat(document.getElementById(campo).value)) || (document.getElementById(campo).value == "")) {

     alert ("O campo '"+desc+"' somente aceita valores num\xE9ricos!");
     document.getElementById(campo).value = "";

  }

}

function change_back(a,b){

   document.getElementById("buscar_col_projeto").value = "";
   
   var c=document.getElementById(a);
   var d=document.getElementById(b);
   if(d.checked==false){
   	   c.style.background="#E0E5CD";
   }else{
	   c.style.background="#B9C48C";
   }
}

function campos(a){	
   var c=document.getElementById(a);
   if(c.style.display=="none"){
       c.style.display=""; 
   }else{
       c.style.display="none";	
   }	
}

function mostra_varios_campos(vet){	
   tam = vet.length;	
   for (i=0; i<tam; i++){
	   var c=document.getElementById(vet[i]);
	   if(c.style.display=="none"){
	       c.style.display=""; 
	   }	
   }
}

function esconde_varios_campos(vet){	
   tam = vet.length;	
   for (i=0; i<tam; i++){
	   var c=document.getElementById(vet[i]);
	   if(c.style.display==""){
	       c.style.display="none"; 
	   }	
   }
}


/*function removerFilho(a,b){
	   
   var pai = document.getElementById(a);
   var filho = document.getElementById(b);	
   pai.removeChild(filho); 
      
}*/

function removerFilho(b){
	   
   var selectedEffect = "blind";   
   var options = {};

   // run the effect
   $( b ).hide( selectedEffect, options, 0, "" );
   
}

function campos2(a,b){
   var aux = "#"+a;
   var selectedEffect = "blind";   
   var options = {};			
   var c=document.getElementById(a);
   var d=document.getElementById(b);
   if(c.style.display=="none"){
       $( aux ).show( selectedEffect, options, 0, "" );
	   c.style.display="";
	   d.src = "../images/seta3.png";	   
   }else{
       $( aux ).hide( selectedEffect, options, 0, "" );
	   c.style.display="none";
	   d.src = "../images/plus2.png";
   }	
}

function desabilita(a,b){
   var c=document.getElementById(a);
   var d=document.getElementById(b);
   if(c.style.display=="none"){
		  c.style.display="";
		  d.style.display="none";
	   }
	   else{
		  c.style.display="none";
		  d.style.display="";
	   }
}

function mostrapg(a,b){
   var c=document.getElementById(a);
   var d=document.getElementById(b);
   var i;
   
   for(i = 1; i<=b; i++){
      document.getElementById("pag-"+i).style.display="none";
      document.getElementById("current-"+i).style.background="#7EBE81";
      document.getElementById("current-"+i).style.color="#000000";
   }
      
   document.getElementById("pag-"+a).style.display="";
   document.getElementById("current-"+a).style.background="#2B572C";
   document.getElementById("current-"+a).style.color="#FFFFFF";
}


function zera(){
	cont=document.getElementById('cont');
	if (cont != null){
		cont.value=0;
	}
	
    contproj=document.getElementById('conttrilha');
	if (contproj != null){
		contproj.value=0;
	}	
	
	academic_graduation=document.getElementById('academic_graduation');
	if (academic_graduation != null){
		academic_graduation.value=0;
	}
	
	nc=document.getElementById('nucleo_associado_colaborador');
	if (nc != null){
		document.getElementById('nucleo_associado_colaborador').innerHTML = "";
	}
	
	finass=document.getElementById('fin_associado_projeto');
	if (finass != null){
		document.getElementById('fin_associado_projeto').innerHTML = "";
	}
	
	sitioass=document.getElementById('sitios_associado_projeto');
	if (sitioass != null){
		document.getElementById('sitios_associado_projeto').innerHTML = "";
	}
	
	tampag=document.getElementById('tampag');
	if (tampag != null){
		document.getElementById('tampag').value = 0;
	}

	// Campos do Formulario de Cadastro de Alunos
	var vetsit = new Array ("turno");
    carrega_combo(vetsit);
	
	// Campos do Formul�rio de Cadastro de Colaboradores
	var vetcol = new Array ("nivel_colaborador", "projeto_colaborador", "funcao_colaborador", "pais_colaborador", "uf_colaborador", "municipio_colaborador", "instituicao_colaborador", "instituicao_ac_colaborador", "perfil_ac_colaborador");
    carrega_combo(vetcol);
	
	// Campos do Formul�rio de Cadastro de Grades/M�dulos
	var vetgdmd = new Array ("sitio_grade_modulo", "datum_grade_modulo");
    carrega_combo(vetgdmd);
	
	// Campos do Formul�rio de Cadastro de Infraestruturas
	var vetinfra = new Array ("sitio_infraestrutura", "datum_infraestrutura", "tipo_infraestrutura_infraestrutura");
    carrega_combo(vetinfra);	
	
	// Campos do Formul�rio de Cadastro de Institui��es
	var vetinst = new Array ("autarquia_inst", "tipo_inst", "pais_inst", "uf_inst", "municipio_inst", "org_fin_inst");
    carrega_combo(vetinst);
	
	// Campos do Formul�rio de Cadastro de N�cleos
	var vetnc = new Array ("resp_prin_nucleo", "resp_sup_nucleo", "gestor_nucleo", "pais_nucleo", "uf_nucleo", "municipio_nucleo");
    carrega_combo(vetnc);
	
	// Campos do Formul�rio de Cadastro de Parcelas
	var vetparc = new Array ("sitio_parcela", "grade_modulo_parcela", "trilha_parcela", "datum_parcela");
    carrega_combo(vetparc);
	
	// Campos do Formul�rio de Cadastro de Setores
	var vetset = new Array ("instituicao_setor", "pais_setor", "uf_setor", "municipio_setor");
    carrega_combo(vetset);
	
	// Campos do Formul�rio de Cadastro de S�tios
	var vetsit = new Array ("nucleo_sitio", "categoria_sitio", "datum_sitio");
    carrega_combo(vetsit);
	
	// Campos do Formul�rio de Cadastro de Trilhas
	var vettril = new Array ("sitio_trilha", "grade_mod_trilha", "datum_ini_trilha", "datum_fim_trilha");
    carrega_combo(vettril);
	
	// Campos do Formul�rio de Cadastro de Segmentos
	var vetseg = new Array ("sitio_segmento", "grade_modulo_segmento", "trilha_segmento", "pos_parc_segmento", "datum_segmento", "nome_parcela_segmento");
    carrega_combo(vetseg);
	
	// Campos do Formul�rio de Cadastro de Metadados
	var vetmeta = new Array ("equipe_cobranca_resp", "equipe_cobranca_li", "situacao_pub");
    carrega_combo(vetmeta);
	
	// Campos do Formul�rio de Cadastro de Mapas
	var vetmeta = new Array ("trilha_ass_sitio", "trilha_ass_grade_modulo", "trilha_ass_trilha", "parcela_ass_sitio", "parcela_ass_grade_modulo", "parcela_ass_trilha", "parcela_ass_parcela", "segmento_ass_sitio", "segmento_ass_grade_modulo", "segmento_ass_trilha", "segmento_ass_parcela", "segmento_ass_segmento", "infra_ass_sitio", "infra_ass_grade_modulo", "infra_ass_infra");
    carrega_combo(vetmeta);
    
    // Campos do Formul�rio de Cadastro de Refer�ncias Bibliogr�ficas
	var vetmeta = new Array ("mes_ref_bio", "sel_tipo_evento", "sel_natureza_apres_trab", "sel_natureza_livro_publicado", "sel_nat_apres_trab", "sel_nat_anais", "sel_inst_trab_acad", "sel_nivel_trab_acad", "sel_natureza_trab_tec", "sel_natureza_prog_radio_tv", "sel_divulg_inf_gerais");
    carrega_combo(vetmeta);

}

function criaCampo(qtd,qtd1){
						
			var selectedEffect = "blind";   
   			var options = {};
			
			var i=document.getElementById(qtd).value;
			var j=document.getElementById(qtd1).value;
			var cont= new Number(i)+1;
			var countsp= new Number(j)+1;

			local=document.getElementById('campo');
			
			var d = document.createElement('div');
			d.setAttribute('name','prj-'+cont);
			d.setAttribute('id','prj-'+cont);
			d.setAttribute('class','alinhamento');
			local.appendChild(d);

			var lf=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf);
			
			var ln=document.createElement('hr');
			ln.setAttribute('style','border-color:#FFFFFF; width:600px; text-align:center;');
			document.getElementById('prj-'+cont).appendChild(ln);				
			
			var lf1=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf1);
			
			var sp1 = document.createElement('span');
			sp1.setAttribute('id','sp-'+countsp);
			sp1.setAttribute('style','margin-right:12px;');
			document.getElementById('prj-'+cont).appendChild(sp1);
			
			var m = document.createTextNode('Projeto:');
			document.getElementById('sp-'+countsp).appendChild(m);
			
			var sel=document.createElement('select');
			sel.setAttribute('name','projeto_colaborador-'+cont);
			sel.setAttribute('id','projeto_colaborador-'+cont);
			document.getElementById('prj-'+cont).appendChild(sel);
			
			var anOption = document.createElement("option");
			document.getElementById('projeto_colaborador-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			countsp++;
			
			var sp2 = document.createElement('span');
			sp2.setAttribute('id','sp-'+countsp);
			sp2.setAttribute('style','margin-right:8px; margin-left:12px;');
			document.getElementById('prj-'+cont).appendChild(sp2);
			
			var n = document.createTextNode('Fun\xE7\xE3o:');
			document.getElementById('sp-'+countsp).appendChild(n);
			
			var s=document.createElement('select');
			s.setAttribute('name','funcao_colaborador-'+cont);
			s.setAttribute('id','funcao_colaborador-'+cont);
			document.getElementById('prj-'+cont).appendChild(s);
			
			var twoOption = document.createElement("option");
			document.getElementById('funcao_colaborador-'+cont).options.add(twoOption);
			twoOption.textContent = "";
			twoOption.Value = "";
		    
            var lf2=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf2);				
			
			var lf3=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf3);
			
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp-'+countsp);
			sp3.setAttribute('style','margin-right:8px; font-weight:bold;');
			document.getElementById('prj-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Desempenho da fun\xE7\xE3o no projeto:');
			document.getElementById('sp-'+countsp).appendChild(o);
			
			var lf4=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf4);				
			
			var lf5=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf5);
			
			countsp++;
			
			var sp4 = document.createElement('span');
			sp4.setAttribute('id','sp-'+countsp);
			sp4.setAttribute('style','margin-right:8px; margin-left:2px;');
			document.getElementById('prj-'+cont).appendChild(sp4);
			
			var p = document.createTextNode('Data de In\xEDcio:');
			document.getElementById('sp-'+countsp).appendChild(p);
			
			var dt1=document.createElement('input');
			dt1.setAttribute('name','dt_ent_prj_colaborador-'+cont);
			dt1.setAttribute('id','dt_ent_prj_colaborador-'+cont);
			dt1.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			dt1.setAttribute('style','width: 135px; border-color: #2B572C; border-style:solid; text-align:center;'); 
			dt1.setAttribute('onblur','check_date("dt_ent_prj_colaborador-'+cont+'");');
			dt1.setAttribute('type','text');
			document.getElementById('prj-'+cont).appendChild(dt1);
			
			countsp++;
			
			var sp5 = document.createElement('span');
			sp5.setAttribute('id','sp-'+countsp);
			sp5.setAttribute('style','margin-right:8px; margin-left:8px;');
			document.getElementById('prj-'+cont).appendChild(sp5);
			
			var q = document.createTextNode('Data de Fim:');
			document.getElementById('sp-'+countsp).appendChild(q);
			
			var dt2=document.createElement('input');
			dt2.setAttribute('name','dt_saida_prj-'+cont);
			dt2.setAttribute('id','dt_saida_prj-'+cont);
			dt2.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			dt2.setAttribute('style','width: 135px; border-color: #2B572C; border-style:solid; text-align:center;'); 
			dt2.setAttribute('onblur','check_date("dt_saida_prj-'+cont+'");');
			dt2.setAttribute('type','text');
			document.getElementById('prj-'+cont).appendChild(dt2);	
			
			var lf6=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf6);
			
			var lf7=document.createElement('br');
			document.getElementById('prj-'+cont).appendChild(lf7);

			var t = document.createElement('div');
			t.setAttribute('class','addcomp');
 
			newlink = document.createElement('a');
			newlink.innerText = 'Remover Projeto';
			newlink.textContent = 'Remover Projeto';
			newlink.setAttribute('href','#Remover Projeto');
			newlink.setAttribute('style','text-align:right; float:right; margin-right:20px;');
			newlink.setAttribute('onclick', 'removerFilho("#prj-'+cont+'")');
						
			document.getElementById('prj-'+cont).appendChild(newlink);
			
			document.getElementById('prj-'+cont).appendChild(t);
		
			jQuery(function($){
				$( "#dt_ent_prj_colaborador-"+cont ).datepicker({
					changeMonth: true,
					changeYear: true
				});
				$( "#dt_saida_prj-"+cont ).datepicker({
					changeMonth: true,
					changeYear: true
				});
				cmb_add('projeto_colaborador-'+cont);
				cmb_add('funcao_colaborador-'+cont);
			});
			
			// run the effect
			$( "#prj-"+cont ).show( selectedEffect, options, 0, "" );
			
			document.getElementById(qtd).value++;
			
			document.getElementById(qtd1).value = countsp;
			
			//ajaxComboBox();
}


function criaCampoTrilha(qtd,qtd1){
						
			var selectedEffect = "blind";   
   			var options = {};
			
			var i=document.getElementById(qtd).value;
			var j=document.getElementById(qtd1).value;
			var cont= new Number(i)+1;
			var countsp= new Number(j)+1;

			local=document.getElementById('campotrilha');
			
			var d = document.createElement('div');
			d.setAttribute('name','tri-'+cont);
			d.setAttribute('id','tri-'+cont);
			d.setAttribute('class','alinhamento');
			local.appendChild(d);

			var lf=document.createElement('br');
			document.getElementById('tri-'+cont).appendChild(lf);
			
			var ln=document.createElement('hr');
			ln.setAttribute('style','border-color:#FFFFFF; width:600px; text-align:center;');
			document.getElementById('tri-'+cont).appendChild(ln);				
			
			var lf1=document.createElement('br');
			document.getElementById('tri-'+cont).appendChild(lf1);
			
			var sp1 = document.createElement('span');
			sp1.setAttribute('id','sp-'+countsp);
			sp1.setAttribute('style','margin-right:12px;');
			document.getElementById('tri-'+cont).appendChild(sp1);
			
			var m = document.createTextNode('S\xEDtio:');
			document.getElementById('sp-'+countsp).appendChild(m);
			
			var sel=document.createElement('select');
			sel.setAttribute('name','trilha_ass_sitio-'+cont);
			sel.setAttribute('id','trilha_ass_sitio-'+cont);
			document.getElementById('tri-'+cont).appendChild(sel);
			
			var anOption = document.createElement("option");
			document.getElementById('trilha_ass_sitio-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			countsp++;
			
			var sp2 = document.createElement('span');
			sp2.setAttribute('id','sp_tri-'+countsp);
			sp2.setAttribute('style','margin-right:8px; margin-left:12px;');
			document.getElementById('tri-'+cont).appendChild(sp2);
			
			var n = document.createTextNode('Grade/M\xF3dulo:');
			document.getElementById('sp_tri-'+countsp).appendChild(n);
			
			var s=document.createElement('select');
			s.setAttribute('name','trilha_ass_grade_modulo-'+cont);
			s.setAttribute('id','trilha_ass_grade_modulo-'+cont);
			document.getElementById('tri-'+cont).appendChild(s);
			
			var twoOption = document.createElement("option");
			document.getElementById('trilha_ass_grade_modulo-'+cont).options.add(twoOption);
			twoOption.textContent = "";
			twoOption.Value = "";
		    
            var lf2=document.createElement('br');
			document.getElementById('tri-'+cont).appendChild(lf2);				
			
			var lf3=document.createElement('br');
			document.getElementById('tri-'+cont).appendChild(lf3);
			
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp_tri-'+countsp);
			sp3.setAttribute('style','margin-right:8px;');
			document.getElementById('tri-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Trilha:');
			document.getElementById('sp_tri-'+countsp).appendChild(o);
			
			var st=document.createElement('select');
			st.setAttribute('name','trilha_ass_trilha-'+cont);
			st.setAttribute('id','trilha_ass_trilha-'+cont);
			document.getElementById('tri-'+cont).appendChild(st);
			
			var threeOption = document.createElement("option");
			document.getElementById('trilha_ass_trilha-'+cont).options.add(threeOption);
			threeOption.textContent = "";
			threeOption.Value = "";
			
			var lf4=document.createElement('br');
			document.getElementById('tri-'+cont).appendChild(lf4);				
			
			var lf5=document.createElement('br');
			document.getElementById('tri-'+cont).appendChild(lf5);
			
			var t = document.createElement('div');
			t.setAttribute('class','addcomp');
 
			newlink = document.createElement('a');
			newlink.innerText = 'Remover trilha';
			newlink.textContent = 'Remover trilha';
			newlink.setAttribute('href','#Remover trilha');
			newlink.setAttribute('style','text-align:right; float:right; margin-right:20px;');
			newlink.setAttribute('onclick', 'removerFilho("#tri-'+cont+'")');
						
			document.getElementById('tri-'+cont).appendChild(newlink);
			
			document.getElementById('tri-'+cont).appendChild(t);
					
			jQuery(function($){
				cmb_add('trilha_ass_sitio-'+cont);
				cmb_add('trilha_ass_grade_modulo-'+cont);
				cmb_add('trilha_ass_trilha-'+cont);
			});

			
			// run the effect
			$( "#tri-"+cont ).show( selectedEffect, options, 0, "" );
			
			document.getElementById(qtd).value++;
			
			document.getElementById(qtd1).value = countsp;
			
			//ajaxComboBox();
}


function criaCampoParcela(qtd,qtd1){
						
			var selectedEffect = "blind";   
   			var options = {};
			
			var i=document.getElementById(qtd).value;
			var j=document.getElementById(qtd1).value;
			var cont= new Number(i)+1;
			var countsp= new Number(j)+1;

			local=document.getElementById('campoparcela');
			
			var d = document.createElement('div');
			d.setAttribute('name','parc-'+cont);
			d.setAttribute('id','parc-'+cont);
			d.setAttribute('class','alinhamento');
			local.appendChild(d);

			var lf=document.createElement('br');
			document.getElementById('parc-'+cont).appendChild(lf);
			
			var ln=document.createElement('hr');
			ln.setAttribute('style','border-color:#FFFFFF; width:600px; text-align:center;');
			document.getElementById('parc-'+cont).appendChild(ln);				
			
			var lf1=document.createElement('br');
			document.getElementById('parc-'+cont).appendChild(lf1);
			
			var sp1 = document.createElement('span');
			sp1.setAttribute('id','sp_parc-'+countsp);
			sp1.setAttribute('style','margin-right:12px;');
			document.getElementById('parc-'+cont).appendChild(sp1);
			
			var m = document.createTextNode('S\xEDtio:');
			document.getElementById('sp_parc-'+countsp).appendChild(m);
			
			var sel=document.createElement('select');
			sel.setAttribute('name','parcela_ass_sitio-'+cont);
			sel.setAttribute('id','parcela_ass_sitio-'+cont);
			document.getElementById('parc-'+cont).appendChild(sel);
			
			var anOption = document.createElement("option");
			document.getElementById('parcela_ass_sitio-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			countsp++;
			
			var sp2 = document.createElement('span');
			sp2.setAttribute('id','sp_parc-'+countsp);
			sp2.setAttribute('style','margin-right:8px; margin-left:12px;');
			document.getElementById('parc-'+cont).appendChild(sp2);
			
			var n = document.createTextNode('Grade/M\xF3dulo:');
			document.getElementById('sp_parc-'+countsp).appendChild(n);
			
			var s=document.createElement('select');
			s.setAttribute('name','parcela_ass_grade_modulo-'+cont);
			s.setAttribute('id','parcela_ass_grade_modulo-'+cont);
			document.getElementById('parc-'+cont).appendChild(s);
			
			var twoOption = document.createElement("option");
			document.getElementById('parcela_ass_grade_modulo-'+cont).options.add(twoOption);
			twoOption.textContent = "";
			twoOption.Value = "";
		    
            var lf2=document.createElement('br');
			document.getElementById('parc-'+cont).appendChild(lf2);				
			
			var lf3=document.createElement('br');
			document.getElementById('parc-'+cont).appendChild(lf3);
			
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp_parc-'+countsp);
			sp3.setAttribute('style','margin-right:8px;');
			document.getElementById('parc-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Trilha:');
			document.getElementById('sp_parc-'+countsp).appendChild(o);
			
			var st=document.createElement('select');
			st.setAttribute('name','parcela_ass_trilha-'+cont);
			st.setAttribute('id','parcela_ass_trilha-'+cont);
			document.getElementById('parc-'+cont).appendChild(st);
			
			var threeOption = document.createElement("option");
			document.getElementById('parcela_ass_trilha-'+cont).options.add(threeOption);
			threeOption.textContent = "";
			threeOption.Value = "";
							
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp_parc-'+countsp);
			sp3.setAttribute('style','margin-right:8px; margin-left:8px;');
			document.getElementById('parc-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Parcelas:');
			document.getElementById('sp_parc-'+countsp).appendChild(o);
			
			var st=document.createElement('select');
			st.setAttribute('name','parcela_ass_parcela-'+cont);
			st.setAttribute('id','parcela_ass_parcela-'+cont);
			document.getElementById('parc-'+cont).appendChild(st);
			
			var threeOption = document.createElement("option");
			document.getElementById('parcela_ass_parcela-'+cont).options.add(threeOption);
			threeOption.textContent = "";
			threeOption.Value = "";
			
			var lf4=document.createElement('br');
			document.getElementById('parc-'+cont).appendChild(lf4);				
			
			var lf5=document.createElement('br');
			document.getElementById('parc-'+cont).appendChild(lf5);
			
			var t = document.createElement('div');
			t.setAttribute('class','addcomp');
 
			newlink = document.createElement('a');
			newlink.innerText = 'Remover parcela';
			newlink.textContent = 'Remover parcela';
			newlink.setAttribute('href','#Remover parcela');
			newlink.setAttribute('style','text-align:right; float:right; margin-right:20px;');
			newlink.setAttribute('onclick', 'removerFilho("#parc-'+cont+'")');
						
			document.getElementById('parc-'+cont).appendChild(newlink);
			
			document.getElementById('parc-'+cont).appendChild(t);
					
			jQuery(function($){
				cmb_add('parcela_ass_sitio-'+cont);
				cmb_add('parcela_ass_grade_modulo-'+cont);
				cmb_add('parcela_ass_trilha-'+cont);
				cmb_add('parcela_ass_parcela-'+cont);
			});

			
			// run the effect
			$( "#parc-"+cont ).show( selectedEffect, options, 0, "" );
			
			document.getElementById(qtd).value++;
			
			document.getElementById(qtd1).value = countsp;
			
			//ajaxComboBox();
}


function criaCampoSegmento(qtd,qtd1){
						
			var selectedEffect = "blind";   
   			var options = {};
			
			var i=document.getElementById(qtd).value;
			var j=document.getElementById(qtd1).value;
			var cont= new Number(i)+1;
			var countsp= new Number(j)+1;

			local=document.getElementById('camposegmento');
			
			var d = document.createElement('div');
			d.setAttribute('name','seg-'+cont);
			d.setAttribute('id','seg-'+cont);
			d.setAttribute('class','alinhamento');
			local.appendChild(d);

			var lf=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf);
			
			var ln=document.createElement('hr');
			ln.setAttribute('style','border-color:#FFFFFF; width:600px; text-align:center;');
			document.getElementById('seg-'+cont).appendChild(ln);				
			
			var lf1=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf1);
			
			var sp1 = document.createElement('span');
			sp1.setAttribute('id','sp_seg-'+countsp);
			sp1.setAttribute('style','margin-right:12px;');
			document.getElementById('seg-'+cont).appendChild(sp1);
			
			var m = document.createTextNode('S\xEDtio:');
			document.getElementById('sp_seg-'+countsp).appendChild(m);
			
			var sel=document.createElement('select');
			sel.setAttribute('name','segmento_ass_sitio-'+cont);
			sel.setAttribute('id','segmento_ass_sitio-'+cont);
			document.getElementById('seg-'+cont).appendChild(sel);
			
			var anOption = document.createElement("option");
			document.getElementById('segmento_ass_sitio-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			countsp++;
			
			var sp2 = document.createElement('span');
			sp2.setAttribute('id','sp_seg-'+countsp);
			sp2.setAttribute('style','margin-right:8px; margin-left:12px;');
			document.getElementById('seg-'+cont).appendChild(sp2);
			
			var n = document.createTextNode('Grade/M\xF3dulo:');
			document.getElementById('sp_seg-'+countsp).appendChild(n);
			
			var s=document.createElement('select');
			s.setAttribute('name','segmento_ass_grade_modulo-'+cont);
			s.setAttribute('id','segmento_ass_grade_modulo-'+cont);
			document.getElementById('seg-'+cont).appendChild(s);
			
			var twoOption = document.createElement("option");
			document.getElementById('segmento_ass_grade_modulo-'+cont).options.add(twoOption);
			twoOption.textContent = "";
			twoOption.Value = "";
		    
            var lf2=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf2);				
			
			var lf3=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf3);
			
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp_seg-'+countsp);
			sp3.setAttribute('style','margin-right:8px;');
			document.getElementById('seg-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Trilha:');
			document.getElementById('sp_seg-'+countsp).appendChild(o);
			
			var st=document.createElement('select');
			st.setAttribute('name','segmento_ass_trilha-'+cont);
			st.setAttribute('id','segmento_ass_trilha-'+cont);
			document.getElementById('seg-'+cont).appendChild(st);
			
			var threeOption = document.createElement("option");
			document.getElementById('segmento_ass_trilha-'+cont).options.add(threeOption);
			threeOption.textContent = "";
			threeOption.Value = "";
							
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp_seg-'+countsp);
			sp3.setAttribute('style','margin-right:8px; margin-left:8px;');
			document.getElementById('seg-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Parcelas:');
			document.getElementById('sp_seg-'+countsp).appendChild(o);
			
			var st=document.createElement('select');
			st.setAttribute('name','segmento_ass_parcela-'+cont);
			st.setAttribute('id','segmento_ass_parcela-'+cont);
			document.getElementById('seg-'+cont).appendChild(st);
			
			var threeOption = document.createElement("option");
			document.getElementById('segmento_ass_parcela-'+cont).options.add(threeOption);
			threeOption.textContent = "";
			threeOption.Value = "";
			
			var lf4=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf4);				
			
			var lf5=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf5);
			
			countsp++;
			
			var sp4 = document.createElement('span');
			sp4.setAttribute('id','sp_seg-'+countsp);
			sp4.setAttribute('style','margin-right:8px;');
			document.getElementById('seg-'+cont).appendChild(sp4);
			
			var sg = document.createTextNode('Segmentos:');
			document.getElementById('sp_seg-'+countsp).appendChild(sg);
			
			var sgparc=document.createElement('select');
			sgparc.setAttribute('name','segmento_ass_segmento-'+cont);
			sgparc.setAttribute('id','segmento_ass_segmento-'+cont);
			document.getElementById('seg-'+cont).appendChild(sgparc);
			
			var fourOption = document.createElement("option");
			document.getElementById('segmento_ass_segmento-'+cont).options.add(fourOption);
			fourOption.textContent = "";
			fourOption.Value = "";
			
			var lf6=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf6);				
			
			var lf7=document.createElement('br');
			document.getElementById('seg-'+cont).appendChild(lf7);
			
			var t = document.createElement('div');
			t.setAttribute('class','addcomp');
 
			newlink = document.createElement('a');
			newlink.innerText = 'Remover segmento';
			newlink.textContent = 'Remover segmento';
			newlink.setAttribute('href','#Remover segmento');
			newlink.setAttribute('style','text-align:right; float:right; margin-right:20px;');
			newlink.setAttribute('onclick', 'removerFilho("#seg-'+cont+'")');
						
			document.getElementById('seg-'+cont).appendChild(newlink);
			
			document.getElementById('seg-'+cont).appendChild(t);
					
			jQuery(function($){
				cmb_add('segmento_ass_sitio-'+cont);
				cmb_add('segmento_ass_grade_modulo-'+cont);
				cmb_add('segmento_ass_trilha-'+cont);
				cmb_add('segmento_ass_parcela-'+cont);
				cmb_add('segmento_ass_segmento-'+cont);
			});

			
			// run the effect
			$( "#seg-"+cont ).show( selectedEffect, options, 0, "" );
			
			document.getElementById(qtd).value++;
			
			document.getElementById(qtd1).value = countsp;
			
			//ajaxComboBox();
}

function criaCampoInfraestrutura(qtd,qtd1){
						
			var selectedEffect = "blind";   
   			var options = {};
			
			var i=document.getElementById(qtd).value;
			var j=document.getElementById(qtd1).value;
			var cont= new Number(i)+1;
			var countsp= new Number(j)+1;

			local=document.getElementById('campoinfra');
			
			var d = document.createElement('div');
			d.setAttribute('name','infra-'+cont);
			d.setAttribute('id','infra-'+cont);
			d.setAttribute('class','alinhamento');
			local.appendChild(d);

			var lf=document.createElement('br');
			document.getElementById('infra-'+cont).appendChild(lf);
			
			var ln=document.createElement('hr');
			ln.setAttribute('style','border-color:#FFFFFF; width:600px; text-align:center;');
			document.getElementById('infra-'+cont).appendChild(ln);				
			
			var lf1=document.createElement('br');
			document.getElementById('infra-'+cont).appendChild(lf1);
			
			var sp1 = document.createElement('span');
			sp1.setAttribute('id','sp_infra-'+countsp);
			sp1.setAttribute('style','margin-right:12px;');
			document.getElementById('infra-'+cont).appendChild(sp1);
			
			var m = document.createTextNode('S\xEDtio:');
			document.getElementById('sp_infra-'+countsp).appendChild(m);
			
			var sel=document.createElement('select');
			sel.setAttribute('name','infra_ass_sitio-'+cont);
			sel.setAttribute('id','infra_ass_sitio-'+cont);
			document.getElementById('infra-'+cont).appendChild(sel);
			
			var anOption = document.createElement("option");
			document.getElementById('infra_ass_sitio-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			countsp++;
			
			var sp2 = document.createElement('span');
			sp2.setAttribute('id','sp_infra-'+countsp);
			sp2.setAttribute('style','margin-right:8px; margin-left:12px;');
			document.getElementById('infra-'+cont).appendChild(sp2);
			
			var n = document.createTextNode('Grade/M\xF3dulo:');
			document.getElementById('sp_infra-'+countsp).appendChild(n);
			
			var s=document.createElement('select');
			s.setAttribute('name','infra_ass_grade_modulo-'+cont);
			s.setAttribute('id','infra_ass_grade_modulo-'+cont);
			document.getElementById('infra-'+cont).appendChild(s);
			
			var twoOption = document.createElement("option");
			document.getElementById('infra_ass_grade_modulo-'+cont).options.add(twoOption);
			twoOption.textContent = "";
			twoOption.Value = "";
		    
            var lf2=document.createElement('br');
			document.getElementById('infra-'+cont).appendChild(lf2);				
			
			var lf3=document.createElement('br');
			document.getElementById('infra-'+cont).appendChild(lf3);
			
			countsp++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp_infra-'+countsp);
			sp3.setAttribute('style','margin-right:8px;');
			document.getElementById('infra-'+cont).appendChild(sp3);
			
			var o = document.createTextNode('Trilha:');
			document.getElementById('sp_infra-'+countsp).appendChild(o);
			
			var st=document.createElement('select');
			st.setAttribute('name','infra_ass_infra-'+cont);
			st.setAttribute('id','infra_ass_infra-'+cont);
			document.getElementById('infra-'+cont).appendChild(st);
			
			var threeOption = document.createElement("option");
			document.getElementById('infra_ass_infra-'+cont).options.add(threeOption);
			threeOption.textContent = "";
			threeOption.Value = "";
							
			
			var t = document.createElement('div');
			t.setAttribute('class','addcomp');
 
			newlink = document.createElement('a');
			newlink.innerText = 'Remover infraestrutura';
			newlink.textContent = 'Remover infraestrutura';
			newlink.setAttribute('href','#Remover infraestrutura');
			newlink.setAttribute('style','text-align:right; float:right; margin-right:20px;');
			newlink.setAttribute('onclick', 'removerFilho("#infra-'+cont+'")');
						
			document.getElementById('infra-'+cont).appendChild(newlink);
			
			document.getElementById('infra-'+cont).appendChild(t);
					
			jQuery(function($){
				cmb_add('infra_ass_sitio-'+cont);
				cmb_add('infra_ass_grade_modulo-'+cont);
				cmb_add('infra_ass_infra-'+cont);
			});

			
			// run the effect
			$( "#infra-"+cont ).show( selectedEffect, options, 0, "" );
			
			document.getElementById(qtd).value++;
			
			document.getElementById(qtd1).value = countsp;
			
			//ajaxComboBox();
}


 function ajaxComboBox(){
    url ='gera_options.php';
    if (document.getElementById) { //Verifica se o Browser suporta DHTML.
        if (window.XMLHttpRequest) {
            HttpReq = new XMLHttpRequest();
            HttpReq.onreadystatechange = XMLHttpRequestChange;
            HttpReq.open("GET", url, true);
            HttpReq.send(null);
        } else if (window.ActiveXObject) {
            HttpReq = new ActiveXObject("Microsoft.XMLHTTP");
            if (HttpReq) {
                HttpReq.onreadystatechange = XMLHttpRequestChange;
                HttpReq.open("GET", url, true);
                HttpReq.send();
            }
        }
    }
 }
 
 function XMLHttpRequestChange(){
	if (HttpReq.readyState == 4 ){
			var result = HttpReq.responseText;
			var i=document.getElementById('cont').value;
			var atual= new Number(i)-1;
			var update= result.split('|');
			for(var j=0;j<update.length-1;j++){
		    	var criando=create_opt(update[j]);
				document.getElementById('tipo['+atual+']').appendChild(criando);
			}
     }
 }

 function create_opt(texto) { 
	parte=texto.split('><');
	var cria= document.createElement('option');
	var texto = document.createTextNode(parte[1]); 
	cria.setAttribute('value',parte[0]);
	cria.appendChild(texto);
	return cria;
 }
 
/********************************************************************/

function DesassociaCampo(a,ident,backg){
   var selectedEffect = "blind";   
   var options = {};	
   		
   var c=document.getElementById(a);

   $( a ).hide( selectedEffect, options, 0, "" );
   
   document.getElementById(ident).checked = false;
   document.getElementById(ident).disabled = 0;
   document.getElementById(backg).style.background="#E0E5CD";
}

function AssociaCampo(qtd, nome, ident, numid){
     
      var selectedEffect = "blind";   
   	  var options = {};
   	  			
			var i=document.getElementById(qtd).value;
			var cont= new Number(i)+1;

			local=document.getElementById('campo');
			
			var d = document.createElement('table');
			d.setAttribute('width','100%');
			d.setAttribute('id','ul_assoc-'+cont);
			d.setAttribute('style','display:inherit;'); // margin-left:-40px;
			document.getElementById('campo').appendChild(d);
		
			var tr1=document.createElement('tr');
			document.getElementById('ul_assoc-'+cont).appendChild(tr1);
			
			var td1=document.createElement('td');
			td1.setAttribute('style','border:1px solid #2B572C; text-align:center; width:300px; background-color:#E0E5CD; font-weight:bold;'); /*#006699*/
			td1.textContent = "Nome";
			tr1.appendChild(td1);
			
			var td2=document.createElement('td');
			td2.setAttribute('style','border:1px solid #2B572C; text-align:center; width:200px; background-color:#E0E5CD; font-weight:bold;'); 
			td2.textContent = "Fun\xE7\xE3o";
			tr1.appendChild(td2);
			
			var td3=document.createElement('td');
			td3.setAttribute('colspan', '2');
			td3.setAttribute('style','border:1px solid #2B572C; text-align:center; width:400px; background-color:#E0E5CD;  font-weight:bold;'); 
			td3.textContent = "Desempenho na Fun\xE7\xE3o";
			tr1.appendChild(td3);
			
			var tr2=document.createElement('tr');
			document.getElementById('ul_assoc-'+cont).appendChild(tr2);
							
			var td4=document.createElement('td');
			td4.setAttribute('rowspan','2'); 
			tr2.appendChild(td4);
			
			var ck=document.createElement('input');
			ck.setAttribute('name','ck_assoc-'+cont);
			ck.setAttribute('value','ck_assoc-'+cont);
			ck.setAttribute('checked','checked');
			ck.setAttribute('type','checkbox');
			ck.setAttribute('onclick', 'DesassociaCampo("#ul_assoc-'+cont+'","'+ident+'","change_back-'+numid+'");');
			td4.appendChild(ck);
			
			var txip = document.createTextNode('\xA0\xA0\xA0'+nome);
			td4.appendChild(txip);
			
			var td5=document.createElement('td');
			td5.setAttribute('rowspan','2'); 
			tr2.appendChild(td5);
			
			var sel=document.createElement('select');
			sel.setAttribute('name','funcao_col_projeto-'+cont);
			sel.setAttribute('id','funcao_col_projeto-'+cont);
			td5.appendChild(sel);
			
			var anOption = document.createElement("option");
			document.getElementById('funcao_col_projeto-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			var td6=document.createElement('td');
			td6.setAttribute('style','text-align:center'); 
			tr2.appendChild(td6);
			
			var tx = document.createTextNode('Data de in\xEDcio:');
			td6.appendChild(tx);
            
            var td7=document.createElement('td');
            td7.setAttribute('style','text-align:center'); 
			tr2.appendChild(td7);

			var tx1 = document.createTextNode('Data de T\xE9rmino:');
			td7.appendChild(tx1);

			var tr3=document.createElement('tr');
			document.getElementById('ul_assoc-'+cont).appendChild(tr3);
						
            var td8=document.createElement('td');
			tr3.appendChild(td8);
			
			var dtinifn=document.createElement('input');
			dtinifn.setAttribute('name','dtinifn_projeto-'+cont);
			dtinifn.setAttribute('id','dtinifn_projeto-'+cont);
			dtinifn.setAttribute('onblur','check_date("dtinifn_projeto-'+cont+'");');
			dtinifn.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			dtinifn.setAttribute('style','width: 103px; border-color: #2B572C; border-style:solid; text-align:center'); 
			dtinifn.setAttribute('type','text');
			td8.appendChild(dtinifn);
			
			var td9=document.createElement('td');
			tr3.appendChild(td9);
						
			var dtfimfn=document.createElement('input');
			dtfimfn.setAttribute('name','dtfimfn_projeto-'+cont);
			dtfimfn.setAttribute('id','dtfimfn_projeto-'+cont);
			dtfimfn.setAttribute('onblur','check_date("dtfimfn_projeto-'+cont+'");');
			dtfimfn.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			dtfimfn.setAttribute('style','width: 103px; border-color: #2B572C; border-style:solid; text-align:center'); 
			dtfimfn.setAttribute('type','text');
			td9.appendChild(dtfimfn);
								
			jQuery(function($){
				$( "#dtinifn_projeto-"+cont ).datepicker({
					changeMonth: true,
					changeYear: true
				});
				$( "#dtfimfn_projeto-"+cont ).datepicker({
					changeMonth: true,
					changeYear: true
				});
				cmb_add('funcao_col_projeto-'+cont);
			});
			
			// run the effect
   		    $( "#ul_assoc-"+cont ).show( selectedEffect, options, 0, "" );
   		    
   		    document.getElementById(ident).disabled = 1;
			
			document.getElementById(qtd).value++;
			
		//	ajaxComboBox();

}

/********************************************************************/

function escolha_associada(id, nome, ident, place, numid){
     
      var selectedEffect = "blind";   
   	  var options = {};

			local=document.getElementById(id);
			
			var d = document.createElement('p');
			d.setAttribute('id',id+'-'+numid);
			local.appendChild(d);
			
			var ck=document.createElement('input');
			ck.setAttribute('name',id+'_check-'+numid);
			ck.setAttribute('value',id+'_check-'+numid);
			ck.setAttribute('checked','checked');
			ck.setAttribute('type','checkbox');
			ck.setAttribute('style','margin-right:12px; margin-left:12px;');
			ck.setAttribute('onclick', 'DesmarcaCampo("#'+id+'-'+numid+'","'+ident+'","'+place+'","'+id+'-'+numid+'","'+numid+'");');
			document.getElementById(id+'-'+numid).appendChild(ck);
			
			var nome = document.createTextNode('\xA0\xA0\xA0'+nome);
			document.getElementById(id+'-'+numid).appendChild(nome);
			
			// run the effect
   		    $( "#"+id+"-"+numid ).show( selectedEffect, options, 0, "" );
   		    
   		    document.getElementById(ident).disabled = 1;
}

function alterar_fundo(a,b){
   
   var c=document.getElementById(a);
   var d=document.getElementById(b);
   if(d.checked==false){
   	   c.style.background="#E0E5CD";
   }else{
	   c.style.background="#B9C48C";
   }
}

function DesmarcaCampo(a,ident,place,backg,id){
   var selectedEffect = "blind";   
   var options = {};	

   $( a ).hide( selectedEffect, options, 0, "" );
   
   document.getElementById(ident).checked = false;
   document.getElementById(ident).disabled = 0;
   document.getElementById(backg).innerHTML = "";
   document.getElementById(place).style.background="#E0E5CD";
}

/********************************************************************/

function criaCampoForm(qtd,qtd1){
	
			var selectedEffect = "blind";   
   			var options = {};
			
			var vet = new Array ("Doutorado", "Mestrado", "Mestrado Profissionalizante", "Especializa\xE7\xE3o", "Gradua\xE7\xE3o", "Ensino profissional de n\xEDvel t\xE9cnico", "Ensino m\xE9dio (2o grau)", "Ensino fundamental (1o grau)", "Aperfei\xE7oamento"); 
									
			var i=document.getElementById(qtd).value;
			var j=document.getElementById(qtd1).value;
			var cont= new Number(i)+1;
			var spcount= new Number(j)+1;

			local=document.getElementById('campo_form_ac');
			
			var d = document.createElement('div');
			d.setAttribute('name','form_ac-'+cont);
			d.setAttribute('id','form_ac-'+cont);
			d.setAttribute('class','alinhamento3');	
			local.appendChild(d);

			var lf=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf);
			
			var ln=document.createElement('hr');
			ln.setAttribute('style','border-color:#FFFFFF; width:600px; text-align:center;');
			document.getElementById('form_ac-'+cont).appendChild(ln);				
			
			var lf1=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf1);
			
			var sp1 = document.createElement('span');
			sp1.setAttribute('id','sp-0'+spcount);
			sp1.setAttribute('style','margin-right:8px;');
			document.getElementById('form_ac-'+cont).appendChild(sp1);
			
			var o = document.createTextNode('Curso:');
			document.getElementById('sp-0'+spcount).appendChild(o);
			
			var cur1=document.createElement('input');
			cur1.setAttribute('name','curso_colaborador-'+cont);
			cur1.setAttribute('id','curso_colaborador-'+cont);
			cur1.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			cur1.setAttribute('style','width:540px; border-color: #2B572C; border-style:solid;');
			cur1.setAttribute('type','text');
			document.getElementById('form_ac-'+cont).appendChild(cur1);
			
			var lf_1=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf_1);
			
			var lf_2=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf_2);
			
			spcount++;
			
			var sp2 = document.createElement('span');
			sp2.setAttribute('id','sp-0'+spcount);
			sp2.setAttribute('style','margin-right:12px;');
			document.getElementById('form_ac-'+cont).appendChild(sp2);
			
			var q = document.createTextNode('Status:');
			document.getElementById('sp-0'+spcount).appendChild(q);
					
			var rd1=document.createElement('input');
			rd1.setAttribute('name','status_curso_colaborador_'+cont);
			rd1.setAttribute('type','radio');
			rd1.setAttribute('value','1');
			document.getElementById('form_ac-'+cont).appendChild(rd1);
			
			spcount++;
			
			var sp3 = document.createElement('span');
			sp3.setAttribute('id','sp-0'+spcount);
			sp3.setAttribute('style','margin-right:6px; margin-left:2px;');
			document.getElementById('form_ac-'+cont).appendChild(sp3);
			
			var tx01 = document.createTextNode('Em Andamento');
			document.getElementById('sp-0'+spcount).appendChild(tx01);
			
			var rd2=document.createElement('input');
			rd2.setAttribute('name','status_curso_colaborador-'+cont);
			rd2.setAttribute('type','radio');
			rd2.setAttribute('value','2');
			document.getElementById('form_ac-'+cont).appendChild(rd2);
			
			spcount++;
			
			var sp4 = document.createElement('span');
			sp4.setAttribute('id','sp-0'+spcount);
			sp4.setAttribute('style','margin-right:6px; margin-left:2px;');
			document.getElementById('form_ac-'+cont).appendChild(sp4);
			
			var tx02 = document.createTextNode('Conclu\xEDdo');
			document.getElementById('sp-0'+spcount).appendChild(tx02);
			
			var rd3=document.createElement('input');
			rd3.setAttribute('name','status_curso_colaborador-'+cont);
			rd3.setAttribute('type','radio');
			rd3.setAttribute('value','3');
			document.getElementById('form_ac-'+cont).appendChild(rd3);
			
			spcount++;
			
			var sp5 = document.createElement('span');
			sp5.setAttribute('id','sp-0'+spcount);
			sp5.setAttribute('style','margin-right:6px; margin-left:2px;');
			document.getElementById('form_ac-'+cont).appendChild(sp5);
			
			var tx03 = document.createTextNode('Interrompido');
			document.getElementById('sp-0'+spcount).appendChild(tx03);
			
			var lf4=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf4);
			
			var lf5=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf5);
			
			spcount++;
			
			var sp6 = document.createElement('span');
			sp6.setAttribute('id','sp-0'+spcount);
			sp6.setAttribute('style','margin-right:8px;');
			document.getElementById('form_ac-'+cont).appendChild(sp6);
			
			var tx04 = document.createTextNode('Data de In\xEDcio do Curso:');
			document.getElementById('sp-0'+spcount).appendChild(tx04);
			
			var dt_cur1=document.createElement('input');
			dt_cur1.setAttribute('name','dt_inicio_curso_colaborador-'+cont);
			dt_cur1.setAttribute('id','dt_inicio_curso_colaborador-'+cont);
			dt_cur1.setAttribute('onblur','check_date("dt_inicio_curso_colaborador-'+cont+'");');
			dt_cur1.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			dt_cur1.setAttribute('style','width:110px; border-color: #2B572C; border-style:solid; text-align:center;'); 
			dt_cur1.setAttribute('type','text');
			document.getElementById('form_ac-'+cont).appendChild(dt_cur1);
			
			spcount++;
			
			var sp7 = document.createElement('span');
			sp7.setAttribute('id','sp-0'+spcount);
			sp7.setAttribute('style','margin-right:8px; margin-left:12px;');
			document.getElementById('form_ac-'+cont).appendChild(sp7);
			
			var tx05 = document.createTextNode('Data de Conclus\xE3o do Curso:');
			document.getElementById('sp-0'+spcount).appendChild(tx05);
			
			var dt_cur2=document.createElement('input');
			dt_cur2.setAttribute('name','dt_fim_curso_colaborador-'+cont);
			dt_cur2.setAttribute('id','dt_fim_curso_colaborador-'+cont);
			dt_cur2.setAttribute('onblur','check_date("dt_fim_curso_colaborador-'+cont+'");');
			dt_cur2.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			dt_cur2.setAttribute('style','width:110px; border-color: #2B572C; border-style:solid; text-align:center;'); 
			dt_cur2.setAttribute('type','text');
			document.getElementById('form_ac-'+cont).appendChild(dt_cur2);
			
			var lf6=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf6);
			
			var lf7=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf7);
			
			spcount++;
			
			var sp8 = document.createElement('span');
			sp8.setAttribute('id','sp-0'+spcount);
			sp8.setAttribute('style','margin-right:12px;');
			document.getElementById('form_ac-'+cont).appendChild(sp8);
			
			var nv = document.createTextNode('N\xEDvel:');
			document.getElementById('sp-0'+spcount).appendChild(nv);
			
			var sv=document.createElement('select');
			sv.setAttribute('name','nivel_colaborador-'+cont);
			sv.setAttribute('id','nivel_colaborador-'+cont);
			sv.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			sv.setAttribute('style','width:202px; border-color: #2B572C; border-style:solid;'); 
			document.getElementById('form_ac-'+cont).appendChild(sv);
			
			var anOption = document.createElement("option");
			document.getElementById('nivel_colaborador-'+cont).options.add(anOption);
			anOption.textContent = "";
			anOption.Value = "";
			
			for (var pt=0; pt<9; pt++){				
				var anOption = document.createElement("option");
				document.getElementById('nivel_colaborador-'+cont).options.add(anOption);
				anOption.textContent = vet[pt];
				anOption.Value = pt+1;
			}
			
			var lf_3=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf_3);
			
			var lf_4=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf_4);
			
			spcount++;
			
			var sp9 = document.createElement('span');
			sp9.setAttribute('id','sp-0'+spcount);
			sp9.setAttribute('style','margin-right:12px; margin-left:8px;');
			document.getElementById('form_ac-'+cont).appendChild(sp9);
			
			var ic = document.createTextNode('Institui\xE7\xE3o Acad\xEAmica:');
			document.getElementById('sp-0'+spcount).appendChild(ic);
			
			var ic=document.createElement('select');
			ic.setAttribute('name','instituicao_ac_colaborador-'+cont);
			ic.setAttribute('id','instituicao_ac_colaborador-'+cont);
			ic.setAttribute('class','ui-widget ui-widget-content ui-corner-left ui-corner-right');
			ic.setAttribute('style','width:257px; border-color: #2B572C; border-style:solid;'); 
			document.getElementById('form_ac-'+cont).appendChild(ic);
			
			var twoOption = document.createElement("option");
			document.getElementById('instituicao_ac_colaborador-'+cont).options.add(twoOption);
			twoOption.textContent = "";
			twoOption.Value = "";
			
			var lf8=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf8);
			
			var lf9=document.createElement('br');
			document.getElementById('form_ac-'+cont).appendChild(lf9);
		
			var t = document.createElement('div');
			t.setAttribute('class','addcomp');
 
			newlink = document.createElement('a');
			newlink.innerText = 'Remover Forma\xE7\xE3o Acad\xEAmica';
			newlink.textContent = 'Remover Forma\xE7\xE3o Acad\xEAmica';
			newlink.setAttribute('href','#Remover Forma\xE7\xE3o Acad\xEAmica');
			newlink.setAttribute('style','text-align:right; float:right; margin-right:20px;');
			newlink.setAttribute('onclick', 'removerFilho("#form_ac-'+cont+'");');
						
			document.getElementById('form_ac-'+cont).appendChild(newlink);
			
			document.getElementById('form_ac-'+cont).appendChild(t);
		
			jQuery(function($){
				$( "#dt_inicio_curso_colaborador-"+cont ).datepicker({
					changeMonth: true,
					changeYear: true
				});
				$( "#dt_fim_curso_colaborador-"+cont ).datepicker({
					changeMonth: true,
					changeYear: true
				});
				cmb_add("nivel_colaborador-"+cont);
				cmb_add("instituicao_ac_colaborador-"+cont);
			});
			
			// run the effect
   		    $( "#form_ac-"+cont ).show( selectedEffect, options, 0, "" );
			
			document.getElementById(qtd).value++;
			
			document.getElementById(qtd1).value = spcount;
			
		//	ajaxComboBox();
}

/******************************************************************/

var Header_view = new Array();
var Vet_view = new Array();
var indHeader_view = 0;
var ultHeader_view = 0;

	function start_variables_header_view(param){
	    if (param != ""){
	       Vet_view = param.split(","); 
	       while (indHeader_view < Vet_view.length){
	            Header_view[indHeader_view] = "#4F6228 url('../images/Header/"+Vet_view[indHeader]+"') center no-repeat";
		        indHeader_view++;
	       }
	    }
	    
	    ultHeader_view = Header_view.length - 1;
	}
	
	function MostraHeader_view(direcao){
	   indHeader_view = indHeader_view + direcao;
	   if(indHeader_view > ultHeader_view){indHeader_view = 0;};
	   if(indHeader_view < 0) {indHeader_view = ultHeader_view};
	   document.getElementById('header').style.background = Header_view[indHeader_view];
	}
	
	var myHeaderList1_view = Header_view;
	var myHeaderShow1_view = new HeaderShow_view(myHeaderList1_view, 'header', 100000, "myHeaderShow1_view"); 
	
	function HeaderShow_view(headerList, image, speed, name){
	    this.headerList = headerList;
	    this.image = image;
	    this.speed = speed;
	    this.name = name;
	    this.current = 0;
	    this.timer = 0;
	}
	HeaderShow_view.prototype.play = HeaderShow_play_view; 

	function HeaderShow_play_view(){
	       with(this){
	             MostraHeader_view(1);
	             clearTimeout(timer);
	             timer = setTimeout(name+'.play()', speed);
	       }
	 }
	 
/******************************************************************/

function append(dir1, dir2) {
	
	var id = new Array();
	var result = new Array();
	var vet = new Array();
	var nucleo = "";
    var nulo = "";
    var new_opcao; 
    var nova_opcao;
    var texto;
    var tam = document.getElementById(dir1).length;
    var tam_vet = 0;
    var str = "";
    var aux = 0;
	
	for (var k = 0; k < document.getElementById(dir1).length; k++) {
		if (document.getElementById(dir1).options[k].selected) {
			result[aux] = document.getElementById(dir1).options[k].text;
			id[aux] = k;
			aux++;
		}	
	}
	
	for (var i = 0; i < tam; i++) {
		valor = document.getElementById(dir1).value;
		vet[i] = valor+'><'+document.getElementById(dir1).options[i].text;
		tam_vet++;
	}
	
	aux = 0;
	for (var l = 0; l < tam; l++) {
		if (l != id[aux]){
			str = str+vet[l]+" | ";
		}else{
			aux++;
			tam_vet--;
		}
	}
	
	for (var novovet = 0; novovet < aux; novovet++){
		nucleo = document.getElementById(dir1).value;
		new_opcao = document.createElement("option"); 
		texto = document.createTextNode(result[novovet]);
	 
	    new_opcao.setAttribute("value",nucleo); 
	    new_opcao.appendChild(texto); //Adiciona o texto a OPTION.
		document.getElementById(dir2).appendChild(new_opcao);
	}
    
	document.getElementById(dir1).innerHTML = "";	
	var parte_option=str.split(" | ");
	for (var j = 0; j < tam_vet; j++) {
	     nova_opcao = gerar_opcao(parte_option[j]);
	     //alert(vet[j]);
	     document.getElementById(dir1).appendChild(nova_opcao);
    }
}

function gerar_opcao(opcao) { 
	//alert('teste');
	parte=opcao.split('><');
    var new_opcao = document.createElement("option"); 
    var texto = document.createTextNode(parte[1]); 
	var valor=parte[0];
	//alert(valor);
    new_opcao.setAttribute("value",valor); 
    new_opcao.appendChild(texto); //Adiciona o texto a OPTION.
    return new_opcao; // Retorna a nova OPTION.
}



/**********************************************************************/

function append_reverso(dir1, dir2) {
	
	var id = new Array();
	var result = new Array();
	var vet = new Array();
	var nucleo = "";
    var nulo = "";
    var new_opcao; 
    var nova_opcao;
    var texto;
    var tam = document.getElementById(dir1).length;
    var tam_vet = 0;
    var str = "";
    var aux = 0;
	
	
	for (var k = 0; k < document.getElementById(dir1).length; k++) {
		if (document.getElementById(dir1).options[k].selected) {
			result[aux] = document.getElementById(dir1).options[k].text;
			id[aux] = k;
			aux++;
		}	
	}
	
	for (var i = 0; i < tam; i++) {
		valor = document.getElementById(dir1).value;
		vet[i] = valor+'><'+document.getElementById(dir1).options[i].text;
		tam_vet++;
	}
	
	aux = 0;
	for (var l = 0; l < tam; l++) {
		if (l != id[aux]){
			str = str+vet[l]+" | ";
		}else{
			aux++;
			tam_vet--;
		}
	}
	
	for (var novovet = 0; novovet < aux; novovet++){
		nucleo = document.getElementById(dir1).value;
		new_opcao = document.createElement("option"); 
		texto = document.createTextNode(result[novovet]);
		 
	    new_opcao.setAttribute("value",nucleo); 
	    new_opcao.appendChild(texto); //Adiciona o texto a OPTION.
	    document.getElementById(dir2).appendChild(new_opcao); 
	}
    
	document.getElementById(dir1).innerHTML = "";	
	var parte_option=str.split(" | ");
	for (var j = 0; j < tam_vet; j++) {
	     nova_opcao = gerar_opcao_reverso(parte_option[j]);
	     //alert(vet[j]);
	     document.getElementById(dir1).appendChild(nova_opcao);
    }
}

function gerar_opcao_reverso(opcao) { 
	//alert('teste');
	parte=opcao.split('><');
    var new_opcao = document.createElement("option"); 
    var texto = document.createTextNode(parte[1]); 
	var valor=parte[0];
	//alert(valor);
    new_opcao.setAttribute("value",valor); 
    new_opcao.appendChild(texto); //Adiciona o texto a OPTION.
    return new_opcao; // Retorna a nova OPTION.
}

/***************************************************************************************/

function check_date(DATA) {
       // var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
        var msgErro = 'Formato inv\xE1lido de data. Por favor insira a data no formato: dd/mm/aaaa';
        var vdt = new Date();
        var vdia = vdt.getDay();
        var vmes = vdt.getMonth();
        var vano = vdt.getYear();
        if (document.getElementById(DATA).value!=""){ //((document.getElementById(DATA).value.match(expReg)) && (document.getElementById(DATA).value!=""))
                var dia = document.getElementById(DATA).value.substring(0,2);
                var mes = document.getElementById(DATA).value.substring(3,5);
                var ano = document.getElementById(DATA).value.substring(6,10);
                if(((mes==4) && (dia > 30)) || ((mes==6) && (dia > 30)) || ((mes==9) && (dia > 30)) || ((mes==11) && (dia > 30))){
                        alert("Dia incorreto\x21\x21 O m\xEAs especificado cont\xE9m no m\xE1ximo 30 dias.");
                        document.getElementById(DATA).value = "";
                        return false;
                } else{ //1
                         if(((mes==1) && (dia > 31)) || ((mes==3) && (dia > 31)) || ((mes==5) && (dia > 31)) || ((mes==7) && (dia > 31)) || ((mes==8) && (dia > 31)) || ((mes==10) && (dia > 31)) || ((mes==12) && (dia > 31))){     
						      alert("Dia incorreto\x21\x21 O m\xEAs especificado cont\xE9m no m\xE1ximo 31 dias.");
                              document.getElementById(DATA).value = "";
                              return false;
						 }else{ // 2
								if(ano%4!=0 && mes==2 && dia>28){
                                        alert("Data incorreta\x21\x21 O m\xEAs especificado cont\xE9m no m\xE1ximo 28 dias.");
                                        document.getElementById(DATA).value = "";
                                        return false;
                                } else{ //3
                                                if(ano%4==0 && mes==2 && dia>29){
                                                                alert("Data incorreta\x21\x21 O m\xEAs especificado cont\xE9m no m\xE1ximo 29 dias.");
                                                                document.getElementById(DATA).value = "";
                                                                return false;
                                                } else{ //4
                                                                return true;
                                                } //4-else
                                }//3-else
				         } // 2-else
                }//1-else                       
        } else { //5
				   if ( document.getElementById(DATA).value != ""){
					   alert(msgErro);
					   document.getElementById(DATA).value = "";
					   return false;
				   }
        } //5-else
}

/***************************************************************************************/

function Verifica_CPF(cpf) {
	var CPF = document.getElementById(cpf).value; // Recebe o valor digitado no campo
	

	// Verifica se o campo � nulo
	if (CPF == '') {
	  	alert('O Campo de CPF \xE9 de preenchimento obrigat\xF3rio!');
	  return false;
   	}else{
	   	parte=CPF.split('.');
		CPF = "";
		
		for (var i=0; i<parte.length; i++){
			CPF = CPF + parte[i]; 	
	    }
	    
	    parte = "";
	    parte=CPF.split('-');
	    CPF = "";
	    
	    for (var i=0; i<parte.length; i++){
			CPF = CPF + parte[i]; 	
	    }
   	}

	// Aqui come�a a checagem do CPF
	var POSICAO, I, SOMA, DV, DV_INFORMADO;
	var DIGITO = new Array(10);
	DV_INFORMADO = CPF.substr(9, 2); // Retira os dois �ltimos d�gitos do n�mero informado

	// Desemembra o n�mero do CPF na array DIGITO
	for (I=0; I<=8; I++) {
	   DIGITO[I] = CPF.substr( I, 1);
	}

	// Calcula o valor do 10� d�gito da verifica��o
	POSICAO = 10;
	SOMA = 0;
	   for (I=0; I<=8; I++) {
	      SOMA = SOMA + DIGITO[I] * POSICAO;
	      POSICAO = POSICAO - 1;
	   }
	   
	DIGITO[9] = SOMA % 11;
	
    if (DIGITO[9] < 2) {
	        DIGITO[9] = 0;
	}
	   else{
	       DIGITO[9] = 11 - DIGITO[9];
	}

	// Calcula o valor do 11� d�gito da verifica��o
	POSICAO = 11;
	SOMA = 0;
	
	for (I=0; I<=9; I++) {
      SOMA = SOMA + DIGITO[I] * POSICAO;
      POSICAO = POSICAO - 1;
   }
   
	DIGITO[10] = SOMA % 11;
	
	if (DIGITO[10] < 2) {
        DIGITO[10] = 0;
   	}
   	else {
        DIGITO[10] = 11 - DIGITO[10];
   	}

   // Verifica se os valores dos d�gitos verificadores conferem	
   DV = DIGITO[9] * 10 + DIGITO[10];
   
   if (DV != DV_INFORMADO) {
      alert('CPF inv\xE1lido');
      document.getElementById(cpf).value = '';
      return false;
   }
}

/****************************************M�scaras***************************************************/

function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }       
        return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = document.getElementById(ObjCnpj).value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;
        
        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
                
        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
        
        if(((dig1*10)+dig2) != digito){  
                alert('O CNPJ informado \xE9 inv\xE1lido!');
				document.getElementById(ObjCnpj).value = "";
		}
                
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
                alert('N\xFAmero de Telefone Inv\xE1lido!');
}

//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('N\xFAmero de Cep Inv\xE1lido!');               
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 
        
        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 
        
        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}

/****************************************************************************************/

function carrega_combo(vet){
 tam = vet.length;	
 for (i=0; i<tam; i++){
	 
   (function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( this.value.match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget "+vet[i]+" ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};
				
				
				$( "<button>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Mostrar todos os Itens" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						}, 
						text: false
					}) 
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )

					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			}
		});
	})( jQuery );
   
   $(function() {
   		$( "#"+vet[i] ).combobox();
		$( "button, input:submit, input:button", ".frm" ).button();
		$( "button", ".frm" ).click(function() { return false; });
   });
 
 }
 
}

function cmb_add(param){
	
   aux = param.split("-");
	 
   (function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( this.value.match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget "+aux[0]+" ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};
				
				$( "<button>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Mostrar todos os Itens" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						}, 
						text: false
					}) 
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )

					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}
						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			}
		});
	})( jQuery );
   
   $(function() {
   		$( "#"+param ).combobox();
		$( "button, input:submit, input:button", ".frm" ).button();
		$( "button", ".frm" ).click(function() { return false; });
		
		/*$( "button, input:submit, a", ".frm" ).button();
		$( "a", ".frm" ).click(function() { return false; }); */
   });
 
}

function cmb_add_com_evento(param,evento){
	 
   (function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( this.value.match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget "+param+" ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};
				
				$( "<button>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Mostrar todos os Itens" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						}, 
						text: false
					}) 
					/*.attr( "onchange", evento )*/
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )

					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}
						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			}
		});
	})( jQuery );
   
   $(function() {
   		$( "#"+param ).combobox();
		$( "button, input:submit, input:button", ".frm" ).button();
		$( "button", ".frm" ).click(function() { return false; });
   });
}

/***************************************************************************************/

$(function(){
	
		// Dialog Parcela		
		$('#dialog_parcela').dialog({
			resizable: false,
			modal: true,
			autoOpen: false,
			width: 400,
			buttons: {
				"Sim": function() { 
							var sitio_parcela = document.getElementById("sitio_parcela").value; 
							var grade_modulo_parcela = document.getElementById("grade_modulo_parcela").value; 
							var trilha_parcela = document.getElementById("trilha_parcela").value;  
							document.getElementById('cad_parcela').submit();
							document.getElementById("sitio_parcela").value = sitio_parcela; 
							document.getElementById("grade_modulo_parcela").value = grade_modulo_parcela; 
							document.getElementById("trilha_parcela").value = trilha_parcela;
							$(this).dialog("close");
					    }, 
				"N\xE3o": function() { 
							document.getElementById("sitio_parcela").value = ""; 
							document.getElementById("grade_modulo_parcela").value = ""; 
							document.getElementById("trilha_parcela").value = "";
							document.getElementById('cad_parcela').submit(); 
							$(this).dialog("close");
				 } 
			 }
		});
	
		// Dialog Link Parcela
		$('#dialog_parcela_link').click(function(){
			$('#dialog_parcela').dialog('open');
				return false;
		});
		
		
		// Dialog Trilha		
		$('#dialog_trilha').dialog({
			resizable: false,
			modal: true,
			autoOpen: false,
			width: 400,
			buttons: {
				"Sim": function() { 
							var sitio_trilha = document.getElementById("sitio_trilha").value; 
							var grade_modulo_trilha = document.getElementById("grade_mod_trilha").value;  
							document.getElementById('cad_trilha').submit();
							document.getElementById("sitio_trilha").value = sitio_trilha; 
							document.getElementById("grade_mod_trilha").value = grade_modulo_trilha; 
							$(this).dialog("close");
					    }, 
				"N\xE3o": function() { 
							document.getElementById("sitio_trilha").value = ""; 
							document.getElementById("grade_mod_trilha").value = ""; 
							document.getElementById('cad_trilha').submit(); 
							$(this).dialog("close");
				 } 
			 }
		});
	
		// Dialog Link Trilha
		$('#dialog_trilha_link').click(function(){
			$('#dialog_trilha').dialog('open');
				return false;
		});
		
		// Dialog Segmento		
		$('#dialog_segmento').dialog({
			resizable: false,
			modal: true,
			autoOpen: false,
			width: 400,
			buttons: {
				"Sim": function() { 
							var sitio_segmento = document.getElementById("sitio_segmento").value; 
							var grade_modulo_segmento = document.getElementById("grade_modulo_segmento").value; 
							var trilha_segmento = document.getElementById("trilha_segmento").value;  
							document.getElementById('cad_segmento').submit();
							document.getElementById("sitio_segmento").value = sitio_segmento; 
							document.getElementById("grade_modulo_segmento").value = grade_modulo_segmento; 
							document.getElementById("trilha_segmento").value = trilha_segmento;
							$(this).dialog("close");
					    }, 
				"N\xE3o": function() { 
							document.getElementById("sitio_segmento").value = ""; 
							document.getElementById("grade_modulo_segmento").value = ""; 
							document.getElementById("trilha_segmento").value = "";
							document.getElementById('cad_segmento').submit(); 
							$(this).dialog("close");
				 } 
			 }
		});
	
		// Dialog Segmento	
		$('#dialog_segmento_link').click(function(){
			$('#dialog_segmento').dialog('open');
				return false;
		});
		
		// Dialog Registro salvo		
		$('#dialog').dialog({
			resizable: false,
			modal: true,
			autoOpen: false,
			width: 400,
			buttons: {
				"OK": function() { 
							document.getElementById('form').submit();
							$(this).dialog("close");
					    }, 
 
			 }
		});
	
		// Dialog Registro salvo
		$('#dialog_link').click(function(){
			$('#dialog').dialog('open');
				return false;
		});	
		
		$( "#dt_nasc_colaborador" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_ent_ppbio_colaborador" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_saida_ppbio" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_ent_prj_colaborador" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_saida_prj" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_inicio_curso_colaborador" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_fim_curso_colaborador" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dtiniprj_projeto" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dttermprj_projeto" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dtinifn_projeto" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dtfimfn_projeto" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_inicio_coleta" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#dt_fim_coleta" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#data_prog_radio_tv" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		$( "#data_noticia" ).datepicker({
			changeMonth: true,
			changeYear: true
		});

		$( "#nascimento" ).datepicker({
			changeMonth: true,
			changeYear: true
		});

		
		/*$(function(){
            itemsPerPage = 4;
            paginatorStyle = 1;
            paginatorPosition = 'bottom';
            enableGoToPage = true;
            $("#result_metadado").pagination();
        }); */
			
			$(document).ready(function(){
				$('#gerlivros').pajinate({
					items_per_page : 5,						   
					nav_label_first : '<<',
					nav_label_last : '>>',
					nav_label_prev : '<',
					nav_label_next : '>'
				});
			});

			
			$(document).ready(function(){
				$('#result_metadado').pajinate({
					items_per_page : 5,						   
					nav_label_first : '<<',
					nav_label_last : '>>',
					nav_label_prev : '<',
					nav_label_next : '>'
				});
			});
			
			$(document).ready(function(){
				$('#result_sitio').pajinate({
					items_per_page : 5,						   
					nav_label_first : '<<',
					nav_label_last : '>>',
					nav_label_prev : '<',
					nav_label_next : '>'
				});
			});
			
			$(document).ready(function(){
				$('#result_grade_modulo').pajinate({
					items_per_page : 5,						   
					nav_label_first : '<<',
					nav_label_last : '>>',
					nav_label_prev : '<',
					nav_label_next : '>'
				});
			});
			
			$(document).ready(function(){
				$('#result_col_projeto').pajinate({
					items_per_page : 5,						   
					nav_label_first : '<<',
					nav_label_last : '>>',
					nav_label_prev : '<',
					nav_label_next : '>'
				});
			});
		
	});


/*********************************************Auto-complete*****************************************************/

function get_random_suggs(v){ 
   var a=[];
   var names = ['first','second','third','forth','fifth'];
   for(var i=0;i<names.length;i++) {
     a.push({id:i, value:v+names[i], info:"demo string #"+i, extra:'extra fields remains!'});
   }
   return a;
}

function get_answers(v,cont){
  $.get('/~ygleyzer/answers.com.php',{q:v},
        function(obj){
          var res = [];
          var query = obj[0];
          var suggests = obj[1];
          var infos = obj[2];
          var urls = obj[3];
          for(var i=0;i<suggests.length;i++){
            res.push({ id:urls[0] , value:suggests[i] , info:infos[i] , extra:"query for "+query});
          }
          cont(res);
        },
        'json')
}

function get_look(v,cont){
  $.get('/~ygleyzer/look.php',{q:v},
        function(obj){
          var res = [];
          for(var i=0;i<obj.length;i++){
            res.push({ id:i , value:obj[i]});
          }
          cont(res);
        },
        'json')
}

function print_sugg(v){ 
  $('#info').html('ID: '+v.id+'<br>VALUE: '+v.value+'<br>INFO: '+v.info+' <i>'+v.extra+'</i>'); 
}

function init(input,multi){
    $(input).autocomplete({ get : get_random_suggs, callback: print_sugg, multi: multi});
}

// onfocus="init(this,false)"


$(window).on('load', function() {

    console.log('All assets are loaded')

    var imagens  = $("#imagens").children('li'),
        dot        = $("#dots").children('span'),
        numImagens = imagens.length,
        tempo      = 3500,
        rodar      = setInterval(autoPlay, tempo),
        i            = 0,
        a;

    function imagemSeguinte() {
        imagens.eq(i).removeClass('active');
        dot.eq(i).removeClass('active');
        i = ++i === numImagens ? 0 : i;
        imagens.eq(i).addClass('active');
        dot.eq(i).addClass('active');
    };
    
    function imagemAnterior() {
        imagens.eq(i).removeClass('active');
        dot.eq(i).removeClass('active');
        i = --i === -1 ? numImagens -1 : i;
        imagens.eq(i).addClass('active');
        dot.eq(i).addClass('active');
    };
    
    function mudarImagem( i, a ) {
        clearInterval(rodar);

        // remover
        imagens.eq(a).removeClass('active');
        dot.eq(a).removeClass('active');

        // adicionar
        imagens.eq(i).addClass('active');
        dot.eq(i).addClass('active');
        
        rodar = setInterval(autoPlay, tempo);       
    };
    
    $('.conteudo').hover(function(){
        $('#botoes').fadeIn(300);
        clearInterval(rodar);
    }, function(){
        $('#botoes').fadeOut(300);
        rodar = setInterval(autoPlay, tempo);
    });
    
    $('#anterior, #seguinte').on('click', function (e) {
        e.preventDefault();
        if( this.id === 'seguinte' ) {
            imagemSeguinte();
        } else {
            imagemAnterior();
        }
    });
    
    $('.dot').on('click', function (e) {
        e.preventDefault();

        i = $(this).index();
        a = $('#dots').children('span.active').index();

        mudarImagem( i, a );        
    });
    
    function autoPlay() {
        $('#seguinte').click();
	}

}); 
