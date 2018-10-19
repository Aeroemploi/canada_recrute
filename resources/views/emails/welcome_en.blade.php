@extends('emails/layouts/emailTemplate')

@section('content')
	<table class="bodytbl" width="100%" cellspacing="0" cellpadding="0">
	<tbody><tr>
		<td background="" align="center">

			<table class="wrap" width="600" cellspacing="0" cellpadding="0">
			<tbody><tr>
				<td valign="middle" height="24" align="center">
					<div class="preheader"></div> 
					<div class="small"><a name="top"></a></div>
				</td>
			</tr>
			</tbody></table>

			<table class="wrap header" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
			<tbody><tr><td colspan="3" height="24"></td></tr>
			<tr>
				<td class="padd" width="24">&nbsp;</td>
				<td valign="top" align="center">
					<table class="o-fix" cellspacing="0" cellpadding="0">
					<tbody><tr>

						<td width="552" valign="top" align="left">
							<table cellspacing="0" cellpadding="0" align="left">
							<tbody><tr>
								<td class="" width="264" valign="middle" align="left">
										<img src="{{asset('assets/images/logo_canada_en.png')}}" alt="" editable="" label="Logo" class="" width="264" height="25" border="0">
								</td>
							</tr>
							</tbody></table>
							<table class="m-b" cellspacing="0" cellpadding="0" align="right">
							<tbody><tr>
								<td width="264" valign="bottom" height="24" align="right">
									<div class="subline"><single label="Subline">{!! $user_array['subject'] !!}</single></div>
								</td>
							</tr>
							</tbody></table>
						</td>

					</tr>
					</tbody></table>
				</td>
				<td class="padd" width="24">&nbsp;</td>
			</tr>
			<tr class="m-0"><td colspan="3" height="24"></td></tr>
			</tbody></table>

			<table class="wrap body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
			<tbody><tr><td colspan="3" height="12"></td></tr>
			<tr>
				<td class="padd" width="24">&nbsp;</td>
				<td valign="top" align="left">
					<div class="h1"><single label="Headline"># Welcome {!! $user_array['first_name'] !!} {!! $user_array['last_name'] !!},</single></div>
					<div class="h2"><multi label="Intro Sentence"><p>Thank you for registering for the live chat event. If your application is successful, a recruiter will contact you. <br/>Regards,</p></multi></div>
				</td>
				<td class="padd" width="24">&nbsp;</td>
			</tr>
			<tr><td colspan="3" height="12"></td></tr>
			</tbody></table>
			<table class="wrap body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
				<tbody><tr><td colspan="3" height="12"></td></tr>
				<tr><td class="padd" width="24">&nbsp;</td>
				<td width="552" align="center"><table class="separator" cellspacing="0" cellpadding="0"><tbody><tr><td width="552" height="23">&nbsp;</td></tr></tbody></table></td>
				<td class="padd" width="24">&nbsp;</td>
				</tr>
			</tbody></table>
			<table class="wrap footer" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
			<tbody><tr><td colspan="3" height="12"></td></tr>
			<tr>
				<td class="padd" width="24">&nbsp;</td>
				<td valign="top" align="center">
					<table class="o-fix" cellspacing="0" cellpadding="0">
					<tbody><tr>

						<td width="552" valign="top" align="left">
							<table cellspacing="0" cellpadding="0" align="left">
							<tbody><tr>
								<td class="small m-b" width="552" valign="top" align="left">
									<div><single label="CAN-SPAM"></single></div>
									<div><single label="Address"></single></div>
									<div><single label="Copyright">© 2018 All right reserved to Canada Recruit</single></div>
								</td>
							</tr>
							</tbody></table>
							<table cellspacing="0" cellpadding="0" align="left">
							<tbody><tr>
								<td class="small" width="100" valign="top" align="left">
								<div class="btn">Propulse by</div>
								</td>
								<td class="small" width="226" valign="top" align="left"><a href="https://aerocareer.ca/"><img src="{{asset('assets/images/mini_logo_aeroemploi_en.png')}}" alt="" width="115" height="50" border="0"></a></td>
								<td class="small" width="226" valign="top" align="left"><a href="https://auray.com/"><img src="{{asset('assets/images/mini_logo_auray_sourcing_en.png')}}" alt="" width="115" height="50" border="0"></a></td>
							</tr>
							</tbody></table>
						</td>

					</tr>
					</tbody></table>
				</td>
				<td class="padd" width="24">&nbsp;</td>
			</tr>
			<tr><td colspan="3" height="24"></td></tr>
			</tbody></table>

			<table class="wrap" width="600" cellspacing="0" cellpadding="0">
			<tbody><tr>
				<td class="m-b" width="600" valign="top" align="left">
					<table class="o-fix" cellspacing="0" cellpadding="0">
					<tbody><tr>
						<td class="m-b" width="600" valign="top" align="center">
							<img src="{{asset('assets/images/shadow.png')}}" alt="" style="max-width:600px;max-height:25px" width="600" height="25" border="0">
						</td>
					</tr>
					</tbody></table>
				</td>
			</tr>
			</tbody></table>

		</td>
	</tr></tbody>
	</table>
@endsection
