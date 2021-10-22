@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!} value="CC">
	<option value="">Seleccione...</option>
	<option value="CC">Cédula de ciudadanía</option>
	<option value="CE">Cédula extranjería</option>
	<option value="PA">Pasaporte</option>
</select>
