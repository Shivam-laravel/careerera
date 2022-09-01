<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('front_assets/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css')}}">
</head>
<body>

    <div class="main">

        <div class="container">



            <form method="POST"  class="appointment-form" action="{{ route('query.submit') }}" id="appointment-form">
                @if (Session::has('msg'))
                <div class="form-group-1" style="background-color: green;">
                    {{ Session::get('msg') }}
                </div>
                @else


                <h2>Raise Your Query</h2>
                <div class="form-group-1">
                    <input type="hidden" name="batch_id" value="{{ $batch_id }}"   />
                    <input type="hidden"  name="student_id" value="{{ $user_id }}" />
                    <input type="hidden" name="student_name" value="{{ $studentname->user_name }}" />
                    <input type="hidden" name="student_email" value="{{ $studentname->user_email }}" />
                    <input type="hidden" value="{{ $programmanagerid->ProgramManager }}" name="program_manager_id" />
                    <select name="query_type" required id="">
                        <option value="">Select Query Type</option>
                        @foreach ($query as $qu)
                            <option value="{{ $qu->query_type }}">{{ $qu->query_type }}</option>
                        @endforeach
                    </select>
                    <textarea class="form-control" name="description" placeholder="Detailed Description" cols="30" rows="10"></textarea>



                <div class="form-submit">
                    <input type="submit" id="submit" class="submit" value="Submit" />
                </div>
@endif
            </form>

        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset('front_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
