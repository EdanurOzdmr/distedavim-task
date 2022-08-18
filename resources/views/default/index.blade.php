@extends('layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Dashboard</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tedaviler</th>


                    </tr>
                    <tbody id="sortable">
                @foreach($data['treatment'] as $treatment)
                    <tr id="item-{{$treatment->id}}">
                    <td class="sortable">{{$treatment['treatment_name']}}</td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('css')@endsection
@section('js')@endsection
