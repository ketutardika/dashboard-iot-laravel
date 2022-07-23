<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FarmOrganization;
use App\Models\Projects;
use App\Models\ProjectsSections;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Registration extends Component
{
	public $currentStep = 1;
    public  $farm_name, $farm_description, $projects_name, $projects_type, $projects_description, $section_name, $section_type, $section_description;
    public $successMessage = '';
    public $section_names=[], $section_types;
    public $section_1, $section_2, $section_3, $section_4, $section_5;
    public $updateMode = false;
    public $inputs = [];
    public $i = 5;
    public $j = 1;


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        $this->section_names[$i] = '';
    }

    public function mount() 
    {  
        $this->section_names[0] = 'NFT';
        $this->section_names[1] = 'Dutch Bucket';
        $this->section_names[2] = 'Micro Green';
        $this->section_names[3] = 'Baby Plant';
        $this->section_names[4] = 'Fishhouse';        
    }

    public function remove($i)
    {
        unset($this->section_names[$i]);
    }

    private function resetInputFields(){
        $this->section_names = '';
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'farm_name' => 'required|string|distinct|min:3',
        ]);
 
        $this->currentStep = 2;
    }
  
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'projects_name' => 'required|string|distinct|min:3',
        ]);
  
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
                'section_names' => 'required|array|min:3',
                'section_names.*' => 'required|string|distinct|min:3',
            ],
        );
  
        $this->currentStep = 4;
    }
  
    public function submitForm()
    {
    	$farm_unique_ids = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10));
    	$project_unique_ids = strtoupper(substr(str_shuffle(str_repeat("0123456789", 10)), 0, 10));
    	$section_unique_ids = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST", 10)), 0, 10));

        $user_id = Auth::user()->id;

        FarmOrganization::create([
            'name_organization' => $this->farm_name,
            'description_farm' => $this->farm_description,
            'unique_id' => $farm_unique_ids,
            'user_id' => $user_id,
        ]);

        Projects::create([
        	'unique_id' => $project_unique_ids,
        	'unique_id_farm' => $farm_unique_ids,
            'name_project' => $this->projects_name,
            'type_project' => $this->projects_type,
            'description_project' => $this->projects_description,            
            'user_id' => $user_id,
            'isactive' => '1',
        ]);

        foreach ($this->section_names as $key => $value) {
        $sections_unique_ids = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST", 10)), 0, 10));
        ProjectsSections::create([
            'unique_id' => $sections_unique_ids,
            'unique_id_project' => $project_unique_ids,                
            'name_section' => $this->section_names[$key], 
            'user_id' => $user_id,
        ]);

        }

        DB::table('users')->where('id',$user_id)->update([
            'hasfarm' => '1',
        ]);

        $this->successMessage = 'You\'ve successfully registered';
  
        $this->clearForm();
  
         return redirect()->to('/');
    }
  
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    public function clearForm()
    {
        $this->farm_name = '';
        $this->farm_description = '';
        $this->projects_name = '';
        $this->projects_type = '';
        $this->projects_description = '';
        $this->section_name = '';
        $this->section_type = '';
        $this->section_description = ''; 
    }


    public function render()
    {   
        return view('livewire.registration');
    }
}
