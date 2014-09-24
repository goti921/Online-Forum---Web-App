$(window).scroll(function () 
	{
	  	 if ($(window).scrollTop() > 130) 
	  	 {
	       $('#topnav').css('top', $(window).scrollTop()-150+'px');
	     }
	}
);

function highlight()
{
	var path = location.pathname;
	var path_split = splitt(path,"/");
	var len = path_split.length;
	var curr_page = path_split[len-1];
	//alert("pagename:"+page);
	for(var i=0;i<len;i++)
	{
		var elmt = document.getElementById("link"+i);
		var path = elmt.href;
		path_split = splitt(path,"/");
		len = path_split.length;
		var page = path_split[len-1];
		if(page == curr_page)
		{
			elmt.style.color="red";
			//elmt.style.background = "grey";
			break;
		}
	}
}

function splitt(pathname,ch)
{
	return pathname.split(ch);
}

function thumbs_up(aid,i){
	document.getElementById("up"+i).innerHTML = "..";
	//alert("This is the srno "+aid);
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState ==4 && xmlhttp.status == 200)
		{
			document.getElementById("up"+i).innerHTML = '';
			document.getElementById("up"+i).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","process/thumbs_up.php?aid=" + aid,true);
	xmlhttp.send();
}

function thumbs_down(aid,i){
	document.getElementById("down"+i).innerHTML = "..";
	//alert("This is the srno "+srno);
	var xmlhttp;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState ==4 && xmlhttp.status == 200)
		{
			document.getElementById("down"+i).innerHTML = '';
			document.getElementById("down"+i).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","process/thumbs_down.php?aid=" + aid,true);
	xmlhttp.send();
}

$(document).ready(function() {

    fontSize();

    $(window).resize(function() {
        fontSize();
    });

    function fontSize() {
        $ww = $(window).width();
        $fontSize = ($ww / 80) + 'pt';
        $('body').css("font-size", $fontSize);
    }

});

function check_ans(){
	var elmt = document.getElementById("ans");
	var ans = elmt.value;
	if(ans=='')
		alert('Kindly type in your answer..');
	return false;
}

function check_create(){
	var elmt1 = document.getElementById("ques");
	var elmt2 = document.getElementById("cat");
	var elmt3 = document.getElementById("mail");
	var ques = elmt1.value;
	var cat = elmt2.value;
	var mail = elmt3.value;
	if(ques=='')
		{
			alert('Kindly fill in the question');
			return false;
		}
	if(cat=='')
		{
			alert('Kindly fill in the category');
			return false;
		}
	if(mail=='')
		{
			alert('Kindly fill in the mail id');
			return false;
		}
}

function check_login(){
	var elmt1 = document.getElementById("name");
	var elmt2 = document.getElementById("pass");
	var name = elmt1.value;
	var pass = elmt2.value;
	if(name=='')
		{
			alert('Kindly fill in the username');
			return false;
		}
	if(pass=='')
		{
			alert('Kindly fill in the password');
			return false;
		}
}

function check_reg(){
	var elmt1 = document.getElementById("name");
	var elmt2 = document.getElementById("pass");
	var elmt3 = document.getElementById("repass");
	var name = elmt1.value;
	var pass = elmt2.value;
	var repass = elmt3.value;
	if(name=='')
	{
		alert('Kindly fill in the name');
		return false;
	}
	if(pass=='')
	{
		alert('Kindly fill in the password');
		return false;
	}
	if(repass=='')
	{
		alert('Kindly fill in the confirm password');
		return false;
	}
	if(pass!=repass)
	{
		alert('Passwords do not match');
		return false;	
	}
}