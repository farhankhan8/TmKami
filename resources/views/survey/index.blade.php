@extends('admin.layouts.app')
@section('panel')
<div class="col-lg-12">
    <div class="card b-radius--10 ">
        <div class="card-body p-0">
            <div class="table-responsive--sm  table-responsive">
                <table class="table table--light style--two surveyTbl">
                    <thead>
                        <tr>
                            <th scope="col">@lang('S/N0')</th>
                            <th scope="col" width="3%">@lang('Survey Name')</th>
                            <th scope="col">@lang('Category')</th>
                            <th scope="col">@lang('Questions')</th>
                            <th scope="col">@lang('Completed')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Action')</th>
                            <th scope="col">@lang('Date Craeted')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($surveys as $key => $survey)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td class="text-center" width="3%">
                                {{ $survey->name }}
                            </td>
                            <td class="text-center">
                                {{ $survey->category->name }}
                                {{-- /can we use category name here sure use here category name --}}
                            </td>
                            <td class="text-center">
                                @if ($survey->questions->count() >0)
                                <span class="badge badge-primary">{{ $survey->questions->count() }}</span>
                                @else {{ 'None' }}
                                @endif
                            </td>
                            <td class="text-center">
                                80 people
                            </td>
                            
                            <td class="text-center">
                                @if ($survey->active == 1)
                                <a href="{{ route('admin.survey.status',$survey->id) }}"> <span
                                        class="badge badge-primary">active</span></a>
                                @else
                                <a href="{{ route('admin.survey.status',$survey->id) }}"> <span
                                        class="badge badge-danger">Deactivate</span></a>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ isset($survey->amount)? $survey->amount : '0' }} TK
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="menu-icon la la-expand"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.survey.question.create', [$survey->id])}}"><i
                                                class="menu-iconla la la-edit mr-2"></i> Add Questions</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.survey.question.show', [$survey->id])}}"><i
                                                class="menu-iconla la la-edit mr-2"></i> Show Question</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.survey.question.update', [$survey->id])}}"><i
                                                class="menu-iconla la la-edit mr-2"></i> Edit Question</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.survey.delete', [$survey->id])}}"><i
                                                class="menu-icon text-danger la la-trash mr-2"></i> Remove Survey</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($survey['created_at'])->format('M d Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table><!-- table end -->
            </div>
            {{-- {{ $surveys->links() }} --}}
        </div><!-- card end -->
    </div>
    @endsection
    @push('script')
    <script>
        $(document).ready(function() {
            //alert("SHSJHS");
        });
    </script>
    @endpush
