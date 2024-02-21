<div>
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html">
                <img src="{{ asset('logo.png') }}" alt="">
            </a>
        </div>

        <div class="card energeek-card">
            <div class="card-body register-card-body">
                <p class="login-box-msg energeek-apply">Apply Lamaran</p>

                <form wire:submit.prevent="registering">
                    <div class="form-group mb-3">
                        <label for="name" class="energeek-labelform">Nama Lengkap</label>
                        <input type="text" wire:model="name" class="form-control" placeholder="Cth: Jhonatan Akbar">
                    </div>
                    <div class="form-group mb-3">
                        <label for="job" class="energeek-labelform">Jabatan</label>
                        <select data-placeholder="Pilih Jabatan" class="select2 form-control" id="job"
                            wire:model="job">
                            <option></option>
                            @foreach ($jobs as $job)
                                <option value="{{$job['id']}}">{{$job['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="energeek-labelform">Telepon</label>
                        <input wire:model="phone" type="text" class="form-control" placeholder="Cth: 0893239851289">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="energeek-labelform">Email</label>
                        <input wire:model="email" type="email" class="form-control"
                            placeholder="Cth: energeekmail@gmail.com">
                    </div>
                    <div class="form-group mb-3">
                        <label for="year" class="energeek-labelform">Tahun Lahir</label>
                        <select data-placeholder="Pilih Tahun" class="select2 form-control" id="year"
                            wire:model="year">
                            <option></option>
                            @for ($i = date('Y'); $i >= date('Y', strtotime('-35year')); $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor()

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="skills" class="energeek-labelform">Skill Set</label>
                        <select data-placeholder="Pilih Skill" class="select2 form-control"
                            multiple="multiple" id="skills" wire:model="skills"
                            wire:change="cekForm">
                            @foreach ($skills as $skill)
                                <option value="{{$skill['id']}}">{{$skill['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger btn-block"
                        {{-- @disabled($disabled) --}}
                        wire:loading.attr="disabled">Apply
                        <div class="spinner-border text-secondary spinner-border-sm" role="status" wire:loading>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</div>

@assets
    <style>
        .register-logo img {
            width: 260.8px;
            margin-top: 80px !important;
            height: 60px;
        }

        .energeek-apply {
            font-size: 24px;
            font-weight: 500;
            line-height: 36px;
            color: #000;
        }

        .energeek-card {
            width: 530px;
        }

        .energeek-labelform {
            font-weight: 400 !important;
            font-size: 16px !important;
            color: #000;

        }

        .register-box {
            width: 530px !important;
        }

        body {
            font-family: Poppins, sans-serif !important;
        }

        .register-page {
            height: 100% !important;
        }
    </style>
@endassets