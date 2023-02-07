<?php

namespace App\Http\Livewire;

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\ParentAttachments;
use App\Models\religion;
use App\Models\TybeBlood;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


class AddParent extends Component
{

        use WithFileUploads;

        public $photos = [];

        public $catchError,
        $updateMode = false ,
        $show_table = true,
        $parent_id ;


        public $successMessage = "";
        public $message = 5;
        public $currentStep = 1 ,

         // Father_INPUTS
        $email, $password,
        $name_father_ar, $name_father_en,
        $national_id_father, $passport_id_father,
        $phone_father, $job_father_ar, $job_father_en,
        $nationality_father_id, $blood_type_father_id,
        $address_father, $religion_father_id,

        // Mother_INPUTS
        $name_nother_ar, $name_nother_en,
        $national_id_mother, $passport_id_mother,
        $phone_mother, $job_mother_ar, $job_mother_en,
        $nationality_mother_id, $blood_type_mother_id,
        $address_mother, $religion_mother_id;



        public function render()
        {
            $Nationalities = Nationalitie::get();
            $Type_Bloods = TybeBlood::get();
            $Religions = religion::get();
            return view('livewire.add-parent' , compact('Nationalities' , 'Type_Bloods' , 'Religions') );
        }




        public function updated($propertyName)
        {
            $this->validateOnly($propertyName , [

                'email' => 'required|unique:my_parents,Email,'.$this->id,
                'national_id_father' => 'required|string|min:10|max:14|regex:/[0-9]{9}/' ,
                'passport_id_father' => 'min:10|max:10' ,
                'phone_father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'national_id_mother' => 'required|string|min:10|max:14|regex:/[0-9]{9}/',
                'passport_id_mother' => 'min:10|max:10',
                'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10' ,
                'photos.*' => 'image|max:1024', // 1MB Max

            ]);
        }


        //firstStepSubmit
        public function firstStepSubmit()
        {

        //    $this->validate([
        //         'email' => 'required|unique:my_parents,Email,'.$this->id,
        //         'password' => 'required',
        //         'name_father_ar' => 'required',
        //         'name_father_en' => 'required',
        //         'job_father_ar' => 'required',
        //         'job_father_en' => 'required',
        //         'national_id_father' => 'required|string|min:10|max:14|regex:/[0-9]{9}/' ,
        //         'passport_id_father' => 'min:10|max:14|required|unique:my_parents,passport_id_father,' . $this->id,
        //         'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //         'nationality_father_id' => 'required',
        //         'blood_type_father_id' => 'required',
        //         'religion_father_id' => 'required',
        //         'address_father' => 'required',
        //     ]);

            $this->currentStep = 2 ;
        }

        public function secondStepSubmit()
        {

            // $this->validate([
            //     'name_nother_ar' => 'required',
            //     'name_nother_en' => 'required',
            //     'national_id_mother' => 'required|string|min:10|max:14|regex:/[0-9]{9}/',
            //     'passport_id_mother' => 'min:10|max:14|required|unique:my_parents,passport_id_mother,' . $this->id,
            //     'phone_mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10' ,
            //     'job_mother_ar' => 'required',
            //     'job_mother_en' => 'required',
            //     'nationality_mother_id' => 'required',
            //     'blood_type_mother_id' => 'required',
            //     'religion_mother_id' => 'required',
            //     'address_mother' => 'required',
            // ]);

            $this->currentStep = 3;
        }



        //back
        public function back($step)
        {
            $this->currentStep = $step;
        }



        public function submitForm() {

            try{
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->name_father_ar = $this->name_father_ar;
            $My_Parent->name_father_en = $this->name_father_en;
            $My_Parent->national_id_father = $this->national_id_father;
            $My_Parent->passport_id_father = $this->passport_id_father;
            $My_Parent->phone_father = $this->phone_father;
            $My_Parent->job_father_ar = $this->job_father_ar;
            $My_Parent->job_father_en = $this->job_father_en;
            $My_Parent->nationality_father_id = $this->nationality_father_id;
            $My_Parent->blood_type_father_id = $this->blood_type_father_id;
            $My_Parent->religion_father_id = $this->religion_father_id;
            $My_Parent->address_father = $this->address_father;

            // Mother_INPUTS
            $My_Parent->name_nother_ar = $this->name_nother_ar;
            $My_Parent->name_nother_en = $this->name_nother_en;
            $My_Parent->national_id_mother = $this->national_id_mother;
            $My_Parent->passport_id_mother = $this->passport_id_mother;
            $My_Parent->phone_mother = $this->phone_mother;
            $My_Parent->job_mother_ar = $this->job_mother_ar;
            $My_Parent->job_mother_en = $this->job_mother_en;
            $My_Parent->nationality_mother_id = $this->nationality_mother_id;
            $My_Parent->blood_type_mother_id = $this->blood_type_mother_id;
            $My_Parent->religion_mother_id = $this->religion_mother_id;
            $My_Parent->address_mother = $this->address_mother;

            $My_Parent->save();


            if(!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $path = $photo->storeAs($this->national_id_father , $photo->getClientOriginalName() , 'parent_attachments');
                     ParentAttachments::create([
                        'file_name' => $path ,
                        'parent_id' => MyParent::latest()->first()->id,
                    ] );
                }
            }


            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;

        }
            catch (\Exception $e) {
                $this->catchError = $e->getMessage();
            };


        }


        public function clearForm()
        {
            $this->email = '';
            $this->password = '';
            $this->name_father_ar = '';
            $this->name_father_en = '';
            $this->job_father_ar = '';
            $this->job_father_en = '';
            $this->name_father_ar = '';
            $this->name_father_en = '';
            $this->national_id_father ='';
            $this->passport_id_father = '';
            $this->phone_father = '';
            $this->nationality_father_id = '';
            $this->blood_type_father_id = '';
            $this->address_father ='';
            $this->religion_father_id ='';

            $this->name_nother_ar = '';
            $this->name_nother_en = '';
            $this->job_mother_en = '';
            $this->job_mother_ar = '';
            $this->national_id_mother ='';
            $this->passport_id_mother = '';
            $this->phone_mother = '';
            $this->nationality_mother_id = '';
            $this->blood_type_mother_id = '';
            $this->address_mother ='';
            $this->religion_mother_id ='';

        }




}
