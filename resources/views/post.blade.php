@extends('layouts.blog-post')

@section('content')
   
    <div class="container" >

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                
                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>
                
                
                
                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="noimage.jpg" alt="">

                <hr>
                <p>{{$post->body}}</p>
                <!-- Post Content -->
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    @if (Session::has('comment_message'))
                        <p class="bg-danger"> {{session('comment_message')}}</p>
                    @endif
                    <h4>Leave a Comment:</h4>
                        {!! Form::open(['method'=>'post', 'action'=>'PostCommentsControler@store']) !!}
                        <!--{!! Form::hidden('post_id',null,['class'=>'form-control']) !!}-->
                        <input type="hidden" id='post_id' name='post_id' value='{{$post->id}}'>
                            <div class="form-group">
                               
                                {!! Form::textarea('body',null,['class'=>'form-control', 'rows'=>'3']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!} 

                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
            @if(count($comments))
                @foreach ($comments as $comment)
                @if ($comment->is_active == 1)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at}}</small>
                            </h4>
                            {{$comment->body}}
                             <!-- Nested Comment -->

                             @if (count($comment->replies)>0)

                                @foreach ($comment->replies as $reply)
                                    @if ($reply->is_active == 1)
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$reply->autor}}
                                                <small>{{$reply->created_at}}</small></h4>  
                                                <p>{{$reply->body}}</p> 
                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                             @endif
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Leave a Replay: </h4>
                                    {!! Form::open(['method'=>'post', 'action'=>'CommentRepliesControler@createReply']) !!}
                                    <!--{!! Form::hidden('post_id',null,['class'=>'form-control']) !!}-->
                                    <input type="hidden" id="comment_id" name='comment_id' value='{{$comment->id}}'>
                                    <div class="form-group">
                                        {!! Form::textarea('body',null,['class'=>'form-control', 'rows'=>'1']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('Submit Reply',['class'=>'btn btn-primary']) !!}
                                    </div>

                                    {!! Form::close() !!} 
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        </div>
                    </div>
                @endif
                @endforeach
              
            @endif
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>


                
            </div>

        </div>
        <!-- /.row -->

        <hr>


    </div>

@endsection

@section('footer')
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © Your Website {{date("Y")}}</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>
@endsection
