Hello <i>{{ $demo->receiver }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>
 
<p><u>Demo object values:</u></p>
 
<div>
<p><b>Name:</b>&nbsp;{{ $demo->name }}</p>
<p><b>Phone number:</b>&nbsp;{{ $demo->mobile }}</p>
<p><b>Email:</b>&nbsp;{{ $demo->email }}</p>
</div>
 
<p><u>{{ $demo->comments }}</u></p>
 
<div>

</div>
 
Thank You,
<br/>
<i>{{ $demo->sender }}</i>