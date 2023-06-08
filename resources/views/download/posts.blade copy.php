@extends('layouts.default')

@section('content')
  <div id="posts">
    <div class="logo">
      <!-- <img src="{{ public_path('/image/logo.png') }}" height="120px" width="170px" alt="Agrimax Logo" /> -->
      <img src="{{ public_path('/image/logo.png') }}" height="150px" width="200px" alt="Agrimax Logo" />
    </div>
    <div class="title">
      <h1>agrimax posts list</h1>
      <p><span>Date</span>: {{ now() }}</p>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Theme</th>
          <!-- <th scope="col">By</th> -->
          <!-- <th scope="col">Since</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach($posts ?? '' as $post)
        <tr>
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->content }}</td>
          <td>{{ $post->theme }}
            <br/> by: {{ $post->user }}
            <br/> at: {{ $post->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop

<style>
  #posts {
    width: 100%;
  }

  #posts .logo {
    width: 170px;
    margin: 0px auto;
    margin-top: 0;
  }

  #posts .title {
    margin-bottom: 10px;
  }

  #posts h1 {
    width: 100%;
    padding-bottom: 20px;
    /* color: rgb(4 118 52 / 1); */
    text-align: center;
    text-transform: uppercase;
    text-decoration: underline;
  }

  #posts p span {
    text-decoration: underline;
    font-weight: bold;
  }

  #posts table {
    table-layout: auto;
    border-collapse: collapse;
  }

  #posts table tr:nth-child(even) {
    background: rgb(243 244 246 / 1);
  }

  #posts table, #posts th, #posts td {
    border: 1px solid gray;
  }

  #posts table thead {
    background-color: rgb(4 118 52 / 1);
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 16px;
  }
  
  #posts table thead th {
    padding-top: 12px;
    padding-bottom: 12px;
  }

  #posts table tbody th, #posts table tbody td {
    padding: 12px 8px;
  }
</style>