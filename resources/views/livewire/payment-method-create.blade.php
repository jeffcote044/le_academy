<div class="bg-gray-50 py-8">
    <article class="container relative">
        <div wire:loading.flex class="absolute w-full h-full bg-gray-100 bg-opacity-50 z-50 items-center justify-center">
            <x-spiner size="12"></x-spiner>
        </div>
        <form action="" id="card-form">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-8">
                   <h2 class="text-gray-900 font-bold">Agregar método de pago</h2>
                   <div class="flex mt-2">
                       <h3 class="text-gray-400 font-semibold">Información de tarjeta</h3>
                        <div class="flex-1 ml-6">
                            <div class="mb-4">
                                <input id="card-holder-name" class="form-input w-full text-sm py-3" type="text" placeholder="Nombre del titular de la tarjeta" required>
                            </div>
                            <div class="mb-4">
                                <!-- Stripe Elements Placeholder -->
                                <div id="card-element" class="form-input py-3" ></div>
                                <span id="card-errors" class="text-sm text-red-500"></span>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="bg-secundary-700 flex justify-end py-4 pr-4">
                    <button id="card-button" data-secret="{{ $intent->client_secret }}" class=" outline-zero font-bold px-6 py-2 text-lg border border-primary-100 bg-primary-100 text-secundary-700 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-primary-100" >Agregar método de pago</button>
                </div>
            </div>
        </form>
    </article>
    
    @slot('js')

    <script>
        
    
        function loadStripe(){

            const stripe = Stripe('{{env('STRIPE_KEY')}}');
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');

            //Generar Token
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const cardForm = document.getElementById('card-form');
            const clientSecret = cardButton.dataset.secret;

            cardForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                if(cardHolderName.value == ""){
                    document.getElementById('card-errors').textContent = 'El nombre del titular está incompleto.';
                }
                else{
                    const { setupIntent, error } = await stripe.confirmCardSetup(
                        clientSecret, {
                            payment_method: {
                                card: cardElement,
                                billing_details: { name: cardHolderName.value }
                            }
                        }
                    );

                    if (error) {
                        document.getElementById('card-errors').textContent = error.message;
                    } else {
                        Livewire.emit('paymentMethodCreate', setupIntent.payment_method);
                    }
                }
                
            });
        }
    </script>
    
    <script>
        
        document.addEventListener('livewire:load', function() {
            loadStripe();
        })    
        Livewire.on('resetStripe', function (){
            document.getElementById('card-form').reset();
            loadStripe();
        })    
    </script>
    

    @endslot
</div>
