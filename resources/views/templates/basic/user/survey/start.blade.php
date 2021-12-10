@extends($activeTemplate .'layouts.user')
@section('content')
@include($activeTemplate.'breadcrumb')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="tab-content m-5 p-5">
    @php
    $openText = 0;
    @endphp
    <form action="{{ route('user.store.survey') }}" method="post">
        @csrf
        <input type="hidden" name="survey_id" value="{{ $surveyQuestions[0]->survey_id }}">
        @foreach ($surveyQuestions as $surveyQuestion)
        @php
        $i = $loop->index;
        @endphp
        <div class="tab-pane {{ $i==0? 'active': ''}}" style="{{ $i==0? '': 'display: none'}}" id="tab{{ $i }}">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Survey
                    </div>
                    <div class="card-body">
                        <div class="row bg-secondary p-1" style="color:white">
                            <div class="col-12">
                                Question {{ $loop->index+1 }}:
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-12">
                                {{ $surveyQuestion->question }}
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-12">
                                @if($surveyQuestion->questiontype_id == 1)
                                <div class="addtionalQstns">
                                    <div class="col-auto questionHolders mt-3">
                                        <div class="input-group mb-2">
                                            <input type="hidden" class="form-control" value="{{ $surveyQuestion->id }}"
                                                id="inlineFormInputGroup" placeholder="input qustion here"
                                                name="MultiChoiceQuestions[questions][lists][]">
                                        </div>
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-6 d-flex">
                                                    <input type="checkbox"
                                                        name="MultiChoiceQuestions[questions][options][{{ $surveyQuestion->id }}][A]"
                                                        onclick="check('A',{{ $surveyQuestion->id }},{{ $i }})"
                                                        value="{{ $surveyQuestion->questionOptions[0]->id }}">
                                                    &nbsp;{{
                                                    $surveyQuestion->questionOptions[0]->option }}
                                                </div>
                                                <div class="col-6 d-flex">
                                                    <input type="checkbox"
                                                        name="MultiChoiceQuestions[questions][options][{{ $surveyQuestion->id }}][B]"
                                                        onclick="check('B',{{ $surveyQuestion->id }},{{ $i }})"
                                                        value="{{ $surveyQuestion->questionOptions[1]->id }}">
                                                    &nbsp;{{
                                                    $surveyQuestion->questionOptions[1]->option }}
                                                </div>
                                                <div class="col-6 d-flex">
                                                    <input type="checkbox"
                                                        name="MultiChoiceQuestions[questions][options][{{ $surveyQuestion->id }}][C]"
                                                        onclick="check('C',{{ $surveyQuestion->id }},{{ $i }})"
                                                        value="{{ $surveyQuestion->questionOptions[2]->id }}">
                                                    &nbsp;{{
                                                    $surveyQuestion->questionOptions[2]->option }}
                                                </div>
                                                <div class="col-6 d-flex">
                                                    <input type="checkbox"
                                                        name="MultiChoiceQuestions[questions][options][{{ $surveyQuestion->id }}][D]"
                                                        onclick="check('D',{{ $surveyQuestion->id }},{{ $i }})"
                                                        value="{{ $surveyQuestion->questionOptions[3]->id }}">
                                                    &nbsp;{{
                                                    $surveyQuestion->questionOptions[3]->option }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var j=0;
                                    function check(op,id,i){
                                        var c = false;
                                        c = document.getElementsByName("MultiChoiceQuestions[questions][options]["+id+"]["+op+"]")[0].checked;
                                        if(c == true){
                                            document.getElementById('next'+i).style.display="";
                                            j++;
                                        }
                                        else{
                                            j--;
                                            if(j==0 ){
                                            document.getElementById('next'+i).style.display="none";
                                            }
                                        }
                                    }
                                </script>
                                @elseif($surveyQuestion->questiontype_id == 2)
                                @php
                                $openText++;
                                @endphp
                                <div class="addtionalQstns">
                                    <div class="col-auto questionHolders mt-3">
                                        <div class="input-group mb-2">
                                            <input class="form-control" id="inlineFormInputGroup"
                                                name="InputBaseQuestions[questions][lists][]"
                                                value="{{ $surveyQuestion->id }}" placeholder="input answer here"
                                                type="hidden" />
                                            <input class="form-control" id="inlineFormInputGroup"
                                                onkeyup="ontext({{ $surveyQuestion->id }},{{ $i }},{{ $openText }})"
                                                name="InputBaseQuestions[answers][lists][]"
                                                placeholder="input answer here" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function ontext(id, i, openText){
                                        if(document.getElementsByName("InputBaseQuestions[answers][lists]["+openText+"]").value != ''){
                                            document.getElementById('next'+i).style.display="";
                                        }
                                        else
                                        document.getElementById('next'+i).style.display="none";
                                    }
                                </script>
                                @elseif($surveyQuestion->questiontype_id == 3)
                                <div class="addtionalQstns">
                                    <div class="col-auto questionHolders mt-3">
                                        <div class="input-group mb-2"><input class="form-control"
                                                id="inlineFormInputGroup" name="YesNoQuestions[questions][lists][]"
                                                placeholder="input question here" value="{{ $surveyQuestion->id }}"
                                                type="hidden" />
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-6 d-flex">
                                                        <input type="radio"
                                                            onclick="radio('A',{{ $surveyQuestion->id }}, {{ $i }})"
                                                            name="YesNoQuestions[questions][options][{{ $surveyQuestion->id }}]"
                                                            value="yes" style="height: 20px" class="form-control">
                                                        <label for="optionA">
                                                            {{$surveyQuestion->questionOptions[0]->option}}
                                                        </label>
                                                    </div>
                                                    <div class="col-6 d-flex">
                                                        <input type="radio"
                                                            onclick="radio('A',{{ $surveyQuestion->id }}, {{ $i }})"
                                                            name="YesNoQuestions[questions][options][{{ $surveyQuestion->id }}]"
                                                            value="no" style="height: 20px" class="form-control">
                                                        <label for="optionB">
                                                            {{ $surveyQuestion->questionOptions[1]->option }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var j=0;
                                        function radio(op,id,i){
                                            var c = false;
                                            c = document.getElementsByName("YesNoQuestions[questions][options]["+id+"]")[0].checked;
                                            if(c == true){
                                                document.getElementById('next'+i).style.display="";
                                                j++;
                                            }
                                            else{
                                                j--;
                                                if(j==0 ){
                                                document.getElementById('next'+i).style.display="none";
                                                }
                                            }
                                        }
                                </script>
                                @elseif($surveyQuestion->questiontype_id == 4)
                                @elseif($surveyQuestion->questiontype_id == 5)
                                <div class="addtionalQstns">
                                    <div class="col-auto questionHolders mt-3">
                                        <div class="input-group mb-2"><input class="form-control"
                                                id="inlineFormInputGroup" name="LinearQuestions[questions][lists][]"
                                                value="{{ $surveyQuestion->id }}" placeholder="input question here"
                                                type="hidden" />
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="card card-body">
                                                <div class="row">
                                                    @php
                                                    $options =
                                                    App\Models\Survey\Questionvalue::where('survey_question_id',
                                                    $surveyQuestion->id)->first();
                                                    @endphp
                                                    @for($j = $options->MinVal; $j<=$options->MaxVal; $j++)
                                                        <div class="col-1 d-flex"><input class="form-control"
                                                                style="height: 20px"
                                                                id="vv{{ $surveyQuestion->id }}2{{ $j }}"
                                                                onclick="vaal({{ $surveyQuestion->id }},{{ $i }},{{ $j }})"
                                                                name="LinearQuestions[questions][options][{{ $surveyQuestion->id }}]"
                                                                type="radio" value="{{ $j }}" />{{ $j }}
                                                        </div>
                                                        @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function vaal(id,i,j){
                                            var c = false;
                                            c = document.getElementById("vv"+id+"2"+j).checked;
                                            if(c == true){
                                                document.getElementById('next'+i).style.display="";
                                            }
                                            else{
                                                document.getElementById('next'+i).style.display="none";
                                            }
                                        }
                                </script>
                                @elseif($surveyQuestion->questiontype_id == 6)
                                <div class="addtionalQstns">
                                    <div class="col-auto questionHolders mt-3">
                                        <div class="input-group mb-2"><input type="hidden" class="form-control"
                                                id="inlineFormInputGroup" value="{{ $surveyQuestion->id }}"
                                                name="dropDownQuestions[questions][lists][]">
                                        </div>
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <select name="dropDownQuestions[questions][options][]"
                                                        class="form-control">
                                                        <option
                                                            value="{{ $surveyQuestion->questionOptions[0]->option }}">
                                                            {{
                                                            $surveyQuestion->questionOptions[0]->option }}
                                                        </option>
                                                        <option
                                                            value="{{ $surveyQuestion->questionOptions[1]->option }}">
                                                            {{
                                                            $surveyQuestion->questionOptions[1]->option }}
                                                        </option>
                                                        <option
                                                            value="{{ $surveyQuestion->questionOptions[2]->option }}">
                                                            {{
                                                            $surveyQuestion->questionOptions[2]->option }}
                                                        </option>
                                                        <option
                                                            value="{{ $surveyQuestion->questionOptions[3]->option }}">
                                                            {{$surveyQuestion->questionOptions[3]->option }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        @if ($i != $surveyQuestions->count()-1)
                                        <a onclick="nextActive({{ $i }},{{ $i+1 }})" id="next{{ $i }}"
                                            class="btn btn-primary btnNext"
                                            style="color: white; @if($surveyQuestion->questiontype_id == 1 || $surveyQuestion->questiontype_id == 2 || $surveyQuestion->questiontype_id == 3 || $surveyQuestion->questiontype_id == 5) display:none @endif">Next</a>
                                        @endif
                                        @if(!$loop->first)
                                        @if ($i != $surveyQuestions->count()-1 || $i == $surveyQuestions->count()-1)
                                        <a id="pre" onclick="preActive({{ $i }},{{ $i-1 }})"
                                            class="btn btn-primary btnPrevious" style="color: white">Previous</a>
                                        @if($loop->last)
                                        <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                                        @endif
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </form>
</div>

<script>
    function nextActive(oid,id){
        $('#tab'+oid).removeClass("active")
        $('#tab'+oid).css('display',"none")
        $('#tab'+id).css('display',"")
        $('#tab'+id).addClass("active")
    }
    function preActive(oid,id){
        $('#tab'+oid).removeClass("active")
        $('#tab'+oid).css('display',"none")
        $('#tab'+id).css('display',"")
        $('#tab'+id).addClass("active")
        }
</script>
@endsection
