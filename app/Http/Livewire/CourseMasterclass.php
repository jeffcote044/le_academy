<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseMasterclass extends Component
{
    public $course, $name, $email, $terms = true, $error_message = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'terms' => 'accepted'
    ];

    public function mount(Course $course) {
        $this->course = $course;
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function render() {
        return view('livewire.masterclass.register');
    }

    public function confirmData() {
        $this->validate();
        if($this->activeCampaign()) {
            return redirect()->route('masterclass.thanks', ['course' => $this->course]);
        } else {
            $this->error_message = true;
        }
    }

    public function replay(Course $course) {


        return view('livewire.masterclass.replay', compact('course'));
    }

    public function thanks(Course $course) {
        return view('livewire.masterclass.thanks', compact('course'));
    }

    function splitName($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
        return array($first_name, $last_name);
    }

    public function activeCampaign() {
        $response = Http::withHeaders([
            'Api-Token' => env('AC_API_KEY')
        ]);

        $getUserByEmail = $response->GET('https://mediasocial.api-us1.com/api/3/contacts/',[
            "email" => $this->email,
            "orders[email]" => "ASC"
        ]);

        $userData = $getUserByEmail['contacts'];

        if($userData){

            $userListsLink = $userData[0]['links']['contactLists'];
            $userId = $userData[0]['id'];

        }else{
            $user_name = $this->splitName($this->name);
            $addUser = $response->POST('https://mediasocial.api-us1.com/api/3/contacts',[
                "contact" => [
                    "email" => $this->email,
                    "firstName" => $user_name[0],
                    "lastName" => $user_name[1],
                ]
            ]);

            $userListsLink = $addUser['contact']['links']['contactLists'];
            $userId = $addUser['contact']['id'];
        }

        $getUserLists =  $response->GET($userListsLink);
        $userLists = $getUserLists['contactLists'];

        if(count($userLists) > 0) {
            foreach($userLists as $userList) {
                if($userList['list'] == 3 && $userList['status']==1) {
                    return false;
                }else if($userList['list'] == 3 && $userList['status']==2) {
                    $addUserToList = $response->POST('https://mediasocial.api-us1.com/api/3/contactLists',[
                        "contactList" => [
                            "list" => 3,
                            "contact" => $userId,
                            "status" => 1,
                            "sourceid" => 4
                        ]
                    ]);
                    return true;
                }
            }
        }else{
            $addUserToList = $response->POST('https://mediasocial.api-us1.com/api/3/contactLists',[
                "contactList" => [
                    "list" => 3,
                    "contact" => $userId,
                    "status" => 1
                ]
            ]);
            return true;
        }


    }
}
