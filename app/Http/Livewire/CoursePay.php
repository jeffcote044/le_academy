<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Exception;

class CoursePay extends Component
{
    public $course;
    

    protected $listeners =['paymentMethodCreate'];
    
    public function mount(Course $course){
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.course-pay');
    }
    public function paymentMethodCreate($paymentMethod){
        try {
            $price = $this->course->finalPrice *100; //Cambiar dolares a centavos de dolar
            auth()->user()->charge($price, $paymentMethod);
            
            $this->emit('resetStripe');
        } catch (Exception $e) {
            $this->emit('errorPayment');
        }
    }
}
