@extends('app')

@section('title', 'Домашняя Бухгалтерия')

@section('content')
    <section style="padding-top:60px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            {{__('accounting.home_accounting')}}
                        </div>
                        <div class="card-body">
                            @if(Session::has('accounting_deleted'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('accounting_deleted')}}
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>{{__('accounting.type')}}</th>
                                        <th>{{__('accounting.category')}}</th>
                                        <th>{{__('accounting.date')}}</th>
                                        <th>{{__('accounting.sum')}}</th>
                                        <th>{{__('accounting.total')}}</th>
                                        <th>{{__('accounting.comments')}}</th>
                                        <th>{{__('accounting.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounting as $account)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$account->type}}</td>
                                            <td>{{$account->category}}</td>
                                            <td>{{date('d.m.Y', strtotime($account->date))}}</td>
                                            <td>{{number_format($account->sum, 0, ' ', ' ')}}</td>
                                            <td>{{number_format($account->final_sum, 0, ' ', ' ')}}</td>
                                            <td>{{$account->comment}}</td>
                                            <td>
                                                <a href="/accountings/{{$account->id}}" class="btn btn-info">{{__('accounting.details')}}</a>
                                                <a href="/delete-accounting/{{$account->id}}" class="btn btn-danger">{{__('accounting.delete')}}</a>
                                                <a href="/edit-accounting/{{$account->id}}" class="btn btn-success">{{__('accounting.change')}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="/add-accounting" class="btn btn-success">{{__('accounting.add')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
