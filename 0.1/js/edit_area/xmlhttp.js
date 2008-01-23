
function XMLHTTP(url)
{
	this.url = url;
	this.headers = new Array();
	this.async = true;
	this.method = "POST";
	this.req = null;
	this.debug_flag = false;
	this.deb_str = '';		// debug string for application debugging
	return this;
}

XMLHTTP.prototype.debug = function(str)
{
	if(this.debug_flag){
		document.write( str + "<br>" );
	}
}



// xmlhttp wrapper method
/**
*@param string			methodName this is the FSService method you want to call on the engine
*@param mixed 			arguments passed as an array that contain the options you're passing to the methodName
*@responseHandler string	the name of the javascript function you want to handle the response back from the server
*@useSOAP bool			whether to use a SOAP request or to use regular POST/GET request
*/
XMLHTTP.prototype.call = function(arguments, responseHandler)
{

	this.request = arguments;
	
	// moz XMLHTTPRequest object
	if (window.XMLHttpRequest)
	{
		this.req = new XMLHttpRequest();
		this.deb_str += "Mozilla Version of XMLHTTPRequest\r\n";
	}
	// IE/Windows ActiveX version
	else if (window.ActiveXObject)
	{
		this.req = new ActiveXObject("Microsoft.XMLHTTP");
		this.deb_str += "Microsoft Version of XMLHTTPRequest\r\n";
	}
	// set response handler
	this.req.onreadystatechange = responseHandler;
	
	// open connection
	this.req.open(this.method, this.url, this.async);
    
  	// set headers
	if(this.headers.length > 0)
	{
		for(var i in this.headers)
		{
			this.req.setRequestHeader( i, this.headers[i]);
		}
	}
	
	 this.req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'); 
	
	// send request
	if(this.method == 'POST')
	{
		this.req.send(arguments);
	}
	else 
	{
		this.req.send(null);
	}
	
	if(this.async == false)
	{
		return this.req.responseXML;
	}
	
	return true;
}

// DEBUG METHOD
XMLHTTP.prototype.debugTransaction = function()
{
	var req = document.getElementById("request");
	if(req) {
		req.value = this.request;
	} 
	var resp = document.getElementById("response");
	if(resp) {
		resp.value = this.req.responseText;
	}
	var deb = document.getElementById("debug");
	if(deb) {
		deb.value = this.deb_str;
	}
}