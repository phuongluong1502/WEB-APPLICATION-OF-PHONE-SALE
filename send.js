
//get cookie

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*1000*24*60*60));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
function setSession(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*1000*60));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
 
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
 user_session=getCookie("username2");
  if (user_session.search('session') != -1 ) {
    //alert('Xin chao ' + user_year);
    setSession("username2", user_session, 30);
  } else {
    user_session = "session_" + Math.random();
     if (user_session != "" && user_session != null) {
       setSession("username2", user_session, 30);
     }
    // alert('Tao thanh cong 1 cookie year')
  }
  
  user_day=getCookie("username");
  if (user_day.search('day') != -1 ) {
    //alert('Xin chao ' + user_day);
  } else {
    user_day = "day_" + Math.random();
     if (user_day != "" && user_day != null) {
       setCookie("username", user_day, 1);
     }
     //alert('Tao thanh cong 1 cookie day')
  }

  user_year=getCookie("username1");
  if (user_year.search('year') != -1 ) {
    //alert('Xin chao ' + user_year);
  } else {
    user_year = "year_" + Math.random();
     if (user_year != "" && user_year != null) {
       setCookie("username1", user_year, 365);
     }
    // alert('Tao thanh cong 1 cookie year')
  }
  




  //get BROWSER
  var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName  = navigator.appName;
var fullVersion  = ''+parseFloat(navigator.appVersion); 
var majorVersion = parseInt(navigator.appVersion,10);
var nameOffset,verOffset,ix;

// In Opera, the true version is after "Opera" or after "Version"
if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
   browserName = "Opera";
   fullVersion = nAgt.substring(verOffset+6);
   if ((verOffset=nAgt.indexOf("Version"))!=-1) 
     fullVersion = nAgt.substring(verOffset+8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
   browserName = "Microsoft Internet Explorer";
   fullVersion = nAgt.substring(verOffset+5);
}
// In Chrome, the true version is after "Chrome" 
else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
   browserName = "Chrome";
   fullVersion = nAgt.substring(verOffset+7);
}
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
   browserName = "Safari";
   fullVersion = nAgt.substring(verOffset+7);
   if ((verOffset=nAgt.indexOf("Version"))!=-1) 
     fullVersion = nAgt.substring(verOffset+8);
}
// In Firefox, the true version is after "Firefox" 
else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
    browserName = "Firefox";
    fullVersion = nAgt.substring(verOffset+8);
}
// In most other browsers, "name/version" is at the end of userAgent 
else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < (verOffset=nAgt.lastIndexOf('/')) ) {
    browserName = nAgt.substring(nameOffset,verOffset);
    fullVersion = nAgt.substring(verOffset+1);
    if (browserName.toLowerCase()==browserName.toUpperCase()) {
       browserName = navigator.appName;
    }
}
// trim the fullVersion string at semicolon/space if present
if ((ix=fullVersion.indexOf(";"))!=-1)
    fullVersion=fullVersion.substring(0,ix);
if ((ix=fullVersion.indexOf(" "))!=-1)
    fullVersion=fullVersion.substring(0,ix);

majorVersion = parseInt(''+fullVersion,10);
if (isNaN(majorVersion)) {
    fullVersion  = ''+parseFloat(navigator.appVersion); 
    majorVersion = parseInt(navigator.appVersion,10);
}

/*document.write(''
                +'Browser name  = '+browserName+'<br>'
                +'Full version  = '+fullVersion+'<br>'
                +'Major version = '+majorVersion+'<br>'
                +'navigator.appName = '+navigator.appName+'<br>'
                +'navigator.userAgent = '+navigator.userAgent+'<br>');
*/


//lấy nguồn gốc truy cập của user
var ref = document.referrer;
//document.write(document.referrer);

//GET TYPE OF DEVICE
var device;
if(! navigator.userAgent.match(/Android/i) &&
            ! navigator.userAgent.match(/webOS/i) &&
            ! navigator.userAgent.match(/iPhone/i) &&
            ! navigator.userAgent.match(/iPod/i) &&
            ! navigator.userAgent.match(/iPad/i) &&
            ! navigator.userAgent.match(/Blackberry/i) )
    {
        device = "Desktop";
       // document.write("Desktop device");

    } else if ( navigator.userAgent.match(/iPad/i) ) 
    {
        device = "tablet";
        //document.write("tablet device");

    }
    else 
    {
        device = "mobile";
        //document.write("mobile device");
    }

	//Get Date
	var d = new Date();
	var hours = d.getHours();
	var minutes = d.getMinutes();
	var seconds = d.getSeconds();
	var date1 = hours + ":" + minutes + ":" + seconds;
	var dateObj = new Date();
	var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
	var date = ('0' + dateObj.getDate()).slice(-2);
	var year = dateObj.getFullYear();
	var shortDate = year + '/' + month + '/' + date;
	var datetime = shortDate + "  " + date1;
	console.log(typeof(datetime));
	
//GET USERAGENT
var UserAgent = navigator.userAgent;
 
//GET OS
var os = navigator.platform;
    $.getJSON("http://www.geoplugin.net/json.gp?jsoncallback=?", function(data) {
    var info = {public: data.geoplugin_request, locations: data.geoplugin_region, type : device, userAgent: UserAgent, cookieDay: user_day, cookieYear: user_year,ref: ref, date1: datetime,session: user_session};
	var doc = document, win = window;
    var func = 
    {
        CreateOjb: function()
        {
            var xmlhttp;
            if(win.XMLHttpRequest)
            {
                xmlhttp = new XMLHttpRequest();
            }
            else if(win.ActiveXObject)
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            else
            {
                xmlhttp = null;
            }
            return xmlhttp;
        },
        get:function()
        {
            var http = func.CreateOjb();
            http.onreadystatechange = function()
            {
                if(http.readyState == 4)
                {
                    doc.getElementById("Show").innerHTML = "Info: " + http.responseText;	
                }	
            }
            http.open('get','serverphp.php?value='  + info.public + "--" + info.locations + "--" + info.userAgent + "--" + info.type + "--" + info.cookieDay  + "--" + info.cookieYear + "--" + info.ref + "--" + info.date1 + "--" + info.session);
            http.send(null);
        }
      
    }
    func.get();
  }
  );
   
    //func.get();