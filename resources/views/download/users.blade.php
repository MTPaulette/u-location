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
    @foreach($users ?? '' as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>
      <span class="user-title">{{ $user->title }}</span>
      <br/><br/><span class="user-item">category:</span> <br/>{{ $user->theme }}
      <br/><br/><span class="user-item">by:</span> <br/><span class="user-user">{{ $user->user }}</span>
      <br/><br/><span class="user-item">at:</span> <br/>{{ $user->created_at }}
      </td>
      <td>{{ $user->content }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
@stop