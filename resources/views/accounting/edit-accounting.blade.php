@extends('.app')

@section('title', 'Добавление в таблицу')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            {{__('accounting.change_table_info')}}
                        </div>
                        <div class="card-body">
                            @if((Session::has('accounting_updated')))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('accounting_updated')}}
                                </div>
                            @endif
                            <form method="POST" action="{{route('accounting.update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$accounting->id}}">
                                <div class="form-group">
                                    <label for="type">{{__('accounting.type')}}</label>
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option selected value="{{$accounting->type}}">{{__('accounting.income')}}</option>
                                        <option value="{{$accounting->type}}">{{__('accounting.expense')}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">{{__('accounting.category')}}</label>
                                    <input type="text" name="category" class="form-control" placeholder="{{__('accounting.add_category')}}" value="{{$accounting->category}}" />
                                </div>
                                <div class="form-group">
                                    <label for="date">{{__('accounting.date')}}</label>
                                    <input type="date" name="date" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="sum">{{__('accounting.sum')}}</label>
                                    <input type="number" name="sum" class="form-control" placeholder="{{__('accounting.add_sum')}}" value="{{number_format($accounting->sum, 0, ' ', ' ')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="final_sum">{{__('accounting.total')}}</label>
                                    <input type="number" name="final_sum" class="form-control" placeholder="{{__('accounting.add_total')}}" value="{{number_format($accounting->final_sum, 0, ' ', '')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="comment">{{__('accounting.comments')}}</label>
                                    <input type="text" name="comment" class="form-control" placeholder="{{__('accounting.add_comment')}}" value="{{$accounting->comment}}"/>
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
