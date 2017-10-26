$(document).ready(function(){

	$(".sendcontact").click(function(){
		
		var namec = $("input#namec").val();  
        var emailc = $("input#emailc").val();  
        var subjectc = $("input#subjectc").val();
		var messagec= $("#messagec").val();
    var dataString = 'namec='+ namec +'&emailc=' + emailc + '&subjectc=' + subjectc + '&messagec=' + messagec; 
if (namec == ""){
		alert("Name field is empty");
		return false;
		}
		if (emailc == ""){
		alert("Email field is empty");
		return false;
		}
		if (subjectc == ""){
		alert("Subject field is empty");
		return false;
		}
		if (messagec == ""){
		alert("Message field is empty");
		return false;
		}
    $.ajax({  
      type: "POST",  
      url: "/contact.php",  
      data: dataString,  
      success: function(){
		  alert('Email Sent');
      },
		error: function(){
		alert('There was a error');
    
		}
    });  
    return false; 
	});
	
	
	$(".sendprayer").click(function(){
		
		var namep = $("input#namep").val();  
        var emailp = $("input#emailp").val();  
        var subjectp = $("input#subjectp").val();
		var messagep= $("#messagep").val();
    var dataString = 'namep='+ namep +'&emailp=' + emailp + '&subjectp=' + subjectp + '&messagep=' + messagep; 
if (namep == ""){
		alert("Name field is empty");
		return false;
		}
		if (emailp == ""){
		alert("Email field is empty");
		return false;
		}
		if (subjectp == ""){
		alert("Subject field is empty");
		return false;
		}
		if (messagep == ""){
		alert("Message field is empty");
		return false;
		}
    $.ajax({  
      type: "POST",  
      url: "/prayer.php",  
      data: dataString,  
      success: function(){
		  alert('Email Sent');
      },
		error: function(){
		alert('There was a error');
    
		}
    });  
    return false; 
	});
	
	$('ul.nav li.dropdown').on("hover","ul.nav li.dropdown",function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
});