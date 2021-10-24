@props(['disabled' => false,'value' => 'x'])
@php
	$select = '';
	$document_type = [
		"CC" => "Cédula de ciudadanía",
		"CE" => "Cédula extranjería",
		"PA" => "Pasaporte"
	];
@endphp
<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
	<option value="">Seleccione...</option>
	@foreach($document_type as $key => $option)
	@php
		if($key==$value) $select="selected";
		else $select = '';
	@endphp
		<option {{ $select }} value="{{ $key }}">{{ $option }}</option>
	@endforeach
</select>