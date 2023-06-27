@extends('layouts.export')

@section('content')
  <table>
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts ?? '' as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>
        <span class="post-title">{{ $post->title }}</span>
        <br/><br/><span class="post-item">category:</span> <br/>{{ $post->theme }}
        <br/><br/><span class="post-item">by:</span> <br/><span class="post-user">{{ $post->user }}</span>
        <br/><br/><span class="post-item">at:</span> <br/>{{ $post->created_at }}
      </td>
      <td>
        <!-- {{ $post->content }} -->
        <?php echo(html_entity_decode($post->content)) ?>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
@stop