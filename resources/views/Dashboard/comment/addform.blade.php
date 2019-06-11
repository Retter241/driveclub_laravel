{{-- Part for the form to add comment ( !use Auth middlware AND  $post->id) --}}

         <h4>Add comment</h4>
                     {!! Form::open(array('route'=>'comments.store', 'method' => 'POST')) !!}
         
                        <div class="form-group">
                                 {!! Form::text('comment_body', '', ['class' => 'form-control' , 'name' => 'comment_body']) !!}

                                {!! Form::text('parent_id', 0, ['class' => 'form-control' , 'placeholder' => 'parent_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}

                                 {!! Form::text('post_id', $post->id, ['class' => 'form-control' , 'placeholder' => 'post_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}
</div>
                        <div class="form-group">
                            {!! Form::submit('Add Comment' ,['class'=>'btn btn-warning']) !!}
                        </div>
                    {!! Form::close() !!}

