jQuery.extend({
	getCookie : function(sName) {
		var aCookie = document.cookie.split("; ");
		for (var i=0; i < aCookie.length; i++){
			var aCrumb = aCookie[i].split("=");
			if (sName == aCrumb[0]) return decodeURIComponent(aCrumb[1]);
		}
		return '';
	},
	setCookie : function(sName, sValue, sExpires) {
		var sCookie = sName + "=" + encodeURIComponent(sValue);
		if (sExpires != null) sCookie += "; expires=" + sExpires;
			document.cookie = sCookie;
		},
		removeCookie : function(sName) {
		document.cookie = sName + "=; expires=Fri, 31 Dec 1999 23:59:59 GMT;";
	}
});