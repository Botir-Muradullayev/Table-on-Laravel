@extends('.app')

@section('title', 'Добавление в таблицу')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            {{__('accounting.add_info_to_table')}}
                        </div>
                        <div class="card-body">
                            @if((Session::has('account_created')))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('account_created')}}
                                </div>
                            @endif
                            <form method="POST" action="{{route('accounting.create')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="type">{{__('accounting.type')}}</label>
                                     <select class="form-select" aria-label="Default select example" name="type">
                                        <option selected>{{__('accounting.income')}}</option>
                                        <option value="Расход">{{__('accounting.expense')}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">{{__('accounting.category')}}</label>
                                    <input type="text" name="category" class="form-control" placeholder="{{__('accounting.add_category')}}" />
                                </div>
                                <div class="form-group">
                                    <label for="date">{{__('accounting.date')}}</label>
                                    <input type="date" name="date" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="sum">{{__('accounting.sum')}}</label>
                                    <input type="number" name="sum" class="form-control" placeholder="{{__('accounting.add_sum')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="final_sum">{{__('accounting.total')}}</label>
                                    <input type="number" name="final_sum" class="form-control" placeholder="{{__('accounting.add_total')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="comment">{{__('accounting.comments')}}</label>
                                    <input type="text" name="comment" class="form-control" placeholder="{{__('accounting.add_comment')}}"/>
                                </div>
                                <div style="padding-top: 20px">
                                    <button type="submit" class="btn btn-success">{{__('accounting.add')}}</button>
                                    <a href="/accountings" class="btn btn-danger">{{__('accounting.back')}}</a>
                                </div>
                            </form>
                                @if($errors->any())
                                    <ul class="mt-3 list-disc list-inside text-sm text-red-500">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
