@extends($activeTemplate .'layouts.user')
@section('content')
@include($activeTemplate.'breadcrumb')
<section class="cmn-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card table-card">
                    <div class="card-body p-o">
                        <div class="table-responsive--sm">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">@lang('Date')</th>
                                        <th scope="col">name</th>
                                        <th scope="col">@lang('Total Earn')</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($surveys as $survey)
                                    <tr>
                                        <td data-label="">{{ $survey->created_at->format('Y-m-d') }}</td>
                                        <td data-label="">{{
                                            optional(App\Models\Survey\Survey::find($survey->survey_id))->name }}
                                        </td>
                                        <td data-label="">{{
                                            optional(App\Models\Survey\Survey::find($survey->survey_id))->amount }} TK
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">Empty</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
