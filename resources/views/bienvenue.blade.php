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

.successbox h1 { color: #81b48f; }

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
	<h1>Bien reçu!</h1>
	<span class="alerticon"><img src="{{  URL::asset('public/site/img/success.png') }}" width=80 /></span>
	<p>Votre demande de préinscription est bien reçue.</br>
Une fois la préinscription est validée, vous recevrez un email de confirmation de la validation de la demande, et promettant qu'il sera tenu au courant de l'issue de sa demande dans les plus brefs délais.</p>
</div>
</div>
</div>
@endsection