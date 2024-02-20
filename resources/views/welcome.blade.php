<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite('resources/js/app.js')

    <style>
    </style>

  </head>
  <body>
    <div id="app">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-7">
                    <div class="card" sy>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="skills">Skill</label>
                                    <select name="skills" v-model="skills" id="skills">
                                        @foreach ($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="job">Job</label>
                                    <select name="job" v-model="job" id="job" class="">
                                        @foreach ($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        //  multiselect
        const skillsMulti = new MultiSelectTag('skills');

    </script>
  </body>
</html>
