<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>agrimax</title>
    </head>
    <body>
      <div id="posts">
        <div class="logo">
          <!-- <img src="{{ public_path('/image/logo.png') }}" height="120px" width="170px" alt="Agrimax Logo" /> -->
          <img src="{{ public_path('/image/logo.png') }}" height="150px" width="200px" alt="Agrimax Logo" />
        </div>
        <div class="title">
          <h1>agrimax posts list</h1>
          <p><span>Date</span>: {{ now() }}</p>
        </div>
        <div class="content">
          @yield('content')
        </div>
      </div>
  </body>
</html>


<style>
  #posts, .content {
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

  #posts .title h1 {
    width: 100%;
    padding-bottom: 20px;
    text-align: center;
    text-transform: uppercase;
    text-decoration: underline;
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

  #posts td .post-title {
    font-weight: bold;
  }

  #posts td .post-item {
    text-decoration: underline;
  }

  #posts td .post-user {
    color: rgb(26 86 219 / 1);
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