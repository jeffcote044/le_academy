<div class="bg-gray-50 py-8">
    <section class="container relative">
        <div wire:loading.flex class="absolute w-full h-full bg-gray-100 bg-opacity-50 z-50 items-center justify-center">
            <x-spiner size="12"></x-spiner>
        </div>
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-8">
                <h2 class="text-gray-900 font-bold mb-4">Historial de facturación</h2>
                <table class="w-full ">
                    <thead class="px-8 bg-secundary-700 text-gray-50 border-b border-gray-200 rounded-xl overflow-hidden">
                        <tr class="text-left">
                            <th class="w-1/2 pl-4 py-2">Fecha</th>
                            <th class="w-1/4 pl-4 py-2">Dólares</th>
                            <th class="w-1/4 pl-4 py-2"></th>    
                        </tr>
                    </thead>
                   <tbody class="divide-y divide-gray-200">
                        @forelse ($invoices as $invoice)
                            <tr >
                                <td class="px-4 py-3">{{ $invoice->date()->toFormattedDateString() }}</td>
                                <td class="px-4 py-3">{{ $invoice->total() }}</td>
                                <td class="px-4 py-3 text-right"><a href="{{route('payment.invoice.index', $invoice->id )}}" class="outline-zero font-semibold px-4 py-1 text-sm border border-secundary-700 bg-secundary-700 text-gray-50 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700">Descargar</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-4 py-3">
                                    <p class="text-gray-600">Aún no tienes facturas</p>
                                </td>
                            </tr>
                        @endforelse
                   </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
