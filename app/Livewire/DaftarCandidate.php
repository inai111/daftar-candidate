<?php

namespace App\Livewire;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Promise\Utils;
use Livewire\Component;

class DaftarCandidate extends Component
{
    public $name = '';
    public $job = '';
    public $phone = '';
    public $email = '';
    public $year = '';
    public $skill_sets = [];
    public $disabled = true;

    public function render()
    {
        # tidak bisa request ke aplikasi sendiri kalau pakai php artisan serve
        # untuk apinya cuma bisa di coba di postman saja.

        # pakai docker
        $client = new Client([
            'base_uri' => env('APP_URL_API','http://localhost').'/api/v1/',
            'timeout' => 5,
            'headers' => ['Accept' => 'application/json']
        ]);

        $promise = [
            'skills'=>$client->requestAsync('GET','skills'),
            'jobs'=>$client->requestAsync('GET','jobs'),
        ];

        $response = Utils::unwrap($promise);
        [$skills,$jobs] = Array((string)$response['skills']->getBody(),(string)$response['jobs']->getBody());
        $skills = json_decode($skills,true);
        $jobs = json_decode($jobs,true);
        return view('livewire.daftar-candidate',compact('skills','jobs'));
    }

    public function registering()
    {
        # pakai docker
        $client = new Client([
            'base_uri' => env('APP_URL_API','http://localhost').'/api/v1/',
            'timeout' => 5,
            'headers' => ['Accept' => 'application/json']
        ]);

        $this->resetValidation();

        $data = [
            'name'=>$this->name,
            'phone'=>$this->phone,
            'job'=>$this->job,
            'email'=>$this->email,
            'year'=>$this->year,
            'skills'=>$this->skill_sets,
        ];

        try{
            $response = $client->post('candidates',[
                'form_params'=>$data
            ]);

            if($response->getStatusCode()!==201){
                throw new Exception('',400);
            }

            $this->js("Swal.fire({
                title: \"Berhasil\",
                text: \"Lamaran berhasil dikirim.\",
                icon: \"success\",
                confirmButtonText: \"Selesai\",
                confirmButtonColor: \"#1bc5bd\"
                });");

        }catch(ClientException $e){
            $code = $e->getCode();

            $errors = (string)$e->getResponse()->getBody();
            $errors = json_decode($errors,true);
            $this->js("Swal.fire({
                title: \"Terjadi Kesalahan\",
                text: `{$errors['message']}`,
                icon: \"warning\",
                confirmButtonText: \"Baiklah\",
                confirmButtonColor: \"#f64e60\"
                });");

            if(isset($errors['errors'])){
                foreach($errors['errors'] as $key=>$error){
                    $this->addError($key,$error[0]);
                }
            }
        }

    }

    public function rendered()
    {
        $this->dispatch('rerender');
    }
}
