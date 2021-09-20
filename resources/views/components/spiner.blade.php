@props(['size' => '64', 'border' => '8'])
<div {{ $attributes->merge([
    "class" => "loader ease-linear rounded-full border-$border border-t-$border border-gray-200 h-$size w-$size"])}}" ></div>