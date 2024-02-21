<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Skill;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DaftarCandidate extends Component
{
    public $name = '';
    public $job = '';
    public $phone = '';
    public $email = '';
    public $year = '';
    public $skills = [];
    public $disabled = true;

    public function render()
    {
        # tidak bisa request ke aplikasi sendiri kalau pakai php artisan serve
        # untuk apinya cuma bisa di coba di postman saja.
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:80/api/v1/',
            'timeout' => 5,
            'headers' => ['Accept' => 'application/json']
        ]);
        dd($client->request('GET','skills'));
        $skills = Skill::select('id','name')->get()->toArray();
        $jobs = Job::select('id','name')->get()->toArray();
        return view('livewire.daftar-candidate',compact('skills','jobs'));
    }

    public function registering()
    {
        $client = new Http();
        dd($client->get(route('skills.index')));
        // $this->js("Swal.fire({
        //     title: \"Berhasil\",
        //     text: \"Lamaran berhasil dikirim.\",
        //     icon: \"success\",
        //     confirmButtonText: \"Selesai\",
        //     confirmButtonColor: \"#1bc5bd\"
        //     });");
        // $this->js("Swal.fire({
        //     title: \"Terjadi Kesalahan\",
        //     text: \"Lamaran berhasil dikirim.\",
        //     icon: \"warning\",
        //     confirmButtonText: \"Baiklah\",
        //     confirmButtonColor: \"#f64e60\"
        //     });");
        // dd($this->name, $this->job, $this->phone, $this->email,$this->skills);
    }
}
