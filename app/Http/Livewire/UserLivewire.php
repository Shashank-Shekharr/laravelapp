<?php

namespace App\Http\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserLivewire extends BaseLivewireComponent
{

    //
    public $model = User::class;

    //
    public $name;
    public $email;
    public $phone;
    public $password;
    public $role;

    protected $rules = [
        "name" => "required|string",
        "email" => "required|email|unique:users",
        "phone" => "required|phone:AUTO,US|unique:users",
        "password" => "sometimes|nullable|string",
    ];


    protected $messages = [
        "email.unique" => "Email already associated with any account"
    ];

    public function render()
    {
        return view('livewire.users',[
            "roles" => Role::all(),
        ]);
    }

    public function save(){
        //validate
        $this->validate();

        try{

            DB::beginTransaction();
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->password = Hash::make($this->password);
            $user->save();

            if( !empty($this->role) ){
                $user->assignRole($this->role);
            }

            DB::commit();

            $this->dismissModal();
            $this->reset();
            $this->showSuccessAlert("User created successfully!");
            $this->emit('refreshTable');


        }catch(Exception $error){
            DB::rollback();
            $this->showErrorAlert( $error->getMessage() ?? "User creation failed!");

        }

    }

    public function initiateEdit($id){
        $this->selectedModel = $this->model::find($id);
        $this->name = $this->selectedModel->name;
        $this->email = $this->selectedModel->email;
        $this->phone = $this->selectedModel->phone;
        $this->role = $this->selectedModel->role_id;
        $this->emit('showEditModal');
    }

    public function update(){
        //validate
        $this->validate(
            [
                "name" => "required|string",
                "email" => "required|email|unique:users,email,".$this->selectedModel->id."",
                "phone" => "required|phone:AUTO,US|unique:users,phone,".$this->selectedModel->id."",
                "password" => "sometimes|nullable|string",
            ]
        );

        try{

            DB::beginTransaction();
            $user = $this->selectedModel;
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            if( !empty($this->password) ){
                $user->password = Hash::make($this->password);
            }
            $user->save();

            if( !empty($this->role) ){
                $user->syncRoles($this->role);
            }

            DB::commit();

            $this->dismissModal();
            $this->reset();
            $this->showSuccessAlert("User created successfully!");
            $this->emit('refreshTable');


        }catch(Exception $error){
            DB::rollback();
            $this->showErrorAlert( $error->getMessage() ?? "User creation failed!");

        }

    }



}
