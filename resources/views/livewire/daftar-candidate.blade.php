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

                <form wire:submit="registering">
                    <div class="form-group mb-3">
                        <label for="name" class="energeek-labelform">Nama Lengkap</label>
                        <input type="text" wire:model="name" @class([
                            "form-control",
                            'is-invalid'=>$errors->has('name')
                            ]) placeholder="Cth: Jhonatan Akbar">

                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="job" class="energeek-labelform">Jabatan</label>
                        <select data-placeholder="Pilih Jabatan" @class([
                            "select2 form-control",
                            'is-invalid'=>$errors->has('job')
                            ]) id="job"
                            wire:model="job">
                            <option></option>
                            @foreach ($jobs['data'] as $job)
                                <option value="{{$job['id']}}">{{$job['name']}}</option>
                            @endforeach
                        </select>

                        @error('job')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="energeek-labelform">Telepon</label>
                        <input wire:model="phone" type="text" @class([
                            "form-control",
                            'is-invalid'=>$errors->has('email')
                            ]) placeholder="Cth: 0893239851289">

                        @error('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="energeek-labelform">Email</label>
                        <input wire:model="email" type="email" @class([
                            "form-control",
                            'is-invalid'=>$errors->has('email')
                            ])
                            placeholder="Cth: energeekmail@gmail.com">

                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="year" class="energeek-labelform">Tahun Lahir</label>
                        <select data-placeholder="Pilih Tahun" @class([
                            "select2 form-control",
                            'is-invalid'=>$errors->has('year')
                            ]) id="year"
                            wire:model="year">
                            <option></option>
                            @for ($i = date('Y'); $i >= date('Y', strtotime('-35year')); $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor()

                        </select>

                        @error('year')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="skills" class="energeek-labelform">Skill Set</label>
                        <select data-placeholder="Pilih Skill" @class([
                            "select2 form-control",
                            'is-invalid'=>$errors->has('skills')
                            ])
                            multiple="multiple" id="skills" wire:model="skill_sets">

                            @foreach ($skills['data'] as $skill)
                                <option value="{{$skill['id']}}">{{$skill['name']}}</option>
                            @endforeach
                        </select>
                        @error('skills')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
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

@script
<script>
    $(document).ready(function() {
        function init(){
            $('.select2').select2({
                theme: 'bootstrap4'
            })

            $('.select2').on('select2:select select2:unselect',function(e){
                this.dispatchEvent(new Event('change'));
            });
        }
        init();

        window.init = init;
        $wire.on('rerender',function(){
            setTimeout(() => {
                init();
            }, 1000);
        })
    });
</script>
@endscript
