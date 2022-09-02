<?php

namespace App\Http\Livewire;

use App\Models\Meeting;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MeetingLivewire extends Component
{

    public $meetingTitle;
    public $meetingId;
    public $isMine = true;
    public $errorMessage;

    public function mount($code){
        $this->meetingId = $code;

        try{

            $meeting =  Meeting::where("meeting_id", $this->meetingId)->first();

            $mandatoryLogin = setting('mandatoryLogin', '0') == "1" ? true : false;
            $unauthorizedMeeting = setting('unauthorizedMeeting', '1') == "1" ? true : false;

            //in app meeting is mandatory to join
            if( empty($meeting) && !$unauthorizedMeeting ){
                $this->errorMessage = "No meeting found with associated meeting id";
            }else if( Auth::user() == null &&  $mandatoryLogin ){
                $this->errorMessage = "You need to be authenticated to join a meeting";
            }else{
                $this->meetingTitle = $meeting->meeting_title ?? "Untitled";
                $this->isMine = $meeting->user_id == \Auth::id();
            }


        }catch(Exception $error){

            $this->meetingTitle = "Untitled";
            $this->errorMessage = $error->getMessage() ?? "";

        }


        // $this->errorMessage = "You need to be authenticated to join a meeting";

    }

    public function render()
    {
        return view('livewire.meeting')->layout('layouts.auth');
    }
}
