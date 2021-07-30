@props(['value',
        'selected' => ''
    ])
<select {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>

    <option>--None--</option>

    @foreach ($value as $key => $item)
        <option value="{{ $key }}" @if($selected == $key) selected @endif>
            {{ $item }}
        </option>
    @endforeach
  </select>
