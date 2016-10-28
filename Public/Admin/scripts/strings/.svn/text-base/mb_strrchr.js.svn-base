/**
 * 
 */
function mb_strrchr(str,header,flag = false){
	if(true != flag){
		return str.substr(str.lastIndexOf(header));
	}else{
		var str2="";
		for(var i=0;i<str.length;i++){
			str2+=str.charAt(str.length-i-1);
		}
		var str3 = '';
		str2 = str2.substr(str2.indexOf(header)+1);
		for(var i=0;i<str2.length;i++){
			str3+=str2.charAt(str2.length-i-1);
		}
		return str3;
	}
}
