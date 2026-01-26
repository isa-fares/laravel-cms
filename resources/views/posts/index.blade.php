<?php
// post ekle ve listele sayfası
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Posts</h1>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->image }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->author->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
