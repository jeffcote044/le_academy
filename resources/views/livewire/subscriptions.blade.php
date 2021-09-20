<div>

@if ($incompletePayment)
    <a href="{{ route('cashier.payment', $subscription->latestPayment()->id) }}" class="outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full">
        Confirma tu pago pendiente
    </a>
@else

    @if (auth()->user()->hasDefaultPaymentMethod())

        @if (auth()->user()->subscribed($name))
            @if (auth()->user()->subscribedToPlan($price, $name))
                @if (auth()->user()->subscription($name)->onGracePeriod())
                    <div>
                        <button 
                        wire:click="resumeSubscription"
                        wire:loading.attr="disabled"
                        wire:target="resumeSubscription"
                        class=" outline-zero font-bold px-8 py-2 text-lg border bg-accent-400 border-accent-400 text-gray-50 rounded-full hover:bg-transparent hover:border-accent-400 hover:text-accent-400 transition duration-300 ease select-none flex items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2" wire:loading attr="disabled" wire:target="resumeSubscription"></x-spiner>Reanudar plan</button>
                    </div>
                @else
                    <article>
                        <button 
                        wire:click="cancelSubscription"
                        wire:loading.attr="disabled"
                        wire:target="cancelSubscription"
                        class=" outline-zero font-bold px-8 py-2 text-lg border bg-accent-400 border-accent-400 text-gray-50 rounded-full hover:bg-transparent hover:border-accent-400 hover:text-accent-400 transition duration-300 ease select-none flex items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2" wire:loading attr="disabled" wire:target="cancelSubscription"></x-spiner>Cancelar</button>
                    </article>

                @endif
            @else
                <button 
                wire:click="changePlans"
                wire:loading.attr="disabled"
                wire:target="changePlans"
                class=" outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2" wire:loading attr="disabled" wire:target="changePlans"></x-spiner>Cambiar plan</button>
            @endif
        @else
            <div x-data="{$open:false}" class>
                <button x-on:click="$open = !$open" x-show="!$open" class="text-accent-400 text-left block w-full text-sm">¿Tienes un cupón?</button>
                <div x-show="$open">
                    <div class="flex items-center justify-between">
                        @if ($successCoupon != "")
                            <p class="bg-transparent no-border outline-zero border-b border-secundary-100 w-full text-sm text-left text-gray-500 cursor-default" >{{$coupon}}</p>
                            <button class="outline-zero px-2 text-gray-500 font-semibold transition ease-in-out duration-300 rounded-sm hover:bg-secundary-100 hover:bg-opacity-20 hover:text-gray-100" wire:click="clearCoupon">Borrar</button>
                        @else
                            <input wire:model="coupon" class="bg-transparent no-border outline-zero border-b border-secundary-100 w-full text-sm" placeholder="Agrega tu cupón" >
                            <button class="outline-zero px-2 text-green-500 font-semibold transition ease-in-out duration-300 rounded-sm hover:bg-secundary-100 hover:bg-opacity-20" wire:click="retrieveCoupon">Aplicar</button>
                        @endif
                    </div>
                    <span class="text-xs text-green-500">{{$successCoupon}}</span>
                    <span class="text-xs text-red-500">{{$errorCoupon}}</span>
                </div>
                <div class="mb-6"></div>
                <a  
                wire:click="newSubscription"
                wire:loading.attr="disabled"
                wire:target="newSubscription"
                class="cursor-pointer outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2" wire:loading attr="disabled" wire:target="newSubscription"></x-spiner>Suscríbete</a>
            </div>
        @endif
    @else
        <button 
        class=" outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full" >Agregar método de pago</button>
    @endif
 
@endif    

</div> 