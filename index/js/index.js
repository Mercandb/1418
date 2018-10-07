$(document).ready(function(){               
  $('.materialboxed').materialbox();
});
$(document).ready(function(){
  $('.materialboxed').materialbox();
});



// Accueil: changer image centrale en mouse over
var accueil_image_r_m = document.getElementById("accueil_image_r_m");
var div_accueil_image_r_m = document.getElementById("div_accueil_image_r_m");
div_accueil_image_r_m.onmouseover=function(){
	accueil_image_r_m.src = 'index/images/r_m_1914_02.jpg';
};
div_accueil_image_r_m.onmouseout=function(){
	accueil_image_r_m.src = 'index/images/r_m_1914_01.jpg';
};

// Notes: changer image en mouse over
var notes_1914_carte_avantG = document.getElementById("notes_1914_carte_avantG");
var div_notes_1914_carte_avantG = document.getElementById("div_notes_1914_carte_avantG");
div_notes_1914_carte_avantG.onmouseover=function(){
	notes_1914_carte_avantG.src = 'index/images_notes/1914_carte_avantG.jpg';
};
div_notes_1914_carte_avantG.onmouseout=function(){
	notes_1914_carte_avantG.src = 'index/images_notes/1914_avantG.jpg';
};
