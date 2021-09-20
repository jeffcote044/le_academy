<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class CourseCheckout extends Component
{

    public $course, $suscription, $plan_upsale;
    public $name, $email, $email_confirmation,  $password, $password_confirmation, $data_send;
    public $can_continued = false;
    public $error_message = "* Tenemos un error, revisa la información suminitrada anteriormente";
    public $error_button = "Toca aquí para confirmar la información";

    protected $rules = [
        'name' => 'required',
        //'email' => 'email|unique:App\Models\User,email|required_with:email_confirmation',
        'email' => 'required|email',
        'email_confirmation' => 'email|min:6|required_with:email|same:email',
        'password' => 'required|min:8',
        'password_confirmation' => 'min:8|required_with:password|same:password'
    ];

    public function updated($propertyName) {
        $this->can_continued = false;
        $this->reset(['error_button']);
        $this->validateOnly($propertyName);

    }

    public function mount(Course $course) {
        $this->course = $course;
        return view('livewire.course-checkout');
    }

    public function confirmData() {

        if (auth()->user()) {
            $user_exist = auth()->user();
            $email = $user_exist->email;
        }else{
            $this->validate();
            $email = strtolower($this->email);
            $user_exist = User::where('email', $email)->first();
        }

        if($user_exist){
            $user = $user_exist;

            if ($this->course->students->contains($user->id) ) {
                $this->can_continued = false;
                $this->error_button = "No puedes continuar con la compra, el usuario $email ya está registrado a este curso";
                return;
            }
        }

        $this->can_continued = true;
        $this->data_send = "$this->name~$email~$this->password~0";
    }
}
