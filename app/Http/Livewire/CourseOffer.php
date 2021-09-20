<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response as HttpResponse;
use Livewire\Component;

class CourseOffer extends Component
{
    public $course, $suscription, $plan_upsale, $flash_sale, $promo_time, $last_chance;
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

        $this->flash_sale = "20";

        $time = Carbon::now()->addDays(5)->format('Y/m/d H:i:s');

        if (Cookie::has('promoAd')) {

            if (\Carbon\Carbon::createFromTimeStamp(strtotime(Cookie::get('promoAd')))->gt(\Carbon\Carbon::now())){
                $this->promo_time['date'] = Cookie::get('promoAd');
            }else if(Cookie::has('lastChance')){
                session()->flash('status', 'Lo sentimos, esta oferta ya no está disponible.');
                return redirect()->route('payment.checkout', [$course]);
            }else{
                $this->last_chance = true;
                $last_chance_time = Carbon::now()->addMinutes(30)->format('Y/m/d H:i:s');
                Cookie::queue(Cookie::forever('lastChance', true));
                Cookie::queue(Cookie::forever('promoAd', $last_chance_time));
                $this->promo_time['date']  = $last_chance_time;
            }
        }else{
            //$this->promo_time['date']  = Carbon::now()->addHours(24);
            $this->promo_time['date']  = $time;
            Cookie::queue(Cookie::forever('promoAd', $time));
        }

        if(\Carbon\Carbon::createFromTimeStamp(strtotime(Cookie::get('promoAd')))->gt(\Carbon\Carbon::now()) && Cookie::has('lastChance')){
            $this->last_chance = true;
        }
        return view('livewire.course-flash-sale');

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
