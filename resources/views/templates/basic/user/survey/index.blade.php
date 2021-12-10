@extends($activeTemplate .'layouts.user')
@section('content')
@include($activeTemplate.'breadcrumb')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-center">
                Survey
            </div>
        </div>
        <div class="card-body">
            <div class="row bg-secondary p-1" style="color:white">
                <div class="col-md-3">
                    Category
                </div>
                <div class="col-md-3">
                    Name
                </div>
                <div class="col-md-2">
                    Date
                </div>
                <div class="col-md-2">
                    Amount
                </div>
                <div class="col-md-2">
                    Action
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach ($surveys as $survey)
                @php
                $count =
                App\CompletedSurvey::where(['user_id'=>Auth::id(),'Survey_id'=>$survey->id])->get()->count();
                @endphp
                @if($count == 0)
                <div class="col-md-3">
                    {{ $survey->category->name }}
                </div>
                <div class="col-md-3">
                    {{ $survey->name }}
                </div>

                <div class="col-md-2">
                    {{ $survey->created_at->format("Y-m-d") }}
                    @if ($survey->created_at->addDays(7)->gte(Carbon\Carbon::now()))
                    <span class="badge badge-warning">New</span>
                    @endif
                </div>
                <div class="col-md-2">
                    {{ $survey->amount }} TK
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary" href="{{ route('user.start.survey',$survey->id) }}"
                        style="color:white">Start
                        Survey</a>
                </div>
                <br> <br>
                <hr>
                @endif
                @endforeach
            </div>
            {{ $surveys->links() }}
        </div>
    </div>
</div>
@endsection
