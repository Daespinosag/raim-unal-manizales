@extends('template.main')

@section('title', 'Ver Aplicacion')

@section('content')
<!--
	// cabezera del contenido
-->
  <div class="contentHeader">
  		<h1>Ver Aplicacion</h1>
  </div>

<!--
	//fin de la cabezera del contenido
-->

	{!! Form::open(['route' => ['Admin.Aplication.index'], 'method' => 'GET','novalidate' => 'novalidate']) !!}

	<div class="zebraTabla">
		<table>
			<tr>
				<td>ID</td>
				<td>{!! $aplication->id !!}</td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td>{!! $aplication->name !!}</td>
			</tr>
			<tr>
				<td>Url</td>
				<td>{!! $aplication->url !!}</td>
			</tr>
			<tr>
				<td>Logo</td>
				<td><img class="img-responsive img-rounded center-block" width="150" height="150" src="{{asset($aplication->logo)}} " alt="Aplication profile picture"></td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>{!! $aplication->type !!}</td>
			</tr>
			<tr>
				<td>Estado</td>
				<td>{!! $aplication->state !!}</td>
			</tr>
			<tr>
				<td>Requiere Informacion</td>
				<td>{!! $aplication->rquiered_information!!}</td>
			</tr>
			<tr>
				<td>Requiere Personalización</td>
				<td>{!! $aplication->rquiered_personalization!!}</td>
			</tr>
			<tr>
				<td>Requiere NEDD</td>
				<td>{!! $aplication->rquiered_NEDD!!}</td>
			</tr>
			<tr>
				<td>Requiere NEDD</td>
				<td>{!! $aplication->rquiered_learningStyle!!}</td>
			</tr>

      <tr>
        <td>Manejo de rutas en framework</td>
        <td>{!! $aplication->systemRoute !!}</td>
      </tr>
		</table>
	</div>
	<div class="buttonTable">
		{!! Form::submit('Aceptar',['class' => '']) !!}
	</div>

	{!! Form::close() !!}

@endsection
