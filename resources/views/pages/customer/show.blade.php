@extends('layouts.app')

@php
    $title = 'Show customer of Loading';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <table class="table table-responsive">
            <thead>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>{{$model->nama}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{$model->alamat}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{$model->tanggal_lahir}}</td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td>{{$model->longitude}}</td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td>{{$model->latitude}}</td>
                </tr>
                <tr>
                    <td>Customer Type</td>
                    <td>{{$model->customer_type->name}}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{$model->created_at->toDateTimeString()}}</td>
                </tr>
                <tr>
                    <td>Last Modified</td>
                    <td>{{$model->updated_at->toDateTimeString()}}</td>
                </tr>
            </tbody>
        </table>

        <x-btn-link :link="route('customer.index')" :color="'success'" :value="'Back'"/>
        <x-btn-link :link="route('customer.edit', $model)" :color="'info'" :value="'Edit'"/>
        <x-btn-link :link="'#'" :color="'danger'" :value="'Delete'" :id="'btn-delete-'.$model->id"/>
        <form action="{{route('customer.destroy', $model)}}" id="form-delete-{{$model->id}}" method="POST">
            @csrf
            @method('DELETE')
        </form>
    </x-main-card>
@endsection

@section('js')
    <script>
        var btn = document.getElementById('btn-delete-{{$model->id}}');
        btn.addEventListener('click', (e) => {
            e.preventDefault()
            swal({
                    title: "Are you sure?", 
                    text: "Once deleted, you will not be able to recover this record!", 
                    icon: "warning", 
                    buttons: true, 
                    dangerMode: true 
                }).then((willDelete) => {
                    if (willDelete) {
                        // console.log(document.getElementById('form-delete-{{$model->id}}'));
                        document.getElementById('form-delete-{{$model->id}}').submit();
                    } else { 
                        swal({
                            title: "Fyuuh!!!",
                            text: 'Your record is safe!',
                            icon: 'success'
                        }); 
                    } 
                });
        })
    </script>
@endsection