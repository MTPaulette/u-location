@extends('layouts.export')

@section('title')
<span>agrimax products list</span>
@stop

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
        <span class="title">{{ $product->name }}</span>
        <br/><br/><span class="item">category:</span> <br/>{{ $product->category->name }}
        <br/><br/><span class="item">by:</span> <br/><span class="user">{{ $product->user->email }}</span>
        <br/><br/><span class="item">at:</span> <br/>{{ $product->created_at }}
      </td>
      <td>
        <?php echo html_entity_decode($product->description) ?>
      </td>
      <td>
        @if($product->images_count)
          @foreach($product->images ?? '' as $image)
          <img src="{{ public_path('/image/logo.png') }}" height="50px" width="70px" alt="Agrimax Logo" />
            {{ $image }} <br>
          @endforeach
        @else
          <span class="no-image">no image</span>
        @endif
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
@stop