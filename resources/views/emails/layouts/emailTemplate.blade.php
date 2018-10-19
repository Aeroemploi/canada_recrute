<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<!--[if !mso]><!-- --><meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<![endif]-->
<!--[if gte mso 9]><xml>
	<o:OfficeDocumentSettings>
	<o:AllowPNG/>
	<o:PixelsPerInch>96</o:PixelsPerInch>
	</o:OfficeDocumentSettings>
</xml><![endif]-->
<title>{!! $user_array['subject'] !!}</title>

<style type="text/css">

	#outlook a{padding:0;}
	body{width:100%!important;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0!important;padding:0!important;}
	.ExternalClass{width:100%;}
	.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%;}
	.bodytbl{margin:0;padding:0;width:100% !important;}
	img{outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;display:block;max-width:100%;height:auto;}
	a img{border:none;}
	p{margin:1em 0;}

	table{border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;}
	table td{border-collapse:collapse;}
	.o-fix table,.o-fix td{mso-table-lspace:0pt;mso-table-rspace:0pt;}

	body,.bodytbl{background-color:#F3F4F4/*Background Color*/;}
	table{font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#585858;}
	td,p{line-height:24px;color:#585858/*Text*/;}
	td,tr{padding:0;}
	ul,ol{margin-top:24px;margin-bottom:24px;}
	li{line-height:24px;}

	a{color:#5ca8cd/*Contrast*/;text-decoration:none;padding:2px 0px;}
	a:link{color:#5ca8cd;}
	a:visited{color:#5ca8cd;}
	a:hover{color:#5ca8cd;}

	.h1,.h1 p{font-family:Helvetica,Arial,sans-serif;font-size:22px;letter-spacing:-1px;margin-bottom:16px;margin-top:2px;line-height:30px;}
	.h2,.h2 p{font-family:Helvetica,Arial,sans-serif;font-size:18px;letter-spacing:0;margin-top:2px;line-height:30px;}
	h1,h2,h3,h4,h5,h6{font-family:Helvetica,Arial,sans-serif;font-weight:normal;}
	h1{font-size:20px;letter-spacing:-1px;margin-bottom:16px;margin-top:4px;line-height:24px;}
	h2{font-size:18px;margin-bottom:12px;margin-top:2px;line-height:24px;}
	h3{font-size:14px;margin-bottom:12px;margin-top:2px;line-height:24px;}
	h4{font-size:14px;font-weight:bold;}
	h5{font-size:13px;}
	h6{font-size:13px;font-weight:bold;}
	h1 a,h2 a,h3 a,h4 a,h5 a,h6 a{color:#5ca8cd;}
	h1 a:active,h2 a:active,h3 a:active,h4 a:active,h5 a:active,h6 a:active{color:#5ca8cd !important;}
	h1 a:visited,h2 a:visited,h3 a:visited,h4 a:visited,h5 a:visited,h6 a:visited{color:#5ca8cd !important;}

	.wrap.body,.wrap.header,.wrap.footer{background-color:#FFFFFF/*Body Background*/;}
	.padd{width:24px;}

	.small{font-size:11px;line-height:18px;}
	.separator{border-top:1px dotted #E1E1E1/*Separator Line*/;}
	.btn{margin-top:10px;display:block;}
	.btn img{display:inline;}
	.subline{line-height:18px;font-size:16px;letter-spacing:-1px;}

	table.textbutton td{background:#efefef/*Text Button Background*/;padding:3px 14px 3px 14px;color:#585858;display:block;height:24px;border:1px solid #FEFEFE/*Text Button Border*/;vertical-align:top;margin-bottom:3px;border:1px solid #ccc;-webkit-border-radius:2px;border-radius:2px;margin-right:4px;margin-bottom:4px;}
	table.textbutton a{color:#585858;font-size:14px;font-weight:normal;line-height:14px;width:100%;display:inline-block;}

	table.textbutton a{color:#585858;font-size:14px;font-weight:normal;line-height:14px;width:100%;display:inline-block;}

	div.preheader{line-height:0px;font-size:0px;height:0px;display:none !important;display:none;visibility:hidden;}

	@media only screen and (max-width: 599px) {
		body{-webkit-text-size-adjust:120% !important;-ms-text-size-adjust:120% !important;}
		table{font-size:15px;}
		.subline{float:left;}
		.padd{width:12px !important;}
		.wrap{width:96% !important;}
		.wrap table{width:100% !important;}
		.wrap img{max-width:100% !important;height:auto !important;}
		.wrap .s{width:100% !important;}
		.wrap .m-0{width:0;display:none;}
		.wrap .m-b{margin-bottom:24px !important;}
		.wrap .m-b,.m-b img{display:block;min-width:100% !important;width:100% !important;}
		table.textbutton td{height:auto !important;padding:8px 14px 8px 14px !important;}
		table.textbutton a{font-size:18px !important;line-height:26px !important;}
	}
	@media only screen and (max-width: 479px) {
	}
	@media only screen and (max-width: 320px) {
	}
	@media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
	}
	@media only screen and (min-device-width: 414px) and (max-device-width: 736px) {
	}

</style>
</head>
<body>
	@yield('content')
</body>
</html>
