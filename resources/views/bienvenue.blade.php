@extends('layouts.front')

@section('content')

<style>
.notify {
  display: block;
  background: #fff;
  padding: 12px 18px;
  max-width: 400px;
  margin: 0 auto;
  cursor: pointer;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  margin-bottom: 20px;
  box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 2px 0px;
}

.notify h1 { margin-bottom: 6px; }

.successbox h1 { color: #1fa843; }

.successbox h1:before, .successbox h1:after { background: #cad8a9; }
.errorbox h1:before, .errorbox h1:after { background: #d6b8b7; }

.notify .alerticon { 
  display: block;
  text-align: center;
  margin-bottom: 10px;
}
</style>
<div class="container">
<div class="row" style="text-align: center;padding-bottom: 20px;padding-top: 40px">
<div class="notify successbox">
	<h1>Success!</h1>
	<span class="alerticon"><img src="http://s22.postimg.org/i5iji9hv1/check.png"  /></span>
	<p>Thanks so much for your message. We check e-mail frequently and will try our best to respond to your inquiry.</p>
</div>
</div>
</div>
@endsection