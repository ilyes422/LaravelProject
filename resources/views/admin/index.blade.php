@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Créer un nouveau produit</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" style="margin-top: 10px">
        <tr>
            <th>Nom :</th>
            <th>Description :</th>
            <th>Image :</th>
            <th>Prix :</th>
            <th>Categories :</th>
            <th>Actions :</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name }}</td>
                <td>{{$product->description }}</td>
                <td>{{$product->image }}</td>
                <td>{{$product->price }}</td>
                <td>{{$product->categorie_id}}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-light" href="{{ route('products.show',$product->id) }}">Voir</a>

                        <a class="btn btn-light" href="{{ route('products.edit',$product->id) }}">Modifier</a>

                        @csrf
                        @method('DELETE')
                        <x-primary-button class="ml-4">
                            {{ __('Supprimer') }}
                        </x-primary-button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
