@props(['name','price','style'])
<div>
    @if (auth()->user()->hasDefaultPaymentMethod())
        @if (auth()->user()->subscribed($name))
            @if (auth()->user()->subscribedToPlan($price, $name))
                @if (auth()->user()->subscription($name)->onGracePeriod())
                    <button 
                    wire:click="resumeSubscription('{{$name}}','{{$price}}')"
                    wire:loading.remove
                    wire:target="resumeSubscription('{{$name}}','{{$price}}')"
                    class=" outline-zero font-bold px-8 py-2 text-lg border bg-accent-400 border-accent-400 text-gray-50 rounded-full hover:bg-transparent hover:border-accent-400 hover:text-accent-400 transition duration-300 ease select-none flex items-center justify-center w-full" >Reanudar plan</button>

                    <button 
                    wire:loading.flex
                    wire:target="resumeSubscription('{{$name}}','{{$price}}')"
                    class=" outline-zero font-bold px-8 py-2 text-lg border bg-accent-400 border-accent-400 text-gray-50 rounded-full hover:bg-transparent hover:border-accent-400 hover:text-accent-400 transition duration-300 ease select-none items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2"></x-spiner> Reanudando </button>
                @else
                    <button 
                    wire:click="cancelSubscription('{{$name}}','{{$price}}')"
                    wire:loading.remove
                    wire:target="cancelSubscription('{{$name}}','{{$price}}')"
                    class=" outline-zero font-bold px-8 py-2 text-lg border bg-accent-400 border-accent-400 text-gray-50 rounded-full hover:bg-transparent hover:border-accent-400 hover:text-accent-400 transition duration-300 ease select-none flex items-center justify-center w-full" >Cancelar</button>

                    <button 
                    wire:loading.flex
                    wire:target="cancelSubscription('{{$name}}','{{$price}}')"
                    class=" outline-zero font-bold px-8 py-2 text-lg border bg-accent-400 border-accent-400 text-gray-50 rounded-full hover:bg-transparent hover:border-accent-400 hover:text-accent-400 transition duration-300 ease select-none items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2"></x-spiner> Cancelando </button>
                @endif
            @else
                <button 
                wire:click="changePlans('{{$name}}','{{$price}}')"
                wire:loading.remove
                wire:target="changePlans('{{$name}}','{{$price}}')"
                class=" outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full" >Cambiar plan</button>
                <button 
                wire:loading.flex
                wire:target="changePlans('{{$name}}','{{$price}}')"
                class="outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2"></x-spiner> Cambiando </button>
            @endif
        @else
            <button 
            wire:click="newSubscription('{{$name}}','{{$price}}')"
            wire:loading.remove
            wire:target="newSubscription('{{$name}}','{{$price}}')"
            class=" outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full" >Suscríbete</button>

            <button 
            wire:loading.flex
            wire:target="newSubscription('{{$name}}','{{$price}}')"
            class=" outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none items-center justify-center w-full" ><x-spiner size="6" border="2" class="mr-2"></x-spiner> Suscribiendo </button>
        @endif
    @else
        <button 
        class=" outline-zero block font-bold px-8 py-2 text-lg border border-{{$style}}-50 text-{{$style}}-50 rounded-full hover:bg-transparent hover:border-{{$style}}-400 hover:text-{{$style}}-400 transition duration-300 ease select-none flex items-center justify-center w-full" >Agregar método de pago</button>
    @endif
</div> 
