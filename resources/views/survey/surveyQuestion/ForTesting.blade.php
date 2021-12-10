@extends('admin.layouts.app')
@section('panel')
<form method="POST" action="{{ route('admin.survey.question.store', $survey->id) }}">
    @csrf
    <div class="row my-2  dynamicQuestionAdded">
        <input type="hidden" name="survey_id" value={{$survey->id}}>
        <div class="col-lg-12 mx-auto px-0">
            <div class="card text-center">
                <div class="card-body moreQuestion px-1">
                    {{-- <h4 class="card-title">Survey Questions</h4> --}}
                    <div class="row">
                        <div class="col-md-12">
                                    <button type="button" class="add-another btn btn-warning  addMultichoiceQbtn">Add Multichoice Question</button>
                                    <button type="button" class="add-another btn btn-primary addInputBasebtn">Add Input Base Question</button>
                                    <button type="button" class="add-another btn btn-success addYesNoQbtn">Add YES | No Question</button>
                                    <button type="button" class="add-another btn btn-danger addImageBaseQbtn">Add Image Question Base</button>
                                    <button type="button" class="add-another btn btn-primary addLinearQbtn">Add Linear Base Question</button>
                                    <button type="button" class="add-another btn btn-info addDropDownQbtn">Add DropDown Question</button>
                                    <button type="button" class="add-another btn btn-warning Iq">IQ Question</button>
                                    <button type="button" class="btn btn-secondary">Import Question</button>

                                {{-- <div class="ml-auto  mb-3 ">
                                    <div class="d-flex btnholder flex-column">
                                        <button
                                            class="add-another btn btn-warning addMultichoiceQbtn align-content-center flex"
                                            tabindex="1" data-icon="+">Add Multichoice Question
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-auto  mb-3">
                                    <div class="d-flex btnholder flex-column">
                                        <button
                                            class="add-another btn btn-primary addInputBasebtn align-content-center flex"
                                            tabindex="1" data-icon="+">Add Input Base Question
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-auto  mb-3">
                                    <div class="d-flex btnholder flex-column">
                                        <button
                                            class="add-another btn btn-success addYesNoQbtn align-content-center flex"
                                            tabindex="1" data-icon="+">Add YES | No Question
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-auto  mb-3 mt-3">
                                    <div class="d-flex btnholder flex-column">
                                        <button
                                            class="add-another btn btn-danger addImageBaseQbtn align-content-center flex"
                                            tabindex="1" data-icon="+">Add Image Question Base
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-auto  mb-3 mt-3">
                                    <div class="d-flex btnholder flex-column">
                                        <button
                                            class="add-another btn btn-primary addLinearQbtn align-content-center flex"
                                            tabindex="1" data-icon="+">Add Linear Base Question
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-auto  mb-3 mt-3">
                                    <div class="d-flex btnholder flex-column">
                                        <button
                                            class="add-another btn btn-info addDropDownQbtn align-content-center flex"
                                            tabindex="1" data-icon="+">Add DropDown Question
                                        </button>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        {{-- <div class="col-lg-9 col-sm-12">
                            <div class="questionWrapperhold">
                                @if (Session::has('created'))
                                <div class="row">
                                    <div class="alert alert-success col-lg-10 mx-auto text-center py-2 px-3"
                                        role="alert">
                                        {{ Session::get('created') }}
                                    </div>
                                </div>
                                @endif --}}
                            
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mx-auto my-3">
                                    <button type="submit" disabled
                                        class="btn btn-primary col-12 btn-lg saveQuestionsNow">Save Question</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@endsection
@push('script')
<script>
    $(document).ready(function() {
            //alert("SHSJHS");
        });
</script>
@endpush
