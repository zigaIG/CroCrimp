<!--
    izbriši penjališta balade jer nicem ne sluze
    izbriši sectors create jer si to strpo u spots show



 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @mapstyles
    </head>
        <title>{{config('app.name','CroCrimp')}}</title>
            <body>
                @mapscripts
                @include('inc.navbar')
                <div class='container'>
                    @include('inc.messages')
                    @yield('content')
                </div>
                {{-- @include('inc.footer') --}}
                <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace( 'article-ckeditor' );
                </script>
            </body>  
</html>



Schema::create('penjalistes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime');
            $table->mediumtext('opis');
            $table->decimal('x', 8,6);
            $table->decimal('y', 8,6);
            $table->integer('user_id');
            $table->timestamps();
        });

         -->
         <div class="container">
        <div class="row">
            <div class="col-md-8">
              <div class="page-header">
                <h1 class="pull-right"> Comments </h1>
                <hr>
                <div class="media">
                    <div class="media-body">
                            
                        <h4 class="media-heading user_name">Baltej Singh</h4>
                          Wow! this is really great.
                        <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                    </div>
                </div>                                           
            </div>                                         
        </div>
    </div>
</div>
<hr>
komentari
<div class="container">
        <div class="row">
            <div class="col-md-8">
              <div class="page-header">
                <h1 class="pull-right"> Comments </h1>
                <hr>
                <div class="media">
                    <div class="media-body">
                            
                        <h4 class="media-heading user_name">Baltej Singh</h4>
                          Wow! this is really great.
                        <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                    </div>
                </div>                                           
            </div>                                         
        </div>
    </div>
</div>
<hr>