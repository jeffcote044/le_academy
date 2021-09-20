<x-instructor.index-layout>
    <x-table-responsive>
        <div class="px-6 py-4 flex items-center justify-end bg-white">
            <a class="ml-2 py-2 px-4  bg-red-500 rounded-sm text-white font-bold" href="{{route('instructor.discounts.create')}}">Crear descuento</a>
        </div>
        @if ($discounts->count())      
            <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Válido hasta
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th class="w-4"></th>
                    <th class="w-4"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($discounts as $discount)    
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{$discount->name}}</div>
                                <div class="text-sm text-gray-500">Creado el {{$discount->created_at->format('d M Y')}}</div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($discount->expires_at))->format('d M Y')}}</div>
                            <div class="text-sm text-gray-500">{{\Carbon\Carbon::createFromTimeStamp(strtotime($discount->expires_at))->diffForHumans()}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if (\Carbon\Carbon::parse($discount->expires_at)->lt(\Carbon\Carbon::now()))
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expiró</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{route('instructor.discounts.edit', $discount)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm ">
                            <form action="{{route('instructor.discounts.destroy', $discount)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="text-red-600 hover:text-red-900 font-medium" type="submit">Eliminar</button>
                            </form>
                           
                        </td>
                    </tr>
                @endforeach
                <!-- More rows... -->
            </tbody>
            </table>
        
        @else
            <div class="px-6 py-4">
                <strong>No se contratron descuentos...</strong>
            </div>
        @endif

    </x-table-responsive>
</x-instructor.index-layout>
