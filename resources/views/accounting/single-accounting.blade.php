@extends('.app')

@section('title', 'Детали таблицы')

@section('content')
    <section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="justify-content: normal">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            {{__('accounting.table_details')}}
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('accounting.type')}}</th>
                                    <th>{{__('accounting.category')}}</th>
                                    <th>{{__('accounting.date')}}</th>
                                    <th>{{__('accounting.sum')}}</th>
                                    <th>{{__('accounting.total')}}</th>
                                    <th>{{__('accounting.comments')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{$accounting->type}}</th>
                                    <th>{{$accounting->category}}</th>
                                    <th>{{date('d.m.Y', strtotime($accounting->created_at))}}</th>
                                    <th>{{number_format($accounting->sum, 0, ' ', ' ')}}</th>
                                    <th>{{number_format($accounting->final_sum, 0, ' ', ' ')}}</th>
                                    <th>{{$accounting->comment}}</th>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="padding-top: 20px">
                        <a href="/accountings" class="btn btn-danger">{{__('accounting.back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
