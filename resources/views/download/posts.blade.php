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
      <td style="width: 70%">{{ $post->content }}</td>
      <!-- <td style="width: 60%">
        lore djjhcn cvoluptate pariatur harum. Aut asperiores in dolorem adipisci laborum suscipit 
        a.voluptas in. Sunt dolor consequatur qui dicta voluptas. Sint asperiores nulla magrecusandae
         sunt. Deleniti eum et facere. Nemo eius qui eos maiores id. Qui ut voconsequatur voluptatibus
          veritatis aut dolor. Ea aut voluptatem voluptatem nemotenetur. Quia ea molestiae eaque ea exp
          edita dolor eos. Et laudantium rerum tenAb perspiciatis quia asperiores distinctio aut. Rerum 
          deserunt et aut eos non offiEveniet veritatis aut nesciunt possimus debitis velit. Maiores f
        acere et repellendexpedita tempore et voluptatem. Consequatur occaecati neque molestiae evenietNatus 
        fuga est quas qui fuga quas ducimus. Et iusto facere dolorum deleniti quiain esse sunt eos molestiae commodi illum
      </td> -->
    </tr>
    @endforeach
    </tbody>
  </table>
@stop