<?php

namespace App\Http\Livewire;

use App\Traits\SystemUpdateTrait;

class UpgradeLivewire extends BaseLivewireComponent
{

    use SystemUpdateTrait;
    public $terminalCommand;
    public $terminalError;

    public function render()
    {
        return view('livewire.settings.upgrade');
    }


    public function runTerminalCommand(){

        try{
            $this->systemTerminalRun( $this->terminalCommand );
            $this->showSuccessAlert("Terminal command successfully!");
        }catch(\Exception $error){
            $this->terminalError = $error->getMessage() ?? "Terminal command failed!";
        }

    }






}
