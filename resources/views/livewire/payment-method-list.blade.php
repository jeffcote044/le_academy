<div class="bg-gray-50 py-8">
    <section class="container relative">
        <div wire:loading.flex class="absolute w-full h-full bg-gray-100 bg-opacity-50 z-50 items-center justify-center">
            <x-spiner size="12"></x-spiner>
        </div>
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-8">
                <h2 class="text-gray-900 font-bold ">Métodos de pago agregados</h2>
                <div class="mt-2 divide-y divide-gray-200 relative">
                    @forelse ($paymentMethods as $paymentMethod)
                            <div class="text-sm text-gray-700 py-3 flex justify-between items-center ">
                                <div class="mr-4 flex items-start">
                                    <div class="flex items-start">
                                        <i class="fas fa-credit-card text-gray-400 mr-2 mt-1"></i>
                                        <div class="text-gray-600" >
                                            <p><span class="font-bold text-gray-700 uppercase">{{$paymentMethod->card->brand}} xxx-{{$paymentMethod->card->last4}} </span></p>
                                            <p>{{$paymentMethod->billing_details->name}}</p>
                                            <p class="text-xs text-gray-400">Explira {{$paymentMethod->card->exp_month}} / {{$paymentMethod->card->exp_year}}</p>
                                        </div>
                                    </div>
                                    <div>
                                        @if ($paymentMethod->id == auth()->user()->defaultPaymentMethod()->id)
                                            <span class="px-2 py-1 bg-secundary-100 bg-opacity-15 text-secundary-400 font-semibold text-xs rounded-lg ml-2">Predeterminado</span>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                   @unless ($paymentMethod->id == auth()->user()->defaultPaymentMethod()->id)
                                    <i class="fas fa-star text-gray-300 cursor-pointer transition ease-in-out duration-300 hover:bg-gray-50 p-2" wire:click="defaultPaymentMethod('{{$paymentMethod->id}}')" title="Seleccionar como tarjeta principal"></i>
                                    <i class="fas fa-trash cursor-pointer transition ease-in-out duration-300 hover:bg-gray-50 p-2" wire:click="deletePaymentMethod('{{$paymentMethod->id}}')" title="Eliminar tajeta"></i>
                                   @endunless
                                </div>
                            </div>
                        @empty
                        <div class="text-sm text-gray-400 py-3 flex justify-between items-center ">
                            <p>Agrega tu primer método de pago</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
