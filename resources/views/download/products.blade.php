@extends('layouts.export')

@section('content')
  <table>
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Images</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products ?? '' as $product)
    <tr>
      <th scope="row">{{ $product->id }}</th>
      <td>
        {{$product}}
        <br>
        <span class="product-title">{{ $product->name }}</span>
        <br/><br/><span class="product-item">category:</span> <br/>{{ $product->category }}
        <br/><br/><span class="product-item">by:</span> <br/><span class="product-user">{{ $product->user }}</span>
        <br/><br/><span class="product-item">at:</span> <br/>{{ $product->created_at }}
      </td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->description }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
@stop