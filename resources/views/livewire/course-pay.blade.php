<div class="relative max-w-lg">
    <div wire:loading.flex class="absolute w-full h-full flex bg-gray-100 bg-opacity-25 z-50 items-center justify-center">
        <x-spiner size="12"></x-spiner>
    </div>
    @can('enrolled', $course)
        <a 
        class="disabled w-full cursor-default bg-gray-300 rounded-lg font-bold text-white text-center inline-block px-8 py-4 text-lg md:w-80">Comprar ahora</a>
        <div class="flex flex-col justify-start w-full mt-2">
            <h3 class="text-lg font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-blue-400"></i>Ya estás inscrito a este curso</h3>
        </div>
    @else
        <div >
            <form id="card-form">
                <div class="form-group">
                    <input id="card-holder-name" type="text" class="form-input w-full mb-4 text-sm py-3" placeholder="Nombre del titular de la tarjeta" required>
                </div> 
                
                <!-- Stripe Elements Placeholder -->
                <div id="card-element" class="form-input py-3 mb-4"></div>
                <span id="card-errors" class="text-sm text-red-500"></span>

                <div class="my-4">
                    <label class="inline-flex items-center text-sm">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-secundary-400 " checked disabled><span class="ml-2 text-gray-700">Al completar la compra, aceptas estos <a href="#" class="text-secundary-400 font-bold underline"> Términos y condiciones</a></span>
                    </label>
                </div>
                <button id="card-button" class=" outline-zero w-full cursor-pointer bg-accent-400 rounded-full border border-accent-400 font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-transparent hover:text-accent-400 mr-6text-lg md:w-80">
                    Comprar
                </button>
            </form>
        </div>


        @push('scripts')
            <script>

                function loadStripe(){

                    const stripe = Stripe("{{env('STRIPE_KEY')}}");

                    const elements = stripe.elements();
                    const cardElement = elements.create('card');

                    cardElement.mount('#card-element');
                    const cardHolderName = document.getElementById('card-holder-name');
                    const cardButton = document.getElementById('card-button');
                    const cardForm = document.getElementById('card-form');

                    cardForm.addEventListener('submit', async (e) => {
                        e.preventDefault();

                        if(cardHolderName.value == ""){
                            document.getElementById('card-errors').textContent = 'El nombre del titular está incompleto.';
                        }else{
                            const { paymentMethod, error } = await stripe.createPaymentMethod(
                                'card', cardElement, {
                                    billing_details: { name: cardHolderName.value }
                                }
                            );

                            if (error) {
                                document.getElementById('card-errors').textContent = error.message;
                            } else {
                                Livewire.emit('paymentMethodCreate', paymentMethod.id);
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
                Livewire.on('errorPayment', function (){
                    document.getElementById('card-form').reset();
                    loadStripe();
                    alert('Ha ocurrido un error al momento de verificar el pago, por favor intenta de nuevo');
                })    
                
            </script>

        @endpush
    @endcan
    
   
</div>
